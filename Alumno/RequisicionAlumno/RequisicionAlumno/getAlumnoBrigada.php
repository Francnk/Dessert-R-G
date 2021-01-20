<?php
require_once "conexion.php";
$conexion = conexion();

$id_brigada = $_POST['brigada'];
$queryaa = " CALL Select_brigadas_alumnos_brigada_requisicion('$id_brigada')";

$resultado = mysqli_query($conexion, $queryaa);

while ($ver = $resultado->fetch_assoc()) {
?>

<option value="<?php echo $ver['matricula'] ?>">
        <?php echo $ver['username'] ?>
    </option>
    

<?php
} 
?>