<?php

class Produto extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('produto/produto.js');
    }

    function index() {
        $this->view->title = 'Cadastro de Produtos';
		//$this->view->render('header');
        $this->view->render('produto/index');
		$this->view->render('footer');
    }

    function salvar(){

        $this->model->salvar();

    }

}


?>