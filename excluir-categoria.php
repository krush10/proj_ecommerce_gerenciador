<?php

    include("conn/configuracao.php");
    
    if(isset($_GET['i'])){$id = $_GET['i'];}
    
    $deletarCategoria = mysql_query("UPDATE categoria SET exibir='nao' WHERE id = $id");
    
    header("Location:http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec/ec-apaga-atualiza-categoria.php");

?>
