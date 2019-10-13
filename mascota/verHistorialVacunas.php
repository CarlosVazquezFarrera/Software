<?php 
    require_once("../datos/datosVacuna.php");
    $datosVacuna = new DatosVacuna();
    $listaVacunas = $datosVacuna->getVacunasMascota($_GET['idMascota']);
    require_once('../includes/header.php');?>
<div class="container">
    <div class="row">
        <div class="col-12 my-2">
            <a href="/software/mascota/mascotaPerfiles.php?idCliente=<?=$_GET['idCliente']?>">Regresar</a>
            <a class = "offset-10" href="/software/mascota/agregarVacuna.php?idCliente=<?=$_GET['idCliente']?>&idMascota=<?=$_GET['idMascota']?>">Agregar</a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Vacuna suministrada</th>
                        <th scope="col">Fecha de aplicación</th>
                        <th scope="col">Dosis suministrada</th>
                        <th scope="col">Observaciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($listaVacunas As $vacuna){
                    ?>
                    <tr>
                        <td><?=$vacuna->getVacuna();?></td>
                        <td><?=$vacuna->getFecha();?></td>
                        <td><?=$vacuna->getDosis();?></td>
                        <td><?=$vacuna->getObservaciones();?></td>
                    </tr>
                    <?php
                    }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once('../includes/footer.php');?>