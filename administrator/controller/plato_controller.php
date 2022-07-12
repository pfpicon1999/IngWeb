<?php
require_once "../models/platoModels.php";

class plato_controller{
	/*variables de conexoion*/
	var $BaseDatos;
	var $Servidor;


	function plato_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}
	public function CreatePlato()
    {
        $plato = new PlatoModel();

        if (isset($_POST['nombre'])&&isset($_POST['detallePlato'])) {
	        $plato->setNombre($_POST['nombre']);
	        $plato->setDetallePlato($_POST['detallePlato']);
	        $plato->setCantidad((int)$_POST['cantidad']);
			$plato->setIngredientes($_POST['ingredientes']);
        	$platoResponse = $plato->CreatePlato();
	        //echo  $userResponse . " response"; //BORRAR
	        if ($platoResponse == 1) // exitoso
	        {
				echo("Registrado");
	            
				
	        } else {
	            echo "<h1>Error al crear un plato</h1>";
	        }
		}
        
    }
    public function ListPlato()
    {
        $plato = new PlatoModel();
        $platoResponse = $plato->ListPlato();
        
    }

	public function EditPlato($ID){

		$plato = new PlatoModel();

		if(isset($_POST['nombre'])&&isset($_POST['detallePlato'])){
			
			$plato->setidPlato($ID);
			$plato->setNombre($_POST['nombre']);
	        $plato->setDetallePlato($_POST['detallePlato']);
	        $plato->setCantidad($_POST['cantidad']);
			$plato->setIngredientes($_POST['ingredientes']);
			$platoResponse = $plato->EditPlato($ID);
			echo "<script>location.href='dashboard.php'</script>";
		}
	}
	public function buscar($id){
		$plato = new PlatoModel();
		$platoResponse = $plato->BuscarUnPlato($id);
		return $platoResponse;
	}
}

?>