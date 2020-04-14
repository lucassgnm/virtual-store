<?php

class Cadastro_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserir()
    {
        $nome = $_POST["nomecad"];
        $email = $_POST["emailcad"];
        $telef = $_POST["telcad"];
        $ender = $_POST["enderecocad"];
        $estado = $_POST["estadocad"];
        $cidade = $_POST["cidadecad"];
        $usu = $_POST["usucad"];
        $senha = $_POST["senhacad"];


        $dados = array(":usuario" => $usu, ":senha" => $senha);
        $resultusu = $this->db->select("SELECT usuario, senha
                                     FROM loja.cliente 
                                     WHERE usuario = :usuario and senha = sha2(:senha,256)", $dados);

        $dados = array(":usuario" => $usu, ":senha" => $senha);
        $resultfunc = $this->db->select("SELECT usuario, senha 
                                     FROM loja.cliente 
                                     WHERE usuario = :usuario and senha = sha2(:senha,256)", $dados);

        $countusu = count($resultusu);
        $countfunc = count($resultfunc);

        if ($countusu > 0 && $countfunc > 0) {
            echo ("Usuário já cadastrado");
        } else {
            $result = $this->db->insert('loja.cliente',
                array(
                    "nome" => $nome,
                    "usuario" => $usu,
                    "senha" => hash('sha256', $senha),
                    "telefone" => $telef,
                    "endereco" => $ender,
                    "estado" => $estado,
                    "cidade" => $cidade,
                    "email" => $email
                )
            );
            Session::init();
            Session::set('login', $result[0]->id);
            Session::set('logado', true);
            echo ("OK");
        }
    }

    public function getCidades()
    {
        $estado = $_POST["estadocad"];
        $dados = array(":estado" => $estado);
        $result = $this->db->select("SELECT nome, id 
                                     FROM loja.cidade
                                     WHERE estado = :estado
                                     ORDER BY nome", $dados);
        echo json_encode($result);
    }

    public function getEstados()
    {
        $result = $this->db->select("SELECT nome, id 
                                     FROM loja.estado 
                                     ORDER BY nome");
        echo json_encode($result);
    }
}
