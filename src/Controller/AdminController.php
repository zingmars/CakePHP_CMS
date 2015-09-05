<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Utility\Inflector;
use Cake\Filesystem\File;
use Cake\Event\Event;
/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class AdminController extends AppController {
    var $components = ['Flash', 'Security' => ['csrfExpires' => '+1 hour'], 'Csrf' => ['secure'=>true, 'expiry'=>'+1 hour']];
    public function initialize()
    {
        parent::initialize();
    }
    public function beforeFilter(Event $event)
    {
        $this->Security->config('blackHoleCallback', 'forceSSL');
        $this->Security->requireSecure();
    }
    public function forceSSL() {
        if(!$this->request->is('ssl')) {
            return $this->redirect('https://' . env('SERVER_NAME') . $this->request->here);
        }
    }
    public function index()
    {
        $this->set('title', 'Login');
        $this->Security->unlockedFields = ['pwd', 'log', 'wp-submit', '_csrfToken'];
        $this->layout = "login";


        if ($this->request->is('post') && (array_key_exists('log', $this->request->data) && array_key_exists('pwd', $this->request->data))) {

            $ip = getenv('HTTP_CLIENT_IP')?:
                getenv('HTTP_X_FORWARDED_FOR')?:
                    getenv('HTTP_X_FORWARDED')?:
                        getenv('HTTP_FORWARDED_FOR')?:
                            getenv('HTTP_FORWARDED')?:
                                getenv('REMOTE_ADDR');
            $honeypotfile = new File('../logs/honeypot.log', true);
            $honeypotfile->append('('.date('m/d/Y h:i:s a', time()).') ('.$ip.') '.'Attempted login - '.$this->request->data['log'].':'.$this->request->data['pwd']."\r\n");
            $this->Flash->error(__('Invalid username and/or password'));
        }
    }
}