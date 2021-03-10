<div class="container secdiv">
    <div class="tabdi">
<div class="row">
    <div class="col-xs-12 col-md-12">
        <center>
<table class="table" align="center">
    <th scope="col">Nombre Completo</th>
    <th scope="col">Genero</th>
    <th scope="col">Fecha de nacimiento</th>
    <th scope="col">Teléfono móvil</th>
    <th scope="col">Teléfono fijo</th>
    <th colspan="3">Acción</th>
    <tbody>
    <?php
        $mvc = new MvcController();
        $mvc -> muestraPersonas();
    ?> <!--llama al controlador de personas  -->
    </tbody>
</table>
</center>
</div>
</div>
</div>
<br>
<div class="mb-3">
<button class="btn btn-outline-info bcan"><a href="index.php?action=reportes" style="color: #fff">Ver Reporte</a></button><br>
<label></label></div>
</div>