<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminBean
 *
 * @author win
 */
class AdminBean {
    
    private $usuario;
    private $senha;
    private $confirma_senha;
    
    public function __construct() {}
    
    
    
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    
    
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    
    
    public function getConfirma_Senha(){
        return $this->confirma_senha;
    }
    public function setConfirma_Senha($confirma_senha){
        $this->confirma_senha = $confirma_senha;
    }
    
}

?>
