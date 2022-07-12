<?php 
	require_once "./header.php";

?>
<h1>Gestión de Usuarios</h1>
<div class="menuDashboard"><a href="user_add.php">+ Añadir Usuarios</a></div>
<?php

	include("../controller/user_controller.php");
	$control= new user_controller();
	$aux= $control->ListUser();
?>

<?php #script para mensaje de confirmacion de eliminar usuarios ?>
<script type="text/javascript">
function preguntar(id, urlAchivo) {
    if (confirm("Esta seguro que desea Eliminar este Campo: ")) {

        window.location.href = "puente.php?id_Recurso=" + id + "&Eliminar";
    }
};
</script>


<?php require_once "./footer.php"; ?>