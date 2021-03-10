<nav class="nave navbar-dark">
	<?php 
		 if(!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])){ ?>
		 
		<?php }else{ ?>
<ul class="nav navbar-dark nav-tabs nav-justified">
  <li class="nav-item">
    <a class="nav-link active" href="index.php?action=logueado">Inicio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?action=persona">Personas</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle show" data-bs-toggle="dropdown" role="button" href="index.php?action=secciones" aria-expanded="true">Agregar</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="index.php?action=secciones">Secciones</a></li>
      <li><a class="dropdown-item" href="index.php?action=colonias">Colonias</a></li>
      <li><a class="dropdown-item" href="index.php?action=municipioR">Municipios</a></li>
    </ul>
  </li>
  <?php if(isset($_SESSION["admon"])){ ?>
  <li class="nav-item">
    <a class="nav-link" href="index.php?action=personas">Afiliar</a>
  </li>


  
 <li class="nav-item">
    <a class="nav-link" href="index.php?action=capturista">Capturistas</a>
  </li>
  <?php } ?>
  <li class="nav-item">
    <a class="nav-link" href="views/modules/busqueda.php">Busqueda</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?action=salir">Salir</a>
  </li>
  <?php } ?>
</ul>
</nav> <br>
