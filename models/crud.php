<?php 

require_once "Conexion.php";
 class Datos extends Conexion{

/*=============================================================================
					CÓDIGO PABLO HERNÁNDEZ MAGNI
==============================================================================*/

/*-----------------------------------------------------------------------------
							Función Login Model
-------------------------------------------------------------------------------*/
	public static function LoginModel($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla WHERE correo=:usuario and password=:password");
	$stmt->bindParam(":usuario",$datos["usuario"],PDO::PARAM_STR);
	$stmt->bindParam(":password",$datos["password"],PDO::PARAM_STR);
	$stmt->execute();
	return $stmt->fetch();
	$stmt->close();
	}
/*-----------------------------------------------------------------------------
						  Fin	Función Login Model
-------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------
							Registrar Municipios
-------------------------------------------------------------------------------*/
public static function registrarMunicipioModel($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla VALUES(null,:clave,:municipio)");
	$stmt->bindParam(":clave",$datos["clave"],PDO::PARAM_INT);
	$stmt->bindParam(":municipio",$datos["municipio"],PDO::PARAM_STR);
	if($stmt->execute()){
		return "Registro Exitoso";
	}else{
		return "Error";
	}
	$stmt->close();
}

/*------------------------------------------------------------------------------
						Fin	Registrar Municipios
-------------------------------------------------------------------------------*/




/*------------------------------------------------------------------------------
						Validar	clave Municipios con Ajax
-------------------------------------------------------------------------------*/

public static function validarClaveModel($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("SELECT clave from $tabla where clave=:clave");
	$stmt->bindParam(":clave",$datos,PDO::PARAM_INT);
	$stmt->execute();
	return $stmt->fetch();
	$stmt->close();
}

/*------------------------------------------------------------------------------
						Fin	Validar clave Municipios con Ajax
-------------------------------------------------------------------------------*/




/*------------------------------------------------------------------------------
						Validar	 Municipios con Ajax
-------------------------------------------------------------------------------*/

public static function validarMunicipioModel($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("SELECT municipio from $tabla where municipio=:municipio");
	$stmt->bindParam(":municipio",$datos,PDO::PARAM_STR);
	$stmt->execute();
	return $stmt->fetch();
	$stmt->close();
}

/*------------------------------------------------------------------------------
						Fin	Validar  Municipios con Ajax
-------------------------------------------------------------------------------*/



/*------------------------------------------------------------------------------
						Registrar Sección
------------------------------------------------------------------------------*/
public static function registrarSeccionModel($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla VALUES(null,:idmunicipio,:seccion)");
	$stmt->bindParam("idmunicipio",$datos["municipio"],PDO::PARAM_INT);
	$stmt->bindParam("seccion",$datos["seccion"],PDO::PARAM_INT);
	if($stmt->execute()){
		return "Registro Exitoso";
	}else{
		return "Error";
	}
}
/*------------------------------------------------------------------------------
						Fin registrar Sección
------------------------------------------------------------------------------*/



/*------------------------------------------------------------------------------
						 Mostrar Secciones
------------------------------------------------------------------------------*/
public static function mostrarSeccionesModel($tabla){
	$stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla");
	$stmt->execute();
	return $stmt->fetchAll();
	$stmt->close();
}
/*------------------------------------------------------------------------------
						Fin mostrar Secciones
------------------------------------------------------------------------------*/



/*------------------------------------------------------------------------------
						Validar Sección Ajax
------------------------------------------------------------------------------*/
public static function validarSeccionModel($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("SELECT seccion from $tabla where seccion=:seccion");
	$stmt->bindParam(":seccion",$datos,PDO::PARAM_STR);
	$stmt->execute();
	return $stmt->fetch();
	$stmt->close();
}


/*------------------------------------------------------------------------------
						Fin validar Sección Ajax
------------------------------------------------------------------------------*/



/*------------------------------------------------------------------------------
						Consultar Colonias
------------------------------------------------------------------------------*/
public static function mostrarColoniasModel($tabla){
	$stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla");
	$stmt->execute();
	return $stmt->fetchAll();
	$stmt->close();
}

/*------------------------------------------------------------------------------
						Fin Consultar Colonias
------------------------------------------------------------------------------*/


/*------------------------------------------------------------------------------
						Registrar Colonias
------------------------------------------------------------------------------*/
public static function registrarColoniasModel($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla VALUES(null,:idmunicipio,:colonia)");
	$stmt->bindParam(":idmunicipio",$datos["municipio"],PDO::PARAM_INT);
	$stmt->bindParam(":colonia",$datos["colonia"],PDO::PARAM_STR);
	if($stmt->execute()){
		return "Registro Exitoso";
	}else{
		return "Error";
	}
}
/*------------------------------------------------------------------------------
						Fin Registrar Colonias
------------------------------------------------------------------------------*/


/*------------------------------------------------------------------------------
						Fin Registrar Colonias
------------------------------------------------------------------------------*/
public static function validarColoniaModel($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("SELECT colonia from $tabla where colonia=:colonia");
	$stmt->bindParam(":colonia",$datos,PDO::PARAM_STR);
	$stmt->execute();
	return $stmt->fetch();
	$stmt->close();
}
/*------------------------------------------------------------------------------
						Fin Registrar Colonias
------------------------------------------------------------------------------*/


/*------------------------------------------------------------------------------
						Consultar colonia para editar
------------------------------------------------------------------------------*/
public static function consultarColoniaEsp($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla WHERE id_colonia=:id_colonia");
	$stmt->bindParam(":id_colonia",$datos,PDO::PARAM_INT);
	$stmt->execute();
	return $stmt->fetch();
	$stmt->close();
}
/*------------------------------------------------------------------------------
						Fin consultar colonia para editar
------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------
					Editar Colonia
-------------------------------------------------------------------------------*/
	public static function editarColoniaModel($datos,$tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set colonia=:colonia WHERE id_colonia=:id_colonia");
		$stmt->bindParam(":colonia",$datos["colonia"],PDO::PARAM_STR);
		$stmt->bindParam(":id_colonia",$datos["id_colonia"],PDO::PARAM_INT);
		if($stmt->execute()){
			return "Edición exitosa";
		}else{
			return "Error al editar";
		}
	}
/*-------------------------------------------------------------------------------
				Fin	Editar Colonia
-------------------------------------------------------------------------------*/


/*-------------------------------------------------------------------------------
				Eliminar Colonia
-------------------------------------------------------------------------------*/

public static function eliminarColoniaModel($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_colonia=:id_colonia");
	$stmt->bindParam(":id_colonia",$datos,PDO::PARAM_INT);
	if($stmt->execute()){
		return "Operacion exitosa";
	}else{
		return "Error al eliminar";
	}
}


/*-------------------------------------------------------------------------------
				Fin	Eliminar Colonia
-------------------------------------------------------------------------------*/



/*-------------------------------------------------------------------------------
						Consultar Municipio para editar
-------------------------------------------------------------------------------*/
public static function consultarMuniEsp($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla WHERE id_municipio=:id_municipio");
	$stmt->bindParam(":id_municipio",$datos,PDO::PARAM_INT);
	$stmt->execute();
	return $stmt->fetch();
	$stmt->close();
}
/*-------------------------------------------------------------------------------
						Fin consultar municipio para editar
-------------------------------------------------------------------------------*/





/*-------------------------------------------------------------------------------
					Editar Municipio
-------------------------------------------------------------------------------*/
public static function editarMunicipioModel($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET clave=:clave,municipio=:municipio WHERE id_municipio=:id_municipio");
	$stmt->bindParam(":clave",$datos["clave"],PDO::PARAM_INT);
	$stmt->bindParam("municipio",$datos["municipio"],PDO::PARAM_STR);
	$stmt->bindParam("id_municipio",$datos["id_municipio"],PDO::PARAM_INT);
	if($stmt->execute()){
		return "muniEditOk";
	}else{
		return "muniEditError";
	}	
}
/*-------------------------------------------------------------------------------
					Fin editar municipio
-------------------------------------------------------------------------------*/







/*-------------------------------------------------------------------------------
				Eliminar Municipio
-------------------------------------------------------------------------------*/
public static function eliminarMunicipioModel($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_municipio=:id_municipio");
	$stmt->bindParam(":id_municipio",$datos,PDO::PARAM_INT);
	if($stmt->execute()){
		return "muniDeleteOk";
	}else{
		return "muniDeleteError";
	}
}
/*-------------------------------------------------------------------------------
				Fin eliminar municipio
-------------------------------------------------------------------------------*/







/*-------------------------------------------------------------------------------
				Consultar Sección para editar
-------------------------------------------------------------------------------*/
public static function consultarSeccionEsp($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla WHERE id_seccion=:id_seccion");
	$stmt->bindParam(":id_seccion",$datos,PDO::PARAM_INT);
	$stmt->execute();
	return $stmt->fetch();
	$stmt->close();
}
/*-------------------------------------------------------------------------------
			Fin consultar sección para editar
-------------------------------------------------------------------------------*/





/*-------------------------------------------------------------------------------
			Editar Sección
-------------------------------------------------------------------------------*/
public static function editarSeccionModel($datos,$tabla){
$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET seccion=:seccion WHERE id_seccion=:id_seccion");
$stmt->bindParam(":seccion",$datos["seccion"],PDO::PARAM_STR);
$stmt->bindParam(":id_seccion",$datos["id_seccion"],PDO::PARAM_INT);
if($stmt->execute()){
	return "seccionEditOk";
}else{
	return "seccionEditError";
}
}
/*-------------------------------------------------------------------------------
							Fin editar sección
-------------------------------------------------------------------------------*/





/*-------------------------------------------------------------------------------
						Eliminar Sección
-------------------------------------------------------------------------------*/
public static function eliminarSeccionModel($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_seccion=:id_seccion");
	$stmt->bindParam(":id_seccion",$datos,PDO::PARAM_INT);
	if($stmt->execute()){
		return "seccionDeleteOk";
	}else{
		return "seccionDeleteError";
	}
}
/*-------------------------------------------------------------------------------
						Fin eliminar sección
-------------------------------------------------------------------------------*/



/*-------------------------------------------------------------------------------
				Consultar id persona
-------------------------------------------------------------------------------*/
public static function consultarIdPersona($tabla){
	$stmt = Conexion::conectar()->prepare("SELECT max(id_persona) from $tabla");
	$stmt->execute();
	return $stmt->fetch();
	$stmt->close();
}
/*-------------------------------------------------------------------------------
			Fin consultar id persona
-------------------------------------------------------------------------------*/


/*-------------------------------------------------------------------------------
						Consultar Colonias
-------------------------------------------------------------------------------*/
public static function consultarColoniasModel($tabla){
	$stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla;");
	$stmt->execute();
	return $stmt->fetchAll();
	$stmt->close();
}
/*-------------------------------------------------------------------------------
					    Fin  	Consultar Colonias
-------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------
					    Fin  	registrar Direccion
-------------------------------------------------------------------------------*/
public static function registrarDireccionModel($datos,$tabla){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla VALUES(null,:id_persona,:id_colonia,:calle,:no_interior,:no_exterior,:localidad,:cp,:latitud,:longitud);");
	$stmt->bindParam(":id_persona",$datos["id_persona"],PDO::PARAM_INT);
	$stmt->bindParam(":id_colonia",$datos["id_colonia"],PDO::PARAM_INT);
	$stmt->bindParam(":calle",$datos["calle"],PDO::PARAM_STR);
	$stmt->bindParam(":no_interior",$datos["noint"],PDO::PARAM_INT);
	$stmt->bindParam(":no_exterior",$datos["noext"],PDO::PARAM_INT);
	$stmt->bindParam(":localidad",$datos["localidad"],PDO::PARAM_STR);
	$stmt->bindParam(":cp",$datos["cpostal"],PDO::PARAM_INT);
	$stmt->bindParam(":latitud",$datos["latitud"],PDO::PARAM_STR);
	$stmt->bindParam(":longitud",$datos["longitud"],PDO::PARAM_STR);
	if($stmt->execute()){
		return "regDireOk";
	}else{
		return "regDireError";
	}
}
/*-------------------------------------------------------------------------------
					    Fin  	registrar direccion
-------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------
					  	consultar perfil persona
-------------------------------------------------------------------------------*/
public static function mostralPerfilPersona($datos,$tabla1,$tabla2,$tabla3){
	$stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla1 inner join $tabla2 on $tabla1.id_persona=$tabla2.id_persona inner join $tabla3 on $tabla3.id_colonia=$tabla2.id_colonia
	 where $tabla1.id_persona=:id_persona;");
	$stmt->bindParam(":id_persona",$datos,PDO::PARAM_INT);
	$stmt->execute();
	return $stmt->fetch();
	$stmt->close();
}
/*-------------------------------------------------------------------------------
					    Fin  	consultar perfil persona
-------------------------------------------------------------------------------*/

/*=============================================================================
					Fin	CÓDIGO PABLO HERNÁNDEZ MAGNI
==============================================================================*/
	 
	 
	 
	 
	 /*===================================
=            Julio Lopez            =
===================================*/

public static function registroPersonaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, app_pat, app_mat, genero, fecha_nac, tel_cel, tel_fijo,foto) VALUES (:npersona,:appersona,:ampersona,:gpersona,:fpersona,:cpersona,:tpersona,:foto)");	

		$stmt->bindParam(":npersona", $datosModel["npersona"], PDO::PARAM_STR);
		$stmt->bindParam(":appersona", $datosModel["appersona"], PDO::PARAM_STR);
		$stmt->bindParam(":ampersona", $datosModel["ampersona"], PDO::PARAM_STR);
		$stmt->bindParam(":gpersona", $datosModel["gpersona"], PDO::PARAM_STR);
		$stmt->bindParam(":fpersona", $datosModel["fpersona"], PDO::PARAM_STR);
		$stmt->bindParam(":cpersona", $datosModel["cpersona"], PDO::PARAM_STR);
		$stmt->bindParam(":tpersona", $datosModel["tpersona"], PDO::PARAM_STR);
		$stmt->bindParam(":foto",$datosModel["foto"],PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}



