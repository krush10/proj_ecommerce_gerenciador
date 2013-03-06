<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaBean
 *
 * @author win
 */
class CategoriaBean {
   
    private $nome_categoria;
    private $destaque;
    
    
    public function __construct() {
    }
    
    public function getNome_Categoria(){
        return $this->nome_categoria;
    }
    
    public function setNome_Categoria($nome_categoria){
        $this->nome_categoria = $nome_categoria;
    }
    
    public function getDestaque(){
        return $this->destaque;
    }
    
    public function setDestaque($destaque){
        $this->destaque = $destaque;
    }
    
   
}

?>
