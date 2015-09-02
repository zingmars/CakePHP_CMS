<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Utility\Inflector;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class PostsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('RequestHandler');

        $this->set('title', 'My blog'); //Default title.

        $latestposts = $this->Posts->find('all', [ 'order' => ['id' => 'desc'], 'limit' => '10', 'fields' => [ 'Posts.id', 'Posts.title', 'Posts.veryshortbody', 'Posts.createdate' ]]);
        $this->set(compact('latestposts'));

        // Because it's very likely that my site won't get much traffic, I'm going to handle pulling the latest quote within this app.
        $this->loadModel('Quotes');
        $latestquote = $this->Quotes->find('all', ['order' => ['id' => 'desc']]);
        $latestquote = $latestquote->first();

        if(strtotime(date("Y-m-d H:i:s")) - strtotime($latestquote->date) > 86400) {
            $json = file_get_contents('http://api.theysaidso.com/qod.json');
            $obj = json_decode($json);
            if(isset($obj->success)) {
                $newquote = $this->Quotes->newEntity();
                $newquote->quote = $obj->contents->quotes[0]->quote;
                $newquote->author = $obj->contents->quotes[0]->author;
                if($this->Quotes->save($newquote)) {
                    $latestquote = $newquote;
                }
            } else {
                $latestquote -> $this->Quotes->get(1);
                $this->log("Couldn't get a new daily quote so the first one in the database was used. Is the service down, are we banned or did you mess up your php config again?");
            }
        }

        $this->set(compact('obj'));
        $this->set(compact('latestquote'));
    }
    /**
     * Index method
     *
     * @return void
     */
    public $paginate = [ 'limit' => 3, 'order' => ['id' => 'desc' ]];
    public function index()
    {
        if($this->RequestHandler->isRSS()) {
            $posts = $this->Posts->find()->limit(10)->order(['id'=>'desc']);
        }
        else {
            $posts = $this->paginate();
        }

        $this->set(compact('posts'));
    }

    /**
     * View method
     *
     * @param string $id Post id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id)
    {
        $post = $this->Posts->get($id);
        $this->set('title', $post->title); //TODO: Move to the view. I put it here because I was yet to implement the view page.
        $this->set(compact('post'));
    }

    /**
     * Find method
     *
     * @param string $val Search lookup string to be used when looking for posts
     * @return void
     */
    public function find()
    {
        $search = $this->request->query('search');

        //$results = $this=>Posts=>find('all', 'options' => [''])
        $this->set('title', 'search results for: '.$search);
        $this->set('search', $search);
    }

    //TODO: Move the functions below to the corresponding admin panel location
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    /*public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('post'));
        $this->set('_serialize', ['post']);
    }*/

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    /*public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('post'));
        $this->set('_serialize', ['post']);
    }*/

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    /*public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }*/
}
