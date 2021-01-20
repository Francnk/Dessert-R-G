<?php
require_once "conexion.php";
$conexion = conexion();

$id_programa=$_POST['id_programa'];

$queryM="select DISTINCT pro_cuatri.id_cuatrimestre, cuatrimestre from cuatrimestre inner join pro_cuatri on cuatrimestre.id_cuatrimestre=pro_cuatri.id_cuatrimestre where id_programa='$id_programa'";
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
