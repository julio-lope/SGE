
<nav class="navbar navbar-expand-lg navbar-light deg" >
	<div class="container-fluid">
	<ul class="navbar-nav me-auto mb-2 mb-lg-0">
	<li><a href="index.php?action=salir" class="nav-link"><h4><img src="views/imagen/logo.png" style="height: 100px; width: 100px;"></h4></a>
	</li>

	</ul>
	 <?php 

if (!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])) {
	echo "<a href='index.php'><font face='Lucida Bright' style='color: #fff '><h2 class='font-weight-light'>Bienvenido a SGE</h2></font></a>";
}else{
echo "<font face='Lucida Bright' style='color: #fff '><h2 class='font-weight-light'>Usuario: ".$_SESSION["usuario"]." | 
<path fill-rule='evenodd' d='M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z'/>
        <path fill-rule='evenodd' d='M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z'/>
      </svg> 
     <a href='index.php?action=salir' style='color: #fff '> Salir</a>
</h2></font>";	
}

 ?>
  </div>
</nav>
