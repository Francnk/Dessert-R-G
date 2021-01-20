<?php
require_once "conexion.php";
$conexion = conexion();

$id_periodo=$_POST['id_periodo'];

$queryM="select DISTINCT peri_pro.id_programa, programa_educativo from programa_educativo inner join peri_pro on programa_educativo.id_programa=peri_pro.id_programa where id_periodo='$id_periodo'";
$resultado = mysqli_query($conexion, $queryM);
?>

<option value='0'>Seleciona Programa Educativo</option>
<?php
while ($ver = $resultado->fetch_assoc()) {
    ?>
    <option value="<?php echo $ver['id_programa'] ?>">
        <?php echo $ver['programa_educativo'] ?>
    </option>

<?php
} ?>
