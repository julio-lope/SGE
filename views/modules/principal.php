<?php 
if(isset($_SESSION["admon"])){
	echo "Bienvenido,".$_SESSION["usuario"];
}else if(isset($_SESSION["capturista"])){
	echo "Bienvenido,". $_SESSION["usuario"];
}
if(!isset($_SESSION["admon"]) && !isset($_SESSION["capturista"])){
	header("location:index.php?action=login");
}
exit();
 ?>
