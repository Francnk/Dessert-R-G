<?php
session_start();
include_once('../../../config.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{

	$a=$_POST['categoria'];
	$e=$_POST['id_categoria'];
	$b=$_POST['descripcion'];
	$c=$_POST['cant_asignada'];
	$d=$_POST['cant_exit'];
	
	if ($a != "") {
	
		$sql = "CALL Add_categoria('$a')"; //Add_cuatri_periodo
		$_SESSION['message'] = ($db->exec($sql)) ?
			'Categoría guardada correctamente' : 'Algo salió mal. No se puede agregar los datos';
	}

	elseif ($e != "0" && $b != "" && $c!="" && $d!="") {
		$s = "CALL maximo_utensilios";
		foreach ($db->query($s) as $row) {
			$m = $row['id'];
		}
		$id_utensilios = $m + 1;
		  	
		$sql = "CALL Add_utensilios('$id_utensilios','$b','$c','$d')";
			//ejecuta el procedimiento SQL//
		$_SESSION['message'] = ( $db->exec($sql) ) ? 
		'datos guardado correctamente' : 'Algo salió mal. No se puede agregar los datos';
		
		if ($_SESSION['message'] == true) {
			$sql = "CALL Add_cate_uten('$e','$id_utensilios')";
			$_SESSION['message'] = ($db->exec($sql)) ?
				'Datos guardados correctamente' : 'Algo salió mal. No se puede agregar los campos';
		}
	
	}


	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: utensilios.php');
	


	/*	//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("CALL Add_cuatri_grupo('$a','$b','$c')");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array('a' => $_POST['$a'], 'b' => $_POST['$b'], 'b' => $_POST['$c'] )) ) ? 'datos guardado correctamente' : 'Algo salió mal. No se puede agregar los datos';
*/
?>
