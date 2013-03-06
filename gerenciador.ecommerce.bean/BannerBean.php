<?php


class BannerBean {
    
    private $loja_banner;
    
    public function __construct() {
    }
    
    
    public function getLoja_Banner(){
        return $this->loja_banner;
    }
    public function setLoja_Banner($loja_banner){
        $this->loja_banner[] = $loja_banner;
    }
    
}

?>
