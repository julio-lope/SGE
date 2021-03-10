<?php 
 
$mvc = new MvcController();
$dato = $mvc->consultarPersonaController();
?>
<html>
<div class="container col-8 secdiv">
<h1>Datos personales</h1>
<form action="" method="POST">
    <div class="mb-3">
    <input type="hidden" value="<?php echo $_GET['Persona'] ?>" name="persona" id="persona">
    <label class="col-form-label">Nombre</label>
    <input class="form-control cimp" type="text" name="nombre" id="nombre" value="<?php echo $dato['1'] ?>">
    </div>
    <div class="mb-3">
    <label class="col-form-label">Apellido paterno</label><input class="form-control cimp" type="text" name="app_pat" id="app_pat" value="<?php echo $dato['2'] ?>">
</div>
<div class="mb-3">
    <label class="col-form-label">Apellido materno</label><input class="form-control cimp" type="text" name="app_mat" id="app_mat" value="<?php echo $dato['3'] ?>"><br>
</div>
<div class="mb-3">
    <label class="col-form-label">Sexo</label><select class="form-control cimp" name="genero" id="genero" value="<?php echo $dato['4'] ?>"><option value="<?php echo $dato['4'] ?>"> <?php echo $dato['4'] ?></option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="otro">Otro</option>
    </select>
</div>
<div class="mb-3">
    <label class="col-form-label">Fecha de nacimiento</label><input class="form-control cimp" type="date" name="fecha_nac" id="fecha_nac" value="<?php echo $dato['5'] ?>">
</div>
<div class="mb-3">
    <label class="col-form-label">Teléfono celular</label><input class="form-control cimp" type="text" name="tel_cel" id="tel_cel" value="<?php echo $dato['6'] ?>">
</div>
<div class="mb-3">
    <label class="col-form-label">Teléfono fijo</label><input class="form-control cimp" type="text" name="tel_fijo" id="tel_fijo" value="<?php echo $dato['7'] ?>">
</div>
    <br> <input class="btn btn-info benv" type="submit" value="Aceptar">
</form>
<?php $mvc->editarPersonaController() ?>
<br><br><br>
<h1>Datos de Ubicación</h1>
<form action="" method="POST">
  <div class="mb-3">  
    <input type="hidden" value="<?php echo $_GET['Persona'] ?>" name="persona" id="persona">
    <label class="col-form-label">Calle</label><input class="form-control cimp" type="text" name="calle" id="calle" value="<?php echo $dato['8'] ?>">
</div>
<div class="mb-3">
    <label class="col-form-label">Localidad</label><input class="form-control cimp" type="text" name="localidad" id="localidad" value="<?php echo $dato['9'] ?>">
</div>
<div class="mb-3">
    <label class="col-form-label">Colonia</label><input class="form-control cimp" type="text" name="colonia" id="colonia" value="<?php echo $dato['10'] ?>"><br>
</div>
<div class="mb-3">
    <label class="col-form-label">N.Exterior</label><input class="form-control cimp" type="number" id="n_e" name="n_e" value="<?php echo $dato['11'] ?>">
</div>
<div class="mb-3">
    <label class="col-form-label">N.Interior</label><input class="form-control cimp" type="number" id="n_i" name="n_i" value="<?php echo $dato['12'] ?>">
</div>
<div class="mb-3">
    <label class="col-form-label">Municipio</label><select class="form-control cimp" name="municipio" id="municipio" ><option value="<?php echo $dato['13'] ?>"><?php echo $dato['13'] ?></option> 
            <?php $mvc->consultarMunicipioController() ?>
    </select>
</div>
<div class="mb-3">
    <label class="col-form-label">Código postal</label><input class="form-control cimp" type="text" name="cp" id="cp" value="<?php echo $dato['14'] ?>">
</div>
    <div class="mb-3">
    <label class="col-form-label">Latitud</label><input class="form-control cimp" type="text" name="latitud" id="latitud" value="<?php echo $dato['15'] ?>">
</div>
<div class="mb-3">
    <label class="col-form-label">Longitud</label><input class="form-control cimp" type="text" name="longitud" id="longitud" value="<?php echo $dato['16'] ?>">
</div>
    <br> <input class="btn btn-info benv" type="submit" value="Aceptar">
</form><br>
<?php $mvc->editarDireccionController() ?>
</div>
</html>