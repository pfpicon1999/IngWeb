<?php 
	require_once "./header.php";

?>
<h1>Nuevos Pedidos</h1>
<div class="menuDashboard"><a href="pedido_add.php">+ Añadir Pedidos</a></div>

<?php
if(isset($_GET["id_Plato"])  && isset($_GET["Editar"])){
	$id = $_GET["id_Plato"];
	include("../controller/plato_controller.php");
	$control= new plato_controller();
	$aux= $control->buscar($id);
	echo"<form  action='puente.php?id=$id' method='post'>
	<div class='grupoInput'>
		<label for='nombre'>Nombre</label>
		<input type='text' name='nombre' id='nombre' placeholder='Ingrese el nombre del Plato' value='$aux[0]'>
	</div>
	<div class='grupoInput'>
		<label for='detallePlato'>DetallePlato</label>
		<textarea type='text' name='detallePlato' id='detallePlato' placeholder='Ingrese la descripcion del plato' value='$aux[1]'></textarea>
	</div>
	<div class='grupoInput'>
		<label for='cantidad'>Cantidad</label>
		<input type='number' name='cantidad' id='cantidad' placeholder='Ingrese la cantidad de platos disponibles' value='$aux[2]'>
	</div>
	<div class='grupoInput'>
		<label for='ingredientes'>Ingredientes</label>
		<textarea type='text' name='ingredientes' id='ingredientes' placeholder='Ingrese los ingredientes del plato' value='$aux[3]'></textarea>
	</div>
	<div class='grupoInput'>
	 <button type='submit' value='Procesar' class='btn-submit' name='EditarPlato'>Guardar</button>
	</div>
	</form>";
}else{
	echo"
	<form  action='puente.php' method='post'>
	<div class='grupoInput'>
		<label for='nombre'>Nombre del Comensal</label>
		<input type='text' name='nombre' id='nombre' placeholder='Ingrese el nombre del comensal' >
	</div>
	<div class='grupoInput'>
	<label for='Entrada'>Entrada | $3,00</label><br>

	<div class='checkbox'>
		<label><input  type='checkbox' name='entrada' id='entrada' value='1'>Coctel de Camaron</label>
	  </div><br>
	  <div class='checkbox'> 
		<label><input type='checkbox' name='entrada' id='entrada' value='2'>Rollos de Pollo</label>
	  </div><br>
	  <div class='checkbox'>
		<label><input type='checkbox' name='entrada' id='entrada' value='3'>Enrollado de Papa con Atun</label>
	  </div><br> 
	</div>

	<div class='grupoInput'>
	<label for='Plato Fuerte'> Plato Fuerte | $4,00</label><br>

	<div class='checkbox'>
		<label><input type='checkbox' name='platoFuerte' id='platoFuerte' value='4'>Coctel de Camaron</label>
	  </div><br>
	  <div class='checkbox'> 
		<label><input type='checkbox' name='platoFuerte' id='platoFuerte' value='5'>Rollos de Pollo</label>
	  </div><br>
	  <div class='checkbox'>
		<label><input type='checkbox' name='platoFuerte' id='platoFuerte' value='6'>Enrollado de Papa con Atun</label>
	  </div><br> 
	</div>

	<div class='grupoInput'>
	<label for='Postre'> Postre | $1,50</label><br>

	<div class='checkbox'>
		<label><input type='checkbox' name='postre' id='postre' value='7'>Coctel de Camaron</label>
	  </div><br>
	  <div class='checkbox'> 
		<label><input type='checkbox' name='postre' id='postre' value='8'>Rollos de Pollo</label>
	  </div><br>
	  <div class='checkbox'>
		<label><input type='checkbox' name='postre' id='postre' value='9'>Enrollado de Papa con Atun</label>
	  </div><br> 
	</div>
	<div class='grupoInput'>

	 <button type='submit' value='Procesar' class='btn-submit' name='RegistrarPedido'>Hacer Pedido</button>
	</div>
</form>
	";
}
?>
	
	



<?php require_once "./footer.php"; ?>