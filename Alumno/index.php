<!doctype html>
<html lang="es">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="css/form-style-z.css" type="text/css">

	<title>Inicio de sesión de alumnos</title>
	<link rel="shortcut icon" href="img/favicon.ico">
</head>

<body style="background: url(img/2346.jpeg) no-repeat center center; background-size:cover cover; height:100vh;">
	<div class="overlay"></div>
	<div class="container">
		<div class="mt-2 mb-4">
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 ml-auto mr-auto">
				<ul class="nav nav-pills nav-fill mb-1" id="pills-tab" role="tablist">
					<li class="nav-item"> <a class="nav-link active" id="pills-signin-tab" data-toggle="pill" href="#pills-signin" role="tab" aria-controls="pills-signin" aria-selected="true">Inicio de Sesión</a> </li>
					<li class="nav-item"> <a class="nav-link" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="false">Registro</a> </li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-signin" role="tabpanel" aria-labelledby="pills-signin-tab">
						<div class="col-sm-12 border border-primary shadow rounded bg-white pt-2">
							<div class="text-center"><img src="img/logo4.png"></div>
							<em id="signInMsg"></em>
							<form method="post" id="singninFrom" onSubmit="return false;">
								<div class="form-group">
									<label class="font-weight-bold">Email <span class="badge badge-secondary"> O </span> Matricula <span class="text-danger">*</span></label>
									<input type="text" name="signinname" id="signinname" class="form-control " autocomplete="off" placeholder="Email o Matricula" data-required>
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Contraseña <span class="text-danger">*</span></label>
									<div class="input-group">
										<input type="password" name="signinpassword" id="signinpassword" class="form-control " autocomplete="off" placeholder="***********" data-required>
										<div class="input-group-append" data-toggle="tooltip" title="¿Se te olvidó tu contraseña?" data-placement="left">
											<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#forgotPass"><i class="fa fa-fw fa-key"></i></button>
										</div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" name="signinSubmit" id="signinSubmit" value="Sign In" onClick="return formValidate('#singninFrom','#signInMsg');" class="btn btn-block btn-primary"><i class="fa fa-fw fa-sign-in-alt"></i> Inicio de Sesión</button>
								</div>
							</form>
						</div>
					</div>
					<div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
						<div class="col-sm-12 border border-primary shadow rounded bg-white pt-1">
							<div class="text-center"><img src="img/logo4.png"></div>
							<em id="signUpMsg"></em>
							<form method="post" id="singnupFrom" onSubmit="return false;">

								<div class="form-group">
									<label class="font-weight-bold">NOMBRE DEL ALUMNO <span class="text-danger">*</span></label>
									<input type="text" name="signupusername" id="signupusername" class="form-control " placeholder="Nombre completo" data-required>
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Matricula <span class="text-danger">*</span></label>
									<input type="text" name="signupusermatricula" id="signupusermatricula" class="form-control " placeholder="Matricula" data-required>
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Email <span class="text-danger">*</span></label>
									<input type="email" name="signupemail" id="signupemail" class="form-control " placeholder="Ingresa un correo valido" data-required>
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Periodo<span class="text-danger">*</span></label>
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

								<div class="form-group">

									<label class="font-weight-bold">Programa Educativo<span class="text-danger">*</span></label>

									<select id="id_programa" class="form-control " name="id_programa">

									</select>

								</div>
								<div class="form-group">

									<label class="font-weight-bold">Cuatrimestre<span class="text-danger">*</span></label>

									<select id="id_cuatrimestre" class="form-control " name="id_cuatrimestre">

									</select>

								</div>


								<div class="form-group">
									<label class="font-weight-bold">GRUPO<span class="text-danger">*</span></label>

									<select id="id_grupo" class="form-control " name="id_grupo">

									</select>

								</div>


								<div class="form-group">
									<label class="font-weight-bold">Contraseña <span class="text-danger">*</span></label>
									<input type="password" name="signuppassword" id="signuppassword" class="form-control " placeholder="*********" data-required>
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Confirmar Contraseña <span class="text-danger">*</span></label>
									<input type="password" name="signupcpassword" id="signupcpassword" class="form-control " placeholder="*********" data-required>
								</div>
								<div class="form-group">
									<label><input type="checkbox" name="signupcondition" id="signupcondition" value="1" data-required> Acepto los <a href="javascript:;">Terminos &amp; Condiciones.</a></label>
								</div>
								<div class="form-group">
									<button type="submit" name="signupSubmit" id="signupSubmit" value="Sign Up" class="btn btn-block btn-primary" onClick="formValidate('#singnupFrom','#signUpMsg');"><i class="fa fa-fw fa-sign-out-alt"></i> Registrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--/.col-xs-12 col-sm-8 col-md-6 col-lg-4-->

			<!-- Modal -->
			<div class="modal fade" id="forgotPass" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<form method="post" id="forgotpassForm" onSubmit="return false;">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><i class="fa fa-fw fa-lock-open"></i> Olvidaste la contraseña</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
							</div>
							<div class="modal-body"> <em id="forgotPassMsg"></em>
								<div class="form-group">
									<label class="font-weight-bold">Email <span class="badge badge-secondary">O</span> Matricula <span class="text-danger">*</span></label>
									<input type="text" name="forgotemail" id="forgotemail" class="form-control form-control-lg" placeholder="Correo Válido o Matricula" data-required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-long-arrow-alt-left"></i> Iniciar sesión</button>
								<button type="submit" name="forgotPassSubmit" id="forgotPassSubmit" class="btn btn-primary" onClick="return formValidate('#forgotpassForm','#forgotPassMsg');"><i class="fa fa-envelope"></i> Enviar petición</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--/.mt-2 mb-4-->
	</div>
	<!--/.container-->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/form-script.js"></script>
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