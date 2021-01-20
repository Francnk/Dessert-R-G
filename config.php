<?php
session_start();
include_once('includes/Database.php');
include_once('includes/class.phpmailer.php');
include_once('includes/class.smtp.php');

define('DB_NAME', 'proyecto');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

/**
** Change below url with your url
**/

define('HOME_URL','http://localhost/demo/themeforest/',true);

$dsn	= 	"mysql:dbname=".DB_NAME.";host=".DB_HOST."";
$pdo	=	"";
try {
	$pdo	=	new PDO($dsn, DB_USER, DB_PASSWORD);
}catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
$db 	=	new Database($pdo);
$mail	=	new PHPMailer;


/*
*** You can set SMTP if you want
*** Change below code as per your need
*/


$mail->IsSMTP();													// Set mailer to use SMTP
$mail->SMTPDebug	=	2;											// debugging: 1 = errors and messages, 2 = messages only
$mail->Host 		=	'https://mail.google.com/';								// Specify main and backup server
$mail->Port 		=	587;										// Set the SMTP port
$mail->SMTPAuth 	=	true;										// Enable SMTP authentication
$mail->Username 	=	'leon.da.eg@gmail.com';							// SMTP username
$mail->Password 	=	'erick2109@@@';								// SMTP password
$mail->SMTPSecure	=	'tls';										// Enable encryption, 'ssl' also accepted


Class Connection{
 

	//private $server = "mysql:host=localhost;dbname=njshqszh_proyecto";
	//private $username = "njshqszh_root";
	//private $password = "erick2109@@@";
	///////
	private $server = "mysql:host=localhost;dbname=proyecto";
	private $username = "root";
	private $password = "";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;
 	
	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "Hubo un problema con la conexión: " . $e->getMessage();
 		}
 
    }
 
	public function close(){
   		$this->conn = null;
 	}
 
}
