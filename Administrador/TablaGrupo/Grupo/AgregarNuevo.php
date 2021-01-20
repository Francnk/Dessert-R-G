<?php
session_start();
include_once('../../../config.php');

if (isset($_POST['agregar'])) {
	$database = new Connection();
	$db = $database->open();
	try {

		$a = $_POST['grupo'];

		if (empty($a)) {

			$_SESSION['message'] = "Debes llenar todos los campos por favor!";
		} else {

			$s = "CALL maximo_grupo ";

			foreach ($db->query($s) as $row) {

				$d = $row['id'];
			}
			$e = $d + 1;

			$sql = "CALL Add_grupo('$e','$a')";
			$_SESSION['message'] = ($db->exec($sql)) ?
				'Grupo guardado correctamente ' : 'Algo salió mal. No se puede agregar los datos';
		}
	} catch (PDOException $e) {
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
} else {
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: Grupo.php');
