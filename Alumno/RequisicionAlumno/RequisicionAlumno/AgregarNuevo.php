<?php
session_start();
include_once('../BaseDatos/conexion.php');
$id_utensilio = $_POST['id_utensilio'];
		$cantidad_pedida = $_POST['cantidad_pedida'];
		echo $id_utensilio;

if (isset($_POST['agregar'])) {
	$database = new Connection();
	$db = $database->open();
	try {
		$fecha_hora_requsicion = date("Y-m-d H:i:s");

		$fecha_practi = $_POST['fecha_practica'];
		$inicio = strtotime($fecha_practi); //Convierte el string a formato de fecha en php 
		$fecha_practica = date('Y-m-d', $inicio); //Lo comvierte a formato de fecha en MySQL

		$hora_practica = $_POST['hora_practica'];
		$brigada = $_POST['brigada'];
		$matricula = $_POST['matricula'];
		$id_status = 1;
		$id_utensilio = $_POST['id_utensilio'];
		$cantidad_pedida = $_POST['cantidad_pedida'];

		$s = "CALL maximo_requisicion";
		foreach ($db->query($s) as $row) {
			$d = $row['id'];
		}
		$H = $d + 1;

		$z = "CALL maximo_requi_utensilios";
		foreach ($db->query($z) as $row) {
			$e = $row['id'];
		}
		$U = $e + 1;


		$sql = "CALL Add_requisicion_alumno('$H','$fecha_hora_requsicion','$fecha_practica','$hora_practica','$brigada','$matricula','$H','$id_status')";
		$_SESSION['message'] = ($db->exec($sql)) ?
			'Requisicion guardada correctamente' : 'Algo salió mal. No se puede agregar los campos';

		if ($_SESSION['message'] == true) {
            for ($i = 0; $i < count($_POST["id_utensilio"]); $i++) {
                $sqlutensi = "CALL Add_requisicion_utensilios('$H','".$id_utensilio[$i]."','".$cantidad_pedida[$i]."','$U')";
            }
                $_SESSION['message'] = ($db->exec($sqlutensi)) ?
                    'utensilios guardada correctamente' : 'Algo salió mal. No se puede agregar los campos';
            
		}
	} catch (PDOException $e) {
		$_SESSION['message'] = $e->getMessage();
	}
	//cerrar la conexion
	$database->close();
} else {
	$_SESSION['message'] = 'Llene el formulario';
}
header('location: RequisicionAlumno.php');
