<?php

    include("conn/configuracao.php");
    
    if(isset($_GET['i'])){$id = $_GET['i'];}
    
    $deletarTransportadora = mysql_query("DELETE FROM transportadora WHERE id = $id");
    
    header("Location:http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec/ec-controle-transportadora.php");


?>
