<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxProductos{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCategoria;
  public $traerProductos;
  public $nombreProducto;

  public function ajaxCrearCodigoProducto(){

  	$item = "id_categoria";
  	$valor = $this->idCategoria;

  	$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

  	echo json_encode($respuesta);

  }


  /*=============================================
  EDITAR PRODUCTO
  =============================================*/ 

  public $idProducto;

  public function ajaxEditarProducto(){

    if($this-> traerProductos=="ok"){
      $item=null;
      $valor=null;
      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);
      echo json_encode($respuesta);
    }else if($this->nombreProducto!=""){
      $item="descripcion";
      $valor=$this->nombreProducto;
      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);
      echo json_encode($respuesta);
    }else{
      $item = "id";
      $valor = $this->idProducto;
      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);
      echo json_encode($respuesta);
    }

  }


}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/	

if(isset($_POST["idCategoria"])){

	$codigoProducto = new AjaxProductos();
	$codigoProducto -> idCategoria = $_POST["idCategoria"];
	$codigoProducto -> ajaxCrearCodigoProducto();

}
/*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idProducto"])){
  $editarProducto = new AjaxProductos();
  $editarProducto -> idProducto = $_POST["idProducto"];
  $editarProducto -> ajaxEditarProducto();

}

/*=============================================
TRAER PRODUCTO (MOVIL)
=============================================*/ 

if(isset($_POST["traerProductos"])){
  $editarProducto = new AjaxProductos();
  $editarProducto -> traerProductos = $_POST["traerProductos"];
  $editarProducto -> ajaxEditarProducto();
}

if(isset($_POST["nombreProducto"])){
  $editarProducto = new AjaxProductos();
  $editarProducto -> nombreProducto = $_POST["nombreProducto"];
  $editarProducto -> ajaxEditarProducto();

}