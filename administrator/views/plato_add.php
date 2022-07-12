<?php 
	require_once "./header.php";

?>
<h1>Nuevos Platos</h1>
<div class="menuDashboard"><a href="plato_add.php">+ Añadir Platos</a></div>

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
		<label for='nombre'>Nombre</label>
		<input type='text' name='nombre' id='nombre' placeholder='Ingrese el nombre del Plato' >
	</div>
	<div class='grupoInput'>
		<label for='detallePlato'>DetallePlato</label>
		<textarea type='text' name='detallePlato' id='detallePlato' placeholder='Ingrese la descripcion del plato' ></textarea>
	</div>
	<div class='grupoInput'>
		<label for='cantidad'>Cantidad</label>
		<input type='number' name='cantidad' id='cantidad' placeholder='Ingrese la cantidad de platos disponibles' >
	</div>
	<div class='grupoInput'>
		<label for='ingredientes'>Ingredientes</label>
		<textarea type='text' name='ingredientes' id='ingredientes' placeholder='Ingrese los ingredientes del plato'> </textarea>
	</div>
	<div class='grupoInput'>
	 <button type='submit' value='Procesar' class='btn-submit' name='RegistrarPlato'>Guardar</button>
	</div>
</form>
	";
}
?>
	
	



<?php require_once "./footer.php"; ?>