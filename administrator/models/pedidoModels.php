<?php
require_once "../../dll/config.php";
require_once "../../dll/class_mysqli.php";

class PedidoModel{
    private $idPedido;
    private $nombre;
    private $entrada;
    private $platoFuerte;
    private $postre;
    private $estado;
    private $total;

#set y get platos
public function getidPedido(){
    return $this->idPedido;
  }
  public function setidPedido($idPedido){
    $this->idPedido = $idPedido;
  }
  public function setNombre($nombre){
    $this->nombre = $nombre;
  }
  public function setEntrada($entrada){
    $this->entrada = $entrada;
  }
  public function setPlatoFuerte($platoFuerte){
    $this->platoFuerte = $platoFuerte;
  }
  public function setPostre($Postre){
    $this->postre = $postre;
  }
  public function setEstado($estado){
    $this->estado = $estado;
  }
  public function setTotal($total){
    $this->total = $total;
  }
  public function ListPedido() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select id, nombre, entrada, platoFuerte, postre, estado, total from pedidos");
    $resSQL=$miconexion->verconsultacrudpedido();
    //$this->Disconnect();
    return $resSQL;
  }
  public function CreatePedido() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);        
    $resSQL=$miconexion->consulta("INSERT INTO `pedidos`( `nombre`, `entrada`, `platoFuerte`, `postre`, 'estado', 'total')  values('$this->nombre','$this->entrada','$this->platoFuerte','$this->postre','$this->estado',''$this->total)");

    //$this->Disconnect();
    return $resSQL;
  }
  public function DeletePedido($idPedido = 0){
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    echo("delete from pedidos where id='$idPedido'");
    $resSQL=$miconexion->consulta("delete from pedidos where id='$idPedido'");

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