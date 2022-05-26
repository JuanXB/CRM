<?php
class VentasClientesModel extends BasicModel
{
  public $table;

  public function __construct($adapter)
  {
    $this->table = "ventas_clientes";
    parent::__construct($this->table, $adapter);
  }


  public function editarVenta($venta)
  {
    if (isset($venta) && !empty($venta)) {
      //Obtencion de datos y escapado de caracteres especiales.
      $id =  $this->db()->real_escape_string($venta->getId());
      $idCliente =  $this->db()->real_escape_string($venta->getIdCliente());
      $fecha =  $this->db()->real_escape_string($venta->getFecha());
      $monto = $this->db()->real_escape_string($venta->getMonto());

      $query = "UPDATE ventas_clientes SET  , monto = ? , fecha = ? WHERE id = ? AND id_cliente = ?;";
      $type = 'dsss';
      $parameters = array($monto, $fecha, $id, $idCliente);
      return $this->runSql($query, $type, $parameters);
    }

    return false;
  }
}
