<?php
class VentasClientesModel extends BasicModel
{
  public $table;

  public function __construct($adapter)
  {
    $this->table = "ventas_clientes";
    parent::__construct($this->table, $adapter);
  }
}
