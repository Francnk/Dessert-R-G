<?php
session_start();
include_once('../../../../../config.php');

if(isset($_POST['borrar'])){
	$database = new Connection();
	$db = $database->open();

	try{

		$a = $_GET['id'];
		$id_periodo = $_GET['id_periodo'];
		$id_programa = $_GET['id_programa'];
		$id_cuatrimestre = $_GET['id_cuatrimestre'];
		$b=$_POST['bgrupo'];

		$periodo=$_POST['id_periodo'];
		$programa=$_POST['id_programa'];
		$cuatrimestre=$_POST['id_cuatrimestre'];

			//$sql="CALL borrar_cuatri_grupo('$a','$b')";
			       //if-else statement in executing our query
			//$_SESSION['message'] = ( $db->exec($sql) ) ? 'Grupo Borrado' : 'Hubo un error al borrar el Grupo';

			$sql="CALL borrar_cuatri_grupo_peri_pro_cuatri_asig($periodo,'$programa','$cuatrimestre','$b')";
			echo $sql;
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

	header('location: ../../cuatrimestre.php');

	?>