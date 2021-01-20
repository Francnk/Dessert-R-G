<?php
session_start();
include_once('../../../config.php');

if(isset($_GET['id'])){
	$database = new Connection();
	$db = $database->open();
	try{
		
$a=$_GET['id'];

		$sql = "CALL Delete_utensilios('$a')";
			//ejecuta el procedimiento SQL//
		$_SESSION['message'] = ( $db->exec($sql) ) ? 
		'Registro Borrado Corretamente' : 'Hubo un error al borrar';

	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

		//Cerrar conexión
	$database->close();

}
else{
	$_SESSION['message'] = 'Seleccionar miembro para eliminar primero';
}

header('location: utensilios.php');

?>