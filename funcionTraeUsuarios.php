<?php
	
	include_once('conex.php');
	$db=mysqli_connect("localhost", "root", "x", "z") or die("No se conecto al servidor");
	$sql = "SELECT * FROM usuarios";
    $registro = mysqli_query($db,$sql);
	
	$tabla = "";
	
	while($row = mysqli_fetch_array($registro)){		

		$editar = '<a href=\"edicionUsuario.php?a='.$row['Login'].'&b='.$row['Password'].'&c='.$row['Nombre'].'&d='.$row['TipoLogin'].'&e='.$row['status'].'\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a>';
		$eliminar = '<a href=\"actionDelete.php?id='.$row['Login'].'\" onclick=\"return confirm(\'¿Seguro que desea eliminiar este usuario?\')\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\" class=\"btn btn-danger\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>';
		
		$tabla.='{
				  "login":"'.$row['Login'].'",
				  "password":"'.$row['Password'].'",
				  "name":"'.$row['Nombre'].'",
				  "type":"'.$row['TipoLogin'].'",
				  "status":"'.$row['status'].'",
				  "acciones":"'.$editar.$eliminar.'"
				},';		
	}	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	

?>