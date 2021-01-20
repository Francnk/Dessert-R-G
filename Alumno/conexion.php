<?php 
		function conexion(){
			
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