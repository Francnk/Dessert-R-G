<?php
require_once "conexion.php";
$conexion = conexion();

$idperiodo = $_POST['idperiodo'];
$id_programa = $_POST['id_programa'];
$idcuatri = $_POST['id_cuatrimestre'];

$queryM = " CALL Select_gruposs ('$idperiodo','$id_programa','$idcuatri')";
$resultado = mysqli_query($conexion, $queryM);

while ($ver = $resultado->fetch_assoc()) {
?>
    <option value="<?php echo $ver['id_grupo'] ?>">
        <?php echo $ver['grupo'] ?>
    </option>

<?php
} ?>