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
<title>Adicionar Novo Produto - Gerenciador Ecommerce</title>
<link rel="stylesheet" href="css/header_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/ec_cadastro_produto_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/footer_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/tooltip.css" type="text/css" media="all" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js " type="text/javascript"></script>
    <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.6/jquery.validate.js " type="text/javascript"></script>
    <script src="js/jquery.maskedinput-1.3.js" type="text/javascript"></script>
    <script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript" src="js/jquery.MultiFile.js"></script>
    <script type="text/javascript" src="js/buscar_sub_categoria.js"></script>
    <script type="text/javascript">
        tinyMCE.init({
                // General options
                mode : "textareas",
                theme : "advanced",
                plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

                // Theme options
                theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
                theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left",
                theme_advanced_statusbar_location : "bottom",
                theme_advanced_resizing : true,

                // Skin options
                skin : "o2k7",
                skin_variant : "silver",

                // Example content CSS (should be your site CSS)
                content_css : "css/example.css",

                // Drop lists for link/image/media/template dialogs
                template_external_list_url : "js/template_list.js",
                external_link_list_url : "js/link_list.js",
                external_image_list_url : "js/image_list.js",
                media_external_list_url : "js/media_list.js",

                // Replace values for the template plugin
                template_replace_values : {
                        username : "Some User",
                        staffid : "991234"
                }
        });
        </script>
        <script type="text/javascript">
            
            $(document).ready(function(){
                $('#cad_categoria').validate({
                    rules:{
                        nome_produto: {required: true},
                        preco: {required: true}
                    },
                    messages:{
                        nome_produto: {required: " Campo obrigatorio."},
                        preco: {required: " Campo obrigatorio."}
                    }
                });
            });
            
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#real").maskMoney({symbol:"R$",decimal:",",thousands:"."})
            });
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
        	<img src="img/faixa_cadastro_produto.png" />
        </div>
        <div id="contexto">
            <form id="cad_categoria" name="upload_files" action="gerenciador.ecommerce.controller/CadastroProdutoController.php" method="post" enctype="multipart/form-data" onsubmit="imgLoading()">
                <input type="hidden" value="upload" name="upload" />
                <table id="conteudo">
                    <tr>
                        <td width="160">Nome Produto</td>
                        <td><input type='text' name='nome_produto' id="nome_produto" class='caixa'></td>
                    </tr>
                    <tr>
                        <td width="160">Altura</td>
                        <td><input type='text' name='altura' id="altura" class='caixa' style="width:100px;"> * Altura da encomenda em cent&iacute;metros.</td>
                    </tr>
                    <tr>
                        <td width="160">Largura</td>
                        <td><input type='text' name='largura' id="largura" class='caixa' style="width:100px;"> * Di&acirc;metro da encomenda em cent&iacute;metros.</td>
                    </tr>
                    <tr>
                        <td width="160">Comprimento</td>
                        <td><input type='text' name='comprimento' id="comprimento" class='caixa' style="width:100px;"> * Comprimento da encomenda em cent&iacute;metros.</td>
                    </tr>
                    <tr>
                        <td width="160">Pre&ccedil;o</td>
                        <td><input type='text' id='real' name='preco' id="preco" class='caixa' style="width:100px;"></td>
                    </tr>
                    <tr>
                        <td width="160">Web-Video</td>
                        <td><input type='text' name='url_video' class='caixa' style="width:400px;"/> * Digite a url do Youtube.</td>
                    </tr>
                    <tr>
                        <?php
                        
                        $query = mysql_query("SELECT * FROM categoria");
                        
                        echo "<td width='160'>Categoria</td>";
                        echo "<td>
                            <select class='selecionar' id='id_categoria' name='id_categoria' onchange='carregaSubCategoria(this.value)'>";
                            echo "<option value=''></option>";
                            while($array = mysql_fetch_array($query)){
                                $id_categoria = $array['id'];
                                $nome_categoria = $array['nome_categoria'];
                                
                                echo "<option value='$id_categoria'>$nome_categoria</option>";
                            }
                        
                        echo "</td>";
                        ?>
                    </tr>
                    <tr> 
                        <?php
                        echo "<div id='lista_sub_categoria' style='position:absolute; top:472px; margin-left:256px;'></div>";
                        ?>
                    </tr>
                    <tr>
                        <td width="160">Dispon&iacute;vel:</td>
                        <td>
                            <INPUT TYPE="radio" NAME="disponivel" VALUE="sim"> Produto dispon&iacute;vel
                            <INPUT TYPE="radio" NAME="disponivel" VALUE="nao"> Produto indispon&iacute;vel
                        </td>
                    </tr>
                    <tr>
                    <td width="160">Quantidade em Estoque:</td>
                    <td><input type="text" name="estoque" value="0" class="caixa" style="width:102px;"/></td>
                    </tr>
                    <tr>
                        <td width="160">Destaque:</td>
                        <td>
                            <INPUT TYPE="radio" NAME="destaque" VALUE="sim"> Sim
                            <INPUT TYPE="radio" NAME="destaque" VALUE="nao"> N&atilde;o
                        </td>
                    </tr>
                    <tr>
                        <td>&zwj;</td>
                    </tr>
                    <tr>
                        <td width="160">Descri&ccedil;&atilde;o:</td>
                        <td>
                            <textarea name="descricao" style="height:300px; "></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width="160">Inserir imagens</td>
                        <td>
                        <input type="file" name="img[]" id="file" class="multi" accept="jpeg|jpg|png|gif|bmp" />
                        </td>
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