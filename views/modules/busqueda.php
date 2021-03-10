<?php session_start();
if (!isset($_SESSION['usuario'])) {
	header('location:../../index.php?action=logueado');
}
	?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title>Busqueda</title>
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body class="fondo">
  <div class="container">
	<header>
<nav class="navbar navbar-expand-lg navbar-light deg" >
  <div class="container-fluid">
  <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
  <li><a href="../../index.php?action=salir" class="nav-link"><h4><img src="../../views/imagen/logo.png" style="height: 100px; width: 100px;"></h4></a>
  </li>
  </ul>
   <?php 

if (!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])) {
  echo "<a href='index.php'><h4 style='color: black;'>Bienvenido a SGE</h4></a>";
}else{
echo "<font face='Lucida Bright'><h2 class='font-weight-light' style='color: #fff '>Usuario: ".$_SESSION["usuario"]." | 
<path fill-rule='evenodd' d='M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z'/>
        <path fill-rule='evenodd' d='M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z'/>
      </svg> 
     <a href='../../index.php?action=salir'> Salir</a>
</h2></font>"; 
}

 ?>
  </div>
</nav>
<nav class="nave">
  <?php 
     if(!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])){ ?>
     
    <?php }else{ ?>
<ul class="nav nav-tabs nav-justified ">
  <li class="nav-item ">
    <a class="nav-link active" href="../../index.php?action=logueado">Inicio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../../index.php?action=persona">Personas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../../index.php?action=capturista">Capturistas</a>
  </li>
  <?php if(isset($_SESSION["admon"])){ ?>
  <li class="nav-item">
    <a class="nav-link" href="../../index.php?action=personas">Afiliar</a>
  </li>
  <?php } ?>
  <li class="nav-item">
    <a class="nav-link" href="../../views/modules/busqueda.php">Busqueda</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../../index.php?action=salir">Salir</a>
  </li>
  <?php } ?>
</ul>
</nav> <br>

	</header>

<div class="container col-8 secdiv">	
<h1>Mapas Generales</h1>

<div class='input-group mb-3'>
<div class='input-group-prepend'>
    <label  class='input-group-text dimp' for='inputGroupSelect01'>Tipo</label>
  </div><select class="form-control cimp" class='custom-select' id="lista1" name="lista1">
	<option value="0"> Seleccione una opción</option>
	<option value="1">Sección</option>
	<option value="2">Jerarquía</option>
	<option value="3">Municipio</option>
	<option value="4">Colonia</option>
	
</select>
</div>
<br>
 <div id="select2lista"></div>
 <iframe src="../Mapa/1.php" style="width: 100%; height: 500px; border: none;" id="frame"></iframe>
 </div><br>
 <footer class="text-center text-lg-start footer" style="background-color: #000; color: #fff" >
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: #000;">
    © 2021 Copyright:
    <a class="text-white" href="#">SGE</a>
  </div>
  <!-- Copyright -->
</footer>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
 <script src="../js/ShowMaps.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#lista1').val(0);
      recargarLista();

      $('#lista1').change(function() {
        recargarLista();
      });
    })
  </script>
  <script type="text/javascript">
    function recargarLista() {
      $.ajax({
        type: "POST",
        url: "datos.php",
        data: "opcion=" + $('#lista1').val(),
        success: function(r) {
          $('#select2lista').html(r);
        }
      });
    }
  </script>
  </div>
</body>
</html>


