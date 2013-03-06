<?php


class LogoBean {
    
    private $loja_logo;
    
    public function __construct() {
    }
    
    
    public function getLoja_Logo(){
        return $this->loja_logo;
    }
    public function setLoja_Logo($loja_logo){
        $this->loja_logo[] = $loja_logo;
    }
    
}

?>
