<?php 

	include("../conn/configuracao.php");
	
	if(isset($_GET['id_util'])){
		$id_c = $_GET['id_util'];
	}
        
	header("Content-Type: text/html; charset=iso-8859-1",true);
	
	$query = mysql_query("SELECT * FROM sub_categoria WHERE id_categoria = $id_c");
        echo "<table>";
            echo "<tr>";                 
            echo "<td>Sub-Categoria</td>";
            echo "<td>
                <select class='selecione' name='id_sub_categoria'>";
                while($array = mysql_fetch_array($query)){
                    $id = $array['id'];
                    $nome_sub_categoria = $array['nome_sub_categoria'];

                    echo "<option value='$id'>$nome_sub_categoria</option>";
                }

            echo "</td>";
            echo "</tr>"; 
        echo "</table>";
?>
