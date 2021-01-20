<?php
require_once "conexion.php";
$conexion = conexion();

$id_programa=$_POST['id_programa'];
$idperiodo=$_POST['idperiodo'];
$queryM=" CALL Select_cuatrimestre_asignatura ('$id_programa','$idperiodo')";
$resultado = mysqli_query($conexion, $queryM);
?>

<option value='0'>Seleciona Cuatrimestre</option>
<?php
while ($ver = $resultado->fetch_assoc()) {
    ?>
    <option value="<?php echo $ver['id_cuatrimestre'] ?>">
        <?php echo $ver['cuatrimestre'] ?>
    </option>

<?php
} ?>
