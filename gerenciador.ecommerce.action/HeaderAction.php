<?php

class HeaderAction {
    
    public function __construct() {}
    
    function pegarData(){
        $data = date("d/m/Y");
        echo $data;
    }
    
    function usuarioSessao(){
        $usuario = $_SESSION['nome_usuario'];
        echo $usuario;
    }
    
    
    
}

?>
