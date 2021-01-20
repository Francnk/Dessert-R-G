<?php
include_once('../../../config.php');

if (isset($_POST['signupSubmit'])) {


	try {
		if (isset($_REQUEST['signupemail']) and $_REQUEST['signupemail'] != "") {
			extract($_REQUEST);


			$getUsers	=	$db->getQueryCount('administrador', 'id', ' AND ((useremail="' . $signupemail . '") OR (numero_empleado="' . $signupusermatricula . '")) ');
			if ($getUsers[0]['total']) {

				$_SESSION['message'] = 'El usuario ya existe!';
				header('location: Administrador.php');
				//echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> El usuario ya existe!</div>|***|0';
				exit();
			}
			$termcondition	=	'';
			if (isset($signupcondition)) {
				$termcondition	=	1;
			}
			if ($signuppassword != $signupcpassword) {
				$_SESSION['message'] = 'Las contraseñas no coinciden!';
				header('location: Administrador.php');
				//echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> Las contraseñas no coinciden!</div>|***|0';
				exit;
			}
			if ($termcondition == "") {
				$_SESSION['message'] = 'De acuerdo con los términos y condiciones!';
				header('location: Administrador.php');
				//echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i>De acuerdo con los términos y condiciones!</div>|***|0';
				exit;
			}
			if (!filter_var($signupemail, FILTER_VALIDATE_EMAIL)) {
				$_SESSION['message'] = 'La dirección de correo electrónico no es válida!';
				header('location: Administrador.php');
				//echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> La dirección de correo electrónico no es válida!</div>|***|0';
				exit;
			}


			$token		=	md5(uniqid('lcw-' . mt_rand(), true));
			$tokenUrl	=	home_url . 'https://www.fnsemlot.lucusvirtual.es/varify.php?token=' . $token;

			/*
    *** Creando hash con costo 12
    *** Puede cambiar o ignorar el costo según su necesidad
    */

			$options	=	array('cost' => 12);
			$hash		=	 password_hash($signuppassword, PASSWORD_BCRYPT, $options);

			$hoy = date("Y-m-d H:i:s");
			$data		=	array(
				'useremail' => $signupemail,
				'username' => $signupusername,
				'userpassword' => $hash,
				'termcondition' => $signupcondition,
				'numero_empleado' => $signupusermatricula,
				'userstatus' => 0,
				'u_status' => 0,
				'dt' => $hoy,
				'id' => $signupusermatricula,
				'token' => $token
			);
			$insert		=	$db->insert('administrador', $data);


			if ($insert) {

				/*
		** Email sent to register user
		*/

				$body	=	'<table bgcolor="#FFFFFF" width="560" style="border:1px solid #ccc; opacity:0.8; font-family:Arial; font-size:14px; line-height:18px;" cellspacing="0" cellpadding="5" border="0" align="center">
						<tbody>
							<tr>
								<td align="center"><strong style="color:#55BDE8; font-size:3em; font-weight:bolder; text-align:center; margin:0px;">GRACIAS </strong><br /><br /></td>
							</tr>
							<tr>
								<td align="center"><span style="color:#000; font-size:2.2em; text-align:center; margin:0px;">por su registro</span></td>
							</tr>
							<tr>
								<td style="color:#4da6e1; font-size: 25px; padding-bottom: 10px; border-bottom: 1px solid #000;">Estimad@  ' . $signupusername . ',</td>
							</tr>
							<tr>
								<td valign="top" align="none">
									<p style="color:#000; font-size: 29px; font-weight: normal; margin:15px 0px;">Gracias por registrarse en nuestra plataforma</p>
									<p style="color:#50BBE7; font-size: 29px;font-weight: normal; margin:15px 0px;">favor de activar su cuenta .</p>
								</td>
							</tr>
							<tr>
								<td valign="top" align="none">
									<p><strong>Bienvenido</strong> a la plataforma de DESSERT R & G  que esta diseñada para poder hacer la peticion de las requisiciones que se utilizaran durante los cuatrimestres y asi poder hacer uso del programa Cero Papel  </p>
								</td>
							</tr>
							<tr>
								<td align="center"><a href="https://fnsemlot.lucusvirtual.es/varify.php?token=' . $token . '" style=" background: #007bff; color: #fff; padding: 10px; border-radius: 5px; border: 4px solid #0167d4;" target="_blank">Activa tu cuenta</a></td>
							</tr>
							<tr>
								<td width="100%" valign="middle" align="center" style="text-align: center; width: 100%; padding: 5px; color:#FFF; height:60px; background:linear-gradient(to bottom, #33BDBE 0, #06184d 100%);">
									<p style="font-size: 14px; padding-top: 10px;">
									<a style="color: #fff;text-decoration:none;" href="" target="_blank">Terms of Use</a> |
									<a style="color: #fff;text-decoration:none;" href="" target="_blank">Privacy Policy</a> |
									<a style="color: #fff;text-decoration:none;" href="" target="_blank">Licensing &amp; Compliance</a>
									</p>
								</td>
							</tr>
						</tbody>
					</table>';


				$name		=	'DESSERT R & G';
				$email		=	'noreply@learncodeweb.com';
				$to			=	$signupemail;

				$header 	=	"From: \"" . $name . "\" <" . $email . "> \n";
				$header 	.=	"To: \"" . $name . "\" <" . $to . "> \n";
				$header 	.=	"Return-Path: <" . $email . "> \n";
				$header 	.=	"MIME-Version: 1.0\n";
				$header 	.=	"Content-Type: text/HTML; charset=ISO-8859-1 \n";


				$subject	=	'Nuevo Registro';
				$mail		=	mail($to, $subject, $body, $header);

				if (!$mail) {
					$_SESSION['message'] = ' Usuario creado pero correo electrónico no enviado!';
					header('location: Administrador.php');
					//echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> Usuario creado pero correo electrónico no enviado!</div>|***|0';
					exit;
				} else {
					$_SESSION['message'] = 'Correo enviado con exito al usuario!';
					header('location: Administrador.php');
					//echo '<div class="alert alert-success p-1 mt-1"><i class="fa fa-fw fa-thumbs-up"></i> El mensaje de éxito!</div>|***|1|***|index.php';
					exit;
				}
			} else {
				$_SESSION['message'] = 'Mensaje de error!';
				header('location: Administrador.php');
				//echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> Mensaje de error!</div>|***|0';
				exit;
			}
		}
	} catch (PDOException $e) {
		$_SESSION['message'] = $e->getMessage();
	}

	$database->close();
} else {
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: Administrador.php');
