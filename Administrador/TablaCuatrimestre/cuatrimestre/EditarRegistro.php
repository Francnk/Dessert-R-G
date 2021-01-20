<?php
session_start();
include_once('../../../config.php');

if(isset($_POST['editar'])){
	$database = new Connection();
	$db = $database->open();
	try{

        $a=$_GET['id']; //identificado
		$c=$_POST['cuatri'];//cuatri
		
		$periodo=$_GET['id_periodo'];
		$programa=$_GET['id_programa'];
		$cuatrimestre=$_GET['id_cuatrimestre'];


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

       if ($c!=="0"){

        	$sql="CALL actualizar_cuatri('$periodo','$programa','$c','$a')";	           
        	$_SESSION['message'] = ( $db->exec($sql) ) ? 'Campos actualizados correctamente ' : 'Algo salió mal. No se puede agregar los datos';	

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

header('location: cuatrimestre.php');

?>