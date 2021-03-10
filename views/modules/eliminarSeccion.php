<?php 
if(!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])){
	header("location:index.php?action=login");
}
if(isset($_GET["id_seccion"])){
	$eliminaSec = new MvcController();
	$eliminaSec->eliminarSeccionController($_GET["id_seccion"]);
}
 ?>
