<?php 

require_once "../../controllers/controller.php";
require_once "../../models/crud.php";

class Ajax{
	public static function validaClaveAjax($validarClave){
		$respuesta = MvcController::validarClaveController($validarClave);
		echo $respuesta;
	}

	public static function validaMunicipioAjax($validarMunicipio){
		$respuesta = MvcController::validarMunicipioController($validarMunicipio);
		echo $respuesta;
	}


	public static function validaSeccionAjax($validarSeccion){
		$respuesta = MvcController::validarSeccionController($validarSeccion);
		echo $respuesta;
	}

	public static function validaColoniaAjax($validarColonia){
		$respuesta = MvcController::validarColoniaController($validarColonia);
		echo $respuesta;
	}
}

if(isset($_POST["validarClave"])){
$valida = new Ajax();
$valida -> validaClaveAjax($_POST["validarClave"]);
}

if(isset($_POST["validarMunicipio"])){
$municipio = new Ajax();
$municipio -> validaMunicipioAjax($_POST["validarMunicipio"]);
}

if(isset($_POST["validarSeccion"])){
$seccion = new Ajax();
$seccion-> validaSeccionAjax($_POST["validarSeccion"]);
}

if(isset($_POST["validarColonia"])){
$colonia = new Ajax();
$colonia-> validaColoniaAjax($_POST["validarColonia"]);
}