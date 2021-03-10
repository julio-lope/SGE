<?php 

if(!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])){
	header("location:index.php?action=login");
}

$registros = new MvcController();
 ?>

<div class="container col-8 secdiv">
<h1>Municipios</h1>
<h2>Registrar nuevo municipio</h2>
<form method="post" onsubmit="return validarRegMuni()">
	<div class="mb-3">
	<label for="municipioReg" class="col-form-label">Municipio <span></span></label>
	<input type="text" id="municipioReg" name="municipioReg" class="form-control cimp" required>
	</div>
	<div class="mb-3">
	<label for="claveReg" class="col-form-label">Clave <span></span></label>
	<input type="number" id="claveReg" name="claveReg" class="form-control cimp" required>
	</div>
	<input type="submit" value="Registrar" class="btn btn-info bcan">
</form>
<br>
<div class="tabdi">
<h2>Municipios existentes</h2>
<table class="table" align="center">
	<thead >
    <th scope="col">Nombre Municipio</th>
    <th scope="col">Acción</th>
    </thead>
	<tbody>
<?php $registros->consultarMunicipiosController(); ?>
</tbody>
</table>
</div>
<br>
</div>
<?php 

$municipio = new mvcController();
$municipio->registrarMunicipioController();


if(isset($_GET["action"])){
	if($_GET["action"]=="municipioOk"){
		?><script type="text/javascript">alert("Registro Exitoso");</script>
		<?php
	}else if($_GET["action"]=="municipioError"){
		?><script type="text/javascript">alert("Error al registrar el municipio");</script><?php
	}

	else if($_GET["action"]=="muniEditOk"){
		?><script type="text/javascript">alert("Editado exitosamente");</script><?php
	}

	else if($_GET["action"]=="muniEditError"){
		?><script type="text/javascript">alert("Error al editar el municipio");</script><?php
	}

	else if($_GET["action"]=="muniDeleteOk"){
		?><script type="text/javascript">alert("Operación exitosa");</script><?php
	}

	else if($_GET["action"]=="muniDeleteError"){
		?><script type="text/javascript">alert("Error al eliminar el municipio");</script><?php
	}
}
 ?>


 <script type="text/javascript">
	function validarBoton(){
		 var opcion = confirm("¿Está seguro de eliminar este municipio?");
    if (opcion == true) {
        return true;
	} else {
	    return false;
	}
	}
</script>

