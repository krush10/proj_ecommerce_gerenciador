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
<title>Apagar/Editar Produto - Gerenciador Ecommerce</title>
<link rel="stylesheet" href="css/header_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/ec_apaga_edita_produto_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/footer_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/tooltip.css" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript">
    
            function excluirProduto(c){
		if (confirm("Tem certeza que deseja excluir este produto ?")){    
		  location.href="excluir-produto.php?i="+c;   
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
        <div id="area_busca">
            <table style='margin-left: -10px; padding: 20px;'>
            <tr>    
            <td><img src="img/lupa.png" /></td>
            <td><font style="font-size:15px; color: #FFF; font-family: Arial;"><strong>Busca Avan&ccedil;ada</strong></font></td>
            </tr>
            </table>
            <form action="ec-busca-transportadora.php" method="get">
            <table id="table_busca"  style='margin-left: 7px;'>
                <tr>
                    <td><input type="text" name="nome_produto" class="campo" value=" Produto" /></td>
                </tr>
            </table>
                <input type="image" src="img/btn_buscar.png" width="95" height="29" class="btn_buscar" />
            </form>
        </div>
        <div id="faixa">
            <img src="img/faixa_editar_adicionar_produto.png" />
        </div>
        <div id="contexto">
            <?php 
                        
                $campos_query = "*";
                $final_query = "FROM produto WHERE exibir = 'sim'";
                $maximo = 16;

                $pagina = $_GET["p"];
                if($pagina == "") {
                        $pagina = "1";
                }

                $inicio = $pagina - 1;
                $inicio = $maximo * $inicio;

                $strCount = "SELECT COUNT(*) AS 'num_registros' $final_query";
                $query = mysql_query($strCount);
                $row = mysql_fetch_array($query);
                $total = $row["num_registros"];

                $recuperar_produtos = mysql_query("SELECT $campos_query $final_query LIMIT $inicio,$maximo"); 

                echo "<table id='conteudo' >";

                        echo "<tr>";
                            echo "<td width='380' height='20' align='center'></td>";
                            echo "<td width='90' height='20'></td>";
                            echo "<td width='90' height='20'></td>";
                            echo "<td height='20'>Destaque</td>";
                            echo "<td height='20'>Estoque</td>";
                        echo "</tr>";

                    $count = 2;
                    while($array = mysql_fetch_array($recuperar_produtos)){
                        $id_produto = $array['id'];
                        $nome_produto = $array['nome_produto'];
                        $destaque = $array['destaque'];
                        $estoque = $array['estoque'];

                        if($count % 2 == 0){
                        echo "<tr style='background: #FFF'>";
                            echo "<td width='580' height='20'>$nome_produto <font style='font-size:10px;'>(produto)</font></td>";
                            echo "<td width='90' height='20'><a href='javascript:void(0)' onclick='excluirProduto($id_produto)'><img src='img/btn_excluir.png' border='0' /></a></td>";
                            echo "<td width='90' height='20'><a href='javascript:void(0)'><img src='img/btn_atualizar.png' border='0' /></a></td>";
                            if($destaque == "sim"){
                            echo "<td align='center' height='20'><img src='img/icone-confirma.gif' title='Sim'></td>";
                            }else{
                            echo "<td align='center' height='20'></td>";
                            }
                            echo "<td align='center' height='20'>$estoque</td>";
                        echo "</tr>";
                        }else{
                        echo "<tr style='background: #F0F0F0'>";
                            echo "<td width='380' height='20'>$nome_produto <font style='font-size:10px;'>(produto)</font></td>";
                            echo "<td width='90' height='20'><a href='javascript:void(0)' onclick='excluirProduto($id_produto)'><img src='img/btn_excluir.png' border='0' /></a></td>";
                            echo "<td width='90' height='20'><a href='javascript:void(0)'><img src='img/btn_atualizar.png' border='0' /></a></td>";
                            if($destaque == "sim"){
                            echo "<td align='center' height='20'><img src='img/icone-confirma.gif' title='Sim'></td>";
                            }else{
                            echo "<td align='center' height='20'></td>";
                            }
                            echo "<td align='center' height='20'>$estoque</td>";
                        echo "</tr>";    
                        }
                        $count = $count + 1;
                    }
                echo "</table>";

                echo "<div id='paginador'>";

                    $menos = $pagina - 1;
                    $mais = $pagina + 1;

                    $pgs = ceil($total / $maximo);

                    if($pgs > 1 ) {

                            echo "<br />";

                            if($menos >= 0) {

                                    $i = $_GET['p'] - 1;

                                    echo "<a title='in&iacute;cio' style='text-decoration:none;' href=http://".$_SERVER['SERVER_NAME']."/proj_ecommerce_gerenciador/ec-apaga-atualiza-produto.php?p=><strong>in&iacute;cio</strong> </a>";
                            }

                            if($menos >= 1) {

                                    $i = $_GET['p'] - 1;

                                    echo "<a title='Anterior' style='text-decoration:none;' href=http://".$_SERVER['SERVER_NAME']."/proj_ecommerce_gerenciador/ec-apaga-atualiza-produto.php?p=".($i)."><strong>anterior</strong> </a>";
                            }

                            // Listando as paginas
                            for($i=$pagina; $i<$pagina+3; $i++) {
                                    if($i != $pagina) {
                                            echo " <a href="."http://".$_SERVER['SERVER_NAME']."/proj_ecommerce_gerenciador/ec-apaga-atualiza-produto.php"."?p=".($i).">$i</a> <font color='#CCCCCC'>|</font>";
                                            //echo " <a href="."http://".$_SERVER['SERVER_NAME']."/produto.php"."?n=".$nome_categoria."&p=".($i).">$i</a> |";
                                    } else {
                                            echo " <strong>".$i."</strong> <font color='#CCCCCC'>|</font> ";
                                    }
                                    if($i == $pgs){
                                            break;
                                    }
                            }

                            if($mais <= $pgs) {

                                    if($_GET['p'] == 0){
                                            $_GET['p'] = 1;	
                                    }

                                    $i = $_GET['p'] + 1;

                                    echo " <a title='Pr&oacute;xima' style='text-decoration:none;' href="."http://".$_SERVER['SERVER_NAME']."/proj_ecommerce_gerenciador/ec-apaga-atualiza-produto.php"."?p=".($i)."> <strong>pr&oacute;xima</strong></a>";
                            }
                            if(($mais >= $pgs) || ($mais <= $pgs)) {

                                    echo " <a title='ultima p&aacute;gina' style='text-decoration:none;' href="."http://".$_SERVER['SERVER_NAME']."/proj_ecommerce_gerenciador/ec-apaga-atualiza-produto.php"."?p=".($pgs)."> ultima p&aacute;gina</a>";
                            }
                        }
                echo "</div>"; 

            ?>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>