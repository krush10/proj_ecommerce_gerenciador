<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login - Gerenciador Ecommerce</title>
<link rel="stylesheet" href="css/login_style.css" type="text/css" media="all"  />
</head>
<body>
	<div class="header">
    </div>
    <div class="corpo">
    	<div id="logo">
        	<!--img src="img/logo_acesso.jpg" /-->
        </div>
    	<div id="area_login">
            <form action="efetuar_login.php" method="post">
            <table id="form_acesso">
            	<tr>
                    <td><strong>Usu&aacute;rio</strong></td>
                    <td><input type="text" name="usuario" value="usuario" class="caixa" /></td>
                </tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr>
                    <td><strong>Senha</strong></td>
                    <td><input type="password" name="senha" value="senhasenha" class="caixa" /></td>
                </tr>
            </table>
            	<input type="image" src="img/btn_acessar.png" width="92" height="37" class="btn_acessar" />
            </form>
        </div>
    </div>
    <!--div class="footer">
    	<div class="footer_margin">
        	<div id="logo_krush">
            	<img src="img/logo_krush.png" />
            </div>
        </div>
    </div-->
</body>
</html>