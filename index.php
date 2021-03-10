<?php

/*==================================================================================
					Se incluyen el modelo, la vista y el controlador
===================================================================================*/
		require_once "models/enlaces.php";
		require_once "models/crud.php";
		require_once "controllers/controller.php";
/*==================================================================================
							Fin de la inclusión
===================================================================================*/


/*=================================================================================
							Se instancía la clase controlador
							y se invoca el método "pagina"
							para determinar a dónde se dirigirá
===================================================================================*/	
	$mvc = new MvcController();
	$mvc ->pagina();
/*=================================================================================
								Fin de la instanciación
===================================================================================*/

 ?>