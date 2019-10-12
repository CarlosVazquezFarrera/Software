<?php 
    require_once("../datos/datosEspecie.php");
    require_once("../datos/datosMascota.php");
    $objetoEspecie = new DatosEspecie();
    $listaEspecies = $objetoEspecie->getEspecies();
    $resultadoRegistro = "";
    if (isset($_GET['agregar'])){
        $registro = new DatosMascota();
        $resultadoRegistro = $registro->registrarMascota($_GET['nombre'], $_GET['nacimiento'], $_GET['raza'], $_GET['idCliente']);
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
    <div class="mt-3">
        <a href="/software/cliente/clientePerfil.php?idCliente=<?=$_GET['idCliente']?>">Regresar al listado</a>
    </div>
    <form action ="agregarMascota.php"  method="get" class = "mt-1" onsubmit = "return validarMascota();">
        <div class="form-row">
                <div class="form-group col-12">
                    <label for="Nombre">Nombre</label>
                    <input type="text" class="form-control" name = "nombre" id="nombreMascota" required>
                </div>
                <div class=" form-group col-12">
                    <label for="especie">Fecha nacimiento</label>
                    <input type = "date" name = "nacimiento" id = "nacimiento" class="form-control"> 
                </div>

                <input type = "hidden" value = "<?=$_GET['idCliente']?>" name = "idCliente" class="form-control"> 

                <div class="form-group col-md-6">
                    <label for="especie">Especie</label>
                    <select name ="especie" id="especie" class="form-control" required>
                        <option selected></option>
                        <?php
                        foreach($listaEspecies as $especie){
                        ?>
                            <option value ="<?=$especie->getIdEspecie();?>"><?=$especie->getEspecie();?></option>
                        <?php
                        }?>
                    </select>
                </div>   
                <div class="form-group col-md-6">
                    <label for="raza">Raza</label>
                    <select name = "raza" id="raza" class="form-control" required>
                        <option selected></option>
                        <option>.</option>
                    </select>
                </div>    
        </div>
        <input type = "submit" name = "agregar" value = "Registrar" class = "btn btn-primary btn-block">        
    </form>
</div>  
<?php require_once('../includes/footer.php')?>
