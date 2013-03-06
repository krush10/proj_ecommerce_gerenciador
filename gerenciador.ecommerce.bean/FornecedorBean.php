<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FornecedorBean
 *
 * @author win
 */
class FornecedorBean {
    
    private $nome_fornecedor;
    private $endereco;
    private $bairro;
    private $cidade;
    private $estado;
    private $email;
    private $telefone_um;
    private $telefone_dois;
    
    
    public function __construct() {
    }
    
    
    public function setNome_Fornecedor($nome_fornecedor){
        $this->nome_fornecedor = $nome_fornecedor;
    }
    
    public function getNome_Fornecedor(){
        return $this->nome_fornecedor;
    }
    
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    
    public function getEndereco(){
        return $this->endereco;
    }
    
    public function setBairro($bairro){
        $this->bairro = $bairro;
    }
    
    public function getBairro(){
        return $this->bairro;
    }
    
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
    
    public function getCidade(){
        return $this->cidade;
    }
    
    public function setEstado($estado){
        $this->estado = $estado;
    }
    
    public function getEstado(){
        return $this->estado;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setTelefone_Um($telefone_um){
        $this->telefone_um = $telefone_um;
    }
    
    public function getTelefone_Um(){
        return $this->telefone_um;
    }
    
    public function setTelefone_Dois($telefone_dois){
        $this->telefone_dois = $telefone_dois;
    }
    
    public function getTelefone_Dois(){
        return $this->telefone_dois;
    }
}

?>
