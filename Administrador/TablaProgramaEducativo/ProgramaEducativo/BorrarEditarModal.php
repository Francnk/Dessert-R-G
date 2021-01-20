<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id_programa']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">EDITAR PROGRAMA EDUCATIVO</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="EditarRegistro.php?id=<?php echo $row['id_programa']; ?>">
                       <!--caja de texto de programa-->
                       <div class="row form-group">       
                        <div class="col-sm-3">
                            <label class="control-label" style="position:relative; top:7px;">Programa educativo:</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class=" letras form-control" name="programa_educativo" style="position:relative; top:15px;" value="<?php echo $row['programa_educativo']; ?>">
                        </div>
                    </div>
                    <!--caja de texto de programa-->
                    <!--combo de periodo-->
                    <div class="row form-group">
                      <div class="col-sm-3">
                        <label class="control-label" style="position:relative; top:10px;">Periodo:</label>
                    </div>
                    <div class="col-sm-8">
                        <?php
                        require_once "conexion.php";
                        $conexion=conexion();

                        $sql="CALL Select_periodo";
                 
                 
                        $result=mysqli_query($conexion,$sql);

                        ?>
                        <select id="id_periodo" class="form-control input-sm"name="id_periodo">

                        <!--<option value="0"name="">Seleciona uno</option>-->

                <option value="0" name=" "><?php echo $row['periodo']; ?></option>

                          <?php
                          while($ver=mysqli_fetch_row($result)): 

                            ?>
                            <option value="<?php echo $ver[0] ?>">
                             <?php echo $ver[1]." ".$ver[2] ?>  
                         </option>

                     <?php endwhile; ?>

                 </select>
                 <script type="text/javascript">
                  $(document).ready(function(){
                    $('#id_periodo').select();

                });
            </script>
        </div>
    </div>
    <!--combo de periodo-->
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn text-white" style="background:#be1e2d" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
    <button type="submit" name="editar" class="btn btn text-white" style="background:#5daa49"><span class="glyphicon glyphicon-check"></span>Actualizar</a>
    </form>
</div>

</div>
</div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id_programa']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">BORRAR PROGRAMA EDUCATIVO</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta seguro de borrar el programa educativo? </p>
                <h2 class="text-center"><?php echo $row['programa_educativo']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn text-white" style="background:#be1e2d" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
                <a href="BorrarRegistro.php?id=<?php echo $row['id_programa']; ?>&id_periodo=<?php echo $row['id_periodo']; ?>" class="btn btn text-white" style="background:#5daa49"><span class="glyphicon glyphicon-trash"></span>Si</a>
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