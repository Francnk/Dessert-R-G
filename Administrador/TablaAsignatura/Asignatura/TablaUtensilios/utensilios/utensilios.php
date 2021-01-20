<?php include_once('../../../../../config.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UTENSILIOS</title>
	<!--Librerias-->
	<link rel="stylesheet" type="text/css" href="../../../../../Administrador/Librerias/bootstrap/css/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../../../../../Administrador/Librerias/fontawesome/css/all.css">
	<link rel="Stylesheet" type="text/css" href="../../../../../Administrador/Librerias/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" href="../../../../../Administrador/Librerias/estilo.css">
	<link rel="stylesheet" type="text/css" href="../../../../../Administrador/Librerias/css/estilos.css">

	<!--pag-->
	<link rel="Stylesheet" type="text/css" href="../../../../../Administrador/Librerias/datatable/bootstrap.css">
	<link rel="Stylesheet" type="text/css" href="../../../../../Administrador/Librerias/datatable/dataTables.bootstrap4.min.css">
	<!--pag-->
	<script src="../../../../../Administrador/Librerias/js/jquery.min.js"></script>
	<script src="../../../../../Administrador/Librerias/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../../../../Administrador/Librerias/alertifyjs/alertify.js"></script>
	
	<!--pag-->
	<script src="../../../../../Administrador/Librerias/datatable/jquery.dataTables.min.js"></script>
	<script src="../../../../../Administrador/Librerias/datatable/dataTables.bootstrap4.min.js"></script>
	<!--pag-->

<body>
	<header>
		<div class="row1 fixed-top" style="background:#454545 ">
			<div class="col-sm-2">
				<a><img class="img1" src="../../../../Images/logos/utvm.png" height="49px " alt="Responsive image"></a>

			</div>
		</div>
		<div class="col-sm-10 text-center">

			<h2 class="texto  text-white text-center"> UTVM Unidad Académica de Tezontepec</h2>

		</div>


		<div class="navbar navbar-expand-lg  " style="background:#092432">
			<img src="../../../../Images/logos/logito.png" height="50px">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars "></i></span> <!-- asiagrega-->

			</button>

			<nav class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="nav navbar-nav ml-auto">

					<li class="nav-item ">
						<a class="nav-link text-white" href="#"></a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="../../Asignatura.php">Regresar</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link text-white" href="../../../../PrincipalAdmin/PrincipalAdmin.php">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="../../../../../logout.php">Cerrar Sesión</a>
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
		<div class="row">
			<div class="table-responsive ">
				<a href="#addnew" class="btn btn text-white  " style="background:#5daa49" data-toggle="modal">
					<i class="fas fa-user"></i> Nuevo Utensilio</a>

				<?php
				//session_start();
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

							<th class="text-xl-center  text-white ">DESCRIPCIÓN</th>
							<th class="text-xl-center  text-white ">CANTIDAD ASIGNADA</th>
							<th class="text-xl-center  text-white ">CANTIDAD EXISTENTE</th>
							<th class="text-xl-center  text-white ">ACCIÓN</th>
						</tr>
						<!--pag-->
					</thead>
					<tbody>
						<?php
						//incluimos el fichero de conexion
						
						$database = new Connection();
						$db = $database->open();
						try {

							$id = $_POST['id'];

							$sql = 'CALL mostrar_id_utensilio (' . $id . ')';
							/*$sql = 'SELECT * FROM cuatri_grupo';*/
							foreach ($db->query($sql) as $row) {
						?>
								<tr>

									<td><?php echo $row['descripcion']; ?></td>
									<td><?php echo $row['cant_asignada']; ?></td>
									<td><?php echo $row['cant_exit']; ?></td>
									<td>
										<center>
											<a href="#edit_<?php echo $id; ?>" class="btn1 btn-success  btn-sm" style="background:#5daa49" data-toggle="modal"><span class="icon"><i class="fas fa-edit"></i></span>Editar</a>
											<a href="#delete_<?php echo $id; ?>" class="btn1 btn-danger btn-sm" style="background:#be1e2d" data-toggle="modal"><span class="icon"><i class="fas  fa-trash"></i></span> Borrar</a>
											<!--agregar s-->
									</td>
									<?php include('../utensilios/BorrarEditarModal.php'); ?>
								</tr>
								</center>
						<?php
							}
						} catch (PDOException $e) {
							echo "Hubo un problema en la conexión: " . $e->getMessage();
						}

						//Cerrar la Conexion
						$database->close();

						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php include('../utensilios/AgregarModal.php'); ?>
	<!--pag
<script src="js/jquery.min.js"></script>
-->
	<script src="../../../../../Administrador/Librerias/bootstrap/js/bootstrap.min.js"></script>
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
					<a href=""> <img src="../../../../Images/Logo22.png" height="105px" class="mx-auto d-block"></a>
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
					<a href=" "><img src="../../../../Images/Logo33.png " height="100px " class="mx-auto d-block ">
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