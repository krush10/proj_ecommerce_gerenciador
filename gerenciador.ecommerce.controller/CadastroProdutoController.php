<?php

    include '../gerenciador.ecommerce.bean/ProdutoBean.php';
    include_once '../gerenciador.ecommerce.dao/ProdutoDao.php';
    
    $listaproduto = new ProdutoBean();
    $produtodao = new ProdutoDao();
    
    $listaproduto->setNome_Produto($_POST['nome_produto']);
    
    $preco_format = str_replace(',','.',preg_replace('#[^\d\,]#is','',$_POST['preco']));
    
    $listaproduto->setPreco($preco_format);
    
    $listaproduto->setAltura($_POST['altura']);
    
    $listaproduto->setComprimento($_POST['comprimento']);
    
    $listaproduto->setLargura($_POST['largura']);
    
    $data = date("Y-d-m");
    
    $listaproduto->setData_Cadastro($data);
    
    $listaproduto->setDescricao($_POST['descricao']);
    
    $listaproduto->setId_Categoria($_POST['id_categoria']);
    $listaproduto->setId_Sub_Categoria($_POST['id_sub_categoria']);
    
    $listaproduto->setDisponivel($_POST['disponivel']);
    $listaproduto->setDestaque($_POST['destaque']);
    $listaproduto->setEstoque($_POST['estoque']);
    
    $listaproduto->setUrl_Video($_POST['url_video']);
    
    if(isset($_POST['upload'])){
            $pasta = '../produto_img/';
            foreach($_FILES["img"]["error"] as $key => $error){
            if($error == UPLOAD_ERR_OK){
            $tmp_name = $_FILES["img"]["tmp_name"][$key];
            $cod = date('dmy') . '-' . $_FILES["img"]["name"][$key];
            $nome = $_FILES["img"]["name"][$key];
            $uploadfile = $pasta . basename($cod);
            
                if(move_uploaded_file($tmp_name, $uploadfile)){
                    $listaproduto->setImg_Produto($uploadfile);
                }
                }    
            }
            }
    
    $produtodao->gravarProduto($listaproduto);
    


?>
