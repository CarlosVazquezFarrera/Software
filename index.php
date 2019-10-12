<?php require_once('includes/header.php')?>
<div class="mt-5">
    <h1 class = "text-center">Número de cliente</h1>
    <form action="" method="get" onsubmit = "return validarBusquedaCliente();">
        <input type = "text" class="form-control" name = "idCliente" id = "cliente" type = "search" placeholder = "Número de cliente">
        <input type = "submit" class = "btn btn-primary btn-block mt-5" value = "Registrar visita">
    </form>
</div>
<?php require_once('includes/footer.php')?>
