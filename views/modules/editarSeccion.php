<?php 
if(!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])){
	header("location:index.php?action=login");
}

 ?>
<div class="container col-8 secdiv">
 <h1>Editar Sección</h1>

 <?php 
if(isset($_GET["id_seccion"])){
?>

<form method ="post" onsubmit="return validaEditSeccion()">
	<label class="col-form-label" for="seccionEdit">No. de sección<span></span></label><br>
<?php $editaS = new MvcController();
$editaS->consultarSeccionEsp($_GET["id_seccion"]);

 ?>	
	<input class="btn btn-info benv" type="submit" value="Editar">
</form><br>
</div>
<?php
$ediSec = new MvcController();
$ediSec->editarSeccionController();
}else{
?>    
<h2>Ocurrió  un error</h2>
<br>
<a href="index.php?action=secciones"><button>Regresar</button></a>
<?php
}
 ?>

