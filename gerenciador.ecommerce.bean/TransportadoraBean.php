<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TransportadoraBean
 *
 * @author win
 */
class TransportadoraBean {
    
    private $nome_transportadora;
    private $endereco;
    private $bairro;
    private $cidade;
    private $estado;
    private $telefone_um;
    private $telefone_dois;
    private $email;
    private $cnpj;
    
    public function __construct() {
    }
    
    public function getNome_Transportadora(){
        return $this->nome_transportadora;
    }
    public function setNome_Transportadora($nome_transportadora){
        $this->nome_transportadora = $nome_transportadora;
    }
    
    public function getEndereco(){
        return $this->endereco;
    }
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    
    public function getBairro(){
        return $this->bairro;
    }
    public function setBairro($bairro){
        $this->bairro = $bairro;
    }
    
    public function getCidade(){
        return $this->cidade;
    }
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
    
    public function getEstado(){
        return $this->Estado;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    
    public function getTelefone_Um(){
        return $this->telefone_um;
    }
    public function setTelefone_Um($telefone_um){
        $this->telefone_um = $telefone_um;
    }
    
    public function getTelefone_Dois(){
        return $this->telefone_dois;
    }
    public function setTelefone_Dois($telefone_dois){
        $this->telefone_dois = $telefone_dois;
    }
    
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getCnpj(){
        return $this->cpnj;
    }
    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }
}

?>
