<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DadosBean
 *
 * @author win
 */
class DadosBean {
   
    private $loja_nome;
    private $loja_email;
    private $loja_telefone;
    
    public function __construct() {
    }
    
    public function setLoja_Nome($loja_nome){
        $this->loja_nome = $loja_nome;
    }
    
    public function getLoja_Nome(){
        return $this->loja_nome;
    }
    
    public function setLoja_Email($loja_email){
        $this->loja_email = $loja_email;
    }
    
    public function getLoja_Email(){
        return $this->loja_email;
    }
    
    public function setLoja_Telefone($loja_telefone){
        $this->loja_telefone = $loja_telefone;
    }
    
    public function getLoja_Telefone(){
        return $this->loja_telefone;
    }
    
}

?>
