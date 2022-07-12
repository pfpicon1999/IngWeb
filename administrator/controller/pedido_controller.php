<?php
require_once "../models/pedidoModels.php";

class pedido_controller{
	/*variables de conexoion*/
	var $BaseDatos;
	var $Servidor;


	function pedido_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}
	public function CreatePedido()
    {
        $pedido = new PedidoModel();

        if (isset($_POST['nombre'])&&isset($_POST['entrada'])) {
	        $pedido->setNombre($_POST['nombre']);
	        $pedido->setEntrada($_POST['entrada']);
	        $pedido->setPlatoFuerte($_POST['platoFuerte']);
			$pedido->setPostre($_POST['postre']);
            $pedido->setEstado($_POST['estado']);
            $pedido->setTotal($_POST['total']);
        	$peidoResponse = $pedido->CreatePedido();
	        //echo  $userResponse . " response"; //BORRAR
	        if ($pedidoResponse == 1) // exitoso
	        {
				echo("Registrado");
	            
				
	        } else {
	            echo "<h1>Error al crear un pedido</h1>";
	        }
		}
        
    }
    public function ListPedido()
    {
        $pedido = new PedidoModel();
        $pedidoResponse = $pedido->ListPedido();
        
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