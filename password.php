<?php include_once('config.php'); ?>
<?php
	session_start();
	?>
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
	
	<title>Recuperar Contraseña</title>
</head>
<body style="background: url(img/2346.jpeg) no-repeat center center; background-size:cover;">
	<div class="overlay"></div>
	<div class="container">
		<div class="my-5">
			<?php
				$token			=	isset($_REQUEST['token'])?$_REQUEST['token']:'';
				if($token!=""){
					$userData		=	$db->getQueryCount('alumno','id',' AND token="'.$token.'"');
					if(isset($userData[0]['total']) and $userData[0]['total']>0){
						?>
						<div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 mr-auto ml-auto">
							<form method="post" id="changepassForm" onSubmit="return false;">
								<input type="hidden" name="token" value="<?php echo $token; ?>">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title m-0"><i class="fa fa-fw fa-lock"></i> Actualizar Contraseña</h5>
									</div>
									<div class="card-body">
										<em id="changePassMsg"></em>
										<div class="form-group">
											<label class="font-weight-bold">Contraseña <span class="text-danger">*</span></label>
											<input type="password" name="changepassword" id="changepassword" class="form-control form-control-lg" placeholder="*******" data-required>
										</div>
										<div class="form-group">
											<label class="font-weight-bold">Confirmar Contraseña <span class="text-danger">*</span></label>
											<input type="password" name="changecpassword" id="changecpassword" class="form-control form-control-lg" placeholder="*******" data-required>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col">
													<a href="index.php" class="btn btn-block btn-secondary"><i class="fa fa-long-arrow-alt-left"></i> Iniciar Sesión</a>
												</div>
												<div class="col">
													<button type="submit" name="changePassSubmit" id="changePassSubmit" class="btn btn-block btn-primary" onClick="return formValidate('#changepassForm','#changePassMsg');"><i class="fa fa-edit"></i> Actualizar</button>
												</div>											
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<?php
					}else{
				?>
				<div class="alert alert-danger" role="alert">
					<h4 class="alert-heading"><i class="fa fa-fw fa-exclamation-triangle"></i> Warning!</h4>
					<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
					<hr>
					<p class="mb-0">You are trying to access wrong page. Please go back to <a href="<?php echo home_url; ?>" class="btn btn-primary"><i class="fa fa-fw fa-sign-in-alt"></i> Sign In</a> page.</p>
				</div>
				<?php }
				}else{
				?>
				<div class="alert alert-danger" role="alert">
					<h4 class="alert-heading"><i class="fa fa-fw fa-exclamation-triangle"></i> Warning!</h4>
					<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
					<hr>
					<p class="mb-0">You are trying to access wrong page. Please go back to <a href="<?php echo home_url; ?>" class="btn btn-primary"><i class="fa fa-fw fa-sign-in-alt"></i> Sign In</a> page.</p>
				</div>
				<?php } ?>
		</div> <!--/.my-5-->
	</div> <!--/.container-->
	
	<!-- Optional JavaScript --> 
	<!-- jQuery first, then Popper.js, then Bootstrap JS --> 
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/form-script.js"></script>
</body>
</html>