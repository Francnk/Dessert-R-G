<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title" id="myModalLabel">AGREGAR ASIGNATURA</h4>
				</center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>


			<div class="modal-body">
				<div class="container-fluid">
					<form id="frmAgrega" method="POST" action="AgregarNuevo.php">
						<!--combo simple para traer el programa-->
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:10px;">Programa Educativo:</label>
							</div>
							<div class="col-sm-8">
								<?php
								require_once "conexion.php";
								$conexion = conexion();
								$sql = "CALL Select_programa_educativo";
								$result = mysqli_query($conexion, $sql);
								?>
								<select id="idprograma" class="form-control input-sm" style="position:relative; top:10px;" name="idprograma">

									<option value="0" name="">Selecciona el Programa</option>

									<?php
									while ($ver = mysqli_fetch_row($result)) :

									?>
										<option value="<?php echo $ver[0] ?>">
											<?php echo $ver[1] ?>
										</option>

									<?php endwhile; ?>

								</select>
							</div>
						</div>
						<div class="row  form-group" style=" border-bottom: 4px #E73C4E solid;">
							<div class="col-sm-4">
								<label class="control-label">Nueva asignatura:</label>
							</div>
							<div class="col-sm-8">
								<input type="text" style="position:relative; top:0px;" class="letras form-control" placeholder="Ingresa nueva asignatura " name="asignatura">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-12">
								<h5>Relacionar la asignatura</h5>
							</div>
						</div>
						<!--combo simple para traer el periodo-->
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:10px;">Periodo:</label>
							</div>
							<div class="col-sm-8">
								<?php
								require_once "conexion.php";
								$conexion = conexion();

								$sql = "CALL Select_periodo";

								$result = mysqli_query($conexion, $sql);

								?>
								<select id="idperiodo" class="form-control input-sm" name="idperiodo">

									<option value="0" name="">Selecciona el Periodo</option>

									<?php
									while ($ver = mysqli_fetch_row($result)) :

									?>
										<option value="<?php echo $ver[0] ?>">
											<?php echo $ver[1] ?>
											<?php echo $ver[2] ?>
										</option>

									<?php endwhile; ?>

								</select>
							</div>
						</div>
						<!--combo simple para traer el periodo-->

						<!-- programa educativo-->
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:10px;">Programa.Educativo:</label>
							</div>
							<div class="col-sm-8">
								<select id="id_programa" class="form-control input-sm" name="id_programa">
								</select>
							</div>
						</div>
						<!-- programa educativo-->

						<!-- cuatrimestre-->
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:10px;">Cuatrimestre:</label>
							</div>
							<div class="col-sm-8">
								<select id="id_cuatrimestre" class="form-control input-sm" name="id_cuatrimestre">
								</select>
							</div>
						</div>
						<!-- grupo-->
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:10px;">Grupo:</label>
							</div>
							<div class="col-sm-8">
								<select id="id_grupo" name="id_grupo" class="form-control input-sm">
								</select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:10px;">Maestro:</label>
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
								<select id="numero_empleado" class="form-control input-sm" name="numero_empleado">

									<option value="0" name=" ">Seleciona uno profesor</option>

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
						</div>
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:10px;">Asignatura:</label>
							</div>
							<div class="col-sm-8">
								<select id="id_asignatura" class="form-control input-sm" name="id_asignatura">
								</select>
							</div>
						</div>

				</div>

			</div>


			<div class="modal-footer">
				<button type="button" class="btn text-white " style="background:#be1e2d" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
				<button type="submit" name="agregar" id="agregar" class="btn text-white" style="background:#5daa49"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
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

<!--select dinamico periodo-->
<script type="text/javascript">
	$(document).ready(function() {

		$("#idperiodo").change(function() {

			$("#idperiodo option:selected").each(function() {

				idperiodo = $(this).val();
				$.post("getPeriodo.php", {
					idperiodo: idperiodo
				}, function(data) {
					$("#id_programa").html(data);

				});
			});
		});
	});
</script>
<!--select dinamico Asigantura-->
<script type="text/javascript">
	$(document).ready(function() {

		$("#id_programa").change(function() {

			$("#id_programa option:selected").each(function() {

				id_programa = $(this).val();
				$.post("getAsignatura.php", {
					id_programa: id_programa
				}, function(data) {
					$("#id_asignatura").html(data);

				});
			});
		});
	});
</script>
<!--select dinamico programa-->
<script type="text/javascript">
	$(document).ready(function() {
		$("#id_programa").change(function() {
			$("#id_programa option:selected").each(function() {
				id_programa = $(this).val();
				$.post("getCuatrimestre.php", {
					idperiodo: idperiodo,
					id_programa: id_programa
				}, function(data) {
					$("#id_cuatrimestre").html(data);

				});
			});
		});
	});
</script>
<!--select dinamico programa-->
<script type="text/javascript">
	$(document).ready(function() {

		$("#id_cuatrimestre").change(function() {
			$("#id_cuatrimestre option:selected").each(function() {
				id_cuatrimestre = $(this).val();
				$.post("getGrupo.php", {
					idperiodo: idperiodo,
					id_programa: id_programa,
					id_cuatrimestre: id_cuatrimestre
				}, function(data) {
					$("#id_grupo").html(data);

				});
			});
		});
	});
</script>