<?php

include_once '../gerenciador.ecommerce.bean/DadosBean.php';
include '../conn/configuracao.php';

class DadosDao {
    
    public function __construct() {}
    
    
    public function gravarDados(DadosBean $dados){
        $inserirLojaDados = mysql_query("INSERT INTO loja_dados(loja_email, loja_telefone) VALUES ('".$dados->getLoja_Email()."','".$dados->getLoja_Telefone()."')");
        $inserirLojaNome = mysql_query("INSERT INTO loja_nome(loja_nome) VALUES ('".$dados->getLoja_Nome()."')");
        
        header("Location:http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec/ec-home.php");
    }
    
}

?>
