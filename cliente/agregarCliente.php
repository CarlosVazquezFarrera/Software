<?php require_once('../datos/registro.php');

    $clienteRegistro = "";
    if(isset($_POST['guardar'])){   
        $registro =new datosClientes();
        $clienteRegistro = $registro->registrarCliente($_POST['apellido'], $_POST['numeroCuenta'], $_POST['direccion'], $_POST['telefono']);
    }

?>
<?php require_once('../includes/header.php')?>

<div class="container" >

    <?php if($clienteRegistro != "")
    {?>
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        <strong><?=$clienteRegistro?></strong> ya puede ascociar personas a él.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
    }
    ?>
    <form action="/software/cliente/agregarCliente.php" method="post"class = "my-2" onsubmit = "return validarFormulario();">
        <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Apellido de cabeza</label>
            <div class="col-sm-10">
                <input type="text" name = "apellido"  class="form-control form-control-sm" id="clienteApellido" placeholder = "Apellido de cabeza" minlength = "5" maxlength = "15" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Número de tarjeta</label>
            <div class="col-sm-10">
                <input type="number" name = "numeroCuenta" class="form-control form-control-sm" id = "clienteNumero" placeholder = "Número de tarjeta" maxlength = "5" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Dirección</label>
            <div class="col-sm-10">
                <input type="text" name = "direccion" class="form-control form-control-sm" id="clienteDireccion" placeholder = "Dirección" minlength = "15" maxlength = "50" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Teléfono</label>
            <div class="col-sm-10">
                <input type="tel" name = "telefono" class="form-control form-control-sm" id="clienteTelefono" placeholder = "Teléfono" minlength = "10" maxlength = "10" required>
            </div>
        </div>
        <input type = "submit" name = "guardar" value = "Guardar" class="btn btn-primary btn-sm btn-block" id ="clienteGuardar" required>
    </form>
</div>
<?php require_once('../includes/footer.php')?>
