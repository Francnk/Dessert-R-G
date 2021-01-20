<?php
	session_start();
	include_once('../../../config.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			
			$id = $_GET['id'];
			$periodo = $_POST['periodo'];
				$year = $_POST['year'];

			$sql="CALL Update_periodo('$id','$periodo','$year')";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Campos actualizados correctamente' : 'No se pudo actualizar los campos';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: Periodo.php');

?>