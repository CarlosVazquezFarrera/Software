<?php 
    require_once("../datos/datosEspecie.php");
    require_once("../datos/datosEnfermedad.php");
    $objetoEspecie = new DatosEspecie();
    $resultadoRegistro = '';
    $listaEspecies = $objetoEspecie->getEspecies();

    if(isset($_GET['agregar'])){
        $enfermedad = new DatosEnfermedad();
        $resultadoRegistro = $enfermedad->registrarEnfermedad(ucfirst($_GET['enfermedad']), $_GET['especie']);
    }

    require_once('../includes/header.php');?>
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
    
    <div class="row">
        <div class="col-12 mt-2">
            <a href = "/software/enfermedad/enfermedades.php">Regresar</a>
            <hr>
        </div>
    </div>
    <form action ="/software/enfermedad/agregarEnfermedad.php"  method="get" class = "mt-1" onsubmit = "return validarEnfermedad();">
        <div class="form-row">
                <div class="form-group col-12">
                    <label for="Nombre">Nombre de la vacuna</label>
                    <input type="text" class="form-control" name = "enfermedad" id="nombreEnfermedad" minlength = "5" maxlength="45" placeholder = "Enfermedad" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="especie">Especie implicada</label>
                    <select name ="especie" id="especieEnfermedad" class="form-control" required>
                        <option selected></option>
                        <?php
                        foreach($listaEspecies as $especie){
                        ?>
                            <option value ="<?=$especie->getIdEspecie();?>"><?=$especie->getEspecie();?></option>
                        <?php
                        }?>
                    </select>
            </div>   
        </div>
        <input type = "submit" name = "agregar" value = "Registrar" class = "btn btn-primary btn-block">        
    </form>
</div>  
<?php require_once('../includes/footer.php')?>