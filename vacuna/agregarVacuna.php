<?php 
    require_once("../datos/datosEspecie.php");
    require_once("../datos/datosVacuna.php");
    $objetoEspecie = new DatosEspecie();
    $resultadoRegistro = '';
    $listaEspecies = $objetoEspecie->getEspecies();

    if(isset($_GET['agregar'])){
        $vacuna = new DatosVacuna();
        $resultadoRegistro = $vacuna->registrarVacuna(ucfirst($_GET['vacuna']), $_GET['dosis'], $_GET['especie']);
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
            <a href = "/software/vacuna/vacunas.php">Regresar</a>
            <hr>
        </div>
    </div>
    <form action ="agregarVacuna.php"  method="get" class = "mt-1" onsubmit = "return validarVacuna();">
        <div class="form-row">
                <div class="form-group col-12">
                    <label for="Nombre">Nombre de la vacuna</label>
                    <input type="text" class="form-control" name = "vacuna" id="nombreVacuna" minlength = "5" maxlength="45" placeholder = "Vacuna" required>
                </div>
                <div class="form-group col-12">
                    <label for="Nombre">Dosis de la vacuna (Mililitros)</label>
                    <input type="number" class="form-control" name = "dosis" id="dosis" step = "0.01" placeholder = "0.00" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="especie">Especie a la que se aplica</label>
                    <select name ="especie" id="especieVacuna" class="form-control" required>
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
