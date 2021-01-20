<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title" id="myModalLabel">AGREGAR UTENSILIOS</h4>
				</center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form id="frmAgrega" method="POST" action="AgregarNuevo.php">
						<div class="row  form-group" style=" border-bottom: 4px #E73C4E solid;">
							<div class="col-sm-4">
								<label class="control-label">Nueva Categoría:</label>
							</div>
							<div class="col-sm-8">
								<input type="text" style="position:relative; bottom:7px;" class="letras form-control" placeholder="Ingresa nueva categoría " name="categoria">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-3">
								<label class="control-label" style="position:relative; top:8px;">Categoría:</label>
							</div>
							<div class="col-sm-9">
								<?php
								require_once "conexion.php";
								$conexion = conexion();
								$sql = "CALL Select_categoria";
								$result = mysqli_query($conexion, $sql);
								?>
								<select id="id_categoria" class="form-control input-sm" style="position:relative; top:-10px;" name="id_categoria">
									<option value="0" name=" ">Seleciona tu Categoria</option>
									<?php
									while ($ver = $result->fetch_assoc()) {
									?>
										<option value="<?php echo $ver['id_categoria'] ?>">
											<?php echo $ver['categoria'] ?>
										</option>
									<?php
									} ?>

								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-3">
								<label class="control-label" style="position:relative; top:10px;">Nom. Utensilio:</label>
							</div>
							<div class="col-sm-9">
								<input type="Text" class="letras form-control" placeholder="Nombre del utensilio" name="descripcion">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-3">
								<label class="control-label" style="position:relative; top:10px;">Cant. asignada:</label>
							</div>
							<div class="col-sm-9">
								<input type="number" onkeypress="return soloNumeros(event)" class="form-control" placeholder="Ingresa la cantidad asignada" name="cant_asignada">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-3">
								<label class="control-label" style="position:relative; top:10px;">Cant. existe:</label>
							</div>
							<div class="col-sm-9">
								<input type="number" onkeypress="return soloNumeros(event)" class="form-control" placeholder="Ingresa la cantidad existente" name="cant_exit">

								<!--type="number" type="Text"  onkeypress="return soloNumeros(event)-->
							</div>
						</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn text-white " style="background:#be1e2d" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
				<button id="agregar" type="submit" name="agregar" class="btn text-white" style="background:#5daa49"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
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