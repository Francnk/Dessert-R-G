<!-- Ventana Editar Registros CRUD -->
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <center>
                <h4 class="modal-title text-center" id="myModalLabel">ACTUALIZAR DATOS</h4>
             
            </center>
        </div>
        <?php
				/*if (!isset($_SESSION)) {
					session_start();
				} else {
					session_destroy();
					session_start();
				}*/
				if (isset($_SESSION['message'])) {
				?>
					<div class="alert alert-info text-center" style="margin-top:20px;">
						<?php echo $_SESSION['message']; ?>
					</div>
				<?php

					unset($_SESSION['message']);
				}
				?>
        <div class="modal-body">
            <div class="container-fluid">
                
                <form id="frmEdita" method="POST" action="EditarRegistro.php?id=<?php echo ucfirst($_SESSION['matricula']); ?>">
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label class="control-label" style="position:relative; top:10px; bottom:10px;">Alumno:</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="letras form-control" style="position:relative; top:10px;" name="username" value="<?php echo ucfirst($_SESSION['username']); ?>">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label" style="position:relative; top:10px;">Email:</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class=" form-control"style="position:relative; top:10px;" name="useremail" value="<?php echo ucfirst($_SESSION['useremail']); ?>">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label" style="position:relative; top:10px;">Cuatrimestre:</label>
                        </div>
                        <div class="col-sm-8">

                            <?php
                            require_once "conexion.php";
                            $conexion = conexion();

                            $sql = "CALL Select_cuatrimestre";
                            //if-else statement in executing our quersy
                            // $db->exec($sql);
                            $result = mysqli_query($conexion, $sql);

                            ?>
                            <select id="id_cuatrimestre" class="form-control input-sm " style="position:relative; top:10px;" name="id_cuatrimestre">

                                <option value="0" name="id_cuatrimestre" style="position:relative; top:10px;">Actualiza tu cuatrimestre </option>

                                <?php
                                while ($ver = mysqli_fetch_row($result)) :

                                ?>
                                    <option value="<?php echo $ver[0] ?>">
                                        <?php echo $ver[1] ?>

                                    </option>

                                <?php endwhile; ?>

                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label " style="position:relative; top:10px;">Grupo:</label>
                        </div>
                        <div class="col-sm-8">
                            <select id="id_grupo" class="form-control " name="id_grupo" style="position:relative; top:10px;">
                                <option value='0'>Actualiza tu grupo</option>
                            </select>
                        </div>
                    </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn text-white" style="background:#5daa49" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
            <button type="submit" name="editar" id="editar" class="btn btn text-white" style="background:#be1e2d"><span class="glyphicon glyphicon-check"></span>Actualizar</a>
                </form>
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
    $(document).ready(function() {

        $("#id_cuatrimestre").change(function() {

            //$('#id_programa').find('option').remove().end().append(
            //	'<option value="whatever"></option>').val('whatever');

            $("#id_cuatrimestre option:selected").each(function() {

                id_cuatrimestre = $(this).val();
                $.post("getGrupo.php", {
                    id_cuatrimestre: id_cuatrimestre
                }, function(data) {
                    $("#id_grupo").html(data);

                });
            });
        });
    });
</script>