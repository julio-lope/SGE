<?php 

if(!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])){
	header("location:index.php?action=login");
}

?>
<div class="container col-8 secdiv">

<h1>Secciones</h1>
<form method="post" onsubmit="return validarRegSec()">
	<div class="mb-3">
	<label for="municipiosSec" class="col-form-label">Municipios</label>
	<select id="municipiosSec" name="municipiosSec" class="form-control cimp">
		<option value="sel">[Selecciona]</option>
<?php $municipioss = new MvcController();
		$municipioss->consultarMunicipiosControllerSec();?>
	</select>
	</div>
	<div class="mb-3">
	<label for="seccionsSec" class="col-form-label">Sección</label>
	<input type="number" class="form-control cimp" id="seccionsSec" name="seccionsSec" required>
	</div>
	<input type="submit" value="Registrar Seccion" class="btn btn-info bcan">
</form>
<br>

<div class="tabdi">
    <h2>Secciones Existentes</h2>
<table class="table" align="center">
    <thead >
    <th scope="col">Secciones</th>
    <th scope="col">Acción</th>
    </thead>
    <tbody>
    	
    <?php $sec = new MvcController();
		$sec->mostrarSeccionesController();
	 ?>	
    </tbody>
</table>

</div>
<br>
</div>

	<?php

$reg = new MvcController();
$reg->registrarSeccionesController();



	if(isset($_GET["action"])){
		if($_GET["action"]=="seccionOk"){
			?><script type="text/javascript">alert("Registro Exitoso");</script><?php
		}else if($_GET["action"]=="seccionError"){
			?><script type="text/javascript">alert("Error al registrar");</script><?php
		}
		else if($_GET["action"]=="seccionEditOk"){
			?><script type="text/javascript">alert("Edición Exitosa");</script><?php
		}
		else if($_GET["action"]=="seccionEditError"){
			?><script type="text/javascript">alert("Error al editar");</script><?php
		}
		else if($_GET["action"]=="seccionDeleteOk"){
			?><script type="text/javascript">alert("Operación exitosa");</script><?php
		}
		else if($_GET["action"]=="seccionDeleteError"){
			?><script type="text/javascript">alert("Error al eliminar");</script><?php
		}
	}



 ?>




<script type="text/javascript">
	function validarBoton(){
		 var opcion = confirm("¿Está seguro de eliminar esta sección?");
    if (opcion == true) {
        return true;
	} else {
	    return false;
	}
	}
</script>

