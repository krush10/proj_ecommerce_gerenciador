<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


include_once '../gerenciador.ecommerce.bean/SubCategoriaBean.php';
include_once '../conn/configuracao.php';

class SubCategoriaDao {
    
    
    public function __construct() {}
    
    
    public function gravarSubCategoria(SubCategoriaBean $subcategoria){
        $query = mysql_query("INSERT INTO sub_categoria(nome_sub_categoria,id_categoria,exibir) VALUES ('".$subcategoria->getNome_Sub_Categoria()."','".$subcategoria->getId_Categoria()."','sim')");
        header("Location:http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec/ec-cadastro-subcategoria.php");
    }
    
    
}

?>
