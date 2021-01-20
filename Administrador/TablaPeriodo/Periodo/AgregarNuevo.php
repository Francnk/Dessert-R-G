<?php
session_start();
include_once('../../../config.php');
if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		$a=$_POST['periodo'];
		$b=$_POST['year'];
	
if (empty($a)||empty($b)) {
			$_SESSION['message'] = "Debes llenar todos los campos por favor!"; 
		  }else{

		$sql = "CALL Add_periodo('$a','$b' )"; 
		$_SESSION['message'] = ( $db->exec($sql) ) ? 
		'Periodo guardado correctamente': 'Algo salió mal. No se puede agregar los datos';

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

header('location: Periodo.php');
		?>
