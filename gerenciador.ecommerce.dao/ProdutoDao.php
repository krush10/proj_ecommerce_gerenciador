<?php

include_once '../conn/configuracao.php';
include_once '../gerenciador.ecommerce.bean/ProdutoBean.php';

class ProdutoDao {
    
    public function __construct() {}
    
    
     public function gravarProduto(ProdutoBean $produto){
        $query = mysql_query("INSERT INTO produto(nome_produto,preco,altura,comprimento,largura,descricao,data_cadastro,exibir,id_categoria,id_sub_categoria,disponivel,destaque,estoque,url_video) VALUES ('".$produto->getNome_Produto()."',".$produto->getPreco().",'".$produto->getAltura()."','".$produto->getComprimento()."','".$produto->getLargura()."','".$produto->getDescricao()."','".$produto->getData_Cadastro()."','sim',".$produto->getId_Categoria().",".$produto->getId_Sub_Categoria().",'".$produto->getDisponivel()."','".$produto->getDestaque()."','".$produto->getEstoque()."','".$produto->getUrl_Video()."')");
        
        $recuperarIdProduto = mysql_query('SELECT id FROM produto ORDER BY id DESC LIMIT 1;');
        $dados = @mysql_fetch_array($recuperarIdProduto);
        $id_produto = $dados['id'];
        
        foreach ($produto->getImg_Produto() as $produto_img){
            
        $inserirImagens = mysql_query("INSERT INTO produto_img(produto_img,id_produto) VALUES ('".$produto_img."',".$id_produto.");");
        
        } 
        
        header("Location:http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec/ec-cadastro-produto.php");
    }
    
}

?>
