<?php 
require_once("../datos/datosMascota.php");
$datosMascota = new DatosMascota();
$listaMascotas = $datosMascota->getMascotas($_GET['idCliente']);

require_once('../includes/header.php');
?>
<table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">Nombre (alias)</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Especie</th>
                <th scope="col">Raza</th>
                <th scope="col">Historial de enfermedades</th>
                <th scope="col">Historial de vacuna</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($listaMascotas As $mascota){
        ?>
            <tr>
                <th><?=$mascota->getAlias()?></th>
                <th><?=$mascota->getFechaNacimiento()?></th>
                <th><?=$mascota->getEspecie()?></th>
                <th><?=$mascota->getRaza()?></th>
                <th> <a href=#>Ver</a>
                <?=$mascota->getIdMascota()?></th>
                <th><?=$mascota->getIdMascota()?></th>
            </tr>
        <?php 
        }?>
        </tbody>
    </table>
<?php require_once('../includes/footer.php')?>