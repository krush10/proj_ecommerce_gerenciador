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
<title>Adicionar Novo Fornecedor - Gerenciador Ecommerce</title>
<link rel="stylesheet" href="css/header_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/ec_cadastra_fornecedor_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/footer_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/tooltip.css" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery.js"></script>
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
            <img src="img/faixa_adicionar_fornecedor.png" />
        </div>
        <div id="contexto">
        	<form action="gerenciador.ecommerce.controller/CadastroFornecedorController.php" method="post">
                <table id="conteudo">
                    <tr>
                        <td width="160">Nome Fornecedor</td>
                        <td><input type='text' name='nome_fornecedor' class='caixa'/></td>
                    </tr>
                    <tr>
                        <td width="160">Endere&ccedil;o</td>
                        <td><input type='text' name='endereco' class='caixa'/></td>
                    </tr>
                    <tr>
                        <td width="160">Bairro</td>
                        <td><input type='text' name='bairro' class='caixa'/></td>
                    </tr>
                    <tr>
                        <td width="160">Cidade</td>
                        <td><input type='text' name='cidade' class='caixa'/></td>
                    </tr>
                    <tr>
                        <td width="160">Estado</td>
                        <td><input type='text' name='estado' class='caixa'/></td>
                    </tr>
                    <tr>
                        <td width="160">Email</td>
                        <td><input type="text" name="email" class="caixa"/></td>
                    </tr>
                    <tr>
                        <td width="160">Telefone</td>
                        <td><input type="text" name="telefone_um" class="caixa"/></td>
                    </tr>
                    <tr>
                        <td width="160">Telefone</td>
                        <td><input type="text" name="telefone_dois" class="caixa"/></td>
                    </tr>
                </table>
                <table>
                    <tr>
                    <td><input type="image" src="img/btn_enviar.png" width="123" height="28" class="btn_enviar" /></td>
                    <td><a href="ec-home.php"><img src="img/btn_cancel.png" width="64" height="30" class="btn_cancel" border="0" /></a></td>
                    </tr>
                </table>    
           </form>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>