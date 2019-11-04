    <?php 
    require_once("../datos/datosPersona.php");
    $datosPersona = new datosPeronas();
    $resultado  = false;

    if(isset($_GET['actualizarPersona'])){
        $resultado = $datosPersona->actualizarPersona($_GET['idPersona'], 
                                                    $_GET['nombrePersona'], 
                                                    $_GET['apellidoPersona'], 
                                                    $_GET['telefonoPersona'], 
                                                    $_GET['correoPersona']);
    }
    if(isset($_GET['idPersona'])){
        $persona = $datosPersona->getDatosPersona($_GET['idPersona']);
    }
require_once('../includes/header.php');
?>
<div class="container">
    <div class="row">
        <?php
        if($resultado == true)
        {
        ?>
        <div class="col-12 mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Actualización realizada!</strong> Los datos se modificaron exitosamente
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div>
        
        <?php
        }
        ?>
        <div class="col-12 mt-3">
            <a href="/software/cliente/clientePerfil.php?idCliente=<?=$_GET['idCliente']?>">Regresar al listado</a>
            <hr>
        </div>

        <div class="col-12">
        <form action = "" method="get"class = "mt-3" onsubmit = "return validarPersona();">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre de la persona</label>
                <div class="col-sm-10">
                    <input name = "nombrePersona" type="text" class="form-control" id="nombrePersona" placeholder="Nombre de la persona" minlength = "3" maxlength="20" value = <?=$persona->getNombre()?> required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Apellido</label>
                <div class="col-sm-10">
                    <input name = "apellidoPersona" type="text" class="form-control" id="apellidoPersona" placeholder="Apellido paterno" minlength = "3" maxlength="15" value = <?=$persona->getApellido()?> required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-10">
                    <input name = "telefonoPersona" type="number" class="form-control" id="telefonoPersona" placeholder="Teléfono" value = <?=$persona->getTelefono()?> required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Correo eletrónico</label>
                <div class="col-sm-10">
                    <input name = "correoPersona" type="email" class="form-control" id="correoCliente" placeholder="Correo electrónico" maxlength = "45" value = <?=$persona->getCorreo()?> required>
                </div>
            </div>
            <input type="hidden"  name = "idCliente" value ="<?=$_GET['idCliente']?>">
            <input type="hidden"  name = "idPersona" value ="<?=$_GET['idPersona']?>">
            <input type="submit" value ="Actualizar" name ="actualizarPersona" class="btn btn-primary btn-block">
        </form>
        </div>
    </div>
</div>
<?php require_once('../includes/footer.php');?>
