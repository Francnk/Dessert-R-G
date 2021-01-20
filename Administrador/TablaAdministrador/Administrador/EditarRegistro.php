<?php
session_start();

include_once('../../../config.php');
if(isset($_POST['editar'])){
	$database = new Connection();
	$db = $database->open();
	try{


		$i=$_POST['newid'];
		$a=$_POST['numero_empleado'];
	    $b=$_POST['nom_completo'];
	    $c=$_POST['contrasena'];
	    echo ("dato".$i);

/*//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("CALL Update_cuatri_grupo('$a','$b','$c')");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array('a' => $_POST['$a'], 'b' => $_POST['$b'], 'b' => $_POST['$c'] )) ) ? 'datos actualizados correctamente' : 'Algo salió mal. No se puede agregar los datos';	

*/

		$sql = "CALL Update_administrador('$a','$b','$c','$i')";
			//if-else statement in executing our query
		$_SESSION['message'] = ( $db->exec($sql) ) ? 'campos actualizados correctamente' : 'No se pudo actualizar ';

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

header('location: Administrador.php');

?>