<?php 

if(!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])){
	header("location:index.php?action=login");
}
if(isset($_GET["id_colonia"])){
$eliminaColonia = new MvcController();
$eliminaColonia->eliminarColoniaController($_GET["id_colonia"]);
}
 ?>