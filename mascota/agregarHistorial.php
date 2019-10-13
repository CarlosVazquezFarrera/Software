<?php 
    require_once("../datos/datosEnfermedad.php");
    require_once("../datos/datosHistorial.php");
    $datosEnfermedad = new DatosEnfermedad();
    $resultadoRegistro = '';
    $listaEnfermedades = $datosEnfermedad->getEnfermedadesEspecie($_GET['idMascota']);

    if(isset($_GET['agregar'])){
        $historial = new DatosHistorial();
        $observaciones = ($_GET['observaciones'] == '') ?'Sin observaciones':$_GET['observaciones'];
        $resultadoRegistro = $historial->registrarHistorial($_GET['idMascota'], $_GET['enfermedad'], $observaciones);
    }

    require_once('../includes/header.php');?>
<div class="container">
    <div class="row">
        <div class="col-12">
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
        </div>
    </div>
    <div class="row">
        <div class="col-12 my-3">
            <a href="/software/mascota/verHistorialMedico.php?idCliente=<?=$_GET['idCliente']?>&idMascota=<?=$_GET['idMascota']?>">Regresar</a>
        </div>
        <div class="col-12">
            <form action="/software/mascota/agregarHistorial.php" method="get">
                <div class="form-row">
                <div class="form-group col-md-12">
                        <label for="especie">Enfermedad que ha padecido</label>
                        <select name ="enfermedad" id="enfermedad" class="form-control" required>
                            <option selected></option>
                            <?php
                            foreach($listaEnfermedades As $enfermedad){ 
                            ?>
                                <option value="<?=$enfermedad->getIdEnfermedad();?>"><?=$enfermedad->getEnfermedad();?></option>
                            <?php
                            }?>
                        </select>
                    </div> 

                    <div class="form-group col-12">
                        <label for="Observaciones">Observaciones</label>
                        <input type="text" class="form-control" name = "observaciones" id="obervaciones" placeholder = "Observaciones (opcional)" minlength = "5" maxlength = "50">
                    </div>
                    <input type = "hidden" value = "<?=$_GET['idMascota']?>" name = "idMascota">   
                    <input type = "hidden" value = "<?=$_GET['idCliente']?>" name = "idCliente">   
                    <input type = "submit" name = "agregar" value = "Registrar" class = "btn btn-primary btn-block">        
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once('../includes/footer.php');?>