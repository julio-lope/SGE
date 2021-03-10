<?php 
if(!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])){
	header("location:index.php?action=login");
}
 ?>

 

  <?php 
if(isset($_GET["id_municipio"])){
?>
<div class="container col-8 secdiv">
	
<form method ="post" onsubmit="return validaMuniEdit()">
	<h1>Editar Municipio</h1>
<?php $editaM = new MvcController();
$editaM->consultarMuniEsp($_GET["id_municipio"]);

 ?>	
	<input class="btn btn-info benv" type="submit" value="Editar">
</form>
</div>
<?php
$ediMuni = new MvcController();
$ediMuni->editarMunicipioController();
}else{
?>    
<h2>Ocurrió  un error</h2>
<br>
<a href="index.php?action=municipioR"><button>Regresar</button></a>
<?php
}
 ?>

