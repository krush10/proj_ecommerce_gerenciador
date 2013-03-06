<?php session_start();


// Verifica se existe os dados da sessão de login

if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"]))

{

    // Usuário não logado! Redireciona para a página de login
	
	echo "<script>location.href='index.php'</script>";
	
    //header("Location:login_cadastro.php");

    exit;

}

?>