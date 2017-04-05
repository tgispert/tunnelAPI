<?php
require_once 'api_base.php';
require_once '../model/tunnel_model.php';

class TunnelApi extends ApiBase {
  private $model;

  function __construct($request){
    parent::__construct($request);
    $this->model = new TunnelModel();
  }

  function marca(){
    switch ($this->method) {
      case 'GET':
        if(count($this->args) > 0){
          return $this->model->getMarcaById($this->args[0]);
        }
        else {
          return $this->model->getMarcas();
        }
        break;
      case 'DELETE':
        if(count($this->args) > 0) return $this->model->borrarMarca($this->args[0]);
        break;
      case 'POST':
        if(isset($_POST['marca'])) return $this->model->agregarMarca($_POST);
        break;
      default:
            return 'Verbo no soportado';
        break;
    }
  }

}

?>
