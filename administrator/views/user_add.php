<?php 
	require_once "./header.php";

?>
<h1>Nuevo Usuarios</h1>
<div class="menuDashboard"><a href="user_add.php">+ Añadir Usuarios</a></div>
<?php
 if(isset($_GET["id_Recurso"])  && isset($_GET["Editar"])){
	$id = $_GET["id_Recurso"];
	include("../controller/user_controller.php");
	$control= new user_controller();
	$aux= $control->buscar($id);
	//echo $aux;
	echo"<form  action='puente.php?id=$id' method='post'>
	<div class='grupoInput'>
		<label for='nombres'>Nombres</label>
		<input type='text' name='nombres' id='nombres' placeholder='Ingrese su nombre' value='$aux[0]'>
	</div>
	<div class='grupoInput'>
		<label for='apellidos'>Apellidos</label>
		<input type='text' name='apellidos' id='apellidos' placeholder='Ingrese su apellido' value='$aux[1]'>
	</div>
	<div class='grupoInput'>
		<label for='correo'>Correo</label>
		<input type='email' name='correo' id='correo' placeholder='Ingrese su correo' value='$aux[2]'>
	</div>
	<div class='grupoInput'>
	 <button type='submit' value='Procesar' class='btn-submit' name='EditarUsuario'>Procesar</button>
	</div>
</form>";
 }else{
	
	echo"<form  action='puente.php' method='post'>
	<div class='grupoInput'>
		<label for='nombres'>Nombres</label>
		<input type='text' name='nombres' id='nombres' placeholder='Ingrese su nombre' >
	</div>
	<div class='grupoInput'>
		<label for='apellidos'>Apellidos</label>
		<input type='text' name='apellidos' id='apellidos' placeholder='Ingrese su apellido' >
	</div>
	<div class='grupoInput'>
		<label for='correo'>Correo</label>
		<input type='email' name='correo' id='correo' placeholder='Ingrese su correo' >
	</div>
	<div class='grupoInput'>
		<label for='clave'>Clave</label>
		<input type='password' name='clave' id='clave' placeholder='Ingrese su clave'>
	</div>
	<div class='grupoInput'>
		<label for='tipoUser'>Tipo de usuario</label>
		<select id='tipoUser' name='tipoUser'>
			<option>--</option>
			<option value='1'>Administrador</option>
			<option value='2'>Visitante</option>
		</select>
	</div>
	<div class='grupoInput'>
	 <button type='submit' value='Procesar' class='btn-submit' name='RegistrarUsuario'>Procesar</button>
	</div>
</form>";
 }

?>

<?php require_once "./footer.php"; ?>