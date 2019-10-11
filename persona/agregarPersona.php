<?php
    require_once("../datos/datosPersona.php");
    $resultadoRegistro = "";
    if(isset($_GET['nombreCliente'])){
        $persona = new datosPeronas();
        $resultadoRegistro = $persona->registrarUsuario($_GET['nombreCliente'], $_GET['idCliente']);
    }
?>

<?php require_once('../includes/header.php')?>
    <div class="container">
        <?php
        if($resultadoRegistro != ""){?>
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong><?=$resultadoRegistro?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        }?>
        <div class="mt-3">
            <a href="/software/cliente/clientePerfil.php?cliente=<?=$_GET['idCliente']?>">Regresar al listado</a>
        </div>
        <div class="formulario">
        <form action = "/software/persona/agregarPersona.php" method="get"class = "mt-3" onsubmit = "return validarPersona();">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre de la persona</label>
                <div class="col-sm-10">
                    <input name = "nombreCliente" type="text" class="form-control" id="nombreCliente" placeholder="Nombre de la persona" maxlength="20" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Apellido</label>
                <div class="col-sm-10">
                    <input name = "nombreCliente" type="text" class="form-control" id="nombreCliente" placeholder="Apellido paterno" maxlength="15" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-10">
                    <input name = "telefonoCliente" type="text" class="form-control" id="telefonoCliente" placeholder="Teléfono" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Correo eletrónico</label>
                <div class="col-sm-10">
                    <input name = "correoCliente" type="email" class="form-control" id="correoCliente" placeholder="Correo electrónico" maxlength="" required>
                </div>
            </div>
            <input type="hidden"name = "idCliente" value ="<?=$_GET['idCliente']?>">
            <input type="submit" value ="Registrar" class="btn btn-primary btn-block">
        </form>
        </div>
        
    </div>
<?php require_once('../includes/footer.php')?>