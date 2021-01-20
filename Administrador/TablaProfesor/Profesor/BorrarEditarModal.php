<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['numero_empleado']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">EDITAR PROFESOR</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="frmEdita" method="POST" action="EditarRegistro.php?id=<?php echo $row['numero_empleado']; ?>">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-10px;">N° de empleado:</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" class="form-control"onkeypress="return soloNumeros(event)" name="numero_empleado" value="<?php echo $row['numero_empleado']; ?>">
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-10px;">Nuevo N° de empleado:</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" onkeypress="return soloNumeros(event)" style="position:relative; top:10px;" name="newid" value="<?php echo $row['numero_empleado']; ?>">
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Profesor:</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="letras form-control" name="nombre" value="<?php echo $row['nombre']; ?>">
                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn text-white"  style="background:#be1e2d" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
                <button type="submit" name="editar" id="editar" class="btn btn text-white" style="background:#5daa49"><span class="glyphicon glyphicon-check"></span>Actualizar</a>
                    </form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['numero_empleado']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">BORRAR PROFESOR</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta seguro de borrar al Profesor? </p>
                <h2 class="text-center"><?php echo $row['numero_empleado'] . ' ' . $row['nombre']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn text-white" style="background:#5daa49" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
                <a href="BorrarRegistro.php?id=<?php echo $row['numero_empleado']; ?>" class="btn btn text-white" style="background:#be1e2d"><span class="glyphicon glyphicon-trash"></span>Si</a>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">
  $(".letras").keypress(function(key) {
    window.console.log(key.charCode)
    if ((key.charCode < 97 || key.charCode > 122) //letras mayusculas
      &&
      (key.charCode < 65 || key.charCode > 90) //letras minusculas
      &&
      (key.charCode != 45) //retroceso
      &&
      (key.charCode != 241) //ñ
      &&
      (key.charCode != 209) //Ñ
      &&
      (key.charCode != 32) //espacio
      &&
      (key.charCode != 225) //á
      &&
      (key.charCode != 233) //é
      &&
      (key.charCode != 237) //í
      &&
      (key.charCode != 243) //ó
      &&
      (key.charCode != 250) //ú
      &&
      (key.charCode != 193) //Á
      &&
      (key.charCode != 201) //É
      &&
      (key.charCode != 205) //Í
      &&
      (key.charCode != 211) //Ó
      &&
      (key.charCode != 218) //Ú

    )
      return false;
  });
</script>

<script type="text/javascript">

// Solo permite ingresar numeros.

function soloNumeros(e){

	var key = window.Event ? e.which : e.keyCode

	return (key >= 48 && key <= 57)

}
</script>