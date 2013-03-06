<?php

include_once '../gerenciador.ecommerce.bean/CategoriaBean.php';
include_once '../conn/configuracao.php';


class CategoriaDao {
    
    public function __construct() {}
    
    
    public function gravarCategoria(CategoriaBean $categoria){
        $query = mysql_query("INSERT INTO categoria(nome_categoria,destaque,exibir) VALUES ('".$categoria->getNome_Categoria()."','".$categoria->getDestaque()."','sim')");
        header("Location:http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec/ec-cadastro-categoria.php");
    }
    
}

?>
