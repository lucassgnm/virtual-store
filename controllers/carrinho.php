<?php

class Carrinho extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('carrinho/carrinho.js');
    }

    function index() {
        $this->view->title = 'home';
		$this->view->render('header');
        $this->view->render('carrinho/index');
		$this->view->render('footer');
    }


}


?>