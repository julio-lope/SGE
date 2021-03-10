<center>
<div class="container col-8 secdiv" >
<form method="post" onsubmit="return validarLogin()">
  <div class="mb-3" align="center">
    <img src="views/imagen/login.png" style="height: 250px; width: 250px;">
  </div>
      <div class="mb-3">
    <label for="usuarioLogin" class="form-label">Usuario</label>
    <input type="email" placeholder="usuario@correo.com" class="form-control ctex" id="usuarioLogin" name="usuarioLogin" required>
    <div id="emailHelp" class="form-text ">Sus datos no serán revelados en ningún lado.</div>
  
  </div>
  <div class="mb-3">
    <label for="passwordLogin" class="form-label">Password</label>
    <input type="password" class="form-control ctex" id="passwordLogin" name="passwordLogin" placeholder="******" required>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" name="terminos" id="terminos">
    <label class="form-check-label" for="terminos"><a href="views/pdf/AvisoPrivacidad.pdf" target="_blank">Aviso de privacidad</a></label>
  </div>
  <button type="submit" class="btn btn-info bcan">Ingresar</button>
</form>
<br>
</div>									 
	</center>													
	<?php 
	$ingreso = new MvcController();
	$ingreso -> loginController();
	if(isset($_GET["action"])){
	if($_GET["action"] == "falloLogin"){?>
		<script type="text/javascript">alert("Usuario ó contraseña inválidos");</script>
<?php  	 }
}
	 ?>
