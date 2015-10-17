<?php
namespace App\Controller;
/**
* Created by PhpStorm.
* User: zingmars
* Date: 17.10.2015
* Time: 15:54
*/


class APIController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->autoRender = false;
        $this->loadModel('Posts');

    }
    public function post($id)
    {
        $post = $this->Posts->get($id);
        echo $post;
    }
}