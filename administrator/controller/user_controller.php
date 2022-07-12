<?php
require_once "../models/userModels.php";

class user_controller{
	/*variables de conexoion*/
	var $BaseDatos;
	var $Servidor;


	function user_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}
	public function CreateUser()
    {
        $user = new UserModel();

        if (isset($_POST['nombres'])&&isset($_POST['apellidos'])) {
	        $user->setNombres($_POST['nombres']);
	        $user->setApellidos($_POST['apellidos']);
	        $user->setCorreo($_POST['correo']);
			$user->setClave($_POST['clave']);
			$user->settipoUser($_POST['tipoUser']);
        	$userResponse = $user->CreateUser();
	        //echo  $userResponse . " response"; //BORRAR
	        if ($userResponse == 1) // exitoso
	        {
				echo("Registrado");
	            
				
	        } else {
	            echo "<h1>Error al crear usuario.</h1>";
	        }
		}
        
    }
    public function ListUser()
    {
        $user = new UserModel();
        $userResponse = $user->ListUser();
        
    }

	public function EditUser($ID){

		$user = new UserModel();

		if(isset($_POST['nombres'])&&isset($_POST['apellidos'])){
			
			$user->setidUser($ID);
			$user->setNombres($_POST['nombres']);
	        $user->setApellidos($_POST['apellidos']);
	        $user->setCorreo($_POST['correo']);
			$userResponse = $user->EditUser($ID);
			echo "<script>location.href='dashboard.php'</script>";
		}
	}
	public function buscar($id){
		$user = new UserModel();
		$userResponse = $user->BuscarUna($id);
		return $userResponse;
	}
}

?>