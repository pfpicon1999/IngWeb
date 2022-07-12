<?php
require_once "../../dll/config.php";
require_once "../../dll/class_mysqli.php";

class PlatoModel{
    private $idPlato;
    private $nombre;
    private $detallePlato;
    private $cantidad;
    private $ingredientes;

#set y get platos
public function getidPlato(){
    return $this->idPlato;
  }
  public function setidPlato($idPlato){
    $this->idPlato = $idPlato;
  }
  public function setNombre($nombre){
    $this->nombre = $nombre;
  }
  public function setDetallePlato($detallePlato){
    $this->detallePlato = $detallePlato;
  }
  public function setCantidad($cantidad){
    $this->cantidad = $cantidad;
  }
  public function setIngredientes($ingredientes){
    $this->ingredientes = $ingredientes;
  }
  public function ListPlato() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select id, nombre, detallePlato, cantidad, ingredientes from platos");
    $resSQL=$miconexion->verconsultacrudplato();
    //$this->Disconnect();
    return $resSQL;
  }
  public function CreatePlato() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    //echo("INSERT INTO `usuarios`( `nombres`, `apellidos`, `correo`, `clave`, `tipoUser`)  values('$this->nombres','$this->apellidos','$this->correo','$this->clave','$this->tipoUser')");
    $resSQL=$miconexion->consulta("INSERT INTO `platos`( `nombre`, `detallePlato`, `cantidad`, `ingredientes`)  values('$this->nombre','$this->detallePlato','$this->cantidad','$this->ingredientes')");

    //$this->Disconnect();
    return $resSQL;
  }
  public function DeletePlato($idPlato = 0){
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    echo("delete from platos where id='$idPlato'");
    $resSQL=$miconexion->consulta("delete from platos where id='$idPlato'");

    return $resSQL;
  }
  public function EditPlato($idPlato = 0){
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    //echo ("UPDATE usuarios SET nombres='$this->nombres',apellidos=$this->apellidos,correo=$this->correo WHERE id =$this->idUser");
    $resSQL=$miconexion->consulta("UPDATE platos SET nombre='$this->nombre',detallePlato='$this->detallePlato',cantidad='$this->cantidad',ingredientes='$this->ingredientes' WHERE id =$this->idPlato");
    return $resSQL;
  }
  public function BuscarUnPlato($id = 0){
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select nombre, detallePlato, cantidad, ingredientes from platos where id = $id");
    $resL=$miconexion->consulta_lista();
    return $resL;
  }
}
?>