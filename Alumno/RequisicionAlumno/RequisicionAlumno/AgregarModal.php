<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4 class="modal-title" id="myModalLabel">AGREGAR PROFESOR</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form id="frmAgrega" method="POST" action="AgregarNuevo.php">
            <div class="row form-group">
              <div class="col-sm-2">
                <label class="control-label" style="position:relative; top:-10px;">N° de empleado:</label>
              </div>
              <div class="col-sm-9">
                <input type="number" onkeypress="return soloNumeros(event)" class=" form-control" placeholder=" Ingresa el número del profesor" name="numero_empleado">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-sm-2">
                <label class="control-label" style="position:relative; top:10px;">Nombre:</label>
              </div>
              <div class="col-sm-9">
                <input type="text" class="letras form-control" placeholder="Ingresa el nombre del profesor" name="nombre">
              </div>
            </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white " style="background:#be1e2d" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
        <button type="submit" name="agregar" id="agregar" class="btn text-white" style="background:#5daa49"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar profesor</button>
        </form>
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

  function soloNumeros(e) {

    var key = window.Event ? e.which : e.keyCode

    return (key >= 48 && key <= 57)

  }
</script>