<?php
	session_start();
	include_once('../../../config.php');
	if(isset($_GET['id'])){
		$database = new Connection();
		$id=$_GET['id'];
		$periodo=$_GET['id_periodo'];
        $programa=$_GET['id_programa'];
		$cuatrimestre=$_GET['id_cuatrimestre'];
		$facilitador=$_GET['numero_empleado'];
		$grupo=$_GET['id_grupo'];
		$db = $database->open();
		try{
			$sql="CALL delete_asignatura_peri_pro('$periodo','$programa','$cuatrimestre','$grupo','$facilitador')";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Asignatura Borrada' : 'Hubo un error al borrar la asignatura';
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

	header('location: Asignatura.php');