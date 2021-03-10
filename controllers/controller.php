<?php 

ob_start(); //Linea para el problema de headers
	class MvcController{
		#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}


/*=============================================================================
				CÓDIGO PABLO HERNÁNDEZ MAGNI
==============================================================================*/



/*-----------------------------------------------------------------------------
							Función Login 
-------------------------------------------------------------------------------*/
	public function loginController(){
		if(isset($_POST["usuarioLogin"]) && isset($_POST["passwordLogin"])){
			$datos = array("usuario"=>$_POST["usuarioLogin"],"password"=>$_POST["passwordLogin"]);
			$respuesta = Datos::LoginModel($datos,"usuarios");
			if($respuesta["correo"] == $_POST["usuarioLogin"] && $respuesta["password"] == $_POST["passwordLogin"]){
				if($respuesta["type_user"] == 1){
					$_SESSION["admon"] = true;
					$_SESSION["usuario"] = $respuesta["correo"];
					header("location:index.php?action=logueado");
				}else if($respuesta["type_user"] ==0){
					$_SESSION["capturista"] = true;
					$_SESSION["usuario"] = $respuesta["correo"];
					header("location:index.php?action=logueado");
				}
			}else{
				header("location:index.php?action=falloLogin");
			}
		}
	}
/*------------------------------------------------------------------------------
							Fin función Login
-------------------------------------------------------------------------------*/




/*------------------------------------------------------------------------------
						Función para consultar Municipios
-------------------------------------------------------------------------------*/

public static function consultarMunicipiosController(){
	$municipios= Datos::municipio();
	foreach($municipios as $fila) {
		print '<tr><td>'. utf8_encode($fila[2]).'</td></tr>
		<th>
		<td><a href="index.php?action=editarMuni&id_municipio='.$fila[0].'"><button class="btn btn-info bcan">Editar</button></a></td>
		<td><a href="index.php?action=eliminarMuni&id_municipio='.$fila[0].'"><button class="btn btn-info bcan"  onclick="return validarBoton()">Eliminar</button></a></td>
		</th>
		';
		
	}
} 


//Consultar Municipios para secciones
public static function consultarMunicipiosControllerSec(){
	$municipios= Datos::municipio();
	foreach($municipios as $fila) {
		print "<option value=".$fila[0].">".$fila[2]."</option>";		
	}
} 









/*------------------------------------------------------------------------------
							Fin consultar Municipios
-------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------
							Registrar Municipios
-------------------------------------------------------------------------------*/

public static function registrarMunicipioController(){
	if(isset($_POST["claveReg"]) && isset($_POST["municipioReg"])){
	$datos = array("clave"=>$_POST["claveReg"],"municipio"=>$_POST["municipioReg"]);
	$respuesta = Datos::registrarMunicipioModel($datos,"municipio");
	if($respuesta =="Registro Exitoso"){
		header("location:index.php?action=municipioOk");
	}else if($respuesta =="Error"){
		header("location:index.php?action=municipioError");
	}

}
}

/*------------------------------------------------------------------------------
							Fin Registrar Municipios
-------------------------------------------------------------------------------*/



/*------------------------------------------------------------------------------
							Validar  Clave Municipio con Ajax
-------------------------------------------------------------------------------*/

public static function validarClaveController($validarClave){
	$datos = $validarClave;
	$respuesta = Datos::validarClaveModel($datos,"municipio");
	if(isset($respuesta["clave"])){
		echo 0;
	}else{
		echo 1;
	}
}


/*------------------------------------------------------------------------------
							Fin Validar Clave Municipio con Ajax
-------------------------------------------------------------------------------*/



/*------------------------------------------------------------------------------
							Validar  Municipio con Ajax
-------------------------------------------------------------------------------*/

public static function validarMunicipioController($validarMunicipio){
	$datos = $validarMunicipio;
	$respuesta = Datos::validarMunicipioModel($datos,"municipio");
	if(isset($respuesta["municipio"])){
		echo 0;
	}else{
		echo 1;
	}
}


/*------------------------------------------------------------------------------
							Fin Validar  unicipio con Ajax
-------------------------------------------------------------------------------*/


/*------------------------------------------------------------------------------
							Registrar Sección
------------------------------------------------------------------------------*/
	public static function registrarSeccionesController(){
		if(isset($_POST["municipiosSec"])&& isset($_POST["seccionsSec"])){
		$datos = array("municipio"=>$_POST["municipiosSec"],"seccion"=>$_POST["seccionsSec"]);
		$respuesta = Datos::registrarSeccionModel($datos,"seccion");
		if($respuesta =="Registro Exitoso"){
			header("location:index.php?action=seccionOk");
		}else if($respuesta =="Error"){
			header("location:index.php?action=seccionError");
		}
		
	}
	}
/*------------------------------------------------------------------------------
							Fin registrar Sección
------------------------------------------------------------------------------*/


/*------------------------------------------------------------------------------
							Validar Sección Ajax
------------------------------------------------------------------------------*/

public static function validarSeccionController($validarSeccion){
	$datos = $validarSeccion;
	$respuesta = Datos::validarSeccionModel($datos,"seccion");
	if(isset($respuesta["seccion"])){
		echo 0;
	}else{
		echo 1;
	}
}

/*------------------------------------------------------------------------------
							Fin Validar Sección Ajax
------------------------------------------------------------------------------*/


/*------------------------------------------------------------------------------
					Mostrar secciones
------------------------------------------------------------------------------*/

	public static function mostrarSeccionesController(){
		$respuesta = Datos::mostrarSeccionesModel("seccion");
		if(isset($respuesta)){
		foreach($respuesta as $fila) {
		print '<tr><td>'.$fila[2].'</td></tr>
		<br>
		<tr>
		<td><a href="index.php?action=editarSeccion&id_seccion='.$fila[0].'"><button class="btn btn-info bcan">Editar</button></a></td>
		<td><a href="index.php?action=eliminarSeccion&id_seccion='.$fila[0].'"><button class="btn btn-info bcan" onclick="return validarBoton()">Eliminar</button></a></td>
		</tr>
		';		
	}
	}else{
		print'No hay secciones disponibles';
	}
	}

/*------------------------------------------------------------------------------
				Fin Mostrar Secciones
------------------------------------------------------------------------------*/




/*------------------------------------------------------------------------------
					Consultar Colonias
------------------------------------------------------------------------------*/
public static function mostrarColoniasController(){
	$respuesta = Datos::mostrarColoniasModel("colonia");
	foreach($respuesta as $fila) {
		print '<tr><td>'.$fila[2].'</td></tr> <td><a href="index.php?action=editarColonia&id_colonia='.$fila[0].'"><button class="btn btn-info bcan" value="Editar">Editar</button></a></td>
		<td><a href="index.php?action=eliminarColonia&id_colonia='.$fila[0].'"><button class="btn btn-info bcan" onclick="return validaBoton()" value="Eliminar">Eliminar</button></a></td> ';		
	}
	}
/*------------------------------------------------------------------------------
					Fin consultar Colonias
------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------
					Registrar Colonias
------------------------------------------------------------------------------*/
public static function registrarColoniasController(){
	if(isset($_POST["municipioCol"]) && isset($_POST["coloniaReg"])){
		$datos = array("municipio"=>$_POST["municipioCol"],"colonia"=>$_POST["coloniaReg"]);
		$respuesta = Datos::registrarColoniasModel($datos,"colonia");
		if($respuesta ="Registro Exitoso"){
			header("location:index.php?action=coloniasOk");
		}else if($respuesta == "Error"){
			header("location:index.php?action=coloniasError");
		}
	}
}
/*------------------------------------------------------------------------------
					Fin Registrar Colonias
------------------------------------------------------------------------------*/


/*------------------------------------------------------------------------------
					Validar Colonia con Ajax
------------------------------------------------------------------------------*/

public static function validarColoniaController($validarColonia){
$datos = $validarColonia;
	$respuesta = Datos::validarColoniaModel($datos,"colonia");
	if(isset($respuesta["colonia"])){
		echo 0;
	}else{
		echo 1;
	}
}
/*------------------------------------------------------------------------------
					Fin Validar Colonia con Ajax
------------------------------------------------------------------------------*/


/*-------------------------------------------------------------------------------
					Consultar Colonia para Editar
-------------------------------------------------------------------------------*/
public static function consultarColoniaEsp($id_colonia){
	$respuesta = Datos::consultarColoniaEsp($id_colonia,"colonia");
	if($respuesta["id_colonia"]>0){
	print'<input class="form-control cimp" type="hidden" id="id_colonia" name="id_colonia" value="'.$respuesta["id_colonia"].'">
	<input class="form-control cimp" type="text" id="coloniaEdit" name="coloniaEdit" value="'.$respuesta["colonia"].'" required><br>
	'	
	;	
	}
}

/*-------------------------------------------------------------------------------
					Fin consultar colonia para editar
-------------------------------------------------------------------------------*/


/*-------------------------------------------------------------------------------
					Editar Colonia
-------------------------------------------------------------------------------*/
public static function editarColoniaController(){
	if(isset($_POST["coloniaEdit"])){
		$datos = array("id_colonia"=>$_POST["id_colonia"],"colonia"=>$_POST["coloniaEdit"]);
		$respuesta = Datos::editarColoniaModel($datos,"colonia");
		if($respuesta =="Edición exitosa"){
			header("location:index.php?action=coloniasEditOk");
		}else if($respuesta =="Error al editar"){
			header("location:index.php?action=coloniasEditError");
		}
	}
}
/*-------------------------------------------------------------------------------
					Fin editar colonia
-------------------------------------------------------------------------------*/



/*-------------------------------------------------------------------------------
					Eliminar colonia
-------------------------------------------------------------------------------*/
public static function eliminarColoniaController($id_colonia){
	$datos = $id_colonia;
	$respuesta = Datos::eliminarColoniaModel($datos,"colonia");
	if($respuesta =="Operacion exitosa"){
		header("location:index.php?action=coloniasDeleteOk");
	}else if($respuesta =="Error al eliminar"){
		header("location:index.php?action=coloniasDeleteError");
	}
}
/*-------------------------------------------------------------------------------
					Fin eliminar colonia
-------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------
						Consultar Municipio para editar
-------------------------------------------------------------------------------*/
public static function consultarMuniEsp($id_municipio){
	$datos = $id_municipio;
	$respuesta = Datos::consultarMuniEsp($datos,"municipio");
	if($respuesta["id_municipio"]>0){
		print'
		<div class="mb-3">
			<label for="claveEdit" class="col-form-label">Clave<span></span></label><br>
			<input type="hidden" id="id_municipio" name="id_municipio" value="'.$respuesta["id_municipio"].'">
			
			<input class="form-control cimp" type="text" id="claveEdit" name="claveEdit" value="'.$respuesta["clave"].'">
			</div>
			<div class="mb-3">
			<label for="municipioEdit" class="col-form-label">No. de sección<span></span></label><br>

			<input class="form-control cimp" type="text" id="municipioEdit" name="municipioEdit" value="'.$respuesta["municipio"].'"></div>
		';
	}
}
/*-------------------------------------------------------------------------------
						Fin consultar municipio para editar
-------------------------------------------------------------------------------*/





/*-------------------------------------------------------------------------------
					Editar Municipio
-------------------------------------------------------------------------------*/
public static function editarMunicipioController(){
	if(isset($_POST["claveEdit"]) && isset($_POST["municipioEdit"])){
		$datos = array("id_municipio"=>$_POST["id_municipio"],
			"clave"=>$_POST["claveEdit"],
			"municipio"=>$_POST["municipioEdit"]);
		$respuesta = Datos::editarMunicipioModel($datos,"municipio");
		if($respuesta =="muniEditOk"){
			header("location:index.php?action=muniEditOk");
		}else if($respuesta =="muniEditError"){
			header("location:index.php?action=muniEditError");
		}
	}
}
/*-------------------------------------------------------------------------------
					Fin editar municipio
-------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------
				Eliminar Municipio
-------------------------------------------------------------------------------*/
public static function eliminarMunicipioController($id_municipio){
	$datos = $id_municipio;
	$respuesta = Datos::eliminarMunicipioModel($datos,"municipio");
	if($respuesta =="muniDeleteOk"){
		header("location:index.php?action=muniDeleteOk");
	}else if($respuesta =="muniDeleteError"){
		header("location:index.php?action=muniDeleteError");
	}
}
/*-------------------------------------------------------------------------------
				Fin eliminar municipio
-------------------------------------------------------------------------------*/







/*-------------------------------------------------------------------------------
				Consultar Sección para editar
-------------------------------------------------------------------------------*/
public static function consultarSeccionEsp($id_seccion){
$datos = $id_seccion;
$respuesta = Datos::consultarSeccionEsp($datos,"seccion");
if($respuesta["id_seccion"]>0){
print'<input type="hidden" id="id_seccion" name="id_seccion" value="'.$respuesta["id_seccion"].'">
	<input class="form-control cimp" type="text" id="seccionEdit" name="seccionEdit" value="'.$respuesta["seccion"].'" required><br>
	'	
	;
}
}
/*-------------------------------------------------------------------------------
			Fin consultar sección para editar
-------------------------------------------------------------------------------*/

public static function editarSeccionController(){
if(isset($_POST["id_seccion"])&&isset($_POST["seccionEdit"])){
$datos = array("id_seccion"=>$_POST["id_seccion"],"seccion"=>$_POST["seccionEdit"]);
$respuesta = Datos::editarSeccionModel($datos,"seccion");
if($respuesta =="seccionEditOk"){
	header("location:index.php?action=seccionEditOk");
}else if($respuesta == "seccionEditError"){
	header("location:index.php?action=seccionEditError");
}
}
}
/*-------------------------------------------------------------------------------
			Editar Sección
-------------------------------------------------------------------------------*/



/*-------------------------------------------------------------------------------
							Fin editar sección
-------------------------------------------------------------------------------*/





/*-------------------------------------------------------------------------------
						Eliminar Sección
-------------------------------------------------------------------------------*/
public static function eliminarSeccionController($id_seccion){
	$datos = $id_seccion;
	$respuesta = Datos::eliminarSeccionModel($datos,"seccion");
	if($respuesta =="seccionDeleteOk"){
		header("location:index.php?action=seccionDeleteOk");
	}else if($respuesta == "seccionDeleteError"){
		header("location:index.php=action=seccionDeleteError");
	}
}
/*-------------------------------------------------------------------------------
						Fin eliminar sección
-------------------------------------------------------------------------------*/



/*-------------------------------------------------------------------------------
				Consultar id persona
-------------------------------------------------------------------------------*/
public static function consultarIdPersona(){
	 $id_persona = Datos::consultarIdPersona("persona");
	 print $id_persona[0];
}
/*-------------------------------------------------------------------------------
			Fin consultar id persona
-------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------
							Registrar Direccion
-------------------------------------------------------------------------------*/
public static function registrarDireccionController(){
	if(isset($_POST["id_persona"]) && isset($_POST["calle"])){
		$datos = array(
			"id_persona"=>$_POST["id_persona"],
			"calle"=>$_POST["calle"],
			"localidad"=>$_POST["localidad"],
			"id_colonia"=>$_POST["colonia"],
			"noext"=>$_POST["n_e"],
			"noint"=>$_POST["n_i"],
			"cpostal"=>$_POST["cp"],
			"latitud"=>$_POST["latitud"],
			"longitud"=>$_POST["longitud"]
		);
		$respuesta = Datos::registrarDireccionModel($datos,"direccion");
		if($respuesta =="regDireOk"){
			header("location:index.php?action=regDireOk");
		}else if($respuesta =="regDireError"){
			header("location:index.php?action=regDireError");
		}

		
	}
}
/*-------------------------------------------------------------------------------
							Fin registrar Direccion
-------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------
						Consultar Colonias
-------------------------------------------------------------------------------*/
public static function consultarColoniasController(){
$respuesta = Datos::consultarColoniasModel("colonia");
foreach($respuesta as $fila) {
print'
<option value="'.$fila[0].'">'.$fila[2].'</option>
';
}
}
/*-------------------------------------------------------------------------------
					Fin consultar perfil persona
-------------------------------------------------------------------------------*/
public static function mostrarPerfilPersona($id_persona){
	$datos = $id_persona;
	$respuesta = Datos::mostralPerfilPersona($datos,"persona","direccion","colonia");
	print'

	<form>
	 <div class="container col-8 secdiv">
	 <div class="row" >
	 <center>
	 <h1>Datos Generales </h1>
	 </center>
	 <div class="col-xs-12 col-md-6">
	 <center>
    <img src=views/modules/imagen/fotos/'.$respuesta["foto"].' style="width: 300px; height: 300px"><br>
	
	
	<font face="Times" color="#fff"><label><h2>'.$respuesta["nombre"].' '.$respuesta["app_pat"].' '.$respuesta["app_mat"].'</h2></label></font>
	</center>
	</div>

	<div class="col-xs-12 col-md-6">
	<div class="container col-auto divsec">

	<label><b>Género:</b> '.$respuesta["genero"].'</label><br>
	<label><b>Fecha de nacimiento:</b> '.$respuesta["fecha_nac"].'</label><br>
	

	<label><b>Teléfono celular:</b> '.$respuesta["tel_cel"].'</label><br>
	<label><b>Teléfono fijo:</b> '.$respuesta["tel_fijo"].'</label><br>
	<b>Dirección</b>
	<label><b>Calle '.$respuesta["calle"].' No. int '.$respuesta["no_interior"].' No. ext '.$respuesta["no_exterior"].'
	 Localidad '.$respuesta["localidad"].', Col.'.$respuesta["colonia"].' </label><br></b>
	</div>
	</div>
	 </div>
	 <br>
	 <div>
	 <center>
	 <iframe src="views/Mapa/1.php" style="width: 100%; height: 500px; border: none;" id="frame"></iframe> 
	 </center>
	 <br>
	 <br>
	 </div>




<br>





</div>

	</form>

	';

}
/*-------------------------------------------------------------------------------
					Fin consultar perfil persona
-------------------------------------------------------------------------------*/



/*=============================================================================
				FIN CÓDIGO PABLO HERNÁNDEZ MAGNI
=============================================================================*/
		
/*=============================================================================
				CÓDIGO Julio Antonio
==============================================================================*/



/*-----------------------------------------------------------------------------
							Función Registra Persona
-------------------------------------------------------------------------------*/
	public function registroPersonaController(){

		if(isset($_POST["nombre"])){

		
			/*-Código Pablo Hernández Magni para subir fotos-*/

				$target_dir ="./views/modules/imagen/fotos/";
				$target_file = $target_dir.basename($_FILES["fotoc"]["name"]);
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$uploadOk = 1;
				move_uploaded_file($_FILES["fotoc"]["tmp_name"], $target_file);
				
			        /*-Fin Código para subir fotos-*/

			$datosController = array( "npersona"=>$_POST["nombre"], 
								      "appersona"=>$_POST["app"],
								      "ampersona"=>$_POST["apm"],
								      "gpersona"=>$_POST["genero"],
								      "fpersona"=>$_POST["fecha"],
								      "cpersona"=>$_POST["cel"],
								      "tpersona"=>$_POST["tel"],
								      "foto"=> basename($_FILES["fotoc"]["name"])
								  );

			$respuesta = Datos::registroPersonaModel($datosController, "persona");

			if($respuesta == "success"){

				header("location:index.php?action=registrarDireccion");

			}

			else{

				header("location:index.php?action=error");
			}


		}

	}

/*=============================================================================
				INICIO CÓDIGO ENRIQUE
=============================================================================*/

// tabla de personas
public function muestraPersonas(){
	$arrayPersonas= Datos::tablaPersonas();
	foreach($arrayPersonas as $fila) {
		print "<tr>";
		print "<td scope='col'>".$fila[0]."</td>";
		print "<td scope='col'>".$fila[1]."</td>";
		print "<td scope='col'>".$fila[2]."</td>";
		print "<td scope='col'>".$fila[3]."</td>";
		print "<td scope='col'>".$fila[4]."</td>";
		print "<td scope='col'><a href=index.php?action=verPerfil&id_persona=".$fila[5]."><button class='btn btn-info bcan'>Ver Perfil</button></a></td>";
		print "<td scope='col'><a href=index.php?action=elimina&Persona=".$fila[5]."><button class='btn btn-info bcan'>Eliminar</button></a></td>";
		print "<td scope='col'><a href=index.php?action=afilia&persona=".$fila[5]."><button class='btn btn-info bcan'>Registrar</button></a></td>";
		print "</tr>";
	}
	
}
//-----------------------Muestra las jerarquias----------------------
public function muestraJerarquia(){
	$arrayPersonas= Datos::jerarquia();
	foreach($arrayPersonas as $fila) {
		print "<option value=".$fila[0].">".$fila[1]."</option>";
		
	}
	
}
// --------------------muestra las secciones
public function muestraSeccion(){
	$arrayPersonas= Datos::seccion();
	foreach($arrayPersonas as $fila) {
		print "<option value=".$fila[0].">".$fila[2]."</option>";
		
	}
	
}
//--------------Registro de afiliados
public function registroMiembroController(){
	if(isset($_POST['distrito'])){// si la variables está vacia no hace nada
		$usuario=$_POST['persona'];
		$respuesta=Datos::consultarMiembroModel($usuario,'miembro');
		if(count($respuesta)<1){
			$datos=array(
				"persona"=>$_POST['persona'],
				"jerarquia"=>$_POST['jerarquia'],
				"seccion"=>$_POST['seccion'],
				"folio"=>$_POST['folio'],
				"claveE"=>$_POST['clave_e'],
				"folioINE"=>$_POST['folio_ine'],
				"distrito"=>$_POST['distrito']

			);
			Datos::registroMiembroModel($datos,"miembro");
			//print_r($datos);
			
		}else{
			echo "La persona ya es miembro registrado";
		}
	}
}

//--------------------Consulta de municipios
public static function consultarMunicipioController(){
	$arrayPersonas= Datos::municipio();
	foreach($arrayPersonas as $fila) {
		print "<option value=".$fila[0].">".$fila[2]."</option>";
		
	}
} 

//--------------------Consulta info de personas para el formulario

public static function consultarPersonaController(){
	$persona=$_GET['Persona'];
	if(isset($persona)){
		$arrayDatos= Datos::consultarPersonaModel($persona,'persona');
		$arrayDatos1= Datos::consultarDireccionModel($persona);
		for($i=0; $i<9;$i++)
			array_push($arrayDatos,$arrayDatos1[$i]);

		return $arrayDatos;

	}else{// Si no hay persona re direcciona a la parte de personas
		header("location:index.php?action=personas");
	}
}

public static function editarPersonaController(){
			if(isset($_POST['persona']) && isset($_POST['nombre'])){// si la variables está vacia no hace nada
			//error_reporting(0);
			$datos=array(
				"persona"=>$_POST['persona'],
				"nombre"=>$_POST['nombre'],
				"paterno"=>$_POST['app_pat'],
				"materno"=>$_POST['app_mat'],
				"sexo"=>$_POST['genero'],
				"fecha"=>$_POST['fecha_nac'],
				"cel"=>$_POST['tel_cel'],
				"fijo"=>$_POST['tel_fijo']
			);

			Datos::actualizaPersonaModel($datos,"persona");
			header("location:index.php?action=edita&Persona=".$_POST['persona'] );
			//print_r($datos);
		}
		
} 

public static function editarDireccionController(){
	if(isset($_POST['calle']) && isset($_POST['localidad'])){// si la variables está vacia no hace nada
		//error_reporting(0);
		$datos=array(
			"persona"=>$_POST['persona'],
			"calle"=>$_POST['calle'],
			"localidad"=>$_POST['localidad'],
			"colonia"=>$_POST['colonia'],
			"ne"=>$_POST['n_e'],
			"ni"=>$_POST['n_i'],
			"municipio"=>$_POST['municipio'],
			"cp"=>$_POST['cp'],
			"latitud"=>$_POST['latitud'],
			"longitud"=>$_POST['longitud']
		);

		Datos::actualizaDireccionModel($datos,"direccion");
		header("location:index.php?action=edita&Persona=".$_POST['persona'] );

		//print_r($datos);
	}
}
public static function consultarMunicipio($muni){
	if (isset($muni)) {
		$arrayPersonas= Datos::unMunicipio($muni);
		for($i=0;$i<1; $i++) {
			echo $arrayPersonas[0];
		}
	}
	
}

public static function muestraColonias(){

}

public static function eliminaPersona($persona){//Recibe el id de persona para eliminar de la base de datos
	if (isset($persona)) {
		Datos::eliminaPersonaModel($persona,"persona");
		print "<script> alert('Se eliminó correctamente'); location.replace('index.php?action=personas') </script>";
	}
}

public static function muestraCapturista(){
	$arrayPersonas= Datos::tablaUsuarios();
	foreach($arrayPersonas as $fila) {
		print "<tr>";
		print "<td>".$fila[1]."</td>";
		print "<td>".$fila[2]."</td>";
	}
}

public static function insertaCapturista(){
	if(isset($_POST['mail'])){
		$correo = $_POST['mail'];
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		if($pass1 != $pass2){
			echo "Las contraseñas no coinciden ".$pass1." no = ".$pass2;
		}else{
			$datos = array('mail'=>$correo,'pass'=>$pass1);
			Datos::ingresaCapturistaModel($datos,"usuarios");
			echo "<script> alert('Registro exitoso'); </script>";
		}
	}
}

public static function reporte(){
	$numero = 0;
	$arrayPersonas= Datos::tablaPersonas();
		foreach($arrayPersonas as $fila) {
			$direccion = Datos::buscaDireccion($fila[5]);
			for ($i=0; $i <count($fila) ; $i++) { 
				$numero = $i;
				if ($numero%2==0) {
					print "<tr class='table-active'>";
				}else{
					print "<tr>";
				}			
			}
			
			print "<td>".$fila[0]."</td>";
			echo "<td>".$direccion."</td>";
			print "<td>".$fila[1]."</td>";
			print "<td>".$fila[2]."</td>";
			print "<td>Celular:".$fila[3]."\n Fijo:".$fila[4]."</td>";
			print "</tr>";
		}
}
/*=============================================================================
			FIN CÓDIGO ENRIQUE
=============================================================================*/
}//Fin de la clase MvcController
 ?>

