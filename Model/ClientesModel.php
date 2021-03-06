<?php
class ClientesModel extends BasicModel
{
  public $table;

  public function __construct($adapter)
  {
    $this->table = "clientes";
    parent::__construct($this->table, $adapter);
  }


  public function editCliente($cliente)
  {
    if (isset($cliente) && !empty($cliente)) {
      //Obtencion de datos y escapado de caracteres especiales.
      $id =  $this->db()->real_escape_string($cliente->getId());
      $nombre =  $this->db()->real_escape_string($cliente->getNombre());
      $ciudad =  $this->db()->real_escape_string($cliente->getCiudad());
      $edad = $this->db()->real_escape_string($cliente->getEdad());
      $telefono = $this->db()->real_escape_string($cliente->getTelefono());
      $email =  $this->db()->real_escape_string($cliente->getEmail());
      $fechaRegistro =  $this->db()->real_escape_string($cliente->getFechaRegistro());


      $query = "UPDATE clientes SET nombre = ? , ciudad = ? , edad = ? , telefono = ? , email = ? , fecha_registro = ? WHERE id = ? ;";
      $type = 'ssiisss';
      $parameters = array($nombre, $ciudad, $edad, $telefono, $email, $fechaRegistro, $id);
      return $this->runSql($query, $type, $parameters);
    }

    return false;
  }

  //TODO: Conteo de clientes
  //TODO: Clientes registrados en los últimos 30 días
  //TODO: Clientes registrados en el año actual
  //TODO: Clientes por departamento
  //TODO: Gráfica de clientes por edad
  //TODO: Cantidad de clientes por año, del año actual y anterior
}
