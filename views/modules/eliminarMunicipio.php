<?php 
if(!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])){
	header("location:index.php?action=login");
}
if(isset($_GET["id_municipio"])){
	$eliminaMunic = new MvcController();
	$eliminaMunic->eliminarMunicipioController($_GET["id_municipio"]);
}

 ?>