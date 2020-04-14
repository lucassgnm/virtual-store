<?php

class Index extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->js = array('index/index.js');
    }

    function index()
    {
        $this->view->title = 'Home';
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

    function selprodutos()
    {

        $this->model->selprodutos();
    }

    function addCompra()
    {

        $this->model->addCompra();
    }

    function rmCompra()
    {

        $this->model->rmCompra();
    }

    function listaCompra()
    {

        $this->model->listaCompra();
    }

    function finalizarcompra()
    {

        $this->model->finalizarcompra();
    }
}
