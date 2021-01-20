<div class="modal fade" id="edit_<?php echo $row['id_asignatura']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title" id="myModalLabel">EDITAR ASIGNATURA</h4>
				</center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="EditarRegistro.php?id=<?php echo $row['id_asignatura']; ?>&id_periodo=<?php echo $row['id_periodo'];?>&id_programa=<?php echo $row['id_programa'];?>&id_cuatrimestre=<?php echo $row['id_cuatrimestre'];?>&id_grupo=<?php echo $row['id_grupo']; ?>">
						<div class="row form-group">
							<div class="col-sm-3">
								<label class="control-label" style="position:relative; top:15px;">Maestro:</label>
							</div>

							<div class="col-sm-8">
								<?php
								require_once "conexion.php";
								$conexion = conexion();

								$sql = "CALL Select_facilitador";
								//if-else statement in executing our quersy
								// $db->exec($sql);
								$result = mysqli_query($conexion, $sql);

								?>
								<select id="numero_empleado" style="position:relative; top:10px;" class="form-control input-sm " name="numero_empleado">

									<option value="0" name=" "><?php echo $row['nombre']; ?></option>

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

										$('#numero_empleado').select();

									});
								</script>
							</div>
							<br>
							<br>

							<div class="col-sm-3">
								<label class="control-label" style="position:relative; top:10px;">Asignatura:</label>
							</div>
							<div class="col-sm-8">
								<input type="text" class="letras form-control" style="position:relative; top:10px;" name="asignatura" value="<?php echo $row['asignatura']; ?>">
							</div>

						</div>


				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn text-white" style="background:#be1e2d " data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
				<button type="submit" name="editar" class="btn btn text-white" style="background:#5daa49 "><span class="glyphicon glyphicon-check"></span>Actualizar</a>
					</form>
			</div>

		</div>
	</div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id_asignatura']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title" id="myModalLabel">BORRAR ASIGNATURA</h4>
				</center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

			</div>
			<div class="modal-body">
				<p class="text-center">¿Esta seguro de borrar la asignatura? </p>
				<h2 class="text-center"><?php echo $row['asignatura'] ?></h2>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn text-white" style="background:#be1e2d" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
				<a href="BorrarRegistro.php?id=<?php echo $row['id_asignatura']; ?> &id_cuatrimestre=<?php echo $row['id_cuatrimestre']; ?>&id_periodo=<?php echo $row['id_periodo'];?>&id_programa=<?php echo $row['id_programa'];?>  &id_grupo=<?php echo $row['id_grupo']; ?> &numero_empleado=<?php echo $row['numero_empleado']; ?>    " class="btn btn text-white" style="background:#5daa49 "><span class="glyphicon glyphicon-trash"></span>Si</a>
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

<script>
	$(document).ready(function() {
		$('.selectpicker').selectpicker();
		$('#sele').change(function() {
			$('#id_utensilios').val($('#sele').val());
		});
		$('#frmAgrega').on('agregar', function(event) {
			event.preventDefault();
			if ($('#sele').val() != '') {
				var form_data = $(this).serialize();
				$.ajax({
					url: "AgregarNuevo.php",
					method: "POST",
					data: form_data,
					success: function(data) {
						$('#id_utensilios').val('');
						$('.selectpicker').selectpicker('val', '');
						alert(data);

					}
				})
			} else {
				alert("selecciona por lo menos uno");
				return false;
			}
		});
	});
</script>