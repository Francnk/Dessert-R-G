<?php
session_start();
include_once('../../../../../config.php');

if(isset($_POST['borrar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		
		$a=$_GET['id'];
		$b=$_POST['ub'];

		echo $a;
		echo "<br>";
		echo $b;

		$sql="CALL borrar_asig_uten('$a','$b')";
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
	$_SESSION['message'] = 'Seleccionar uno para eliminar primero';
}

header('location:../../asignatura.php');
