<?php
require_once "conexion.php";
$conexion = conexion();

$id_cuatrimestre=$_POST['id_cuatrimestre'];

$queryM="select DISTINCT cuatri_grupo.id_grupo, grupo from grupo inner join cuatri_grupo on grupo.id_grupo = cuatri_grupo.id_grupo wherE id_cuatrimestre='$id_cuatrimestre'";
$resultado = mysqli_query($conexion, $queryM);
?>

<option value='0'>Seleciona Grupo</option>
<?php
while ($ver = $resultado->fetch_assoc()) {
    ?>
    <option value="<?php echo $ver['id_grupo'] ?>">
        <?php echo $ver['grupo'] ?>
    </option>

<?php
} ?>
