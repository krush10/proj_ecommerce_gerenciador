<?php

    include_once '../gerenciador.ecommerce.bean/TransportadoraBean.php';
    include_once '../gerenciador.ecommerce.dao/TransportadoraDao.php';
    
    
    $listaTransportadora = new TransportadoraBean();
    $transportadoraDao = new TransportadoraDao();
    
        
        $listaTransportadora->setNome_Transportadora($_POST['nome_transportadora']);
        $listaTransportadora->setEndereco($_POST['endereco']);
        $listaTransportadora->setBairro($_POST['bairro']);
        $listaTransportadora->setCidade($_POST['cidade']);
        $listaTransportadora->setEstado($_POST['estado']);
        $listaTransportadora->setTelefone_Um($_POST['telefone_um']);
        $listaTransportadora->setTelefone_Dois($_POST['telefone_dois']);
        $listaTransportadora->setEmail($_POST['email']);
        $listaTransportadora->setCnpj($_POST['cnpj']);
        
    
    
        $transportadoraDao->gravarTransportadora($listaTransportadora);
    
    
?>