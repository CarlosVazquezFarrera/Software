<?php 
    require_once('../datos/datosPersona.php');
    $resultadoRegistro = '';

    if(isset($_GET['asociar'])){
        $persona = new datosPeronas();
        $resultadoRegistro = $persona->asociarUsuario($_GET['idCliente'], $_GET['idPersona']);
    }

    require_once('../includes/header.php');?>
<div class="container">
    <?php
        if($resultadoRegistro !=''){?>
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong><?=$resultadoRegistro?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        }?>
    
    <form action ="asociarPersona.php"  method="get" class = "mt-5">
        <div class="form-row">
                <div class="form-group col-6">
                    <label for="Nombre">Número de cliente</label>
                    <input type="text" class="form-control" name = "idCliente"  minlength = "10" maxlength="10" placeholder = "Número de cliente" required>
                </div>
                <div class="form-group col-6">
                    <label for="Nombre">Número de persona</label>
                    <input type="text" class="form-control" name = "idPersona" minlength = "13" maxlength="13" placeholder = "Número de persona" required>
                </div>
        </div>
        <input type = "submit" name = "asociar" value = "Asociar a cliente" class = "btn btn-primary btn-block">        
    </form>
</div>  
<?php require_once('../includes/footer.php')?>


