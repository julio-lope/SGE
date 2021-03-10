<?php 
if(!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])){
	header("location:index.php?action=login");
}
 ?>

 <div class="container col-8 secdiv">
<h1>Colonias</h1>
 <form method="post" onsubmit="return validarRegCol()">
 	<div class="mb-3">
 	<label for="municipioCol"  class="col-form-label">Municipio</label>
 	<select id="municipioCol" name="municipioCol" class="form-control cimp">
 		<option value="sel">[Selecciona]</option>
 		<?php $muni = new MvcController();
		$muni->consultarMunicipiosControllerSec();?>

 	</select>
	</div>
	<div class="mb-3">
 	<label for="coloniaReg" class="col-form-label">Nombre de la colonia</label>
 	<input type="text" class="form-control cimp" id="coloniaReg" name="coloniaReg" required>
 	</div>
 	<input type="submit" name="Registrar Colonia" class="btn btn-info bcan">
	
 </form><br>


<div class="tabdi">
<h2>Colonias Existentes</h2>

<table class="table" align="center">
    <thead >
    <th scope="col">Colonia</th>
    <th scope="col">Acción</th>
    </thead>
	<tbody>
	<?php $col = new MvcController();
		$col->mostrarColoniasController();
	 ?>
	 </tbody>
</table>

</div>
<br>
</div>
 <?php

$registrarColonia = new MvcController();
$registrarColonia->registrarColoniasController();



	if(isset($_GET["action"])){
		if($_GET["action"]=="coloniasOk"){
			?><script type="text/javascript">alert("Registro Exitoso");</script><?php
		}else if($_GET["action"]=="coloniasError"){
			?><script type="text/javascript">alert("Error al registrar");</script><?php
		}else if($_GET["action"]=="coloniasEditOk"){
			?><script type="text/javascript">alert("Edición exitosa");</script><?php
		}else if($_GET["action"]=="coloniasEditError"){
			?><script type="text/javascript">alert("Error al editar");</script><?php
		
		}else if($_GET["action"]=="coloniasDeleteOk"){
			?><script type="text/javascript">alert("Operación Exitosa");</script><?php
		}else if($_GET["action"]=="coloniasDeleteError"){
			?><script type="text/javascript">alert("Error al eliminar");</script><?php
		}
	}



 ?>

 <script type="text/javascript">
 	
function validaBoton(){
    var opcion = confirm("¿Está seguro de eliminar esta colonia?");
    if (opcion == true) {
        return true;
	} else {
	    return false;
	}
}


 </script>
