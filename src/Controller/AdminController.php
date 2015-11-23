<?php
namespace App\Controller;
use App\Controller\Component\PrivilegeComponent;
use Cake\Datasource\ConnectionManager;
use Cake\Network\Exception\NotFoundException;
use Cake\Filesystem\File;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */

function getIP() {
    return getenv('HTTP_CLIENT_IP')?:
        getenv('HTTP_X_FORWARDED_FOR')?:
            getenv('HTTP_X_FORWARDED')?:
                getenv('HTTP_FORWARDED_FOR')?:
                    getenv('HTTP_FORWARDED')?:
                        getenv('REMOTE_ADDR');
}

class AdminController extends AppController
{
    var $components = ['Flash',
        'Security' => ['csrfExpires' => '+1 hour'],
        'Auth' => [
            'loginRedirect' => ['controller'=>'admin', 'action'=>'home'],
            'loginAction'   => ['controller'=>'admin', 'action'=>'login'],
            'logoutRedirect' => ['controller'=>'blog', 'action'=>'index']
    ]];
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadComponent('Csrf');
        $this->Csrf->config('secure', 'true');
    }
    public function beforeFilter(Event $event)
    {
        $this->Security->config('blackHoleCallback', 'forceSSL');
        $this->Security->requireSecure();
        $this->Auth->allow(['login', 'index', 'addAccount']);
    }
    public function forceSSL() {
        if(!$this->request->is('ssl')) {
            return $this->redirect('https://' . env('SERVER_NAME') . $this->request->here);
        }
    }

    public $validate = ['log' => ['rule' => 'notBlank'], ['pwd' => ['rule'=>'notBlank']]];


    public function index()
    {
        // Honeypot
        $this->set('title', 'Login');
        $this->Security->unlockedFields = ['pwd', 'log', 'wp-submit', '_csrfToken'];
        $this->layout = "login";

        if ($this->Auth->user()) {
            return $this->redirect(['controller'=>'admin', 'action'=>'home']);
        }
        if ($this->request->is('post') && (array_key_exists('log', $this->request->data) && array_key_exists('pwd', $this->request->data))) {
            if($this->request->data['log'] === 'login' && $this->request->data['pwd'] === '') return $this->redirect(['controller'=>'admin', 'action'=>'login']); //for when I'm too lazy to edit the URL bar.

            $ip = getIP();
            $honeypotfile = new File('../logs/honeypot.log', true);
            $honeypotfile->append('('.date('m/d/Y h:i:s a', time()).') ('.$ip.') '.'Attempted login - '.$this->request->data['log'].':'.$this->request->data['pwd']."\r\n");
            $this->Flash->error(__('Invalid username and/or password'));
            return $this->redirect(['controller' =>$this->name, 'action'=>'index']); //Need to force a redirect because otherwise the flash won't appear
        }
    }
    public function login()
    {
        $this->set('title', 'Login');
        $this->layout="login";

        if ($this->Auth->user()) {
            return $this->redirect(['controller'=>'admin', 'action'=>'home']);
        }
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user and $user['privlvl'] & PrivilegeComponent::AdminAccess) {
                // Update last login data. Last login date will update automatically on DB side.
                $users = TableRegistry::get('Users');
                $userobject = $users->get($user['uid']);
                $userobject->lastloginip = getIP();
                $users->save($userobject);

                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username and/or password'));
            return $this->redirect(['controller'=>'admin', 'action'=>'login']);
        }
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    public function home()
    {
        $this->layout = "admin";
        $this->set('title', 'Main page');
        // System version
        $this->set('CakeVersion', Configure::version());

        // Database data
        $connection = ConnectionManager::get('default');
        $this->set('Server', $connection->config()['host']);
        $this->set('Driver', $connection->config()['driver']);
        $this->set('User', $connection->config()['username']);
        $this->set('Charset', $connection->config()['encoding']);
        $this->set('Timezone', $connection->config()['timezone']);

        $versionQuery = "SHOW VARIABLES LIKE 'version'";
        $this->set('MyVersion', $connection->execute($versionQuery)->fetchAll()[0][1]);

        // User data
        $user = $this->Auth->user();
        $this->set('CurrentIP', $this->request->clientIp());
        $this->set('Username', $user['username']);
        $this->set('FullName', $user['visiblename']);
        $this->set('LastLogin', $user['lastlogin']);
        $this->set('LastLoginIP', $user['lastloginip']);
    }
    public function posts()
    {
        $this->layout = "admin";
        $this->set('title', 'Blog posts');
    }
    public function comments()
    {
        $this->layout = "admin";
        $this->set('title', 'Latest comments');
    }
    public function analytics()
    {
        $this->layout = "admin";
        $this->set('title', 'Statistics');
    }
    public function maillist()
    {
        $this->layout = "admin";
        $this->set('title', 'Mailing list');
    }
    public function settings()
    {
        $this->layout = "admin";
        $this->set('title', 'Statistics');
    }
    public function profile()
    {
        $this->layout = "admin";
        $this->set('title', 'Edit profile');
    }
    public function security()
    {
        $this->layout = "admin";
        $this->set('title', 'Security settings');
    }

    //Debug functions
    public function addAccount()
    {
        //Debug mode account creation. Creates a new admin account and log in with it.
        if(Configure::read('debug')) {
            $this->layout = "login";
            if ($this->request->is('post')) {
                $user = $this->Users->newEntity($this->request->data);
                if ($this->Users->save($user)) {
                    $this->Auth->setUser($user->toArray());
                    return $this->redirect(['controller'=>'admin', 'action'=>'home']);
                }
                $this->Flash->error(__('Unable to create a new user'));
                return $this->redirect(['controller'=>'admin', 'action'=>'addAccount']);
            }
        } else {
            throw new NotFoundException();
        }
    }
}