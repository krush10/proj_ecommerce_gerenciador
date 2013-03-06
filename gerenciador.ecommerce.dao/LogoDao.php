<?php

include_once '../conn/configuracao.php';
include_once '../gerenciador.ecommerce.bean/LogoBean.php';

class LogoDao {
    
    public function __construct() {}
    
    
     public function gravarLogo(LogoBean $logo){
        
        foreach ($logo->getLoja_Logo() as $logo_img){
            
        $inserirImagens = mysql_query("INSERT INTO loja_logo(loja_logo) VALUES ('".$logo_img."');");
        
        } 
        
        header("Location:http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec/ec-cadastro-banner.php");
    }
    
}

?>
