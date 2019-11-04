<?php 
require_once("../datos/datosMascota.php");
$datosMascota = new DatosMascota();
$listaMascotas = $datosMascota->getMascotas($_GET['idCliente']);

require_once('../includes/header.php');
?>
<div class="row">
    <div class="col-12 mt-2">
        <a href="/software/cliente/clientePerfil.php?idCliente=<?=$_GET['idCliente']?>">Regresar</a>
        <a class = "offset-9" href="/software/mascota/agregarMascota.php?idCliente=<?=$_GET['idCliente']?>">Agregar una mascota</a>
        <hr>
    </div>
</div>
<div class="row mt-5">
    <?php
    foreach($listaMascotas As $mascota){
    ?>
        <div class="col-3">
            <img src="/software/img/animales.png" class="card-img-top" alt="Animales" style="width: 100%">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Mascota: <strong><?=$mascota->getAlias()?></strong></h3>
                    <h5 class="card-subtitle mb-2 text-muted">Especie: <?=$mascota->getEspecie()?></h5>
                    <h6 class="card-subtitle mt-2 text-muted">Raza: <?=$mascota->getRaza()?></h6>
                    <p class="card-text">Fecha de nacimiento <?=$mascota->getFechaNacimiento()?></p>
                    <p class ="mt-1 mb-0"><a href="/software/mascota/verHistorialVacunas.php?idCliente=<?=$_GET['idCliente']?>&idMascota=<?=$mascota->getIdMascota()?>" class="card-link">Historial de vacunas</a></p>
                    <p class ="mt-1 mb-0"><a href="/software/mascota/verHistorialMedico.php?idCliente=<?=$_GET['idCliente']?>&idMascota=<?=$mascota->getIdMascota()?>" class="card-link">Historial médico</a></p>
                </div>
            </div>
        </div>
    <?php 
    }?>
<?php require_once('../includes/footer.php')?>