<?php 
    include 'verifica_logado.php';
    require_once 'gerenciador.ecommerce.action/HeaderAction.php';
    include_once 'conn/configuracao.php';
    
    $header = new HeaderAction(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Controle de Vendas - Gerenciador Ecommerce</title>
<link rel="stylesheet" href="css/header_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/ec_controle_venda_style.css" type="text/css" media="all" />
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
        <div id="area_busca">
            <table style='margin-left: -10px; padding: 20px;'>
            <tr>    
            <td><img src="img/lupa.png" /></td>
            <td><font style="font-size:15px; color: #FFF; font-family: Arial;"><strong>Busca Avan&ccedil;ada</strong></font></td>
            </tr>
            </table>
            <form action="ec-busca-fornecedor.php" method="get">
            <table id="table_busca"  style='margin-left: 7px;'>
            </table>
                <!--input type="image" src="img/btn_buscar.png" width="95" height="29" class="btn_buscar" /-->
            </form>
        </div>
        <div id="txt_vendas">
            <table>
                <tr>
                    <td><img src="img/icone_calendario.png" /></td>
                    <td>Vendas referentes ao dia <strong><?php echo $header->pegarData(); ?></strong></td>
                </tr>
            </table>
        </div>
        <div id="status_vendas">
        	<img src="img/barra_vendas.png" />
            <?php
            
            $data = date("Y-m-d");
            
            $num_tabela = mysql_query("SELECT COUNT(id) as num_venda FROM pagsegurotransacoes WHERE DataTransacao LIKE '%$data%'");
            $array_num = @mysql_fetch_array($num_tabela);
            $num_venda = $array_num['num_venda'];
            
            $query = mysql_query("SELECT TransacaoID, DataTransacao, TipoPagamento, StatusTransacao FROM pagsegurotransacoes WHERE DataTransacao LIKE '%$data%';");
            
            echo "<table id='resultados_vendas'>";
            
            $count = 1;
            while($array =  mysql_fetch_array($query)){
                $transacaoid = $array['TransacaoID'];
                $data_transacao = $array['DataTransacao'];
                $tipopagamento = $array['TipoPagamento'];
                $statustransacao = $array['StatusTransacao'];
                
                $data_transacao_format = strftime("%d/%m/%Y %H:%M:%S", strtotime($data_transacao));
                
                if($num_venda == 0){
                    
                    echo "<img src='img/barra_nenhum_venda.png' />";
                    
                }else{
            
                if($count % 2 != 0){    
                echo "<tr>";
                    echo "<td width='267' align='center'>$transacaoid</td>";
                    echo "<td width='183' align='center'>$data_transacao_format</td>";
                    echo "<td width='192' align='center'>$tipopagamento</td>";
                    echo "<td width='164' align='center'>$statustransacao</td>";
                    echo "<td width='102' align='center'><a href=''><img src='img/btn_dados.png' /></a></td>";
                echo "</tr>";
                
                }else if($count % 2 == 0){
                    echo "<tr style='background:#F0F0F0;'>";
                        echo "<td width='267' align='center'>$transacaoid</td>";
                        echo "<td width='183' align='center'>$data_transacao_format</td>";
                        echo "<td width='192' align='center'>$tipopagamento</td>";
                        echo "<td width='164' align='center'>$statustransacao</td>";
                        echo "<td width='102' align='center'><a href=''><img src='img/btn_dados.png' /></a></td>";
                    echo "</tr>";
                }
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