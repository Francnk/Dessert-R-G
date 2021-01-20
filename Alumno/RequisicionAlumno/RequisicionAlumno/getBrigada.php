<?php
require_once "conexion.php";
$conexion = conexion();

$id_asignatura = $_POST['id_asignatura'];
$queryaa = "Call mostrar_brigrada_asignatura ('$id_asignatura')";
$resultado = mysqli_query($conexion, $queryaa);
?>

<option value='0'>Seleciona una Brigada</option>
<?php
while ($ver = $resultado->fetch_assoc()) {
?>

<option value="<?php echo $ver['id_brigada'] ?>">
        <?php echo $ver['numero_brigada'] ?>
    </option>
    

<?php
} 
?>