/*=====  End of Julio Lopez  ======*/
/*=============================================================================
					INICIO	CÓDIGO ENRIQUE
==============================================================================*/
public static function tablaPersonas(){
	$sentencia= Conexion::conectar();
	$consult= $sentencia->prepare("SELECT CONCAT(nombre,' ', app_pat,' ', app_mat) AS nomComp, genero,fecha_nac,tel_cel,tel_fijo,id_persona FROM persona");
	$consult->execute();
	$resu =$consult->fetchAll();
	return $resu;
}
//----------------Consulta de jerarquias
public static function jerarquia(){
	$sentencia= Conexion::conectar();
	$consult= $sentencia->prepare("SELECT * FROM jerarquia");
	$consult->execute();
	$resu =$consult->fetchAll();
	return $resu;
}
//--------------Consulta la seccion	
public static function seccion(){
	$sentencia= Conexion::conectar();
	$consult= $sentencia->prepare("SELECT * FROM seccion");
	$consult->execute();
	$resu =$consult->fetchAll();
	return $resu;
}

//--------------Consulta la seccion	
public static function municipio(){
	$sentencia= Conexion::conectar();
	$consult= $sentencia->prepare("SELECT * FROM municipio");
	$consult->execute();
	$resu =$consult->fetchAll();
	return $resu;
}
//-----------------Consulta si existe miembro
public static function consultarMiembroModel($miembro,$tabla){
	try{
		$senten="SELECT * FROM ".$tabla." WHERE id_persona=".$miembro;
	$stmt = Conexion::conectar()->prepare($senten);
	
	$stmt->bindParam(":usuario",$miembro,PDO::PARAM_STR);
	$stmt->execute();
	$resultado =$stmt->fetchAll();
	
	return $resultado;
	}catch (Exception $e){
		echo "Error ", $e->getMessage();

	}
}
public static function registroMiembroModel($datos,$tabla){
	try{
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( id_persona, id_jerarquia, id_seccion, folio, clave_elector, folio_ine, fecha_afiliacion, distrito_electoral) VALUES(:dato1,:dato2,:dato3,:dato4,:dato5,:dato6,curdate(),:dato7)");
	$stmt->bindParam(":dato1",$datos["persona"],PDO::PARAM_STR);
	$stmt->bindParam(":dato2",$datos["jerarquia"],PDO::PARAM_STR);
	$stmt->bindParam(":dato3",$datos["seccion"],PDO::PARAM_STR);
	$stmt->bindParam(":dato4",$datos["folio"],PDO::PARAM_STR);
	$stmt->bindParam(":dato5",$datos["claveE"],PDO::PARAM_STR);
	$stmt->bindParam(":dato6",$datos["folioINE"],PDO::PARAM_STR);
	$stmt->bindParam(":dato7",$datos["distrito"],PDO::PARAM_STR);
	$stmt->execute();
	echo "se agregó correctamente";
	}catch(Exception $e){
		echo "Error ", $e->getMessage();
	}
}

