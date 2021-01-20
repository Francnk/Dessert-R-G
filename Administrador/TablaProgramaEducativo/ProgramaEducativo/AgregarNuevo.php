<?php
session_start();
include_once('../../../config.php');

if (isset($_POST['agregar'])) {
	$database = new Connection();
	$db = $database->open();
	try {
		$a = $_POST['id_programa']; //combo programa
		$b = $_POST['id_periodo'];
		$c = $_POST['programa_educativo']; //nuevo programa

		$s = "CALL maximo_proeducativo";
		if ($c != "") {
			foreach ($db->query($s) as $row) {
				$d = $row['id'];
			}
			$e = $d + 1;

			$sql = "CALL Add_programa_educativo('$e','$c')"; //Add_cuatri_periodo
			$_SESSION['message'] = ($db->exec($sql)) ?
				'Programa educativo guardado correctamente' : 'Algo salió mal. No se puede agregar los datos';
		}

		elseif ($a != "0" && $b != "0") {

			$sql = "CALL Add_peri_pro('$b','$a')";
			$_SESSION['message'] = ($db->exec($sql)) ?
				'Relación guardado correctamente' : 'Algo salió mal. No se puede agregar la relación';
		}
	} catch (PDOException $e) {
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
} else {
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: ProgramaEducativo.php');
