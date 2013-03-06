<?php

include_once '../conn/configuracao.php';
include_once '../gerenciador.ecommerce.bean/TransportadoraBean.php';

class TransportadoraDao {
   
    public function __construct() {
    }
    
    public function gravarTransportadora(TransportadoraBean $transportadora){
        
        $inserirNova = mysql_query("INSERT INTO transportadora (nome_transportadora, endereco, bairro, cidade, estado, telefone_um, telefone_dois, email, cnpj) VALUES ('".$transportadora->getNome_Transportadora()."','".$transportadora->getEndereco()."','".$transportadora->getBairro()."','".$transportadora->getCidade()."','".$transportadora->getEstado()."','".$transportadora->getTelefone_Um()."','".$transportadora->getTelefone_Dois()."','".$transportadora->getEmail()."','".$transportadora->getCnpj()."')");
        header("Location:http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec/ec-cadastra-transportadora.php");
    }
    
}

?>
