<?php
/**
 * Created by PhpStorm.
 * User: zingmars
 * Date: 17.10.2015
 * Time: 15:54
 */
namespace App\Controller;
use App\Controller\Component\PrivilegeComponent;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Symfony\Component\Config\Definition\Exception\Exception;

class APIController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        if(!Configure::read('debug')) { //TODO: I don't actually want this API on live servers - Too many things left to do.
            echo "403 Forbidden";
            return;
        }

        $this->autoRender = false;
        $this->loadModel('AuthTokens');
        //TODO: Attempt authenticating and handle errors before actually going to the controller to avoid code repetition.
    }
    //Get post
    public function post($id)
    {
        $this->loadModel('Posts');
        $post = $this->Posts->get($id);
        echo $post;
    }

    //Login state
    public function login()
    {
        //TODO: Use CakePHP's methods instead of $_POST. I just cba to figure them out at the time.
        $this->loadComponent('Auth');

        //Get Login and username from POST
        $username = $this->request->data("username");
        $password = $this->request->data("password");
        if($username === null || $password === null || !$this->request->is('post')) {
            echo "400 Bad Request";
            return;
        } else {
            //Log user in
            if ($user = $this->Auth->identify()) {
                //Create an auth token
                $token = $this->AuthTokens->newEntity([
                    'userid' => $user['uid'],
                    'public_token' => $this->generateRandomString(16),
                    'private_token' => $this->generateRandomString(16), //Unused field
                    'type' => 0 //Unused field. Meant to be per-token privileges, but never got around to implementing it.
                ]);
                if($this->AuthTokens->save($token)) {
                    //Return auth token
                    $privlvl = ($user['privlvl'] & PrivilegeComponent::AdminAccess) ? ",admin" : ",user";
                    echo $token->public_token.$privlvl.",".$user['uid'];
                } else {
                    echo "500 Internal server error";
                    /*$errors = $token->errors();
                    foreach($errors as $error) {
                        foreach($error as $key => $damn) {
                            echo $key.":".$damn.";";
                        }
                    }*/
                }
            } else echo "Authentication failed";
        }
    }
    public function logout()
    {
        $token = $this->request->data("token");
        $user = $this->checkAuth($token, $this->request->data("username"));
        if($user === null) {
            echo "400 Bad Request";
            return;
        } else {
            //Revoke the token, but but don't erase it for logging reasons.
            //TODO: Token action tracking table.
            $TokenTable = TableRegistry::get("AuthTokens");
            $tokens = $TokenTable->find('all')->where(['AuthTokens.public_token' => $token]);
            $token = $tokens->first();
            $token->state = 0;
            if($TokenTable->save($token)) {
                echo "Logout successful";
            } else {
                echo "An error occurred";
            }
        }
    }

    //Posts
    //TODO: Check fields for null
    public function newPost()
    {
        $user = $this->checkAuth($this->request->data("token"), $this->request->data("username"));
        if($user and !($user['privlvl'] & PrivilegeComponent::PostEdit)) {
            echo "400 Bad Request";
        } else {
            try {
                $this->loadModel('Posts');

                $title = $this->request->data("title");
                $shortbody = $this->request->data("short");
                $longbody = $this->request->data("long");
                $creator = $user['uid'];

                //Create a new post
                $post = $this->Posts->newEntity([
                    'title' => $title,
                    'shortbody' => $shortbody,
                    'longbody' => $longbody,
                    'creator' => $creator
                ]);
                if($this->Posts->save($post)) {
                    echo "Success";
                } else {
                    echo "An error has occurred";
                }
            } catch (Exception $e) {
                echo "An error has occurred";
            }
        }
    }
    public function editPost($id)
    {
        $user = $this->checkAuth($this->request->data("token"), $this->request->data("username"));
        if($user and !($user['privlvl'] & PrivilegeComponent::PostEdit)) {
            echo "400 Bad Request";
        } else {
            try {
                $PostsTable = TableRegistry::get("Posts");
                $post = $PostsTable->get($id);

                $post->title = $this->request->data("title");
                $post->shortbody = $this->request->data("short");
                $post->longbody = $this->request->data("long");
                $post->lasteditor = $user['uid'];
                $post->editreason = $this->request->data("reason");
                if($PostsTable->save($post)) {
                    echo "Success";
                } else {
                    echo "An error has occurred";
                }
            } catch (Exception $e) {
                echo "An error has occurred";
            }
        }
    }
    public function deletePost($id)
    {
        $user = $this->checkAuth($this->request->data("token"), $this->request->data("username"));
        if($user and !($user['privlvl'] & PrivilegeComponent::PostEdit) and $id !== null) {
            echo "400 Bad Request";
        } else {
            $PostsTable = TableRegistry::get("Posts");
            $post = $PostsTable->get($id);
            if($PostsTable->delete($post)) {
                echo "Success";
            } else {
                echo "An error has occurred";
            }
        }
    }

    //Comments
    public function getComments($id)
    {
        $this->loadModel('Comments');
        $this->loadModel('Users');

        $comments = $this->Comments->find('all')->where(['Comments.postid' => $id])->toArray();
        foreach($comments as &$comment) {
            //Get the username of the poster and add it to the array
            $comment["username"] = $this->Users->get($comment->userid)->username;
            //Lose the userID to avoid data leakage
            $comment["userid"] = "retracted";
            //Make the date human readable
            $comment["date"] = date("d.m.Y H:i:s", strtotime($comment["date"]))." UTC";
        }
        echo json_encode($comments);
        return;
    }
    public function getUserComments($userid)
    {
        //TODO: Review when sober
        $this->loadModel('Comments');
        $this->loadModel('AuthTokens');
        $this->loadModel('Posts');

        $user = $this->checkAuth($this->request->data("token"), $this->request->data("username"));

        if ($user) {
            $comments = $this->Comments->find('all')->where(['Comments.userid' => $userid])->toArray();
            /*foreach($comments as $comment) {
            }*/
            echo json_encode($comments);
        } else {
            echo "400 Bad Request ".$this->request->data("token").":".$this->request->data("username");
        }
        return;
    }
    public function addComment($postid)
    {
        $this->loadModel('Posts');
        $post = $this->Posts->get($postid);
        if ($post->commentsallowed == 1) {
            $user = $this->checkAuth($this->request->data("token"), $this->request->data("username"));
            if($user) {
                $this->loadModel("Comments");
                $userid = $user['uid'];
                $comment = $this->request->data("comment");

                $comment = $this->Comments->newEntity([
                    'postid' => $postid,
                    'userid' => $userid,
                    'comment' => $comment
                ]);
                if($this->Comments->save($comment)) {
                    echo "Success";
                } else {
                    echo "An error has occurred";
                }
            } else {
                echo "400 Bad Request";
            }
        } else {
            echo "New comments not allowed for this post";
        }
    }
    public function editComment($postid)
    {
        $user = $this->checkAuth($this->request->data("token"), $this->request->data("username"));
        if($user) {
            $CommentsTable = TableRegistry::get("Comments");
            $comment = $CommentsTable->get($postid);

            if($comment->userid === $user['uid']) {
                $comment->comment = $this->request->data("comment");
                if($CommentsTable->save($comment)) {
                    echo "Success";
                } else {
                    echo "An error has occurred";
                }
            } else {
                echo "An error has occurred";
            }
        } else {
            echo "400 Bad Request";
        }
    }
    public function removeComment($postid)
    {
        $user = $this->checkAuth($this->request->data("token"), $this->request->data("username"));
        if($user) {
            $CommentsTable = TableRegistry::get("Comments");
            $comment = $CommentsTable->get($postid);

            if($comment->userid === $user['uid']) {
                if($CommentsTable->delete($comment)) {
                    echo "Success";
                } else {
                    echo "An error has occurred";
                }
            } else {
                echo "An error has occurred";
            }
        } else {
            echo "400 Bad Request";
        }
    }
    //Utilities
    public function checkToken() {
        if($this->checkAuth($this->request->data("token"), $this->request->data("username")) !== null) echo "true";
        else echo "false";
    }
    private function checkAuth($token, $username)
    {
        //TODO: Figure out how DB links work with CAKE and rewrite.
        if($username !== null && $token !== null) {
            $this->loadModel('Users');

            $tokens = $this->AuthTokens->find('all')->where(['AuthTokens.public_token' => $token]);
            $token = $tokens->first();
            if($token !== null && $token->state === 1) {
                $user = $this->Users->get($token->userid);
                if($user !== null && $user['username'] === $username) {
                    //TODO: Touch the entry to cause lastusedate update
                    //$token->state = 1;
                    //$this->AuthTokens->save($token);
                    return $user;
                }
            }
        }
        return null;
    }
    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}