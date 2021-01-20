<?php
require_once "conexion.php";
$conexion = conexion();

$idperiodo = $_POST['idperiodo'];

$queryM = " CALL Select_programa_asignautura ('$idperiodo')";
$resultado = mysqli_query($conexion, $queryM);
?>

<option value='0'>Seleciona programa educativo</option>
<?php
while ($ver = $resultado->fetch_assoc()) {
?>
    <option value="<?php echo $ver['id_programa'] ?>">
        <?php echo $ver['programa_educativo'] ?>
    </option>

<?php
} ?>