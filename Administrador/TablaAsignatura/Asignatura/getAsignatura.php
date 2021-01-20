<?php
require_once "conexion.php";
$conexion = conexion();

$id_programa = $_POST['id_programa'];

$queryM = " CALL Select_asignauturas_programa ('$id_programa')";
$resultado = mysqli_query($conexion, $queryM);
?>

<option value='0'>Seleciona una Asignatura</option>
<?php
while ($ver = $resultado->fetch_assoc()) {
?>
     <option value="<?php echo $ver['id_asignatura'] ?>">
        <?php echo $ver['asignatura'] ?>
    </option>

<?php
} ?>