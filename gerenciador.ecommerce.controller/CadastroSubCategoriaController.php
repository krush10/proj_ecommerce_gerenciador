<?php

    include '../gerenciador.ecommerce.bean/SubCategoriaBean.php';
    include '../gerenciador.ecommerce.dao/SubCategoriaDao.php';
    
    $subcategoriadao = new SubCategoriaDao();
    
    
    $listaSubCategoria = new SubCategoriaBean();
    
    $listaSubCategoria->setNome_Sub_Categoria($_POST['nome_sub_categoria']);
    $listaSubCategoria->setId_Categoria($_POST['id_categoria']);
    
    
    $subcategoriadao->gravarSubCategoria($listaSubCategoria);
    
    
    
?>
