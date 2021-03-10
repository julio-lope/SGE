<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SGE V.2.0</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" type="text/css" href="views/css/estilo.css">
	<script src="views/js/jquery-3.0.0.min.js"></script>
	<script src="views/js/AjaxEnrique.js"></script>
	
</head>
<body class="fondo">
	<div class="container col-auto">
<?php
session_start();
include 'modules/top_bar.php';
?>
<?php include "modules/navegacion.php"; ?>
<section>
<?php 
$mvc = new MvcController();
$mvc -> enlacesPaginasController();
?>
</section>

<?php  
include "modules/footer.php"?>

<script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
<script src="views/Mapa/src/leaflet-search.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

<script type="text/javascript" src="views/js/validarLogin.js"></script>
<script type="text/javascript" src="views/js/validarPersona.js"></script>
<script type="text/javascript" src="views/js/validarMunicipio.js"></script>
<script type="text/javascript" src="views/js/validarSeccion.js"></script>
<script type="text/javascript" src="views/js/validarColonia.js"></script>
<script type="text/javascript" src="views/js/validarColoniaEdit.js"></script>
<script type="text/javascript" src="views/js/validarSeccionEdit.js"></script>
<script type="text/javascript" src="views/js/validarMunicipioEdit.js"></script>
<script type="text/javascript" src="views/js/validarLogin.js"></script>
<script type="text/javascript" src="views/css/map.js"></script>
</div>
</body>
</html>

