<?php
include_once('../config.php');

if (isset($_REQUEST['forgotemail']) and $_REQUEST['forgotemail'] != "") {
	extract($_REQUEST);
	$getUsers	=	$db->getAllRecords('alumno', '*', ' AND ((useremail="' . $forgotemail . '") OR (matricula="' . $forgotemail . '")) ');
	if (isset($getUsers[0]['id']) and $getUsers[0]['id'] != "") {

		$token		=	md5(uniqid('lcw-' . mt_rand(), true));
		$update		=	$db->update('alumno', array('token' => $token), array('id' => $getUsers[0]['id']));

		$tokenUrl	=	home_url . 'https://fnsemlot.lucusvirtual.es/Alumno/password.php?token=' . $token;

		/*
		** Email sent to register user
		*/

		$body	=	'<table bgcolor="#FFFFFF" width="560" style="border:1px solid #ccc; opacity:0.8; font-family:Arial; font-size:14px; line-height:18px;" cellspacing="0" cellpadding="5" border="0" align="center">
						<tbody>
							<tr>
								<td align="center"><strong style="color:#55BDE8; font-size:3em; font-weight:bolder; text-align:center; margin:0px;">Contraseña Actualizada/strong><br /><br /></td>
							</tr>
							<tr>
								<td><strong>Request</strong></td>
							</tr>
							<tr>
								<td style="color:#4da6e1; font-size: 25px; padding-bottom: 10px; border-bottom: 1px solid #000;">Dear ' . isset($getUsers[0]['matricula']) ? $getUsers[0]['matricula'] : 'matricula' . ',</td>
							</tr>
							<tr>
								<td valign="top" align="left">
									<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>You can contact us any time by</p>
								</td>
							</tr>
							<tr>
								<td align="center"><a href="" style=" background: #007bff; color: #fff; padding: 10px; border-radius: 5px; border: 4px solid #0167d4; text-decoration:none;" target="_blank">Cambia la contraseña</a></td>
							</tr>
							<tr>
								<td width="100%" valign="middle" align="center" style="text-align: center; width: 100%; padding: 5px; color:#FFF; height:60px; background:linear-gradient(to bottom, #33BDBE 0, #06184d 100%);">
									<p style="font-size: 14px; padding-top: 10px;">
									<br>
									<br>
									<a style="color: #fff;text-decoration:none;" href="" target="_blank">Términos de Uso</a> |
									<a style="color: #fff;text-decoration:none;" href="" target="_blank">Política de privacidad</a> |
									
									</p>
								</td>
							</tr>
						</tbody>
					</table>';

		$name		=	'DESSERT R & G';
		$email		=	'help@learncodeweb.com';
		$to			=	$getUsers[0]['useremail'];

		$header 	=	"From: \"" . $name . "\" <" . $email . ">\n";
		$header 	.=	"To: \"" . $name . "\" <" . $to . ">\n";
		$header 	.=	"Return-Path: <" . $email . ">\n";
		$header 	.=	"MIME-Version: 1.0\n";
		$header 	.=	"Content-Type: text/HTML; charset=ISO-8859-1\n";
		$body	=	'<table bgcolor="#FFFFFF" width="560" style="border:1px solid #ccc; opacity:0.8; font-family:Arial; font-size:14px; line-height:18px;" cellspacing="0" cellpadding="5" border="0" align="center">
		<tbody>
			<tr>
				<td align="center"><strong style="color:#55BDE8; font-size:3em; font-weight:bolder; text-align:center; margin:0px;">Recuperar Contraseña </strong><br /><br /></td>
			</tr>
			<tr>
				<td style="color:#4da6e1; font-size: 25px; padding-bottom: 10px; border-bottom: 1px solid #000;">Estimad@  ' . $signupusername . ',</td>
			</tr>
			<tr>
				<td valign="top" align="none">
					<p style="color:#000; font-size: 29px; font-weight: normal; margin:15px 0px;">Favor de hacer clic en el boton de Cambiar Contraseña </p>
					<p style="color:#50BBE7; font-size: 29px;font-weight: normal; margin:15px 0px;"> .</p>
				</td>
			</tr>
			<tr>
				<td valign="top" align="none">
					<p><strong>DESSERT R & G </strong> DESSERT R & G  que esta diseñada para poder hacer la peticion de las requisiciones que se utilizaran durante los cuatrimestres y asi poder hacer uso del programa Cero Papel  </p>
				</td>
			</tr>
			<tr>
				<td align="center"><a href="https://fnsemlot.lucusvirtual.es/Alumno/password.php?token=' . $token . '" style=" background: #007bff; color: #fff; padding: 10px; border-radius: 5px; border: 4px solid #0167d4;" target="_blank">Cambiar Contraseña</a></td>
			</tr>
			<tr>
				<td width="100%" valign="middle" align="center" style="text-align: center; width: 100%; padding: 5px; color:#FFF; height:60px; background:linear-gradient(to bottom, #33BDBE 0, #06184d 100%);">
					<p style="font-size: 14px; padding-top: 10px;">
					<a style="color: #fff;text-decoration:none;" href="" target="_blank">Terms of Use</a> |
					<a style="color: #fff;text-decoration:none;" href="" target="_blank">Privacy Policy</a> |
					
					</p>
				</td>
			</tr>
		</tbody>
	</table>';

		$subject	=	'Contraseña Olvidada';
		$mail		=	mail($to, $subject, $body, $header);



		if (!$mail) {
			echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> Correo electrónico no enviado!</div>|***|0';
			exit;
		} else {
			echo '<div class="alert alert-success p-1 mt-1"><i class="fa fa-fw fa-thumbs-up"></i> Revisa tu correo electrónico!</div>|***|1|***|index.php';
			exit;
		}
	} else {
		echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> Usuario inválido!</div>|***|0';
		exit;
	}
}

