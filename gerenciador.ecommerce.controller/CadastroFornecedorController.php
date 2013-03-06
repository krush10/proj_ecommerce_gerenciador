<?php

    include_once '../gerenciador.ecommerce.bean/FornecedorBean.php';
    include_once '../gerenciador.ecommerce.dao/FornecedorDao.php';
    
    
    $listaFornecedor = new FornecedorBean();
    $fornecedorDao = new FornecedorDao();
    
        
        $listaFornecedor->setNome_Fornecedor($_POST['nome_fornecedor']);
        $listaFornecedor->setEndereco($_POST['endereco']);
        $listaFornecedor->setBairro($_POST['bairro']);
        $listaFornecedor->setCidade($_POST['cidade']);
        $listaFornecedor->setEstado($_POST['estado']);
        $listaFornecedor->setEmail($_POST['email']);
        $listaFornecedor->setTelefone_Um($_POST['telefone_um']);
        $listaFornecedor->setTelefone_Dois($_POST['telefone_dois']);
        
    
    
        $fornecedorDao->gravarFornecedor($listaFornecedor);
    
    
?>