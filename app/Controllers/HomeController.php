<?php
namespace App\Controllers;


use Src\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return $this->view->render('home/home');
    }

    public function error($code = 400, $message = 'Sorry, an error has occurred!')
    {
        return $this->view->render('home/error', compact('code', 'message'));
    }

}