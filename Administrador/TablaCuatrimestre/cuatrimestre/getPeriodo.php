<?php
require_once "conexion.php";
$conexion = conexion();

$idperiodo=$_POST['idperiodo'];

$queryM="select peri_pro.id_programa, programa_educativo.programa_educativo from programa_educativo
inner join peri_pro on programa_educativo.id_programa=peri_pro.id_programa
where peri_pro.id_periodo='$idperiodo'";
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
