<?php
session_start();
include_once('../../../config.php');

if (isset($_POST['editar'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        $id = $_GET['id'];

        $id_periodo = $_GET["id_periodo"];
        $programa = $_GET["id_programa"];
        $id_cuatrimestre = $_GET["id_cuatrimestre"];
        $id_facilitador = $_POST['numero_empleado'];
        $grupo  = $_GET['id_grupo'];
        $asignatura = $_POST['asignatura'];

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if ($id_facilitador !== "0" && $asignatura !== "") {

            $sql = "CALL actualizar_asignatura('$id','$asignatura')";
            $_SESSION['message'] = ($db->exec($sql)) ? 'Campos actualizados correctamente ' : 'Algo salió mal. No se puede agregar los datos ';


            $sql = "CALL actualizar_asi_fa('$id','$id_facilitador')";
            $_SESSION['message'] = ($db->exec($sql)) ? 'Campos actualizados correctamente ' : 'Algo salió mal. No se puede agregar los datos ';


            $sql = "CALL Update_facilitador_peri_pro('$id_periodo','$programa','$id_cuatrimestre','$grupo','$id','$id_facilitador')";
            $_SESSION['message'] = ($db->exec($sql)) ? 'Campos actualizados correctamente ' : 'Algo salió mal. No se puede agregar los datos ';
        } else if ($id_facilitador == "0" && $asignatura !== "") {

            $sql = "CALL actualizar_asignatura('$id','$asignatura')";
            $_SESSION['message'] = ($db->exec($sql)) ? 'Campos actualizados correctamente ' : 'Algo salió mal. No se puede agregar los datos ';
       
        }
        
        else {
            $sql = "CALL Update_facilitador_peri_pro('$id_periodo','$programa','$id_cuatrimestre','$grupo','$id','$id_facilitador')";
            $_SESSION['message'] = ($db->exec($sql)) ? 'Campos actualizados correctamente ' : 'Algo salió mal. No se puede agregar los datos ';
        }


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }

    //Cerrar la conexión
    $database->close();
} else {
    $_SESSION['message'] = 'Complete el formulario de edición';
}

header('location: Asignatura.php');
