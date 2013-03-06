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
<title>Controle Banner - Gerenciador Ecommerce</title>
<link rel="stylesheet" href="css/header_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/ec_mais_acessados_style.css" type="text/css" media="all" />
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
            <img src="img/faixa_controle_mais_acessados.png" />
        </div>
        <div id="contexto">
            <?php
                echo "<table id='conteudo'>";
                $count = 2;
                $recuperarMais = mysql_query("SELECT id_produto,produto_cont FROM produto_mais_acessado ORDER BY produto_cont DESC LIMIT 20");
                while($mais = mysql_fetch_array($recuperarMais)){
                    $id_produto[] = array(
                        "id"=>$mais['id_produto'],
                        "produto_cont"=>$mais['produto_cont']
                    );      
                }
                foreach($id_produto as $id_prod){
                $query = mysql_query("SELECT p.id as id, p.nome_produto as nome_produto, p.estoque as estoque, p.preco as preco, pi.produto_img as produto_img FROM produto p LEFT JOIN produto_img pi ON pi.id_produto = p.id WHERE p.exibir = 'sim' AND p.destaque = 'sim' AND p.estoque > 0 AND p.id = ".$id_prod['id']." ");
                while($array = mysql_fetch_array($query)){

                        $id = $array['id'];
                        $nome_produto = $array['nome_produto'];
                        $estoque = $array['estoque'];

                        if($count % 2 == 0){
                        echo "<tr style='background:#FFF;'>";   
                            echo "<td width='600' height='22'>$nome_produto</td>";
                            echo "<td width='150' align='center' height='22'>".$id_prod['produto_cont']." <font style='font-size:10px;'>acessos</font>"."</td>";
                            echo "<td width='150' align='center' height='22'>".$estoque." <font style='font-size:10px;'>estoque</font>"."</td>";
                        echo "</tr>";
                        }else{
                        echo "<tr style='background:#F0F0F0;'>";   
                            echo "<td width='600' height='22'>$nome_produto</td>";
                            echo "<td width='150' align='center' height='22'>".$id_prod['produto_cont']." <font style='font-size:10px;'>acessos</font>"."</td>";
                            echo "<td width='150' align='center' height='22'>".$estoque." <font style='font-size:10px;'>estoque</font>"."</td>";
                        echo "</tr>";    
                        }    
                        $count = $count + 1;
                }
                }
                echo "</table>";
            ?>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>