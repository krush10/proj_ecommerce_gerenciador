<?php

    include_once '../gerenciador.ecommerce.bean/AdminBean.php';
    include_once '../gerenciador.ecommerce.dao/AdminDao.php';
    
    $listaAdmin = new AdminBean();
    $adminDao = new AdminDao();
    
    
    if(isset($_POST['id'])){
       $id = $_POST['id'];
    }
    
    $query = mysql_query("SELECT usuario FROM admin WHERE id = $id");
                   
    while($array = mysql_fetch_array($query)){
        $usuario = $array['usuario'];
    }
    
        $listaAdmin->setUsuario($usuario); 
    
    if(isset($_POST['senha'])){
        $listaAdmin->setSenha($_POST['senha']);
    }
    
    if(isset($_POST['confirma_senha'])){
        $listaAdmin->setConfirma_Senha($_POST['confirma_senha']);
    }
    
    
    $adminDao->atualizarAdmin($listaAdmin, $id);
    
    
    
?>
