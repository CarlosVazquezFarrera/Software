<?php 
require_once('datos/datosCliente.php');
$descuento ='';
if (isset($_GET['idCliente'])){
    $visita = new DatosCliente();
    $descuento = $visita->tieneDescuento($_GET['idCliente']);
}

require_once('includes/header.php');
?>
<?php
if($descuento !='')
{ 
?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-primary alert-dismissible fade show mt-5" role="alert">
            <div class = "text-center"><strong>¡Descuento!</strong> Visita número 10. El cliente tiene un 10% de descuento en la el cobro de la cita</div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>
</div>
<?php
}?>
<div class="mt-5">
    <h1 class = "text-center my-3">Registrar visita</h1>
    <form action="/software/" method="get" onsubmit = "return validarVisita();">
        <input type = "text" class="form-control" name = "idCliente" id = "cliente" type = "search" placeholder = "Número de cliente">
        <input type = "submit" class = "btn btn-primary btn-block mt-5" value = "Registrar visita">
    </form>
</div>
<?php require_once('includes/footer.php')?>
