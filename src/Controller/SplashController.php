<?php
/**
 * Created by PhpStorm.
 * User: zingmars
 * Date: 27.08.2015
 * Time: 18:24
 */
namespace App\Controller;
use App\Controller\AppController;

class SplashController extends AppController
{
    public function index()
    {
        //$this->render(false);
        $this->layout = false;
    }
    public function getEmail()
    {
        $this->autoRender = false;
        $email = "contact@zingmars.me";
        echo $email;
    }
}