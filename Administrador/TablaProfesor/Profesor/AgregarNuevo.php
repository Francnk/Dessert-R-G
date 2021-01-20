<?php
session_start();
//include_once('../BaseDatos/conexion.php');
include_once('../../../config.php');
if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$numero_empleado=$_POST['numero_empleado'];
		$nombre=$_POST['nombre'];

		if (empty($numero_empleado)||empty($nombre)) {
			$_SESSION['message'] = "Debes llenar todos los campos por favor!"; 
		  }else{
              $stmt = $db->prepare("CALL Add_facilitador('$numero_empleado','$nombre')");
              //instrucción if-else en la ejecución de nuestra declaración preparada
              $_SESSION['message'] = ($stmt->execute(array(':numero_empleado' => $_POST['numero_empleado'] , ':nombre' => $_POST['nombre'] ))) ? 'Profesor guardado correctamente' : 'Algo salió mal. No se puede agregar el profesor';
          }
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: Profesor.php');
	
?>