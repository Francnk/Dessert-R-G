

<?php 
		function conexion(){
			//$servidor="localhost";
			//$usuario="njshqszh_root";
			//$password="erick2109@@@";
			//$bd="njshqszh_proyecto";

			$servidor="localhost";
			$usuario="root";
			$password="";
			$bd="proyecto";

			$conexion=mysqli_connect($servidor,$usuario,$password,$bd);

			return $conexion;
		}
		/*if(conexion()){
			echo "conecto";
		}else{
			echo "no conecto";
		}
*/
 ?>