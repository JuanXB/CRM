<?php
class Clientes extends BasicEntity
{
  private int $id;
  private string $nombre;
  private string $ciudad;
  private int $edad;
  private string $fechaRegistro;

  public function __construct($adapter)
  {
    $table = "clientes";
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

  public function getNombre()
  {
    return $this->nombre;
  }

  public function setNombre(string $nombre): void
  {
    $this->nombre = $nombre;
  }

  public function getCiudad(): string
  {
    return $this->ciudad;
  }

  public function setCiudad(string $ciudad): void
  {
    $this->ciudad = $ciudad;
  }

  public function getEdad(): int
  {
    return $this->edad;
  }

  public function setEdad(int $edad): void
  {
    $this->Edad = $edad;
  }

  public function getFechaRegistro(): string
  {
    return $this->fechaRegistro;
  }

  public function setFechaRegistro(string $fechaRegistro): void
  {
    $this->fechaReistro = $fechaRegistro;
  }

  public function save(): bool
  {

    $nombre = $this->db()->real_escape_string($this->nombre);
    $ciudad = $this->db()->real_escape_string($this->ciudad);
    $edad = $this->db()->real_escape_string($this->edad);
    $fechaRegistro = $this->db()->real_escape_string($this->fechaRegistro);


    $query = "INSERT INTO clientes(nombre, ciudad, monto, fecha_registro)
              VALUES ( ?, ?, ?, ?);";
    $statment = $this->db()->prepare($query);
    $statment->bind_param("ssds", $nombre, $edad, $fechaRegistro);
    $save = $statment->execute();

    $statment->close();

    return $save;
  }
}
