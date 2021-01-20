<?php
session_start();
include_once('../../../config.php');

if (isset($_POST['agregar'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        $idprograma = $_POST['idprograma'];
        $idperiodo = $_POST['idperiodo'];
        $id_programa = $_POST['id_programa'];
        $id_cuatrimestre = $_POST['id_cuatrimestre'];
        $id_grupo = $_POST['id_grupo'];
        $numero_empleado = $_POST['numero_empleado'];
        $id_asignatura = $_POST['id_asignatura']; //combo del asignatura
        $asignatura = $_POST['asignatura']; //asignatura
    


        $s = "CALL maximo_asignatura";
        if ($asignatura != "") {
            foreach ($db->query($s) as $row) {
                $d = $row['id'];
            }
            $H = $d + 1;

            $sql = "CALL Add_asignatura('$H','$asignatura','$idprograma')";
            $_SESSION['message'] = ($db->exec($sql)) ?
                'Asignatura guardada correctamente' : 'Algo salió mal. No se puede agregar los campos';
        } elseif ($idperiodo != "0" && $id_programa != "0" && $id_cuatrimestre != "0" && $numero_empleado != "0" && $id_asignatura != "0") {
            $sql = "CALL Add_varios ('$idperiodo','$id_programa','$id_cuatrimestre','$id_asignatura','$id_grupo','$numero_empleado')";
           
            $_SESSION['message'] = ($db->exec($sql)) ?
                'Datos guardados correctamente' : 'Algo salió mal. No se puede agregar los campos';
            if ($_SESSION['message'] == true) {
               
            }


            if ($_SESSION['message'] == true) {
                $sql = "CALL Add_asi_fa('$id_asignatura','$numero_empleado')";
                $_SESSION['message'] = ($db->exec($sql)) ?
                    'Datos guardados correctamente' : 'Algo salió mal. No se puede agregar los campos';
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

header('location: Asignatura.php');
