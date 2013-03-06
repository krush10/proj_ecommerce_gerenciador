<?php 
    include 'verifica_logado.php';
    require_once 'gerenciador.ecommerce.action/HeaderAction.php';
    include_once 'conn/configuracao.php';
    
    $header = new HeaderAction(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Apagar/Editar Categoria - Gerenciador Ecommerce</title>
<link rel="stylesheet" href="css/header_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/ec_apaga_edita_categoria_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/footer_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/tooltip.css" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript">
            
            function excluirCategoria(c){
		if (confirm("Tem certeza que deseja excluir esta categoria ?")){    
		  location.href="excluir-categoria.php?i="+c;   
		} 
            }
            
        </script>
</head>
<body>
	<?php include("header.php"); ?>
    <div class="corpo">
    	<div id="img_corpo_home">
        	<div id="arrecadacao_mes">
            	<?php
                
                $busca_semestoque = mysql_query("SELECT count(*) as nums FROM produto WHERE estoque = 0");
                $array = @mysql_fetch_array($busca_semestoque);
                $num_estoque = $array['nums'];
                
                $mes_atual = date ("m");
                $ano_atual = date ("Y");
                
                $total = mysql_query("SELECT SUM(ProdValor) as total_arrecadado FROM pagseguroprodutos psp LEFT JOIN pagsegurotransacoes pst ON psp.TransacaoID = pst.TransacaoID WHERE MONTH(data) = '$mes_atual' AND YEAR(data) = '$ano_atual' AND StatusTransacao = 'Aprovado'");
                $array = @mysql_fetch_array($total);
                $total_arrecadado = $array['total_arrecadado'];

                $total_arrecadado_format = number_format($total_arrecadado, 2, ',', '.'); 
                
                $vendas = mysql_query("SELECT COUNT(*) as numero_vendas FROM pagsegurotransacoes WHERE MONTH(data) = '$mes_atual' AND YEAR(data) = '$ano_atual' AND StatusTransacao = 'Aprovado'");
                $array = @mysql_fetch_array($vendas);
                $vendas_concluidas = $array['numero_vendas'];
                
                echo "<table>";
                    echo "<tr>";
                        echo "<td align='center' height='40'><a href='javascript:void(0);' class='tooltip'><img src='img/logo_cifrao.png' /><span>Arrecada&ccedil;&atilde;o no M&ecirc;s</span></a></td>";
                    	echo "<td><strong>R$ $total_arrecadado_format M&ecirc;s</strong> <font style='font-size:11px;'>arrecadado</font></td>";
                        echo "<td align='center'><a href='javascript:void(0);' class='tooltip'><img src='img/caixa_vazia.png' /><span>Produtos sem estoque</span></a></td>";
                    	echo "<td><strong>$num_estoque produto(s)</strong> <font style='font-size:11px;'>sem estoque</font></td>";
                        echo "<td align='center'><a href='javascript:void(0);' class='tooltip'><img src='img/num_vendas.png' /><span>N&uacute;mero de Vendas</span></a></td>";
                    	echo "<td><strong>$vendas_concluidas produto(s)</strong> <font style='font-size:11px;'>vendidos</font></td>";
                    echo "</tr>";
            	echo "</table>";
                ?>
            </div>
        </div>
        <div id="faixa">
            <img src="img/faixa_editar_adicionar_categoria.png" />
        </div>
        <div id="contexto">
            <?php 
                   
                $recuperar_categorias = mysql_query("SELECT * FROM categoria WHERE exibir = 'sim'");

                echo "<table id='conteudo'>";

                        echo "<tr>";
                            echo "<td width='600'></td>";
                            echo "<td width='90'></td>";
                            echo "<td width='90'></td>";
                            echo "<td>Destaque</td>";
                        echo "</tr>";

                    $count = 2;    
                    while($array = mysql_fetch_array($recuperar_categorias)){
                        $id_categoria = $array['id'];
                        $nome_categoria = $array['nome_categoria'];
                        $destaque = $array['destaque'];

                        $recuperar_sub_categoria = mysql_query("SELECT COUNT(*) as num_colums FROM sub_categoria WHERE id_categoria = $id_categoria");
                        $array_ = @mysql_fetch_array($recuperar_sub_categoria);
                        $contador = $array_['num_colums'];

                        if($count % 2 == 0){ 
                        echo "<tr style='background: #FFF'>";
                            echo "<td>$nome_categoria</td>";
                            if(!(empty($contador))){ 
                                echo "<td><a href='javascript:void(0)' title='Categoria possui produtos cadastrados'><img src='img/btn_excluir_.png' border='0' /></a></td>";
                            }else{
                                echo "<td><a href='#' onclick='excluirCategoria($id_categoria)'><img src='img/btn_excluir.png' border='0' /></a></td>";
                            }
                            echo "<td><a href='javascript:void(0)'><img src='img/btn_atualizar.png' border='0' /></a></td>";
                            if($destaque == "sim"){
                            echo "<td align='center' height='20'><img src='img/icone-confirma.gif' title='Sim'></td>";
                            }else{
                            echo "<td align='center' height='20'></td>";
                            }
                        echo "</tr>";
                        }else{
                        echo "<tr style='background: #F0F0F0'>";
                            echo "<td>$nome_categoria</td>";
                            if(!(empty($contador))){ 
                                echo "<td><a href='javascript:void(0)' title='Categoria possui produtos cadastrados'><img src='img/btn_excluir_.png' border='0' /></a></td>";
                            }else{
                                echo "<td><a href='#' onclick='excluirCategoria($id_categoria)'><img src='img/btn_excluir.png' border='0' /></a></td>";
                            }
                            echo "<td><a href='javascript:void(0)'><img src='img/btn_atualizar.png' border='0' /></a></td>";
                            if($destaque == "sim"){
                            echo "<td align='center' height='20'><img src='img/icone-confirma.gif' title='Sim'></td>";
                            }else{
                            echo "<td align='center' height='20'></td>";
                            }
                        echo "</tr>";
                        }
                        $count = $count + 1; 
                    }
                echo "</table>";

            ?>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>