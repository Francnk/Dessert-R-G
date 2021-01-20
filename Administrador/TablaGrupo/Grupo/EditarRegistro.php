<?php
	session_start();
	include_once('../../../config.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$a = $_GET['id'];
			$b= $_POST['grupo'];   //Update_grupo
         
if (empty($b)) {

			$_SESSION['message'] = "Debes llenar todos los campos por favor!"; 
		  }else{
		
			$sql="CALL Update_grupo('$a','$b')";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Campos actualizados correctamente' : 'No se pudo actualizar los campos';

		}
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

	header('location: Grupo.php');