public static function consultarPersonaModel($datos, $tabla){
	$sentencia= Conexion::conectar();
	$consult= $sentencia->prepare("SELECT * FROM persona WHERE id_persona=:usuario");
	$consult->bindParam(":usuario",$datos,PDO::PARAM_STR);
	$consult->execute();
	$resu =$consult->fetch();
	return $resu;
}

public static function consultarDireccionModel($datos){
	$sentencia= Conexion::conectar();
	$consult= $sentencia->prepare("SELECT  calle,localidad,colonia, no_exterior, no_interior,municipio,cp,latitud,longitud FROM direccion INNER JOIN colonia on colonia.id_colonia = direccion.id_colonia INNER JOIN municipio ON colonia.id_municipio = municipio.id_municipio WHERE direccion.id_persona=:usuario");
	$consult->bindParam(":usuario",$datos,PDO::PARAM_STR);
	$consult->execute();
	$resu =$consult->fetch();
	return $resu;
}

public static function actualizaPersonaModel($datos,$tabla){
	try{
	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:dato2, app_pat=:dato3, app_mat=:dato4, genero=:dato5, fecha_nac=:dato6, tel_cel=:dato7, tel_fijo=:dato8 WHERE id_persona=:dato1 ");
	$stmt->bindParam(":dato1",$datos["persona"],PDO::PARAM_INT);
	$stmt->bindParam(":dato2",$datos["nombre"],PDO::PARAM_STR);
	$stmt->bindParam(":dato3",$datos["paterno"],PDO::PARAM_STR);
	$stmt->bindParam(":dato4",$datos["materno"],PDO::PARAM_STR);
	$stmt->bindParam(":dato5",$datos["sexo"],PDO::PARAM_STR);
	$stmt->bindParam(":dato6",$datos["fecha"],PDO::PARAM_STR);
	$stmt->bindParam(":dato7",$datos["cel"],PDO::PARAM_INT);
	$stmt->bindParam(":dato8",$datos["fijo"],PDO::PARAM_INT);
	$stmt->execute();
	$stmt->fetchAll();
	echo "se editó correctamente";
	}catch(Exception $e){
		echo "Error ", $e->getMessage();
	}
}
//------------Para actualizar la dirección
	public static function actualizaDireccionModel($datos,$tabla){
		try{
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET calle=:dato2, localidad=:dato3, no_exterior=:dato5, no_interior=:dato6, cp=:dato7, latitud=:dato8, longitud=:dato9  WHERE id_persona=:dato1 ");
			$stmt->bindParam(":dato1",$datos["persona"],PDO::PARAM_INT);
			$stmt->bindParam(":dato2",$datos["calle"],PDO::PARAM_STR);
			$stmt->bindParam(":dato3",$datos["localidad"],PDO::PARAM_INT);
			//$stmt->bindParam(":dato4",$datos["colonia"],PDO::PARAM_STR);  colonia=(SELECT id_colonia FROM colonia WHERE colonia= :dato4 ORDER by id_colonia DESC LIMIT 1)
			$stmt->bindParam(":dato5",$datos["ne"],PDO::PARAM_INT);
			$stmt->bindParam(":dato6",$datos["ni"],PDO::PARAM_INT);
			$stmt->bindParam(":dato7",$datos["cp"],PDO::PARAM_INT);
			$stmt->bindParam(":dato8",$datos["latitud"],PDO::PARAM_STR);
			$stmt->bindParam(":dato9",$datos["longitud"],PDO::PARAM_STR);
			$stmt->execute();
			$stmt->fetchAll();
			echo "se editó correctamente la dirección ".$tabla;
			}catch(Exception $e){
				echo "Error ", $e->getMessage();
			}
	}
