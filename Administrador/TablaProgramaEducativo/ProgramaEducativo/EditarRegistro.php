<?php
	session_start();
	include_once('../../../config.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{

		$a=$_GET['id'];
	    $b=$_POST['programa_educativo'];
        $c=$_POST['id_periodo'];
        
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (empty($b)) {

			$_SESSION['message'] = "Debes llenar todos los campos por favor!"; 
		  }else{

      if ($c!=="0") { 

			$sql="CALL actualizar_peri_pro('$c','$a')";
				           
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Campos actualizados correctamente ' : 'Algo salió mal. No se puede agregar los datos';	

		}else{

           $sql = "CALL Update_programa_educativo('$a','$b')";
			//if-else statement in executing our query
		   $_SESSION['message'] = ( $db->exec($sql) ) ? 'Campos actualizados correctamente' : 'Algo salió mal. No se puede agregar los datos ';

		}

}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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

	header('location: ProgramaEducativo.php');
