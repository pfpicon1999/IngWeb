<?php 
	require_once "./header.php";

?>
<h1>Gestión de Platos</h1>
<div class="menuDashboard"><a href="plato_add.php">+ Añadir Platos</a></div>
<?php

	include("../controller/plato_controller.php");
	$control= new plato_controller();
	$aux= $control->ListPlato();
?>

<?php #script para mensaje de confirmacion de eliminar plato ?>

<script type="text/javascript">
function preguntar(id, urlAchivo) {
    if (confirm("Esta seguro que desea Eliminar este Campo: ")) {

        window.location.href = "puente.php?id_Recurso=" + id + "&EliminarPlato";
    }
};
</script>


<?php require_once "./footer.php"; ?>