if (isset($_REQUEST['signinname']) and $_REQUEST['signinname'] != "") {
	extract($_REQUEST);
	$getUsers	=	$db->getAllRecords('alumno', 'id,matricula,username,useremail,userpassword,id_cuatrimestre,id_grupo,id_programa,id_periodo', ' AND ((useremail="' . $signinname . '") OR (matricula="' . $signinname . '")) AND userstatus=1 ');
	if (isset($getUsers[0]['userpassword']) and $getUsers[0]['userpassword'] != "") {
		/*
		** Get and varify user password
		*/
		$hash	=	$getUsers[0]['userpassword'];

		if (password_verify($signinpassword, $hash)) {
			$_SESSION['id']			     =	$getUsers[0]['id'];
			$_SESSION['matricula']		 =	$getUsers[0]['matricula'];
			$_SESSION['username']		 =	$getUsers[0]['username'];
			$_SESSION['useremail']		 =	$getUsers[0]['useremail'];
			$_SESSION['id_grupo']		 =	$getUsers[0]['id_grupo'];
			$_SESSION['id_cuatrimestre'] =	$getUsers[0]['id_cuatrimestre'];
			$_SESSION['id_programa']     =	$getUsers[0]['id_programa'];
			$_SESSION['id_periodo']      =	$getUsers[0]['id_periodo'];

			echo '<div class="alert alert-success p-1 mt-1"><i class="fa fa-fw fa-thumbs-up"></i> Inicia sesión correctamente <strong>Por favor espera..!</strong></div>|***|1|***|PrincipalAlumno/PrincipalAlumno.php';
			exit;
		} else {
			echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> Contraseña invalida!</div>|***|0';
			exit;
		}
	} else {
		echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> Usuario no existe o no verificado!</div>|***|0';
		exit;
	}
}

if (isset($_REQUEST['signupemail']) and $_REQUEST['signupemail'] != "") {
	extract($_REQUEST);


	$getUsers	=	$db->getQueryCount('alumno', 'id', ' AND ((useremail="' . $signupemail . '") OR (matricula="' . $signupusermatricula . '")) ');
	if ($getUsers[0]['total']) {
		echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> El usuario ya existe!</div>|***|0';
		exit;
	}
	$termcondition	=	'';
	if (isset($signupcondition)) {
		$termcondition	=	1;
	}
	if ($signuppassword != $signupcpassword) {
		echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> Las contraseñas no coinciden!</div>|***|0';
		exit;
	}
	if ($termcondition == "") {
		echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i>De acuerdo con los términos y condiciones!</div>|***|0';
		exit;
	}
	if (!filter_var($signupemail, FILTER_VALIDATE_EMAIL)) {
		echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> La dirección de correo electrónico no es válida!</div>|***|0';
		exit;
	}


	$token		=	md5(uniqid('lcw-' . mt_rand(), true));
	$tokenUrl	=	home_url . 'https://www.fnsemlot.lucusvirtual.es/Alumno/varify.php?token=' . $token;

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
		'matricula' => $signupusermatricula,
		'userstatus' => 0,
		'id_grupo' => $id_grupo,
		'id_periodo' => $id_periodo,
		'id_programa' => $id_programa,
		'id_cuatrimestre' => $id_cuatrimestre,
		'dt' => $hoy,
		'id' => $signupusermatricula,
		'token' => $token
	);
	$insert		=	$db->insert('alumno', $data);

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
								<td align="center"><a href="https://fnsemlot.lucusvirtual.es/Alumno/varify.php?token=' . $token . '" style=" background: #007bff; color: #fff; padding: 10px; border-radius: 5px; border: 4px solid #0167d4;" target="_blank">Activa tu cuenta</a></td>
							</tr>
							<tr>
								<td width="100%" valign="middle" align="center" style="text-align: center; width: 100%; padding: 5px; color:#FFF; height:60px; background:linear-gradient(to bottom, #33BDBE 0, #06184d 100%);">
									<p style="font-size: 14px; padding-top: 10px;">
									<br>
									<br>
									<a style="color: #fff;text-decoration:none;" href="" target="_blank">Terms of Use</a> |
									<a style="color: #fff;text-decoration:none;" href="" target="_blank">Privacy Policy</a> |
									
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
			echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> Usuario creado pero correo electrónico no enviado!</div>|***|0';
			exit;
		} else {
			echo '<div class="alert alert-success p-1 mt-1"><i class="fa fa-fw fa-thumbs-up"></i> El mensaje de éxito!</div>|***|1|***|index.php';
			exit;
		}
	} else {
		echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> Mensaje de error!</div>|***|0';
		exit;
	}
}


