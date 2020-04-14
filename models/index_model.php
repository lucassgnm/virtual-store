<?php

class Index_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }


    function selprodutos()
    {

        $sql = 'SELECT * FROM loja.produto';

        $result = $this->db->select($sql);

        echo json_encode($result);
    }


    function addCompra()
    {

        $prod = $_POST["produto"];
        Session::init();

        $carrinho = Session::get('car');
        //print_r($carrinho,$prod);exit;
        if (array_key_exists($prod, $carrinho)) {

            $carrinho[$prod]++;
        } else {

            $carrinho[$prod] = 1;
        }


        Session::set('car', $carrinho);
    }

    function rmCompra()
    {


        $prod = $_POST["produto"];
        Session::init();

        $carrinho = Session::get('car');

        if (array_key_exists($prod, $carrinho)) {
            $carrinho[$prod]--;
            if ($carrinho[$prod] <= 0) {

                unset($carrinho[$prod]);
            }
        }

        Session::set('car', $carrinho);
    }


    function listaCompra()
    {
        Session::init();

        $carrinho = Session::get('car');

        if (count($carrinho) > 0) {

            $sql = "select descricao,valor,img from loja.produto where id=:par_id";

            $Result = array();
            $i = 0;

            foreach ($carrinho as $pro => $qtd) {

                $param = array(":par_id" => $pro);
                $infoPro = $this->db->select($sql, $param);
                $Result[$i]["id"] = $pro;
                $Result[$i]["descricao"] = $infoPro[0]->descricao;
                $Result[$i]["valorun"] = $infoPro[0]->valor;
                $Result[$i]["qtd"] = $qtd;
                $Result[$i]["img"] = $infoPro[0]->img;
                $Result[$i]["valortotal"] = $infoPro[0]->valor * $qtd;
                $i++;
            }

            $resultado = json_encode($Result);

            echo $resultado;
            Session::set('finalcompras', $Result);
        }
    }


    function finalizarcompra()
    {

        Session::init();
        $carrinho = Session::get('finalcompras');

        $cliente = Session::get('login');
        $total = 0;
        //insere o cliente
        //$resCliente=$this->db->insert('loja.cliente', array("nome"=>$cliente));

        foreach($carrinho as $key){

            $total +=  $key['valortotal'] ;

         }
        
        $dados = array(":id" => $cliente);
        $resultusu = $this->db->select("SELECT id
                                     FROM loja.cliente 
                                     WHERE id = :id", $dados);

        $countresusu =  count($resultusu);

        if ($countresusu > 0) {
            // insere a venda
            $resVenda = $this->db->insert('loja.venda', array("cliente" => $cliente, "valor_total" => $total));

            foreach ($carrinho as $car) {
                //print_r($car);
                // insere os itens da venda
                $resItemVenda = $this->db->insert('loja.item_venda', array("venda" => $resVenda, "produto" => $car['id'], "quantidade" => $car['qtd']));
            }

            if (count($resItemVenda) != 0) {

                echo '1';
            } else {
                echo '2';
            }
        } else {
            echo '3';
        }
    }
}
