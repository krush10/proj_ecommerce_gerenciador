<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubCategoriaBean
 *
 * @author win
 */
class SubCategoriaBean {
   
    private $nome_sub_categoria;
    private $id_categoria;
    
    
    public function __construct() {
    }
    
    
    public function setNome_Sub_Categoria($nome_sub_categoria){
        $this->nome_sub_categoria = $nome_sub_categoria;
    }
    
    public function getNome_Sub_Categoria(){
        return $this->nome_sub_categoria;
    }
    
    
    public function setId_Categoria($id_categoria){
        $this->id_categoria = $id_categoria;
    }
    
    public function getId_Categoria(){
        return $this->id_categoria;
    }
    
    
    
}

?>
