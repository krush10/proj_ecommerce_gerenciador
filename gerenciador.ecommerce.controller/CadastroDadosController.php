<?php

    include_once '../gerenciador.ecommerce.bean/DadosBean.php';
    include_once '../gerenciador.ecommerce.dao/DadosDao.php';
    
    
    $listaDados = new DadosBean();
    $dadosDao = new DadosDao();
    
    
        $listaDados->setLoja_Nome($_POST['loja_nome']);
        $listaDados->setLoja_Telefone($_POST['loja_telefone']);
        $listaDados->setLoja_Email($_POST['loja_email']);
    
    
        $dadosDao->gravarDados($listaDados);
    
    
?>