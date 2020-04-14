<?php

class Login extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->js = array('login/login.js');
    }

    function index()
    {
        $this->view->title = 'Login';
        //$this->view->render('login/header');
        $this->view->render('login/index');
        //$this->view->render('login/footer');
    }
    function ver()
    {
        $this->model->ver();
    }
}
