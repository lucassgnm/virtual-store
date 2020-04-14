<?php

class Cadastro extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->js = array('cadastro/cadastro.js');
    }

    function index()
    {
        $this->view->title = 'Cadastro';
        //$this->view->render('cadastro/header');
        $this->view->render('cadastro/index');
        //$this->view->render('cadastro/footer');
    }

    function inserir()
    {
        $this->model->inserir();
    }

    function getCidades()
    {
        $this->model->getCidades();
    }

    function getEstados()
    {
        $this->model->getEstados();
    }
}
