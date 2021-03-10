<?php 
if(isset($_SESSION["admon"])||isset($_SESSION["capturista"])){
header("location:index.php?action=logueado");
}
 ?>
 <section class="banner">
 <div class="box">
             <font face="Cambria"><h1 class="display-2 focol"><span class="sge">SGE</span></h1> 
                <h1 class="display-3 focol">Sistema de Geolocalización Electoral</h1></font>
             <p>Encuentra, ubica y gestiona la información de tus afiliados.
             </p>
             <div class="link">
            <a href="index.php?action=login">Iniciar Sesión</a>
                
            </div>
</div> 
<div class="derecha" id="map">

</div>  
</section>
    

    