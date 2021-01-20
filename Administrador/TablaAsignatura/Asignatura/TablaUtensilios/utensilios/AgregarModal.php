<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<center><h4 class="modal-title" id="myModalLabel">AGREGAR UTENSILIOS</h4></center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

			</div>
			<div class="modal-body">
				
				<div class="container-fluid">
					<form id="frmAgrega" method="POST" action="AgregarNuevo.php">

						<!--id-->

						<input type="hidden" name="ide" 
						value="<?php echo $id;?>">
						<!--id-->
						<!--combo simple para traer el utensilio-->
						<div class="row form-group">
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
								<select id="uten" class="form-control input-sm"name="uten">

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
						</div>
						<!--combo simple para traer el utensilio-->

					</div> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn text-white " style="background:#be1e2d"data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
					<button id="agregar" type="submit" name="agregar" class="btn text-white"style="background:#5daa49"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
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