<?php
include_once 'app/Url.inc.php';

class Rutas extends Url
{

  private static $rutas =array();
  private $default_url=array();

  function __construct($peticion){

      parent::__construct($peticion);
      
  }

  public static function ruta($url,$path){

  $path_php= 'vistas/'.$path.'.php';
  $nruta = array(
        "peticion"=>$url,
        "url" => $path_php
        );
  array_push(self::$rutas,$nruta);

  }

  public function rutas(){

  return self::$rutas;
  }

  public function enrutamiento(){

    $respuesta=array();   
    $ultimo_index = count(parent::url_actual())-1;
    $patron = $this->preparar_regex(parent::url_actual()[$ultimo_index]);
    $default_ruta = $this->default_ruta();
    $exito = false;
    //$respuesta['compara'] = $this->preparar_regex(self::$rutas[0]['peticion']);
    foreach (self::$rutas as $ruta) {
      $comparando = $ruta['peticion'];
      //$com['comparando'][] =$comparando;
      //$com['patron'][] = $respuesta['patron'];
      if (preg_match( $patron, $comparando)) {
        # code...aca encontro una ruta para cargar.
        $respuesta['vista']= $ruta;
        $exito=true;    
        break;    
      }else{
        $respuesta['vista']  = $default_ruta;
      }      
    }

    $respuesta['exito'] = $exito;   
    return $respuesta;


  }
  private function preparar_regex($txt){

      $ready = "/^".preg_quote($txt,'/')."$/";
      return $ready;
  }
 
 private function default_ruta(){
  $index_404 = count(self::$rutas)-1;
  $default = self::$rutas[$index_404];
  return $default;
}



}

?>
