<?php
	session_start();
	include_once('../../../config.php');

	if(isset($_GET['id'])){
		$database = new Connection();
		$id=$_GET['id'];
		$db = $database->open();
		try{
			$sql="CALL Delete_alumno('$id')";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Alumno Borrado' : 'Hubo un error al borrar al alumno';
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

	header('location: Alumno.php');

?>