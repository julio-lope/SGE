<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Reporte</title>
</head>
<body class="container"  id="cuerpo">
    <section id="repor" style="background-image: url(mapa.jpg); " class="col-md-12">
    <div class="row " style="height: 50px;">
        <div class="col-md-3"> <img src="ingeca.jpg" alt="ingeca" style="height: 10%;"></div>
        <div class="col-md-7"> <h3>Reporte de Personas</h3></div>
    </div>
    <button onclick="test()" class="btn btn-primary" style="margin-top: 10px;margin-bottom: 10px;">Generar PDF</button>
    <div class="row col-md-11" style="margin-left: 50px;">
        <table class="table table-bordered border-primary col-md-10">
        <tr>
            <th class="col-md-2">Nombre</th>
            <th class="col-md-4">Dirección</th>
            <th class="col-md-1">Genero</th>
            <th class="col-md-1">Fecha de nacimiento</th>
            <th class="col-md-2">Telefonos de contacto</th>
            </tr>
            <?php
            $mvc = new MvcController();
            $dato = $mvc->reporte(); 
            ?>
        </table>
    </div>
    </section>
    <script src="views/js/html2pdf.bundle.min.js"></script>
</body>
</html>

<?php
?>
