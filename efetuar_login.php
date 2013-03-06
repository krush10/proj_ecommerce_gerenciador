<?php session_start(); 
// Conexão com o banco de dados

require "conn/configuracao.php";

// Recupera o login

$usuario = isset($_POST["usuario"]) ? addslashes(trim($_POST["usuario"])) : FALSE;

//$email = isset($_GET["email"]) ? addslashes(trim($_GET["email"])) : FALSE;

// Recupera a senha, a criptografando em MD5

$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;

//$senha = isset($_GET["senha"]) ? md5(trim($_GET["senha"])) : FALSE;



// Usuário não forneceu a senha ou o login

if(!$usuario || !$senha)

{

	//header("Location:login_cadastro.php");
    echo "<script>location.href='index.php'</script>";
    exit;

}



/**

* Executa a consulta no banco de dados.

* Caso o número de linhas retornadas seja 1 o login é válido,

* caso 0, inválido.

*/

$SQL = "SELECT id,usuario,senha FROM admin WHERE usuario='".$usuario."';";

if(!$SQL){
	die("Erro no banco de dados!");
}else{

$result_id = @mysql_query($SQL);

$total = @mysql_num_rows($result_id);

}

// Caso o usuário tenha digitado um login válido o número de linhas será 1..
if($total)

{

    // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão

    $dados = @mysql_fetch_array($result_id);



    // Agora verifica a senha

    if(!strcmp($_REQUEST['senha'], $dados["senha"]))
    {
			
                echo "<script>location.href='ec-home.php'</script>";

                $_SESSION["id_usuario"]   = $dados["id"];
                $_SESSION["nome_usuario"] = $dados["usuario"];

        	exit;
		
    }
    else
	
    {
        echo "<script>location.href='index.php'</script>";
        exit;
    }

}

// Login inválido

else

{

    echo "<script>location.href='index.php'</script>";

    exit;

}

?>

