<?php 
	require_once "./header.php";

?>
<h1>Gestión de Pedidos</h1>
<div class="menuDashboard"><a href="pedido_add.php">+ Añadir Pedidos</a></div>
<?php

	include("../controller/pedido_controller.php");
	$control= new pedido_controller();
	$aux= $control->ListPedido();
?>

<?php #script para mensaje de confirmacion de eliminar plato ?>

<script type="text/javascript">
function preguntar(id, urlAchivo) {
    if (confirm("Esta seguro que desea Eliminar este Campo: ")) {

        window.location.href = "puente.php?id_Recurso=" + id + "&EliminarPedido";
    }
};
</script>


<?php require_once "./footer.php"; ?>