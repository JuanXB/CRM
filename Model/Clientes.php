<?php
class Clientes extends BasicEntity
{
  private int $id;
  private string $nombre;
  private string $ciudad;
  private int $edad;
  private int $telefono;
  private string $email;
  private string $fechaRegistro;


  public function __construct($adapter)
  {
    $table = "clientes";
    parent::__construct($table, $adapter);
  }

  // get y set del id del cliente 
  public function getId(): int
  {
    return $this->id;
  }

  public function setId(int $id): void
  {
    $this->id = $id;
  }

  // get y set de nombre del cliente
  public function getNombre()
  {
    return $this->nombre;
  }

  public function setNombre(string $nombre): void
  {
    $this->nombre = $nombre;
  }

  // get y set de la ciudad del cliente 
  public function getCiudad(): string
  {
    return $this->ciudad;
  }

  public function setCiudad(string $ciudad): void
  {
    $this->ciudad = $ciudad;
  }

  // get y set de la edad del cliente
  public function getEdad(): int
  {
    return $this->edad;
  }

  public function setEdad(int $edad): void
  {
    $this->Edad = $edad;
  }

  // get y set de la fecha en la que se registro al cliente
  public function getFechaRegistro(): string
  {
    return $this->fechaRegistro;
  }

  public function setFechaRegistro(string $fechaRegistro): void
  {
    $this->fechaRegistro = $fechaRegistro;
  }

  // get y set del telefono del cliente
  public function getTelefono(): int
  {
    return $this->telefono;
  }

  public function setTelefono(string $telefono): void
  {
    $this->telefono = $telefono;
  }

  // get y set del email del cliente
  public function getEmail(): string
  {
    return $this->email;
  }

  public function setEmail(string $email): void
  {
    if (!isset($email) || empty($email)) {
      $email = 'No tiene';
    }
    $this->email = $email;
  }

  //Se guardan los datos del cliente en nuestra base de datos
  public function save(): bool
  {

    $nombre = $this->db()->real_escape_string($this->nombre);
    $ciudad = $this->db()->real_escape_string($this->ciudad);
    $edad = $this->db()->real_escape_string($this->edad);
    $telefono = $this->db()->real_escape_string($this->telefono);
    $email = $this->db()->real_escape_string($this->email);
    $fechaRegistro = $this->db()->real_escape_string($this->fechaRegistro);



    $query = "INSERT INTO clientes(nombre, ciudad, edad, telefono, email, fecha_registro) VALUES ( ?, ?, ?, ?, ?, ?);";
    $statment = $this->db()->prepare($query);
    $statment->bind_param("ssiiss", $nombre, $ciudad, $edad, $telefono, $email, $fechaRegistro);
    $save = $statment->execute();

    $statment->close();

    return $save;
  }
}
