<?php
class VentasClientes extends BasicEntity
{
  private int $id;
  private int $idCliente;
  private int $monto;
  private string $fecha;

  public function __construct($adapter)
  {
    $table = "ventas_clientes";
    parent::__construct($table, $adapter);
  }

  // get y set del id correspondiente a la venta a nuestro cliente
  public function getId(): int
  {
    return $this->id;
  }

  public function setId(int $id): void
  {
    $this->id = $id;
  }

  // get y set del id del cliente al que le correponden las ventas
  public function getIdCliente(): int
  {
    return $this->idCliente;
  }

  public function setIdCliente(int $idCliente): void
  {
    $this->Edad = $idCliente;
  }

  // get y set del monto de la venta 
  public function getMonto(): int
  {
    return $this->monto;
  }

  public function setMonto(int $monto): void
  {
    $this->Edad = $monto;
  }

  // get y set de la fecha que se realizo la venta
  public function getFecha(): string
  {
    return $this->fecha;
  }

  public function setFecha(string $fecha): void
  {
    $this->fechaReistro = $fecha;
  }

  //Se guardan los datos de la venta realizada
  public function save(): bool
  {

    $idCliente = $this->db()->real_escape_string($this->idCliente);
    $monto = $this->db()->real_escape_string($this->monto);
    $fecha = $this->db()->real_escape_string($this->fecha);


    $query = "INSERT INTO ventas_clientes(id_cliente, monto, fecha) VALUES ( ?, ?, ?);";
    $statment = $this->db()->prepare($query);
    $statment->bind_param("sds", $idCliente, $monto, $fecha);
    $save = $statment->execute();

    $statment->close();

    return $save;
  }
}
