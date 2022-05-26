<?php

class VentasClientesController extends BasicController
{
  public $connect;
  public $adapter;
  public $ventas;

  public function __construct()
  {
    parent::__construct();

    $this->connect = new Connect();
    $this->adapter = $this->connect->conexion();
    $this->ventas = new VentasClientesModel($this->adapter);
    $this->titlePage = 'Ventas a cliente';
    $this->view = 'ventasCliente';
  }

  public function registrarVenta()
  {
    if (
      isset($_POST['id_cliente']) && $_POST['id_cliente'] != "" &&
      isset($_POST['monto']) && $_POST['monto'] != ""
    ) {

      $nuevaVenta = new VentasClientes($this->adapter);
      $nuevaVenta->setIdCliente($_POST['id_cliente']);
      $nuevaVenta->setMonto($_POST['monto']);
      //Se verifica si la fecha a sido especificada ,
      //si no es asi se establece la fecha actual.
      $fecha = $_POST['fecha'];
      if (empty($fecha)) {
        $fecha = date('Y/m/d', time());
      }

      $nuevaVenta->setFecha($fecha);

      return $nuevaVenta->save();
    }
    return false;
  }

  public function editarVenta()
  {
    if (
      isset($_POST['id_cliente']) && $_POST['id_cliente'] != ""
    ) {

      $ventaModificada = new VentasClientes($this->adapter);
      $ventaOriginal = $this->expenses->getById($_GET['id']);

      //Se verifica cuales datos se han modificado,
      //si el dato esta vacio se deja por default el original.
      $ventaModificada->setId($ventaOriginal->id);
      $ventaModificada->setIdCliente($this->ventas->setDataToModify($ventaOriginal->idCliente, $_POST['id_cliente']));
      $ventaModificada->setMonto($this->ventas->setDataToModify($ventaOriginal->monto, $_POST['monto']));
      $ventaModificada->setFecha($this->ventas->setDataToModify($ventaOriginal->fecha, $_POST['fecha']));

      return $this->ventas->editarVenta($ventaModificada);
    }
  }

  //TODO: eliminar venta
}
