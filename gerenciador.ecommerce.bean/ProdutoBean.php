<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutoBean
 *
 * @author win
 */
class ProdutoBean {
   
    private $nome_produto;
    private $preco;
    private $altura;
    private $comprimento;
    private $largura;
    private $descricao;
    private $data_cadastro;
    private $id_categoria;
    private $id_sub_categoria;
    private $disponivel;
    private $img_produto;
    private $destaque;
    private $estoque;
    private $url_video;
    
    
    public function __construct() {}
    
    
    public function setNome_Produto($nome_produto){
        $this->nome_produto = $nome_produto;
    }
    
    public function getNome_Produto(){
        return $this->nome_produto;
    }
    
    public function setPreco($preco){
        $this->preco = $preco;
    }
    
    public function getPreco(){
        return $this->preco;
    }
    
    public function setAltura($altura){
        $this->altura = $altura;
    }
    
    public function getAltura(){
        return $this->altura;
    }
    
    public function setComprimento($comprimento){
        $this->comprimento = $comprimento;
    }
    
    public function getComprimento(){
        return $this->comprimento;
    }
    
    public function setLargura($largura){
        $this->largura = $largura;
    }
    
    public function getLargura(){
        return $this->largura;
    }
    
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    
    public function getDescricao(){
        return $this->descricao;
    }
    
    public function setData_Cadastro($data_cadastro){
        $this->data_cadastro = $data_cadastro;
    }
    
    public function getData_Cadastro(){
        return $this->data_cadastro;
    }
    
    public function setId_Categoria($id_categoria){
        $this->id_categoria = $id_categoria;
    }
    
    public function getId_Categoria(){
        return $this->id_categoria;
    }
    
    public function setId_Sub_Categoria($id_sub_categoria){
        $this->id_sub_categoria = $id_sub_categoria;
    }
    
    public function getId_Sub_Categoria(){
        return $this->id_sub_categoria;
    }
    
    public function setDisponivel($disponivel){
        $this->disponivel = $disponivel;
    }
    
    public function getDisponivel(){
        return $this->disponivel;
    }
    
    /* Get e Set*/
    public function getImg_Produto(){
       return $this->img_produto;
    } 
    
    public function setImg_Produto($img_produto){
        $this->img_produto[] = $img_produto;
    }
    
    public function setDestaque($destaque){
        $this->destaque = $destaque;
    }
    
    public function getDestaque(){
        return $this->destaque;
    }
    
    public function setEstoque($estoque){
        $this->estoque = $estoque;
    }
    
    public function getEstoque(){
        return $this->estoque;
    }
    
    public function setUrl_Video($url_video){
        $this->url_video = $url_video;
    }
    
    public function getUrl_Video(){
        return $this->url_video;
    }
    
    
}

?>
