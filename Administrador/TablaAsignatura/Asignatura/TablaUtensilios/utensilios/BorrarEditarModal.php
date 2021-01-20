<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center><h4 class="modal-title" id="myModalLabel">EDITAR UTENSILIOS</h4></center>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
       <div class="container-fluid">
         <form method="POST" action="EditarRegistro.php?id=<?php  echo $id; ?>">


          <!--combo simple para traer el utensilio-->
          <div class="row form-group">
            <div class="col-sm-3.5">
              <label class="control-label" style="position:relative; top:10px;">Actual Utensilio:</label>
            </div>
            <div class="col-sm-8">
              <?php
              require_once "conexion.php";
              $conexion=conexion();

              $sql="CALL Select_utensilios";

              $result=mysqli_query($conexion,$sql);

              ?>
              <select id="vuten" class="form-control input-sm"name="vuten">

                <option value="0"name="">Seleciona el actual Utensilio</option>

                <?php
                while($ver=mysqli_fetch_row($result)): 

                  ?>
                  <option value="<?php echo $ver[0] ?>">
                    <?php echo $ver[1] ?>  
                  </option>

                <?php endwhile; ?>

              </select>

            </div>
            <!--combo simple para traer el utensilio-->
            <br>
            <br>
            <!--combo simple para traer el utensilio-->

            <div class="col-sm-3.5">
              <label class="control-label" style="position:relative; top:10px;">Nuevo Utensilio:</label>
            </div>
            <div class="col-sm-8">
              <?php
              require_once "conexion.php";
              $conexion=conexion();

              $sql="CALL Select_utensilios";

              $result=mysqli_query($conexion,$sql);

              ?>
              <select id="nuten" class="form-control input-sm"name="nuten">

                <option value="0"name="">Seleciona el nuevo Utensilio</option>

                <?php
                while($ver=mysqli_fetch_row($result)): 

                  ?>
                  <option value="<?php echo $ver[0] ?>">
                    <?php echo $ver[1] ?>  
                  </option>

                <?php endwhile; ?>

              </select>

            </div>
            <!--combo simple para traer el utensilio-->
          </div>
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn text-white" style="background:#be1e2d" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
        <button type="submit" name="editar" class="btn btn text-white" style="background:#5daa49 "><span class="glyphicon glyphicon-check"></span>Actualizar</a>
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
        <center><h4 class="modal-title" id="myModalLabel">BORRAR UTENSILIO</h4></center>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="container-fluid">
          <form method="POST" action="BorrarRegistro.php?id=<?php  echo $id; ?>">

            <div class="row form-group">

             <!--combo simple -->

             <div class="col-sm-4">
              <label class="control-label" style="position:relative; top:10px;">Utensilio:</label>
            </div>
            <div class="col-sm-7.5">
              <?php
              require_once "conexion.php";
              $conexion=conexion();
            
                $ID="$id";

              $sql="CALL mostrar_id_utensilio ('$ID')";
                  //if-else statement in executing our quersy
                  // $db->exec($sql);
              $result=mysqli_query($conexion,$sql);
              ?>
              <select id="ub" style="position:relative; top:8px;" class="form-control input-sm"name="ub">

                <option value="0"name="">Seleciona el Utensilio a borrar</option>

                <?php
                while($ver=mysqli_fetch_row($result)): 

                  ?>
                  <option value="<?php echo $ver[0] ?>">
                   <?php echo $ver[1] ?>  
                 </option>

               <?php endwhile; ?>

             </select>
           </div>

           <!--combo simple-->
       </div> 
     </div><!--container-fluid-->  

      <div class="modal-footer">
        <button type="button" class="btn btn text-white" style="background: #5daa49 "data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
       <button type="submit" name="borrar" class="btn btn text-white" style="background:#be1e2d"><span class="glyphicon glyphicon-check"></span>Borrar</a>

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

