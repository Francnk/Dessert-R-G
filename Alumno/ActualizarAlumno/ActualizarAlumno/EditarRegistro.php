<?php
	session_start();
	include_once('../../../config.php'); 

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$matricula = $_SESSION['matricula']; 
			$username = $_POST['username'];
			$useremail = $_POST['useremail'];
			$id_cuatrimestre=$_POST['id_cuatrimestre'];
			$id_grupo=$_POST['id_grupo'];
		
			if (empty($username)||empty($useremail)) {
				$_SESSION['message'] = "No se puede actualizar porque hay campos vacíos "; 
			  }else{
                  $sql="CALL Update_alumno('$matricula','$username','$useremail','$id_cuatrimestre','$id_grupo')";
                  //if-else statement in executing our query
                  $_SESSION['message'] = ($db->exec($sql)) ? 'Campos actualizados correctamente' : 'No se pudo actualizar los campos';
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

	header('location: ActualizarAlumno.php');
