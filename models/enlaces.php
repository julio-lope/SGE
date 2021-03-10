<?php
	class Paginas{
			public static function enlacesPaginasModel($enlaces){
		if($enlaces == "login"){
				$module = "views/modules/".$enlaces.".php";
			}else if($enlaces == "falloLogin"){
				$module = "views/modules/login.php";
			}else if($enlaces =="logueado"){
				$module = "views/modules/principal.php";
			}else if($enlaces == "ok"){
				$module = "views/modules/persona.php";
			}else if($enlaces == "error"){
				$module = "views/modules/persona.php";
			}else if($enlaces == "salir"){
				$module = "views/modules/salir.php";
			}else if($enlaces == "persona"){
				$module = "views/modules/persona.php";
			}else if($enlaces == "personas"){//si la accion es de personas
				$module = "views/modules/personas.php";
			}else if($enlaces == "edita"){//si la accion es de editar
				$module = "views/modules/edita.php";
			}else if($enlaces == "elimina"){// si la accion es de eliminar
				$module = "views/modules/elimina.php";
			}else if($enlaces == "afilia"){// si la accion es de afiliar
				$module = "views/modules/afilia.php";
			}else if($enlaces == "reportes"){//---Para generar reporte
				$module = "views/modules/reporte.php";
			}else if($enlaces == "capturista"){// si la seccion es de capturistas
				$module = "views/modules/capturista.php";
			}
				
			/*----------------------------
			Enlaces Pablo - Ediciones y eliminado
			-----------------------------*/
			else if($enlaces == "municipioR"){
				$module = "views/modules/municipioRegistro.php";
			}else if($enlaces == "municipioOk"){
				$module = "views/modules/municipioRegistro.php";
			}else if($enlaces =="municipioError"){
				$module = "views/modules/municipioRegistro.php";
			}else if($enlaces =="secciones"){
				$module = "views/modules/secciones.php";
			}else if($enlaces =="seccionOk"){
				$module = "views/modules/secciones.php";
			}else if($enlaces == "seccionError"){
				$module = "views/modules/secciones.php";
			}else if($enlaces =="colonias"){
				$module ="views/modules/colonias.php";
			}else if($enlaces =="coloniasOk"){
				$module ="views/modules/colonias.php";
			}else if($enlaces =="coloniasError"){
				$module ="views/modules/colonias.php";
			}else if($enlaces =="editarColonia"){
				$module ="views/modules/editarColonia.php";
			}else if($enlaces == "eliminarColonia"){
				$module ="views/modules/eliminarColonia.php";
			}else if($enlaces =="coloniasEditOk"){
				$module ="views/modules/colonias.php";
			}else if($enlaces =="coloniasEditError"){
				$module ="views/modules/colonias.php";
			}else if($enlaces =="coloniasDeleteOk"){
				$module ="views/modules/colonias.php";
			}else if($enlaces =="coloniasDeleteError"){
				$module ="views/modules/colonias.php";
			}else if($enlaces =="editarSeccion"){
				$module ="views/modules/editarSeccion.php";
			}
			else if($enlaces =="eliminarSeccion"){
				$module ="views/modules/eliminarSeccion.php";
			}
			else if($enlaces =="seccionEditOk"){
				$module ="views/modules/secciones.php";
			}
			else if($enlaces =="seccionEditError"){
				$module ="views/modules/secciones.php";
			}
			else if($enlaces =="seccionDeleteOk"){
				$module ="views/modules/secciones.php";
			}
			else if($enlaces =="seccionDeleteError"){
				$module ="views/modules/secciones.php";
			}
			else if($enlaces =="editarMuni"){
				$module ="views/modules/editarMunicipio.php";
			}

			else if($enlaces =="eliminarMuni"){
				$module ="views/modules/eliminarMunicipio.php";
			}

			else if($enlaces =="muniEditOk"){
				$module ="views/modules/municipioRegistro.php";
			}

			else if($enlaces =="muniEditError"){
				$module ="views/modules/municipioRegistro.php";
			}

			else if($enlaces =="muniDeleteOk"){
				$module ="views/modules/municipioRegistro.php";
			}

			else if($enlaces =="muniDeleteError"){
				$module ="views/modules/municipioRegistro.php";
			}
			else if($enlaces =="registrarDireccion"){
				$module = "views/modules/registroDireccion.php";
			}
			else if($enlaces =="regDireOk"){
				$module = "views/modules/persona.php";		
			}

			else if($enlaces =="regDireError"){
				$module ="views/modules/registroDireccion.php";
			}
			else if($enlaces =="verPerfil"){
				$module = "views/modules/verPerfil.php";
			}
				
				
			/*-----------------------------
			Fin enlaces
			------------------------------*/
				
				
				
				
				
				
				
				
				
			else{
				$module = "views/modules/inicio.php";
			}
			
			return $module;
		}
	}
	 
 ?>



