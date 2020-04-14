<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ver()
    {
        $usu = $_POST["usulogin"];
        $senha = $_POST["senhalogin"];

        $dados = array(":usuario" => $usu, ":senha" => $senha);
        $resultusu = $this->db->select("SELECT usuario, senha, id, email 
                                     FROM loja.cliente 
                                     WHERE usuario = :usuario and senha = sha2(:senha,256)", $dados);

        $resultfunc = $this->db->select("SELECT usuario, senha, id, email
                                     FROM loja.funcionario 
                                     WHERE usuario = :usuario and senha = sha2(:senha,256)", $dados);

        $countusu = count($resultusu);
        $countfunc = count($resultfunc);

        if ($countusu > 0) {
            // login
            Session::init();
            Session::set('login', $resultusu[0]->id);
            Session::set('email', $resultusu[0]->email);
            Session::set('tipo', 0);
            Session::set('logado', true);
            echo ("OK");
        } else if ($countfunc > 0) {
            // login
            Session::init();
            Session::set('login', $resultfunc[0]->id);
            Session::set('email', $resultfunc[0]->email);
            Session::set('tipo', 1);
            Session::set('logado', true);
            echo ("OK");
        } else {
            echo ("Dados Incorretos.");
        }
    }
}
