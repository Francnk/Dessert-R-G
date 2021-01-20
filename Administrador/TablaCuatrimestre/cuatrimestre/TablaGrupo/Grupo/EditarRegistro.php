<?php
session_start();
include_once('../../../../../config.php');

if(isset($_POST['editar'])){
	$database = new Connection();
	$db = $database->open();
	try{

		$a = $_GET['id'];
			$b= $_POST['vgrupo'];   //Update_grupo
			$c= $_POST['ngrupo']; 

			$periodo=$_POST['id_periodo'];
			$programa=$_POST['id_programa'];
			$cuatrimestre=$_POST['id_cuatrimestre'];
			
			if (empty($b)||empty($c)) {

				$_SESSION['message'] = "Para actualizar debes llenar todos los campos por favor!"; 
			}else{

		  		$sql = "CALL `actualizar_cuatri_grupo` ('$a','$b',$c)"; // AGREGA un NUEVO GRUPO  
		  		$_SESSION['message'] = ( $db->exec($sql) ) ? 
		  		'Grupo actualizado correctamente ': 'Algo salió mal. No se puede actualizar los datos';
				  
				  if ($_SESSION['message'] == true) {

					$sql = "CALL actualizar_cuatri_grupo_peri_pro_cuatri ('$periodo','$programa','$cuatrimestre','$b','$c')"; // AGREGA un NUEVO GRUPO EN PERI_PRO_CUA_ASIG  
		  		    $_SESSION['message'] = ( $db->exec($sql) ) ? 
		  		    'Grupo guardado correctamente ': 'El grupo ya existe en este cuatrimestre';
				}
		  	}

	} //fin del try
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

		//Cerrar la conexión
	$database->close();
}
else{
	$_SESSION['message'] = 'Complete el formulario de edición';
}

	header('location: ../../cuatrimestre.php');

?>