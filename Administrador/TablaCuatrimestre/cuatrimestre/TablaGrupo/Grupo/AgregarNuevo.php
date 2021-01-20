<?php
session_start();
include_once('../../../../../config.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{//inicio de try
		require_once "conexion.php";
		$conexion=conexion();


		$a=$_POST['ide'];
		$b=$_POST['grupo'];
		$periodo=$_POST['id_periodo'];
		$programa=$_POST['id_programa'];
		$cuatrimestre=$_POST['id_cuatrimestre'];

		if (empty($b)) {

			$_SESSION['message'] = "Debes llenar todos los campos por favor!"; 
		}else{

		  		$sql = "CALL nuevo_grupo('$a','$b')"; // AGREGA un NUEVO GRUPO  
		  		$_SESSION['message'] = ( $db->exec($sql) ) ? 
				  'Grupo guardado correctamente ': 'El grupo ya existe en este cuatrimestre';
				  
				  if ($_SESSION['message'] == true) {

					$sql = "CALL nuevo_grupo_PERI_PRO_CUA_ASIG ('$periodo','$programa','$cuatrimestre','$b')"; // AGREGA un NUEVO GRUPO EN PERI_PRO_CUA_ASIG  
		  		    $_SESSION['message'] = ( $db->exec($sql) ) ? 
		  		    'Grupo guardado correctamente ': 'El grupo ya existe en este cuatrimestre';
				}

		  	}

}//fin del try

catch(PDOException $e){
	$_SESSION['message'] = $e->getMessage();
}

	//cerrar la conexion
$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: ../../cuatrimestre.php');

?>