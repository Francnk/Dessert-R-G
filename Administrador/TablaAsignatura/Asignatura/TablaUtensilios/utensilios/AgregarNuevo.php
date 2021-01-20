<?php
session_start();
include_once('../../../../../config.php');

if (isset($_POST['agregar'])) {
	$database = new Connection();
	$db = $database->open();
	try {

		$a = $_POST['ide'];
		$b = $_POST['uten'];

		if (empty($b)) {

			$_SESSION['message'] = "Debes llenar todos los campos por favor!";
		} else {

			$sql = "CALL nuevo_utensilio ('$a','$b')"; // AGREGA un NUEVO GRUPO  
			$_SESSION['message'] = ($db->exec($sql)) ?
				'Utensilio guardado correctamente ' : 'El Utensilio ya existe en esta asignatura';
		}
	} catch (PDOException $e) {
		$_SESSION['message'] = $e->getMessage();
	}
	//cerrar la conexion
	$database->close();
} else {
	$_SESSION['message'] = 'Llene el formulario';
}
header('location:../../asignatura.php');
