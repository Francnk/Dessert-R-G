<div class="modal fade" id="edit_<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4 class="modal-title" id="myModalLabel">EDITAR GRUPO</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form method="POST" action="EditarRegistro.php?id=<?php echo $id; ?>">

            <input type="hidden" name="id_periodo" value="<?php echo $id_periodo; ?>">
            <input type="hidden" name="id_programa" value="<?php echo $id_programa; ?>">
            <input type="hidden" name="id_cuatrimestre" value="<?php echo $id_cuatrimestre; ?>">


            <div class="row form-group">

              <!--combo simple -->

              <div class="col-sm-4">
                <label class="control-label" style="position:relative; top:10px;">Grupo Actual:</label>
              </div>
              <div class="col-sm-8">
                <?php
                require_once "conexion.php";
                $conexion = conexion();

                $sql = "CALL Select_grupo";
                //if-else statement in executing our quersy
                // $db->exec($sql);
                $result = mysqli_query($conexion, $sql);

                ?>
                <select id="vgrupo" class="form-control input-sm" name="vgrupo">

                  <option value="0" name="">Seleciona el grupo actual</option>

                  <?php
                  while ($ver = mysqli_fetch_row($result)) :

                  ?>
                    <option value="<?php echo $ver[0] ?>">
                      <?php echo $ver[1] ?>
                    </option>

                  <?php endwhile; ?>

                </select>
              </div>

              <!--combo simple-->
              <br>
              <br>
              <!--combo simple -->

              <div class="col-sm-4">
                <label class="control-label" style="position:relative; top:10px;">Grupos Nuevo:</label>
              </div>
              <div class="col-sm-8">
                <?php
                require_once "conexion.php";
                $conexion = conexion();

                $sql = "CALL Select_grupo";
                //if-else statement in executing our quersy
                // $db->exec($sql);
                $result = mysqli_query($conexion, $sql);

                ?>
                <select id="ngrupo" class="form-control input-sm" name="ngrupo">

                  <option value="0" name="">Seleciona el nuevo grupo</option>

                  <?php
                  while ($ver = mysqli_fetch_row($result)) :

                  ?>
                    <option value="<?php echo $ver[0] ?>">
                      <?php echo $ver[1] ?>
                    </option>

                  <?php endwhile; ?>

                </select>
              </div>

              <!--combo simple-->

            </div>
        </div>
      </div>
      <!--container-fluid-->
      <div class="modal-footer">
        <button type="button" class="btn btn text-white" style="background:#be1e2d" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>

        <button type="submit" name="editar" class="btn btn text-white" style="background:#5daa49"><span class="glyphicon glyphicon-check"></span>Actualizar</a>

          </form>
      </div>

    </div>
  </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4 class="modal-title" id="myModalLabel">BORRAR GRUPO</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="container-fluid">
        <form method="POST" action="BorrarRegistro.php?id_periodo=<?php echo $id_periodo; ?>&id_programa=<?php echo $id_programa; ?>&id_cuatrimeste=<?php echo $id_cuatrimestre; ?>">

          <input type="hidden" name="id_periodo" value="<?php echo $id_periodo; ?>">
          <input type="hidden" name="id_programa" value="<?php echo $id_programa; ?>">
          <input type="hidden" name="id_cuatrimestre" value="<?php echo $id_cuatrimestre; ?>">
          <div class="row form-group">

            <!--combo simple -->

            <div class="col-sm-4">
              <label class="control-label" style="position:relative; top:10px;">Grupo Actual:</label>
            </div>
            <div class="col-sm-8">
              <?php
              require_once "conexion.php";
              $conexion = conexion();

              $ID = "$id";

              $sql = "CALL Select_grupo";
              //if-else statement in executing our quersy
              // $db->exec($sql);
              $result = mysqli_query($conexion, $sql);
              ?>
              <select id="bgrupo" class="form-control input-sm" name="bgrupo">

                <option value="0" name="">Seleciona el grupo a borrar</option>

                <?php
                while ($ver = mysqli_fetch_row($result)) :

                ?>
                  <option value="<?php echo $ver[0] ?>">
                    <?php echo $ver[1] ?>
                  </option>

                <?php endwhile; ?>

              </select>
            </div>

            <!--combo simple-->
          </div>
      </div>
      <!--container-fluid-->
      <div class="modal-footer">
        <button type="button" class="btn btn text-white" style="background:#be1e2d" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
        <button type="submit" name="borrar" class="btn btn text-white" style="background:#5daa49"><span class="glyphicon glyphicon-check"></span>Borrar</a>

          </form>
      </div>

    </div>
  </div>
</div>
<!--agregar todo esto-->
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