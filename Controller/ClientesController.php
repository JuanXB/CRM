<?php

class VentasClientesController extends BasicController
{
  public $connect;
  public $adapter;
  public $cliente;

  public function __construct()
  {
    parent::__construct();

    $this->connect = new Connect();
    $this->adapter = $this->connect->conexion();
    $this->cliente = new ClientesModel($this->adapter);
    $this->titlePage = 'Clientes';
    $this->view = 'Clientes';
  }

  //TODO: AGREGAR CLIENTE
  //TODO: editar cliente
  //TODO: eliminar cliente
}
