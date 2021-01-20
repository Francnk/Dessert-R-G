<?php include_once('../../../config.php'); ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ALUMNO</title>
	<link rel="shortcut icon" href="img/favicon.ico">
	<!--librerias-->
	<link rel="stylesheet" type="text/css" href="../../../Administrador/Librerias/bootstrap/css/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../../../Administrador/Librerias/fontawesome/css/all.css">
	<link rel="Stylesheet" type="text/css" href="../../../Administrador/Librerias/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" href="../../../Administrador/Librerias/estilo.css">
	<link rel="stylesheet" type="text/css" href="../../../Administrador/Librerias/css/estilos.css">
	<link rel="Stylesheet" type="text/css" href="../../../Administrador/Librerias/datatable/bootstrap.css">
	<link rel="Stylesheet" type="text/css" href="../../../Administrador/Librerias/datatable/dataTables.bootstrap4.min.css">
	<script src="../../../Administrador/Librerias/js/jquery.min.js"></script>
	<script src="../../../Administrador/Librerias/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../../Administrador/Librerias/alertifyjs/alertify.js"></script>
	<script src="../../../Administrador/Librerias/datatable/jquery.dataTables.min.js"></script>
	<script src="../../../Administrador/Librerias/datatable/dataTables.bootstrap4.min.js"></script>

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
				<span class="navbar-toggler-icon"></span>

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
						<a class="nav-link text-white" href="../../PrincipalAdmin/PrincipalAdmin.php">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="../../../logout.php">Cerrar Sesión</a>
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

	<div class="container">
		<h2 class="font-weight-bold text-center">BUSQUEDA DE ALUMNOS</h2>
		<br>
		<div class="row">
			<div class="table-responsive ">
				<div class="container">
					<div class="container-fluid ">
						<form id="frmAgrega" method="POST" action="Alumno.php">
							<div class="row form-group">
								<div class="col-sm-2">
									<label class="control-label " style="position:relative; top:10px;">Periodo:</label>
								</div>
								<div class="col-sm-4">
									<?php
									require_once "conexion.php";
									$conexion = conexion();

									$sql = "CALL Select_periodo";
									//if-else statement in executing our quersy
									// $db->exec($sql);
									$result = mysqli_query($conexion, $sql);

									?>
									<select id="id_periodo" class="form-control input-sm " name="id_periodo">

										<option value="0" name="id_periodo">Seleciona el periodo</option>

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

							<div class="row form-group">
								<div class="col-sm-2">
									<label class="control-label " style="position:relative; top:10px;">Programa Educativo:</label>
								</div>
								<div class="col-sm-4">
									<select id="id_programa" class="form-control " name="id_programa">

									</select>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-sm-2">
									<label class="control-label " style="position:relative; top:10px;">Cuatrimestre:</label>
								</div>
								<div class="col-sm-4">
									<select id="id_cuatrimestre" class="form-control " name="id_cuatrimestre">

									</select>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-sm-2">
									<label class="control-label " style="position:relative; top:10px;">Grupo:</label>
								</div>
								<div class="col-sm-4">
									<select id="id_grupo" class="form-control " name="id_grupo">

									</select>
								</div>
							</div>

					</div>
					<div class="row form-group">
						<div class="col-sm-4">
						</div>
						<div class="col-sm-7">
							<button type="submit" name="agregar" id="agregar" class="btn text-white" style="background:#5daa49 "><span class="glyphicon glyphicon-floppy-disk"></span> Consultar alumnos</button>
							</form>
						</div>
					</div>
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
				<table class="table table-striped table-hover  table-bordered " style="margin-top:20px;" id="tabladi">
					<thead class="p-3 mb-2 bg " style="background:#5daa49">
						<tr>
							<!--pag-->
							<th class="text-xl-center  text-white ">MATRICULA</th>
							<th class="text-xl-center  text-white ">NOMBRE</th>
							<th class="text-xl-center  text-white ">EMAIL</th>
							<th class="text-xl-center  text-white ">GRUPO</th>
							<th class="text-xl-center  text-white ">ACCIÓN</th>
						</tr>
						<!--pag-->
					</thead>
					<tbody>

						<?php

						//incluimos el fichero de conexion
						//include_once('conexion.php');

						if (isset($_REQUEST['agregar'])) {
							$database = new Connection();
							$db = $database->open();
							try {

								$id_periodo = $_REQUEST['id_periodo'];
								$id_programa = $_REQUEST['id_programa'];
								$id_cuatrimestre = $_REQUEST['id_cuatrimestre'];
								$id_grupo = $_REQUEST['id_grupo'];
								//1,4,5,2
								//$sqli = "CALL _alumnos(1,8,2,1)";
								//$sqli = " SELECT DISTINCT  matricula,useremail, username,grupo.grupo  FROM alumno INNER JOIN grupo  ON alumno.id_grupo = grupo.id_grupo INNER JOIN cuatrimestre  ON alumno.id_cuatrimestre = cuatrimestre.id_cuatrimestre INNER JOIN periodo  ON alumno.id_periodo = periodo.id_periodo INNER JOIN programa_educativo  ON alumno.id_programa = programa_educativo.id_programa WHERE    ( grupo.id_grupo ='$id_grupo ' ) AND ( cuatrimestre.id_cuatrimestre = '$id_cuatrimestre ') AND ( programa_educativo.id_programa = '$id_programa ') AND ( periodo.id_periodo ='$id_periodo ')";
								$sqli = "CALL Consultar_alumnos('$id_periodo','$id_programa','$id_cuatrimestre','$id_grupo')";

								//echo "$sql";
								foreach ($db->query($sqli) as $row) {
						?>
									<tr>
										<td><?php echo $row['matricula']; ?></td>
										<td><?php echo $row['username']; ?></td>
										<td><?php echo $row['useremail']; ?></td>
										<td><?php echo $row['grupo']; ?></td>

										<td>
											<center>
												<!--<a href="#edit_<?php echo $row['matricula']; ?>" class="btn1 btn-success  btn-sm" style="background:#5daa49" data-toggle="modal"><span class="icon"><i class="fas fa-edit"></i></span>Editar</a>-->
												<a href="#delete_<?php echo $row['matricula']; ?>" class="btn1 btn-danger btn-sm" style="background:#be1e2d" data-toggle="modal"><span class="icon"><i class="fa fa-trash"></i></span> Borrar</a>
										</td>
										<?php include('BorrarEditarModal.php'); ?>
									</tr>
									</center>
						<?php
								}
							} catch (PDOException $e) {
								echo "Hubo un problema en la conexión: " . $e->getMessage();
							}

							//Cerrar la Conexion
							$database->close();
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!--pag
<script src="js/jquery.min.js"></script>
-->
	<script src="../../../Administrador/Librerias/bootstrap/js/bootstrap.min.js"></script>
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

		$("#id_periodo").change(function() {

			$('#id_grupo').find('option').remove().end().append(
				'<option value="whatever"></option>').val('whatever');

			$("#id_periodo option:selected").each(function() {

				id_periodo = $(this).val();
				$.post("getPrograma.php", {
					id_periodo: id_periodo
				}, function(data) {
					$("#id_programa").html(data);

				});
			});
		});
	});
</script>


<script type="text/javascript">
	$(document).ready(function() {

		$("#id_programa").change(function() {

			$('#id_grupo').find('option').remove().end().append(
				'<option value="whatever"></option>').val('whatever');

			$("#id_programa option:selected").each(function() {

				id_programa = $(this).val();
				$.post("getCuatrimestre.php", {
					id_programa: id_programa
				}, function(data) {
					$("#id_cuatrimestre").html(data);

				});
			});
		});
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