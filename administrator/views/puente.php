<?php

	include("../controller/user_controller.php");
	$control= new user_controller();
    include("../controller/plato_controller.php");
	$controlplato= new plato_controller();
    
//cambios usuarios
if (isset($_POST['RegistrarUsuario'])) {
	    $control-> CreateUser();
        echo "<script>location.href='dashboard.php'</script>";
}
if(isset($_GET["id_Recurso"])  && isset($_GET["Eliminar"])){
    $ID= $_GET["id_Recurso"];
    $user = new UserModel();
    $userResponse = $user->DeleteUser($ID);
	echo "<script>location.href='dashboard.php'</script>";
}

if (isset($_POST['EditarUsuario'])) {
    $ID= $_GET["id"];
    $control->  EditUser($ID);
    echo "<script>location.href='dashboard.php'</script>";
}

//cambios platos
//registrar plato
if (isset($_POST['RegistrarPlato'])) {
    $controlplato-> CreatePlato();
    echo "<script>location.href='dashboard.php'</script>";
}
//eliminar plato
if(isset($_GET["id_Recurso"])  && isset($_GET["EliminarPlato"])){ 
    $ID= $_GET["id_Recurso"];
    $plato = new PlatoModel();
    $platoResponse = $plato->DeletePlato($ID);
	echo "<script>location.href='dashboard.php'</script>";
}
//editar plato
if (isset($_POST['EditarPlato'])) {
    $ID= $_GET["id"];
    $controlplato->  EditPlato($ID);
    echo "<script>location.href='dashboard.php'</script>";
}

?>
