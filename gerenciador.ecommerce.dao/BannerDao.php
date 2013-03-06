<?php

include_once '../conn/configuracao.php';
include_once '../gerenciador.ecommerce.bean/BannerBean.php';

class BannerDao {
    
    public function __construct() {}
    
    
     public function gravarBanner(BannerBean $banner){
        
        foreach ($banner->getLoja_Banner() as $banner_img){
            
        $inserirImagens = mysql_query("INSERT INTO loja_banner(loja_banner) VALUES ('".$banner_img."');");
        
        } 
        
        header("Location:http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec/ec-cadastro-banner.php");
    }
    
}

?>
