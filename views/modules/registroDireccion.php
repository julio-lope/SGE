<?php 
if(!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])){
	header("location:index.php?action=login");
}
   ?>


   <form  method="POST">
    <div class="container col-8 secdiv" >
<h2> Registre su dirección</h2>
    <input type="hidden" value="<?php $id_persona = new MvcController(); 
    $id_persona->consultarIdPersona();?>" name="id_persona" id="id_persona">
<div class="mb-3">
    <div class="row">
        <div class="col-xs-12 col-md-4">
         <label class="col-form-label">Localidad</label><input class="form-control cimp" type="text" name="localidad" id="localidad" >   
        </div>
        <div class="col-xs-12 col-md-4">
         <label class="col-form-label">Colonia</label><select class="form-control cimp" name="colonia" id="colonia" ><option value="sel">[Seleccione]</option> 
            <?php $mvc = new MvcController();
            $mvc->consultarColoniasController(); ?>
    </select>   
        </div>
        <div class="col-xs-12 col-md-4">
           <label class="col-form-label">Calle</label><input class="form-control cimp" type="text" name="calle" id="calle" > 
        </div>
        
    </div>
    
</div>
<div class="mb-3">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <label class="col-form-label">N.Exterior</label><input class="form-control cimp" type="number" id="n_e" name="n_e">

        </div>
        <div class="col-xs-12 col-md-4">
            <label class="col-form-label">N.Interior</label><input class="form-control cimp" type="number" id="n_i" name="n_i">

        </div>
        <div class="col-xs-12 col-md-4">
            <label class="col-form-label">Código postal</label><input class="form-control cimp" type="text" name="cp" id="cp" >
        </div>
        
    </div>
</div>
<div class="mb-3">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <label class="col-form-label">Latitud</label><input class="form-control cimp" type="text" name="latitud" id="latitud" >
        </div>
        <div class="col-xs-12 col-md-6">
            <label class="col-form-label">Longitud</label><input class="form-control cimp" type="text" name="longitud" id="longitud">
        </div>
    </div>
</div>
<center>
<br> <input class="btn btn-info bcan" type="submit" value="Aceptar">
<input type="reset" value="Cancelar" class="btn btn-info bcan">
</center>
    </div>
</form><br>


<?php 
$regDire = new MvcController();
$regDire->registrarDireccionController();
 ?>


<?php  
 if(isset($_GET["action"])){
		if($_GET["action"]=="regDireError"){
			?><script type="text/javascript">alert("Error al registrar la dirección");</script><?php
		}
	}

	?>