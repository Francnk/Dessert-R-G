<?php
session_start();
include_once('../../../config.php');

if (isset($_POST['agregar'])) {
	$database = new Connection();
	$db = $database->open();
	try {


		$pro = $_POST["id_programa"];
		$cuatri = $_POST["cuatrimestre"];
		$id_cuatrimestre = $_POST["id_cuatrimestre"];
		$id_periodo = $_POST["idperiodo"];


		$s = "CALL maximo_cuatrimestre";
		if ($cuatri != "") {
			foreach ($db->query($s) as $row) {
				$d = $row['id'];
			}
			$h = $d + 1;

			$sql = "CALL Add_cuatrimestre('$h','$cuatri')"; // AGREGA EL CUATRIMESTRE NUEVO  
			$_SESSION['message'] = ($db->exec($sql)) ?
				'Datos guardado correctamente' : 'Algo salió mal. No se puede agregar los datos';
		} elseif ($idperiodo != "0" && $id_programa != "0" && $id_cuatrimestre != "0") {
			$sql = "CALL Add_pro_cuatri('$pro','$id_cuatrimestre')"; //AGREGA LA PRIMERA RELACIÓN ENTRE PROGRAMA Y CUATRIMESTRE 
			$_SESSION['message'] = ($db->exec($sql)) ?
				'Datos guardado correctamente' : 'Algo salió mal. No se puede agregar los datos';

			if ($_SESSION['message'] == true) {


				$v = $_POST["grupos"];

				$valores = preg_split("/[,]+/", $v);
				$cont = count($valores);


				for ($i = 0; $i < $cont; $i++) {

					$sql = "CALL Add_cuatri_grupo('$id_cuatrimestre'," . $valores[$i] . ")"; //AGREGA LA PRIMERA RELACIÓN ENTRE PROGRAMA Y LA ASIGNATURA 
					$_SESSION['message'] = ($db->exec($sql)) ?
						'Datos guardado correctamente' : 'Algo salió mal. No se puede agregar los datos';
				}
			}
			if ($_SESSION['message'] == true) {

				$v = $_POST["grupos"];

				$valores = preg_split("/[,]+/", $v);
				$cont = count($valores);
				for ($i = 0; $i < $cont; $i++) {


					$sql = "CALL Add_peri_pro_cuatri('$id_periodo','$pro','$id_cuatrimestre'," . $valores[$i] . ")"; //Agrega los datos a la tabla peri_pro_cua_gru_asig
					$_SESSION['message'] = ($db->exec($sql)) ?
						'Datos guardado correctamente' : 'Algo salió mal. No se puede agregar los datos';
				}
			}
		}
	} catch (PDOException $e) {
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
} else {
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: cuatrimestre.php');
