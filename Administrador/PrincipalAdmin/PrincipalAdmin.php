<?php include_once('../../config.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Principal Administrador</title>
	<link rel="shortcut icon" href="../../img/favicon.ico">
	<!--librerias-->

	<link rel="stylesheet" type="text/css" href="Librerias/bootstrap/css/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="Librerias/fontawesome/css/all.css">
	<link rel="stylesheet" href="Librerias/estilo.css">
	<link rel="stylesheet" type="text/css" href="Librerias/css/estilos.css">
	<script src="Librerias/js/jquery.min.js"></script>
	<script src="../Librerias/bootstrap/js/bootstrap.min.js"></script>
	<script src="Librerias/bootstrap/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/fontello.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/banner.css">
	<link rel="stylesheet" type="text/css" href="css/blog.css">
	<link rel="stylesheet" type="text/css" href="css/info.css">




<body>
	<header>
		<div class="row1 fixed-top" style="background:#454545 ">
			<div class="col-sm-2">
				<a><img class="img1" src="Images/logos/utvm.png" height="49px " alt="Responsive image"></a>
			</div>
		</div>
		<div class="col-sm-10 text-center">
			<h2 class="texto  text-white text-center"> UTVM Unidad Académica de Tezontepec</h2>
		</div>


		<div class="navbar navbar-expand-lg  " style="background:#092432">
			<img src="Images/logos/logito.png" height="50px">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars "></i></span>

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
						<a class="nav-link text-white" href="#">Inicio</a>
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

	<main>
		<br>
		<br>
		<br>
		<br>
		<br>
		<!-- <section id="banner">
            <img src="Images/fondo.jpg">
        </section>-->

		<section id="info">
			<h2>Sistema de Requisiciones Dessert R&G</h2>

			<div class="contenedor">
				<div class="info-menu">
					<a href="../TablaAdministrador/Administrador/Administrador.php"><img src="Images/administrador.jpg" alt="Administrador"></a>
					<h4>Administrador</h4>
				</div>
				<div class="info-menu">
				<a href="construccion.php"><img src="Images/requi.png" alt="Requisición"> </a>
					<h4>Requisición</h4>
				</div>

				<div class="info-menu">
				<a href="construccion.php"><img src="Images/deudores.jpg" alt="Deudores"> </a>
					<h4>Deudores</h4>
				</div>
				<div class="info-menu">
					<a href="../TablaPeriodo/Periodo/Periodo.php"> <img src="Images/Periodo.jpg" alt="Periodo"> </a>
					<h4>Periodo</h4>
				</div>
				<div class="info-menu">
					<a href="../TablaProgramaEducativo/ProgramaEducativo/ProgramaEducativo.php"><img src="Images/programa.jpg" alt="Programa educativo"> </a>

					<h4>Programa Educativo</h4>
				</div>
				<div class="info-menu">
					<a href="../TablaGrupo/Grupo/Grupo.php"> <img src="Images/grupo.jpg" alt="Grupo"> </a>
					<h4>Grupo</h4>
				</div>
				<div class="info-menu">
				<a href="../TablaCuatrimestre/cuatrimestre/cuatrimestre.php"><img src="Images/Cuatrimestre.jpg" alt="Cuatrimestre"> </a>
					<h4>Cuatrimestre</h4>
				</div>
				<div class="info-menu">
					<a href="../TablaProfesor/Profesor/Profesor.php"><img src="Images/profesor.jpg" alt="Profesor"> </a>
					<h4>Profesor</h4>
				</div>
				<div class="info-menu">
					<a href="../TablaUtensilios/utensilios/utensilios.php"><img src="Images/utensilios.jpg" alt="Utensilios"> </a>
					<h4>Utensilios</h4>
				</div>
				<div class="info-menu">
				<a href="../TablaAsignatura/Asignatura/Asignatura.php"><img src="Images/asignatura.jpg" alt="Asignatura"> </a>
					<h4>Asignatura</h4>
				</div>
				<div class="info-menu">
					<a href="../TablaAlumnos/Alumno/Alumno.php"><img src="Images/alumno.jpg" alt="Alumnos"> </a>
					<h4>Alumno</h4>
				</div>

				<div class="info-menu">
				<a href="construccion.php"><img src="Images/brigadas.jpg" alt="Brigada"> </a>
					<h4>Brigada</h4>
				</div>

				<div class="info-menu">
				<a href="construccion.php"><img src="Images/reportesemanal.jpg" alt="Reporte Semanal"> </a>
					<h4>Reporte Semanal</h4>
				</div>

				<div class="info-menu">
				<a href="construccion.php"><img src="Images/reportedeudores.jpg"alt="Reporte de Deudores"> </a>
					<h4>Reporte de Deudores</h4>
				</div>


			</div>
		</section>
	</main>


	<br>


	<footer>
		<!--Esté es el footer del pie de página -->
		<div class="container " style="background: #092432 ">
			<!--Esté es el contenedor principal-->
			<div class="sociales">
				<!--Esté es el contenedor donde estara el pie de página-->
				<div class="col-sm-4 ">
					<!--Esté es el contenedor donde esta el logo de estado -->
					<a href=""> <img src="Images/Logo22.png" height="105px" class="mx-auto d-block"></a>
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
					<a href=" "><img src="Images/Logo33.png " height="100px " class="mx-auto d-block ">
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