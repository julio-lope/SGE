<?php 
if(!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])){
	header("location:index.php?action=login");
}

?>


<?php 
if(isset($_GET["id_colonia"])){
?>
<div class="container col-8 secdiv">
	<h1>Editar Colonia</h1>
<form method ="post" onsubmit="return validaEditCol()">
	<label class="col-form-label" for="coloniaEdit">Nombre de la colonia<span></span></label><br>
<?php $editaC = new MvcController();
$editaC->consultarColoniaEsp($_GET["id_colonia"]);

 ?>	
	<input type="submit" value="Editar" class="btn btn-info benv">
</form>
</div>
<?php

$edi = new MvcController();
$edi->editarColoniaController();
}else{
?>    
<h2>Ocurrió  un error</h2>
<br>
<a href="index.php?action=colonias"><button>Regresar</button></a>
<?php
}
 ?>
