<?php
require_once "conexion.php";
$conexion = conexion();

$id_categoria = $_POST['id_categoria'];
$sql = "CALL mostrar_utensilios_asignatura('$id_categoria')";

?>
<thead class="p-3 mb-2 bg " style="background:#5daa49">
    <tr>
        <!--pag-->

        <th class="text-xl-center  text-white ">Utensilio</th>
        <th class="text-xl-center  text-white ">Cantidad Disponible</th>
        <th class="text-xl-center  text-white ">Cantidad Solicitada</th>

    </tr>
    <!--pag-->
</thead>
<tbody>
    <?php
    foreach ($conexion->query($sql) as $row) {
    ?>

        <tr>
        <form method="POST" action="RequisicionAlumno.php">
            <td><?php echo $row['descripcion']; ?></td>
            <td class="text-xl-center"><?php echo $row['cant_asignada']; ?></td>
            <td><input type="number" name="cantidad_pedida[]" id="cantidad_pedida"></td>
     
	
    <input type="hidden" name="id_utensilio[]" value="<?php echo $row['id_utensilio']; ?>">
 
            </form>

        </tr>
</tbody>



<?php
    }
?>