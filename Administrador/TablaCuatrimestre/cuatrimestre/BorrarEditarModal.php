<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id_cuatrimestre']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center><h4 class="modal-title" id="myModalLabel">EDITAR CUATRIMESTRE</h4></center>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>

      <div class="modal-body">
       <div class="container-fluid">
         <form method="POST" action="EditarRegistro.php?id_periodo=<?php echo $row['id_periodo'];?>&id_programa=<?php echo $row['id_programa'];?>&id=<?php echo $row['id_cuatrimestre']; ?>">
           <!--caja de texto para el cuatrimestre-->
            <div class="row form-group">
              <div class="col-sm-4">
                <label class="control-label" style="position:relative; top:10px;">Núm.Cuatrimestre:</label>
              </div>
              <div class="col-sm-8">
                <input type="number" onkeypress="return soloNumeros(event)" class="form-control" value="<?php echo $row['cuatrimestre']; ?>"name="cuatri">
              </div>
            </div>
            <!--caja de texto para el cuatrimestre-->
    			
														
       </div> 
       </div>

     <div class="modal-footer">
      <button type="button" class="btn btn text-white" style="background:#be1e2d" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
      <button id="editar"
      type="submit" name="editar" class="btn btn text-white" style="background:#5daa49"><span class="glyphicon glyphicon-floppy-disk"></span>Actualizar</a>
    </form>
  </div>

</div>
</div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id_cuatrimestre']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center><h4 class="modal-title" id="myModalLabel">BORRAR CUATRIMESTRE</h4></center>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>

      <div class="modal-body">	
       <p class="text-center">¿Esta seguro de borrar el cuatrimestre? </p>
       <h2 class="text-center"><?php echo $row['cuatrimestre']; ?></h2>
     </div>

     <div class="modal-footer">
      <button type="button" class="btn btn text-white" style="background:#be1e2d"data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
      <a href="BorrarRegistro.php?id=<?php echo $row['id_cuatrimestre']; ?>&id_periodo=<?php echo $row['id_periodo'];?>&id_programa=<?php echo $row['id_programa'];?>" class="btn btn text-white"style="background:#5daa49" ><span class="glyphicon glyphicon-trash"></span>Si</a>
    </div>

  </div>
</div>
</div>


<script type="text/javascript">
  // Solo permite ingresar numeros.

  function soloNumeros(e) {

    var key = window.Event ? e.which : e.keyCode

    return (key >= 48 && key <= 57)

  }
</script>



