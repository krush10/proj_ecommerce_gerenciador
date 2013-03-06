<?php

    include("conn/configuracao.php");
    
    if(isset($_GET['i'])){$id = $_GET['i'];}
    
    $deletarFornecedor = mysql_query("DELETE FROM fornecedor WHERE id = $id");
    
    header("Location:http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec/ec-controle-fornecedor.php");


?>
