<?php
class ClientesModel extends BasicModel
{
  public $table;

  public function __construct($adapter)
  {
    $this->table = "clientes";
    parent::__construct($this->table, $adapter);
  }
}