//-----------------------consulta un municipio
public static function unMunicipio($muni){
	$sentencia= Conexion::conectar();
	$consult= $sentencia->prepare("SELECT id_municipio FROM municipio WHERE municipio=:dato");
	$consult->bindParam(":dato",$muni,PDO::PARAM_STR);
	$consult->execute();
	$resu =$consult->fetch();
	return $resu;
	}
//-----------------------Elimina de la tabla personas
public static function eliminaPersonaModel($persona,$tabla){
	$sentencia="DELETE FROM miembro WHERE id_persona=:persona";
	$stmt = Conexion::conectar();
	$ejecuta = $stmt->prepare($sentencia);
	$ejecuta->bindParam(":persona",$persona,PDO::PARAM_INT);
	$ejecuta->execute();
	$sentencia="DELETE FROM $tabla WHERE id_persona=:persona";
	$ejecuta = $stmt->prepare($sentencia);
	$ejecuta->bindParam(":persona",$persona,PDO::PARAM_INT);
	$ejecuta->execute();

}

//---------------------Busca capturista 
public static function tablaUsuarios(){
	$sentencia= Conexion::conectar();
	$consult= $sentencia->prepare("SELECT * FROM usuarios WHERE type_user=0");
	$consult->execute();
	$resu =$consult->fetchAll();
	return $resu;
}

