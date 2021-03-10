<?php 
/*=============================================================================
					CÓDIGO Julio Antonio
==============================================================================*/

/*-----------------------------------------------------------------------------
							Registro Usuario
-------------------------------------------------------------------------------*/
 ?>
 <div class="container col-8 secdiv">
<h1>Registro Miembro Nuevo</h1>

<form method="post" onsubmit="return validarPersona()" enctype="multipart/form-data">
<div class="mb-3">
<div class="row">
<div class="col-xs-12 col-md-6">
	<div class="mb-3">
	<img src="views/imagen/usuario.png" style="height: 200px; width:200px;">
	<div class="file-select" id="src-file1" >
  <input type="file" name="fotoc" aria-label="Archivo">
  </div>
</div>
</div>	
<div class="col-xs-12 col-md-6">
	<div class="mb-3">
	<font face="Monaco" size="5px"><label for="lfecha" class="col-form-label">Fecha de nacimiento</label></font>
<input class="form-control cimp" type="date" name="fecha" id="fecha" required>	
	</div>
	<div class="mb-3">
		<center>
<font face="Monaco" size="5px">
		<label class="col-form-label">Género</label><br>
	</font>
	<font face="Monaco" size="4px">
<input type="radio" name="genero" value="Masculino">Masculino
<input type="radio" name="genero" value="Femenino">Femenino
</font>
	</center></div>
</div>
</div>
</div>
<div class="mb-3">
	<div class="row">
		<div class="col-xs-12 col-md-4">
		<font face="Monaco" size="5px"><label for="lnombre" class="form-label">Nombre(s)</label></font>
<input class="form-control cimp" type="text" name="nombre" id="nombre" required>	
		</div>
		<div class="col-xs-12 col-md-4">
		<font face="Monaco" size="5px"><label for="lapp" class="form-label">Apellido Paterno</label></font>
<input type="text" class="form-control cimp" name="app" id="app" required>	
		</div>
		<div class="col-xs-12 col-md-4">
		<font face="Monaco" size="5px"><label for="lapm" class="col-form-label">Apellido Materno</label></font>
<input class="form-control cimp" type="text" name="apm" id="apm" required>	
		</div>
	</div>
</div>


<div class="mb-3">
<div class="row">
	<div class="col-xs-12 col-md-6">
<font face="Monaco" size="5px"><label for="lcel" class="col-form-label">Celular</label></font>
<input type="text" class="form-control cimp" name="cel" id="cel" maxlength="10" minlength="10" required>
</div>
<div class="col-xs-12 col-md-6">
<font face="Monaco" size="5px"><label for="ltel" class="col-form-label">Teléfono fijo</label></font>
<input class="form-control cimp" type="text" name="tel" id="tel" maxlength="10" minlength="10" required>
</div>
</div>	
</div>
<center>
<font face="Monaco" size="5px">
<input type="submit" value="Registrar"  class="btn btn-info bcan">
<input type="reset" value="Cancelar" class="btn btn-info bcan" >
                
</font>
</center>
</form><br>
</div>
<?php

$registro = new MvcController();
$registro -> registroPersonaController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}else if ($_GET["action"] == "error") {
		?>
 <script type="text/javascript">alert("No se ha podido registrar intentelo de nuevo");</script><?php
	}

	else if($_GET["action"] =="regDireOk"){
			?>
 <script type="text/javascript">alert("Registroso exitoso");</script><?php	
	}

}

?>
<?php 
/*=============================================================================
					
==============================================================================*/

/*-----------------------------------------------------------------------------
							Fin Codigo Julio
-------------------------------------------------------------------------------*/
 ?>