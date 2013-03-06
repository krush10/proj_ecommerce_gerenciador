<?php

    include_once '../gerenciador.ecommerce.bean/CategoriaBean.php';
    include_once '../gerenciador.ecommerce.dao/CategoriaDao.php';
    
    
    
    
    $listaCategoria = new CategoriaBean();
    $categoriaDao = new CategoriaDao();
    
    
    $listaCategoria->setNome_Categoria($_POST['nome_categoria']);
    $listaCategoria->setDestaque($_POST['destaque']);
    
    
    $categoriaDao->gravarCategoria($listaCategoria);
    
    

?>
