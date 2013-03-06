<?php

    include_once '../gerenciador.ecommerce.bean/AdminBean.php';
    include_once '../gerenciador.ecommerce.dao/AdminDao.php';
    
    
    $listaAdmin = new AdminBean();
    $adminDao = new AdminDao();
    
    
    
    if(isset($_POST['usuario'])){
        $listaAdmin->setUsuario($_POST['usuario']);
    }
    
    if(isset($_POST['senha'])){
        $listaAdmin->setSenha($_POST['senha']);
    }
    
    if(isset($_POST['confirma_senha'])){
        $listaAdmin->setConfirma_Senha($_POST['confirma_senha']);
    }
    
    
    $adminDao->gravarAdmin($listaAdmin);
    
    
?>
