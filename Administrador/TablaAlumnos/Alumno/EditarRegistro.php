<?php
	session_start();
	include_once('../../../config.php');

    if (isset($_POST['editar'])) {
        $database = new Connection();
        $db = $database->open();
        try {
            $matricula = $_POST['matricula'];
            $nombre = $_POST['nombre'];
            $contrasena = $_POST['contrasena'];
            $id_cuatri_grupo = $_POST['id_cuatri_grupo'];
            $id_brigada = $_POST['id_brigada'];
            $asignatura = $_POST['asignatura'];
            $programa = $_POST['programa'];
            $periodo = $_POST['periodo'];
            $i = $_POST['newid'];

            if ($id_brigada!=="0" && $id_cuatri_grupo!=="0") { /*si quiere cambiar de maestro y de cuatri al mismo tiempo*/


                $sql="CALL Update_alumno('$matricula','$nombre','$contrasena','$id_cuatri_grupo','$id_brigada','$asignatura','$programa','$periodo','$i')";
                //if-else statement in executing our query
                $_SESSION['message'] = ($db->exec($sql)) ? 'Campos actualizados correctamente' : 'No se pudo actualizar la Asignatura';
		  
			} elseif ($id_brigada!=="0") { /*si mi numero_empleado es diferente a un cero significa que seleccionaron a otro profesor pero me debe dejar el mismo cuatri*/

                $s="CALL Obtener1_alumno ('$matricula')";
                foreach ($db->query($s) as $row) {
                    $b=$row['id_cuatri_grupo'];
                }
				$sql="CALL Update_alumno('$matricula','$nombre','$contrasena','$b','$id_brigada','$asignatura','$programa','$periodo','$i')";

               // $sql="CALL Update_asignatura('$matricula','$asignatura','$numero_empleado','$b','$i')";
                               
                $_SESSION['message'] = ($db->exec($sql)) ? 'Campos actualizados correctamente empleado' : 'No se pudo actualizar empleado';
            } elseif ($id_cuatri_grupo!=="0") { /* entonces si seleccione otro cuatri_grupo debe dejar al mismo profesor*/
    
                $s="CALL Obtener1_alumno ('$matricula')";
                foreach ($db->query($s) as $row) {
                    $b=$row['matricula'];
                }
				$sql="CALL Update_alumno('$matricula','$nombre','$contrasena','$id_cuatri_grupo','$$b','$asignatura','$programa','$periodo','$i')";

              //  $sql="CALL Update_asignatura('$id','$asignatura','$b','$id_cuatri_grupo','$i')";
                                
                $_SESSION['message'] = ($db->exec($sql)) ? 'Campos actualizados correctamente id_cuatri_grupo' : 'No se pudo actualizar la id_cuatri_grupo';
            } else {
                $s="CALL Obtener1_alumno ('$matricula')";
                foreach ($db->query($s) as $row) {
                    $a=$row['id_brigada'];
    
                    $b=$row['id_cuatri_grupo'];
                }
				$sql="CALL Update_alumno('$matricula','$nombre','$contrasena','$$b','$$a','$asignatura','$programa','$periodo','$i')";

         // $sql="CALL Update_asignatura('$id','$asignatura','$a','$b','$i')";
                //if-else statement in executing our query
                $_SESSION['message'] = ($db->exec($sql)) ? 'Campos actualizados' : 'No se pudo';
            }
        } catch (PDOException $e) {
            $_SESSION['message'] = $e->getMessage();
        }

        //Cerrar la conexión
        $database->close();
    }
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: Alumno.php');

?>