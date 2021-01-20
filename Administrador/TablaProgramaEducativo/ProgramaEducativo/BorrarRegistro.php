<?php
	session_start();
	include_once('../../../config.php');

	if(isset($_GET['id'])){
		$database = new Connection();
		$id=$_GET['id'];
		$periodo=$_GET['id_periodo'];
		$db = $database->open();
		try{
			
			$sql="CALL Delete_programa_periodo('$periodo','$id')";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Programa educativo Borrado correctamente' : 'Hubo un error al borrar el programa educativo';
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

	header('location: ProgramaEducativo.php');

?>