if (isset($_REQUEST['changepassword']) and $_REQUEST['changepassword'] != "") {
	extract($_REQUEST);

	if ($changepassword != $changecpassword) {
		echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> Las contraseñas no coinciden!</div>|***|0';
		exit;
	}
	$userData		=	$db->getAllRecords('alumno', 'id,matricula', ' AND token="' . $token . '"');
	if (isset($userData[0]['id']) and $userData[0]['id'] != "") {

		/*
		*** Creating hash with cost 12
		*** You can change or can ignore cost as per your need
		*/

		$options	=	array('cost' => 12);
		$hash		=	password_hash($changepassword, PASSWORD_BCRYPT, $options);

		$data		=	array(
			'userpassword' => $hash,
			'token' => $token
		);
		$update		=	$db->update('alumno', $data, array('id' => $userData[0]['id']));

		if ($update) {

			/*
			** Email sent to Change password
			*/

			$body	=	'<table bgcolor="#FFFFFF" width="560" style="border:1px solid #ccc; opacity:0.8; font-family:Arial; font-size:14px; line-height:18px;" cellspacing="0" cellpadding="5" border="0" align="center">
							<tbody>
								<tr>
									<td align="center"><strong style="color:#55BDE8; font-size:3em; font-weight:bolder; text-align:center; margin:0px;">Contraseña Actualizada</strong><br /><br /></td>
								</tr>
								<tr>
									<td style="color:#4da6e1; font-size: 25px; padding-bottom: 10px; border-bottom: 1px solid #000;">Dear ' . $userData[0]['username'] . ',</td>
								</tr>
								
								<tr>
									<td width="100%" valign="middle" align="center" style="text-align: center; width: 100%; padding: 5px; color:#FFF; height:60px; background:linear-gradient(to bottom, #33BDBE 0, #06184d 100%);">
										<p style="font-size: 14px; padding-top: 10px;">
										<br>
										<br>
										<a style="color: #fff;text-decoration:none;" href="" target="_blank">Términos de Uso</a> |
										<a style="color: #fff;text-decoration:none;" href="" target="_blank">Política de privacidad</a> |
										
										</p>
									</td>
								</tr>
							</tbody>
						</table>';

			$name		=	'DESSERT R & G';
			$email		=	'noreply@learncodeweb.com';
			$to			=	$userData[0]['useremail'];

			$header 	=	"From: \"" . $name . "\" <" . $email . ">\n";
			$header 	.=	"To: \"" . $name . "\" <" . $to . ">\n";
			$header 	.=	"Return-Path: <" . $email . ">\n";
			$header 	.=	"MIME-Version: 1.0\n";
			$header 	.=	"Content-Type: text/HTML; charset=ISO-8859-1\n";

			$subject	=	'Contraseña Actualizada';

			$body	=	'<table bgcolor="#FFFFFF" width="560" style="border:1px solid #ccc; opacity:0.8; font-family:Arial; font-size:14px; line-height:18px;" cellspacing="0" cellpadding="5" border="0" align="center">
							<tbody>
								<tr>
									<td align="center"><strong style="color:#55BDE8; font-size:3em; font-weight:bolder; text-align:center; margin:0px;">Contraseña Actualizada</strong><br /><br /></td>
								</tr>
								<tr>
									<td style="color:#4da6e1; font-size: 25px; padding-bottom: 10px; border-bottom: 1px solid #000;">Estimad@ ' . $userData[0]['username'] . ' su contraseña fue actualiza con exito,</td>
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

			$mail		=	mail($to, $subject, $body, $header);

			if (!$mail) {
				echo '<div class="alert alert-success p-1 mt-1"><i class="fa fa-fw fa-thumbs-up"></i>¡Contraseña actualizada!</div>|***|0';
				exit;
			} else {
				echo '<div class="alert alert-success p-1 mt-1"><i class="fa fa-fw fa-thumbs-up"></i> ¡Contraseña actualizada exitosamente!</div>|***|1|***|index.php';
				exit;
			}
		}
	} else {
		echo '<div class="alert alert-danger p-1 mt-1"><i class="fa fa-fw fa-exclamation-triangle"></i> Token invalido <strong> ¡Vuelve a intentarlo!</strong></div>|***|0|***|index.php';
		exit;
	}
}
