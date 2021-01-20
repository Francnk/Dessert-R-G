<?php include_once('../../config.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Requisicion</title>
	<!--librerias-->
	<link rel="stylesheet" type="text/css" href="../../Librerias/bootstrap/css/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../../Librerias/fontawesome/css/all.css">
	<link rel="Stylesheet" type="text/css" href="../../Librerias/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" href="../../Librerias/estilo.css">
	<link rel="stylesheet" type="text/css" href="../../Librerias/css/estilos.css">
	<link rel="Stylesheet" type="text/css" href="../../Librerias/datatable/bootstrap.css">
	<link rel="Stylesheet" type="text/css" href="../../Librerias/datatable/dataTables.bootstrap4.min.css">
	<script src="../../Librerias/js/jquery.min.js"></script>
	<script src="../../Librerias/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../Librerias/alertifyjs/alertify.js"></script>
	<script src="../../Librerias/datatable/jquery.dataTables.min.js"></script>
	<script src="../../Librerias/datatable/dataTables.bootstrap4.min.js"></script>

<body>
	<header>
		<div class="row1 fixed-top" style="background:#454545 ">
			<div class="col-sm-2">
				<a><img class="img1" src="../../Images/logos/utvm.png" height="49px " alt="Responsive image"></a>
			</div>
		</div>
		<div class="col-sm-10 text-center">
			<h2 class="texto  text-white text-center"> UTVM Unidad Académica de Tezontepec</h2>
		</div>
		<div class="navbar navbar-expand-lg  " style="background:#092432">
			<img src="../../Images/logos/logito.png" height="50px">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars "></i></span> <!-- asiagrega-->
			</button>
			<nav class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="nav navbar-nav ml-auto">

					<li class="nav-item ">
						<a class="nav-link text-white" href="#"></a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="#"></a>
					</li>
					<li class="nav-item ">
						<a class="nav-link text-white" href="../../PrincipalAlumno/PrincipalAlumno.php">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="../../logout.php">Cerrar Sesión</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white">USUARIO <?php echo ucfirst($_SESSION['username']); ?></a>
					</li>
				</ul>
		</div>
	</header>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="contenedor ">
		<!--Esté este es el contenedor del titulo de la página -->
		<h2 class="text-center">Sistema de Requisiciones Dessert R&G</h2>
		<!--Aquí esta el titulo de la página-->
		<!--Aquí va el contenido de la TABLA-->
	</div>
	<br>
	<div class="container">
		<h2 class="font-weight-bold text-center">UTENSILIOS</h2>
		<br>
		<div class="row">
			<form id="frmAgrega" method="POST" action="AgregarNuevo.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:15px;">Matricula :</label>
					</div>
					<div class="col-sm-9">
						<input type="text" readonly="readonly" value=<?php echo ucfirst($_SESSION['matricula']); ?> style="position:relative; top:10px;" class="form-control" id="matricula" name="matricula">
						<br>
					</div>
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:10px;">Nombre del Alumno :</label>
					</div>
					<div class="col-sm-9">
						<input type="text" readonly="readonly" value=<?php echo ucfirst($_SESSION['username']); ?> style="position:relative; top:0px;" class=" form-control" id="nombre" name="nombre">
						<br>
					</div>
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:0px;">Asignatura:</label>
					</div>
					<div class="col-sm-9">
						<?php
						require_once "conexion.php";
						$conexion = conexion();
						$matricula = $_SESSION['matricula'];
						$periodo = $_SESSION['id_periodo'];
						$programa = $_SESSION['id_programa'];
						$cuatrimestre = $_SESSION['id_cuatrimestre'];
						$grupo = $_SESSION['id_grupo'];
						$sql = "CALL Select_asignatura_alumno_requi('$periodo','$programa','$cuatrimestre','$grupo')";
						$result = mysqli_query($conexion, $sql);
						?>
						<select id="id_asignatura" class="form-control input-sm" style="position:relative; top:-10px;" name="id_asignatura">
							<option value="0" name=" ">Seleciona tu Asignatura</option>
							<?php
							while ($ver = $result->fetch_assoc()) {
							?>
								<option value="<?php echo $ver['id_asignatura'] ?>">
									<?php echo $ver['asignatura'] ?>
								</option>
							<?php
							} ?>
						</select>
					</div>
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:10px;">Brigada:</label>
					</div>
					<div class="col-sm-9">
						<select id="brigada" class="form-control " name="brigada">
						</select>
					</div>

					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:16px;">Categoria:</label>
					</div>
					<div class="col-sm-9">
						<?php
						require_once "conexion.php";
						$conexion = conexion();
						$sql = "CALL Select_categoria";
						$result = mysqli_query($conexion, $sql);
						?>
						<select id="id_categoria" class="form-control input-sm" style="position:relative; top:10px;" name="id_categoria">
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
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:22px;">Fecha de la practica:</label>
					</div>
					<div class="col-sm-9">
						<input type="date" style="position:relative; top:20px;" class=" form-control" name="fecha_practica" id="fecha_practica">
						<br>
					</div>
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:10px;">Hora de la practica:</label>
					</div>
					<div class="col-sm-9">
						<input type="time" style="position:relative; top:10px;" class=" form-control" name="hora_practica" id="hora_practica">
						<br>
					</div>
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:0px;">Ver alumnos de la brigada:</label>
					</div>
					<div class="col-sm-9">
						<select id="matricula_alumno" class="form-control " name="matricula_alumno">
						</select>
					</div>
				</div>

				<div class="col-sm-12">
					<h3 class="font-weight-bold text-center">Utensilios para la requisición </h3>
				</div>
		</div>
		<div class="table-responsive ">
			<?php
			//	session_start();
			if (isset($_SESSION['message'])) {
			?>
				<div class="alert alert-info text-center" style="margin-top:20px;">
					<?php echo $_SESSION['message']; ?>
				</div>
			<?php
				unset($_SESSION['message']);
			}
			?>
			<table class="table table-striped table-hover  table-bordered " style="margin-top:20px;" id="tabladi">

				<center>
					<form method="POST" action="AgregarNuevo.php">
	
						<input type="hidden" name="id_utensilio" value="<?php echo unserialize(stripslashes($id_utensilio)) ?>">
						

						<button type="submit" name="agregar" id="agregar" class="btn text-white" style="background:#5daa49"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Requisición</button>
					</form>
					<button type="button" class="btn text-white " style="background:#be1e2d" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>

					</form>
			</table>
		</div>
	</div>
	</div>

	<!--pag
<script src="js/jquery.min.js"></script>
-->
	<script src="../../Librerias/bootstrap/js/bootstrap.min.js"></script>
	<!--pag-->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#tabladi').DataTable({

				language: {
					"sProcessing": "Procesando...",
					"sLengthMenu": "Mostrar _MENU_ registros",
					"sZeroRecords": "No se encontraron resultados",
					"sEmptyTable": "Ningún dato disponible en esta tabla",
					"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix": "",
					"sSearch": "Buscar:",
					"sUrl": "",
					"sInfoThousands": ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
						"sFirst": "Primero",
						"sLast": "Último",
						"sNext": "Siguiente",
						"sPrevious": "Anterior"
					},
					"oAria": {
						"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					}
				}
			});
		});
	</script>

	<footer>
		<!--Esté es el footer del pie de página -->
		<div class="container " style="background: #092432 ">
			<!--Esté es el contenedor principal-->
			<div class="sociales">
				<!--Esté es el contenedor donde estara el pie de página-->
				<div class="col-sm-4 ">
					<!--Esté es el contenedor donde esta el logo de estado -->
					<a href=""> <img src="../../Images/Logo22.png" height="105px" class="mx-auto d-block"></a>
					<!--Esté es el logo del estado de hidalgo-->
				</div>
				<!--Aquí cierra el contenedor del logo-->
				<div class="col-sm-4 text-white text-center">
					<!--Aquí se abre el contenedor principal  del al informacion del pie de página -->
					<a>
						<!--Aquí se abre el contenedor  del al informacion del pie de página -->
						<!--Aquí esta la información del pie de página -->
						<br>2020 © DESSERT R & G Todos los derechos reservados
						<br>TSU: Ilse Cornejo Delgado
						<br>TSU: Francisco Hernández Sánchez
						<br>TSU: Jazmin Hernández Serrano
						<br>TSU: Yenisei Martínez Camargo
						<br>TSU: Miguel Ángel Martínez Trejo
						<br>Calle los Baños 4, Panuaya. Tezontepec de Aldama, Hgo.
						<br>Teléfono: 01(763) 7375876
						<br>Horario: Lunes a Viernes de 8:30 a 17:00 hrs.
						<!--Aquí se cierra la  información del pie de página -->
					</a>
					<!--Aquí se cierra  el contenedor  del al información del pie de página -->
				</div>
				<!--Aquí se cierra  el contenedor principal  del al información del pie de página -->
				<div class="col-sm-4">
					<!--Esté es el contenedor donde esta el logo de hidalgo esta contigo -->
					<a href=" "><img src="../../Images/Logo33.png " height="100px " class="mx-auto d-block ">
						<!--Este es el logo del hidalgo esta con tigo-->
				</div>
				<!--Aquí se cierra  el contenedor del logo hidalgo esta con tigo -->
			</div>
			<!--Aquí se cierra el contenedor donde estara el pie de página-->
		</div>
		<!--Aquí se cierra  el contenedor principal-->
	</footer>

</body>

</html>
<script type="text/javascript">
	$(document).ready(function() {

		$("#id_asignatura").change(function() {


			$("#id_asignatura option:selected").each(function() {

				id_asignatura = $(this).val();
				$.post("getBrigada.php", {
					id_asignatura: id_asignatura
				}, function(data) {
					$("#brigada").html(data);

				});
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#id_categoria").change(function() {
			$("#id_categoria option:selected").each(function() {
				id_categoria = $(this).val();
				$.post("getTabla.php", {
					id_categoria: id_categoria
				}, function(data) {
					$("#tabladi").html(data);
				});
			});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {

		$("#brigada").change(function() {

			$('#matricula_alumno').find('option').remove().end().append(
				'<option value="whatever"></option>').val('whatever');

			$("#brigada option:selected").each(function() {

				brigada = $(this).val();
				$.post("getAlumnoBrigada.php", {
					brigada: brigada
				}, function(data) {
					$("#matricula_alumno").html(data);

				});
			});
		});
	});
</script>