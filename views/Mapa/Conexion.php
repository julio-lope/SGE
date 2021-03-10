<?php
$conexion = mysqli_connect('localhost','root', '','systemsge');

$conexion->query("SET NAMES 'utf8'");
if($conexion->connect_error){
	die('Error de(' . $conexion->connect_errno . ')' . $conexion->connect_error);
}else {
	//echo "conectado";
}
//Contador paginador

$record_per_page = 4;
$pagina = '';
if(isset($_GET["pagina"]))
{
 $pagina = $_GET["pagina"];
}
else
{
 $pagina = 1;
}

$start_from = ($pagina-1)*$record_per_page;

?>