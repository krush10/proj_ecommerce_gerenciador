<?php


include_once '../conn/configuracao.php';
include_once '../gerenciador.ecommerce.bean/FornecedorBean.php';

class FornecedorDao {
    
    public function __construct() {
    }
    
    
    public function gravarFornecedor(FornecedorBean $fornecedor){
     
        $inserirNovo = mysql_query("INSERT INTO fornecedor (nome_fornecedor, endereco, bairro, cidade, estado, email, telefone_um, telefone_dois) VALUES ('".$fornecedor->getNome_Fornecedor()."','".$fornecedor->getEndereco()."','".$fornecedor->getBairro()."','".$fornecedor->getCidade()."','".$fornecedor->getEstado()."','".$fornecedor->getEmail()."','".$fornecedor->getTelefone_Um()."','".$fornecedor->getTelefone_Dois()."')");
        header("Location:http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec/ec-cadastra-fornecedor.php");
        
    }
    
}

?>
