<?php
session_start();
include_once('../../../../../config.php');

if(isset($_POST['editar'])){
	$database = new Connection();
	$db = $database->open();
	try{
	    $a=$_GET['id'];
	    $b=$_POST['vuten'];//viejos utensilio
        $c=$_POST['nuten'];//nuevos utensilio
        
      /*  echo $a;
        echo "<br>";
        echo $b;
        echo "<br>";
        echo $c;*/

	if (empty($b)||empty($c)) {

				$_SESSION['message'] = "Para actualizar debes llenar todos los campos por favor!"; 
			}else{

		  		$sql = "CALL `actualizar_asig_uten` ('$a','$b',$c)"; // AGREGA un NUEVO GRUPO  
		  		$_SESSION['message'] = ( $db->exec($sql) ) ? 
		  		'Grupo actualizado correctamente ': 'Algo salió mal. No se puede actualizar los datos';

		  	}
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

header('location:../../asignatura.php');
