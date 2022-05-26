<?php
class BasicController
{
  public $titlePage;
  public $view;

  public function __construct()
  {
    require_once "database/Connect.php";
    require_once "Model/BasicEntity.php";
    require_once "Model/BasicModel.php";

    //Incluir todos los modelos.
    foreach (glob("model/*.php") as $file) {
      require_once $file;
    }

    $this->titlePage = DEFAULT_TITLE_NAME;
    $this->view = DEFAULT_ACTION;
  }

  public function home()
  {
    return $this->view;
  }

  public function createUrl($controller = DEFAULT_CONTROLLER, $action = DEFAULT_ACTION, $data = ''): string
  {
    $urlString = "index.php?controller=" . $controller . "&action=" . $action . $data;
    return $urlString;
  }

  public function redirect($controller = DEFAULT_CONTROLLER, $action = DEFAULT_ACTION): void
  {
    header("Location:index.php?controller=" . $controller . "&action=" . $action);
  }
}
