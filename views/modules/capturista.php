<?php 
$mvc = new MvcController();

?>
<div class="container col-8 secdiv">
<form method="POST">
    <h1>Agregar capturista</h1><br>
    <div class="mb-3">
    <label for="mail" class="col-form-label">Ingresa un correo válido</label>
    <input class="form-control cimp" type="email" name="mail" id="mail" placeholder="Ejemplo:usuario@gmail.com" required>
    </div>
    <div class="mb-3">
    <label for="pass1" class="col-form-label">Ingresa una contraseña</label>
    <input class="form-control cimp" type="password" name="pass1" id="pass1" required>
    </div>
    <div class="mb-3">
    <label for="pass2" class="col-form-label">Ingresa nuevamente la contraseña</label>
    <input class="form-control cimp" type="password" name="pass2" id="pass2" required><br>
    </div>
    <input type="submit" value="Aceptar" class="btn btn-info bcan">
    <input type="reset" value="Cancelar" class="btn btn-info bcan">
</form><br>

<?php $mvc->insertaCapturista() ?>
<div class="tabdi">
    <h2>Capturistas Existentes</h2>
<table class="table" align="center">
    <thead >
    <th scope="col">E-mail</th>
    <th scope="col">Contraseña</th>
    </thead>
    <tbody>
    <?php
        $mvc -> muestraCapturista();
    ?> <!--llama al controlador de personas  -->
    </tbody>
</table>
</div>
<br>
</div>