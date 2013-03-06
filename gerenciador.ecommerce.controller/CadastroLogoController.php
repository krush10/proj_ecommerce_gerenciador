<?php

    include '../gerenciador.ecommerce.bean/LogoBean.php';
    include_once '../gerenciador.ecommerce.dao/LogoDao.php';
    
    $listalogo = new LogoBean();
    $logodao = new LogoDao();

    if(isset($_POST['upload'])){
            $pasta = '../produto_img/';
            foreach($_FILES["img"]["error"] as $key => $error){
            if($error == UPLOAD_ERR_OK){
            $tmp_name = $_FILES["img"]["tmp_name"][$key];
            $cod = date('dmy') . '-' . $_FILES["img"]["name"][$key];
            $nome = $_FILES["img"]["name"][$key];
            $uploadfile = $pasta . basename($cod);
            
                if(move_uploaded_file($tmp_name, $uploadfile)){
                    $listabanner->setLoja_Banner($uploadfile);
                }
                }    
            }
            }
            
     $logodao->gravarLogo($listalogo);    
    

?>
