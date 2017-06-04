<?php

include_once 'app/Url.inc.php';
class Vistas 
{

		 public static function CrearVista($ruta){
		 	ob_start();
		    include($ruta);
		    $var=ob_get_contents(); 
		    ob_end_clean();
		    return $var;
		 }



}




 ?>
