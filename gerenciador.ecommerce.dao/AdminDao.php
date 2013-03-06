<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../gerenciador.ecommerce.bean/AdminBean.php';
include '../conn/configuracao.php';

class AdminDao {
   
    public function __construct() {}
    
    
    public function gravarAdmin(AdminBean $admin){
        $inserir = mysql_query("INSERT INTO admin(usuario,senha) VALUES ('".$admin->getUsuario()."','".$admin->getSenha()."')");
        header("Location:http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec/ec-home.php");
    }
    
    public function atualizarAdmin(AdminBean $admin,$id){
        $atualizar = mysql_query("UPDATE admin SET usuario='".$admin->getUsuario()."', senha='".$admin->getSenha()."' WHERE id='".$id."' ");
        header("Location:http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec/ec-home.php");
    }
    
    
}

?>
