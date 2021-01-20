<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4 class="modal-title" id="myModalLabel">AGREGAR PROGRAMA EDUCATIVO</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form id="frmAgrega" method="POST" action="AgregarNuevo.php">
            <div class="row form-group"></div>
            <!--caja de texto para programa educativo-->
            <div class="row  form-group" style=" border-bottom: 4px #E73C4E solid;">
              <div class="col-sm-4">
                <label class="control-label">Nuevo programa educativo:</label>
              </div>
              <div class="col-sm-8">
                <input type="text" style="position:relative; top:0px;" class="letras form-control" placeholder="Ingresa el nuevo Programa Educativo " name="programa_educativo">
              </div>
            </div>
            <!--caja de texto para programa educativo-->
            <div class="row form-group">
              <div class="col-sm-12">
              <h5>Relacionar periodo con programa educativo</h5>
              </div>
            </div>
            <!--combo de periodo-->
            <div class="row form-group">
              <div class="col-sm-3">
                <label class="control-label" style="position:relative; top:10px;">Periodo:</label>
              </div>
              <div class="col-sm-8">
                <?php
                require_once "conexion.php";
                $conexion = conexion();

                $sql = "CALL Select_periodo";
                //if-else statement in executing our quersy
                // $db->exec($sql);
                $result = mysqli_query($conexion, $sql);

                ?>
                <select id="id_periodo" class="form-control input-sm" name="id_periodo">

                  <option value="0" name="">Seleciona el periodo</option>

                  <?php
                  while ($ver = mysqli_fetch_row($result)) :

                  ?>
                    <option value="<?php echo $ver[0] ?>">
                      <?php echo $ver[1] . " " . $ver[2] ?>
                    </option>

                  <?php endwhile; ?>

                </select>
                <script type="text/javascript">
                  $(document).ready(function() {
                    $('#id_periodo').select();

                  });
                </script>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-sm-3">
                <label class="control-label" style="position:relative; top:10px;">Seleccionar Programa Educativo:</label>
              </div>
              <div class="col-sm-8">
                <?php
                require_once "conexion.php";
                $conexion = conexion();

                $sql = "CALL Select_programa_educativo";
                //if-else statement in executing our quersy
                // $db->exec($sql);
                $result = mysqli_query($conexion, $sql);

                ?>
                <select id="id_programa" style="position:relative; top:30px;" class="form-control input-sm" name="id_programa">

                  <option value="0" name="">Seleciona un programa educativo</option>

                  <?php
                  while ($ver = mysqli_fetch_row($result)) :

                  ?>
                    <option value="<?php echo $ver[0] ?>">
                      <?php echo $ver[1] ?>
                    </option>

                  <?php endwhile; ?>

                </select>
                <script type="text/javascript">
                  $(document).ready(function() {
                    $('#id_programa').select();

                  });
                </script>
              </div>
            </div>
            <!--combo de periodo-->


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white " style="background:#be1e2d" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
        <button type="submit" name="agregar" id="agregar" class="btn text-white" style="background:#5daa49"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar programa educativo</button>
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
      &&
      (key.charCode != 110) //.

    )
      return false;
  });
</script>