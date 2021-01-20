<?php
	session_start();
	include_once('../../../config.php');

	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();

		try{
			$a = $_GET['id'];

			$sql="CALL Delete_grupo('$a')";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Grupo Borrado' : 'Hubo un error al borrar el Grupo';

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

	header('location: Grupo.php');

?>