<?php 

class Conexion{

	public static function conectar(){

	//$link = new PDO("mysql:host=node57014-systemsgev2.jl.serv.net.mx;dbname=systemsgev2","root","RHBtgn83817");
	$link = new PDO("mysql:host=localhost;dbname=systemsgev2","root","");
	
		return $link;
	
	}
}



 ?>