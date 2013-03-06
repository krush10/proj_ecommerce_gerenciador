<?php

    include("conn/configuracao.php");
    
    if(isset($_GET['i'])){$id = $_GET['i'];}
    
    $deletarSubCategoria = mysql_query("UPDATE produto SET exibir='nao' WHERE id = $id");
    
    header("Location:http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec/ec-apaga-atualiza-produto.php");

?>
