<?php

class Url
{
  private $url;
  private $url_cargadas=false;
  private  $respuesta=array();  
  

  function __construct($url_actual)
  {
    $this->url = $this->construir_url_localhost($url_actual);

    //$this->url = $this->construir_url_server($url_actual);

  }

  private function construir_url_server($url){
    $urls = substr($url,1,strlen($url));
    $respuesta = explode('/',$urls);
    if($respuesta[0]==''){
      $respuesta = '/';
    }
    return $respuesta;
  }

private function construir_url_localhost($url){

  $urls = substr($url,1,strlen($url));
  $url_txt = substr($urls,strpos($urls,'/')+1,strlen($urls));
  $respuesta = explode('/',$urls);
  if($respuesta[1]==''|| strlen($respuesta[1])===0){
    //aca entra si estoy en local host porque se inventa el pseudo entonces lo saco y dejo el aray solo con "/"
    $respuesta[0]= '/';
    unset($respuesta[1]);
  }
  else{
    unset($respuesta[0]);
    $respuesta = array_values($respuesta);
    array_push($respuesta,$url_txt);
  }
  
  return $respuesta;

}

public function url_actual(){
  return $this->url;
}





}
/**
 *
 */








 ?>
