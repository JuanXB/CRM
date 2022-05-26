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
}
