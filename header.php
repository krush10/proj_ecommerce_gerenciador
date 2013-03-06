<script>
	function exibirSubLoja(){
		$("#sub_menu_loja").css("display","run-in");
		$("#sub_menu_categoria").css("display","none");
		$("#sub_menu_sub_categoria").css("display","none");
		$("#sub_menu_produto").css("display","none");
		$("#sub_menu_clientes").css("display","none");
		$("#sub_menu_vendas").css("display","none");
	}
	
	function exibirSubCategoria(){
		$("#sub_menu_categoria").css("display","run-in");
		$("#sub_menu_loja").css("display","none");
		$("#sub_menu_sub_categoria").css("display","none");
		$("#sub_menu_produto").css("display","none");
		$("#sub_menu_clientes").css("display","none");
		$("#sub_menu_vendas").css("display","none");
	}
	
	function exibirSubSubCategoria(){
		$("#sub_menu_sub_categoria").css("display","run-in");
		$("#sub_menu_categoria").css("display","none");
		$("#sub_menu_loja").css("display","none");
		$("#sub_menu_produto").css("display","none");
		$("#sub_menu_clientes").css("display","none");
		$("#sub_menu_vendas").css("display","none");
	}
	
	function exibirSubProduto(){
		$("#sub_menu_produto").css("display","run-in");
		$("#sub_menu_categoria").css("display","none");
		$("#sub_menu_loja").css("display","none");
		$("#sub_menu_sub_categoria").css("display","none");
		$("#sub_menu_clientes").css("display","none");
		$("#sub_menu_vendas").css("display","none");
	}
	
	function exibirSubClientes(){
		$("#sub_menu_clientes").css("display","run-in");
		$("#sub_menu_categoria").css("display","none");
		$("#sub_menu_loja").css("display","none");
		$("#sub_menu_sub_categoria").css("display","none");
		$("#sub_menu_produto").css("display","none");
		$("#sub_menu_vendas").css("display","none");
	}
	
	function exibirSubVendas(){
		$("#sub_menu_vendas").css("display","run-in");
		$("#sub_menu_categoria").css("display","none");
		$("#sub_menu_loja").css("display","none");
		$("#sub_menu_sub_categoria").css("display","none");
		$("#sub_menu_produto").css("display","none");
		$("#sub_menu_clientes").css("display","none");
	}
</script>
<div class="header">
	<div class="header_margin">
    	<div id="logo_krush">
        	<a href="ec-home.php"><img src="img/logo_krush_maior.png" border="0" /></a>
        </div>
        <div id="bem-vindo">
        	<font>Bem-Vindo <strong>Lojista</strong>, Hoje dia <?php echo $header->pegarData(); ?></font>
        </div>
        <div id="menu">
        	<table>
            	<tr>
                	<td><a href="javascript:void(0);" onmouseover="exibirSubLoja();"><img src="img/btn_controle_loja.png" border="0" /></a></td>
                    <td><a href="javascript:void(0);" onmouseover="exibirSubCategoria();"><img src="img/btn_controle_categoria.png" border="0" /></a></td>
                    <td><a href="javascript:void(0);" onmouseover="exibirSubSubCategoria();"><img src="img/btn_controle_sub.png" border="0" /></a></td>
                    <td><a href="javascript:void(0);" onmouseover="exibirSubProduto();"><img src="img/btn_controle_produto.png" border="0" /></a></td>
                    <td><a href="javascript:void(0);" onmouseover="exibirSubClientes();"><img src="img/btn_controle_cliente.png" border="0" /></a></td>
                    <td><a href="javascript:void(0);" onmouseover="exibirSubVendas();"><img src="img/btn_controle_venda.png" border="0" /></a></td>
                </tr>
            </table>
        </div>
        <div id="btn_sair">
        	<a href="fechar-sessao.php"><img src="img/btn_logoff.png" border="0" /></a>
        </div>
        <div id="icone_admin">
        	<img src="img/icone_admin.png" />
        </div>
        <div id="sub_menu_loja">
        	<table>
            	<tr>
                    <td><img src="img/icone_direita.png" /></td><td><a href="ec-dados-loja.php">Dados da Loja</a></td>
                    <td><img src="img/icone_direita.png" /></td><td><a href="ec-controle-banner.php">Controle Banner Loja</a></td>
                    <td><img src="img/icone_direita.png" /></td><td><a href="ec-controle-logo.php">Controle Logo Loja</a></td>
                    <td><img src="img/icone_direita.png" /></td><td><a href="ec-mais-acessados.php">Produtos Mais Acessados</a></td>
                    <td><img src="img/icone_direita.png" /></td><td><a href="ec-controle-fornecedor.php">Controle Fornecedores</a></td>
                    <td><img src="img/icone_direita.png" /></td><td><a href="ec-controle-transportadora.php">Controle Transportadora</a></td>
                    <td><img src="img/icone_direita.png" /></td><td><a href="">Nuvem de Produtos (Tags)</a></td>
                </tr>
            </table>
        </div>
        <div id="sub_menu_categoria">
        	<table>
            	<tr>
                    <td><img src="img/icone_direita.png" /></td><td><a href="ec-cadastro-categoria.php">Adicionar Categoria</a></td>
                    <td><img src="img/icone_direita.png" /></td><td><a href="ec-apaga-atualiza-categoria.php">Apagar/Editar Categoria</a></td>
                </tr>
            </table>
        </div>
        <div id="sub_menu_sub_categoria">
        	<table>
            	<tr>
                    <td><img src="img/icone_direita.png" /></td><td><a href="ec-cadastro-subcategoria.php">Adicionar Sub-Categoria</a></td>
                    <td><img src="img/icone_direita.png" /></td><td><a href="ec-apaga-atualiza-subcategoria.php">Apagar/Editar Sub-Categoria</a></td>
                </tr>
            </table>
        </div>
        <div id="sub_menu_produto">
        	<table>
            	<tr>
                    <td><img src="img/icone_direita.png" /></td><td><a href="ec-cadastro-produto.php">Adicionar Produto</a></td>
                    <td><img src="img/icone_direita.png" /></td><td><a href="ec-apaga-atualiza-produto.php">Apagar/Editar Produto</a></td>
                </tr>
            </table>
        </div>
        <div id="sub_menu_clientes">
        	<table>
            	<tr>
                    <td><img src="img/icone_direita.png" /></td><td><a href="ec-controle-cliente.php">Controle Clientes</a></td>
                    <td><img src="img/icone_direita.png" /></td><td><a href="">Gerar Lista de Emails</a></td>
                </tr>
            </table>
        </div>
        <div id="sub_menu_vendas">
        	<table>
            	<tr>
                    <td><img src="img/icone_direita.png" /></td><td><a href="ec-controle-vendas.php">Controle Vendas</a></td>
                    <td><img src="img/icone_direita.png" /></td><td><a href="ec-ciclo-compra.php">Ciclo da Compra</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>