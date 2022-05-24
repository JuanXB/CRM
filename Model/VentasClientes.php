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

  public function getId(): int
  {
    return $this->id;
  }

  public function setId(int $id): void
  {
    $this->id = $id;
  }


  public function getIdCliente(): int
  {
    return $this->idCliente;
  }

  public function setIdCliente(int $idCliente): void
  {
    $this->Edad = $idCliente;
  }


  public function getMonto(): int
  {
    return $this->monto;
  }

  public function setMonto(int $monto): void
  {
    $this->Edad = $monto;
  }

  public function getFecha(): string
  {
    return $this->fecha;
  }

  public function setFecha(string $fecha): void
  {
    $this->fechaReistro = $fecha;
  }

  public function save(): bool
  {

    $idCliente = $this->db()->real_escape_string($this->idCliente);
    $monto = $this->db()->real_escape_string($this->monto);
    $fecha = $this->db()->real_escape_string($this->fecha);


    $query = "INSERT INTO ventas_clientes(id_cliente, monto, fecha)
              VALUES ( ?, ?, ?);";
    $statment = $this->db()->prepare($query);
    $statment->bind_param("dds", $idCliente, $monto, $fecha);
    $save = $statment->execute();

    $statment->close();

    return $save;
  }
}
