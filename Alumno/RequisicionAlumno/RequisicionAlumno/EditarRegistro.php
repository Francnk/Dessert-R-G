<?php
	session_start();
	include_once('../BaseDatos/conexion.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$i = $_POST['newid'];
			$id = $_POST['numero_empleado'];
			$programas = $_POST['nombre'];
		
			if (empty($programas)||empty($id)||empty($i )) {
				$_SESSION['message'] = "No se puede actualizar porque hay campos vacíos "; 
			  }else{
                  $sql="CALL Update_facilitador('$id',
									'$programas','$i')";
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

	header('location: RequisicionAdmin.php');
