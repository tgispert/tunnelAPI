<?php
class TunnelModel {

  private $db;
  private $user = 'root';
  private $pass = '';

  function __construct() {
      $this->db = new PDO('mysql:host=localhost;dbname=tiendas_roxana',$this->user,$this->pass);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  function getMarcas(){
    $marcas = array();
    $consulta = $this->db->prepare("SELECT * FROM marca");
    $consulta->execute();
    $marcas = $consulta->fetchAll();
    return $marcas;
  }

  function getMarcaById($id){
    $consulta = $this->db->prepare("SELECT * FROM marca WHERE id=?");
    $consulta->execute(array($id));
    $marca = $consulta->fetch();
    return $marca;
  }

  function agregarMarca($marca){
    $consulta = $this->db->prepare('INSERT INTO marca(marca) VALUES(?)');
    $consulta->execute(array($marca['marca']));
  }

  function borrarMarca($id_marca){
    $consulta = $this->db->prepare('DELETE FROM marca WHERE id=?');
    $consulta->execute(array($id_marca));
  }

}
?>
