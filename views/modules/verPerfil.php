<?php 
if(!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])){
	header("location:index.php?action=login");
}


$perfil = new MvcController();
$perfil->mostrarPerfilPersona($_GET["id_persona"]);

 ?>


