<?php
include_once 'app/Rutas.inc.php';
include_once 'app/enrute.php';
include_once 'app/Vistas.inc.php';

$ruta = new Rutas($_SERVER['REQUEST_URI']);
$enrutando = $ruta->enrutamiento();
if ($enrutando['exito']) {
	echo Vistas::CrearVista($enrutando['vista']['url']);
}
else{
	echo '404';
}

?>

