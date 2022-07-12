<?php
require_once "../../dll/config.php";
require_once "../../dll/class_mysqli.php";

class UserModel 
{
  private $idUser;
  private $nombres;
  private $apellidos;
  private $correo;
  private $clave;
  private $tipoUser;
 

  #region Set y Get
  public function getIdUser(){
    return $this->idUser;
  }
  public function setIdUser($idUser){
    $this->idUser = $idUser;
  }
  public function setNombres($nombres){
    $this->nombres = $nombres;
  }
  public function setApellidos($apellidos){
    $this->apellidos = $apellidos;
  }
  public function setCorreo($correo){
    $this->correo = $correo;
  }
  public function setClave($clave){
    $this->clave = $clave;
  }
  public function settipoUser($tipoUser){
    $this->tipoUser = $tipoUser;
  }

  public function ListUser() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select id, nombres, apellidos, correo from usuarios");
    $resSQL=$miconexion->verconsultacrud();
    //$this->Disconnect();
    return $resSQL;
  }
  public function CreateUser() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    //echo("INSERT INTO `usuarios`( `nombres`, `apellidos`, `correo`, `clave`, `tipoUser`)  values('$this->nombres','$this->apellidos','$this->correo','$this->clave','$this->tipoUser')");
    $resSQL=$miconexion->consulta("INSERT INTO `usuarios`( `nombres`, `apellidos`, `correo`, `clave`, `tipoUser`)  values('$this->nombres','$this->apellidos','$this->correo','$this->clave','$this->tipoUser')");

    //$this->Disconnect();
    return $resSQL;
  }
  public function DeleteUser($idUser = 0){
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    echo("delete from usuarios where id='$idUser'");
    $resSQL=$miconexion->consulta("delete from usuarios where id='$idUser'");

    return $resSQL;
  }
  public function EditUser($idUser = 0){
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    //echo ("UPDATE usuarios SET nombres='$this->nombres',apellidos=$this->apellidos,correo=$this->correo WHERE id =$this->idUser");
    $resSQL=$miconexion->consulta("UPDATE usuarios SET nombres='$this->nombres',apellidos='$this->apellidos',correo='$this->correo' WHERE id =$this->idUser");
    return $resSQL;
  }
  public function BuscarUna($id = 0){
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select nombres, apellidos, correo from usuarios where id = $id");
    $resL=$miconexion->consulta_lista();
    return $resL;
  }
}