//------------------------Ingresa a un nuevo capturista
public static function ingresaCapturistaModel($datos, $tabla){
	$sentencia = "INSERT INTO $tabla VALUES(null, :correo, :pass, 0)";
	$stmt = Conexion::conectar();
	$ejecuta = $stmt->prepare($sentencia);
	$ejecuta->bindParam(":correo",$datos['mail'],PDO::PARAM_STR);
	$ejecuta->bindParam(":pass",$datos['pass'],PDO::PARAM_STR);
	$ejecuta->execute();
}

//---------------------------Para buscar direccion
public static function buscaDireccion($id){
	$sentencia= Conexion::conectar();
	$consult= $sentencia->prepare("SELECT direccion.calle, direccion.localidad, colonia.colonia, direccion.no_interior, direccion.no_exterior,municipio.municipio, direccion.cp FROM direccion INNER JOIN colonia on colonia.id_colonia= direccion.id_colonia INNER JOIN municipio on colonia.id_municipio=municipio.id_municipio WHERE direccion.id_persona=:id");
	$consult->bindParam(":id",$id,PDO::PARAM_INT);
	$consult->execute();
	$resu =$consult->fetchAll();
	$cadena="";
	foreach($resu as $result){
		$cadena ="Calle ".$result[0].", localidad ".$result[1].", colonia ".$result[2].", número interior ".$result[3].", número exterior ".$result[4].", Municipio de ".$result[5].", Código postal ".$result[6];
	}
	return $cadena;

}

/*=============================================================================
				FIN	CÓDIGO ENRIQUE
==============================================================================*/

}

?>
