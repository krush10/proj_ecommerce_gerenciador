<?php 
    include 'verifica_logado.php';
    require_once 'gerenciador.ecommerce.action/HeaderAction.php';
    include_once 'conn/configuracao.php';
    
    $header = new HeaderAction(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Apagar/Editar Sub-Categoria - Gerenciador Ecommerce</title>
<link rel="stylesheet" href="css/header_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/ec_apaga_edita_subcategoria_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/footer_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/tooltip.css" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript">
            
            function excluirSubCategoria(c){
		if (confirm("Tem certeza que deseja excluir esta sub-categoria ?")){    
		  location.href="excluir-subcategoria.php?i="+c;   
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
            <img src="img/faixa_editar_adicionar_subcategoria.png" />
        </div>
        <div id="contexto">
            <?php 
                   
            $recuperar_categorias = mysql_query("select sc.id as id_subcategoria, sc.nome_sub_categoria as nome_sub_categoria, sc.id_categoria as id_categoria, c.nome_categoria as nome_categoria from sub_categoria sc left join categoria c on sc.id_categoria = c.id");

            echo "<table id='conteudo'>";

                    echo "<tr>";
                        echo "<td width='350'></td>";
                        echo "<td width='280'></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                    echo "</tr>";

                $count = 2;
                while($array = mysql_fetch_array($recuperar_categorias)){
                    $id = $array['id_subcategoria'];
                    $nome_sub_categoria = $array['nome_sub_categoria'];
                    $nome_categoria = $array['nome_categoria'];

                    $recuperar_sub_categoria = mysql_query("SELECT COUNT(*) as num_colums FROM produto WHERE id_sub_categoria = $id");
                    $array_ = @mysql_fetch_array($recuperar_sub_categoria);
                    $contador = $array_['num_colums'];

                    if($count % 2 == 0){   
                    echo "<tr style='background: #FFF'>";
                        echo "<td>$nome_sub_categoria <font style='font-size:10px;'>(sub-categoria)</font></td>";
                        echo "<td>$nome_categoria <font style='font-size:10px;'>(categoria)</font></td>";
                        if(!(empty($contador))){ 
                            echo "<td><a href='javascript:void(0)' title='Sub-Categoria possui produtos cadastrados'><img src='img/btn_excluir_.png' border='0' /></a></td>";
                        }else{
                            echo "<td><a href='#' onclick='excluirSubCategoria($id)'><img src='img/btn_excluir.png' border='0' /></a></td>";
                        }
                        echo "<td><a href='javascript:void(0)'><img src='img/btn_atualizar.png' border='0' /></a></td>";
                    echo "</tr>";
                    }else{
                    echo "<tr style='background: #F0F0F0'>";
                        echo "<td>$nome_sub_categoria <font style='font-size:10px;'>(sub-categoria)</font></td>";
                        echo "<td>$nome_categoria <font style='font-size:10px;'>(categoria)</font></td>";
                        if(!(empty($contador))){ 
                            echo "<td><a href='javascript:void(0)' title='Sub-Categoria possui produtos cadastrados'><img src='img/btn_excluir_.png' border='0' /></a></td>";
                        }else{
                            echo "<td><a href='#' onclick='excluirSubCategoria($id)'><img src='img/btn_excluir.png' border='0' /></a></td>";
                        }
                        echo "<td><a href='javascript:void(0)'><img src='img/btn_atualizar.png' border='0' /></a></td>";
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