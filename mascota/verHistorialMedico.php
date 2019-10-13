<?php 
    require_once("../datos/datosHistorial.php");
    $datosHistorial = new DatosHistorial();
    $listaHistorial = $datosHistorial->getHistorial($_GET['idMascota']);
    require_once('../includes/header.php');?>

<div class="container">
    <div class="row">
    <div class="col-12 my-2">
        <a href="/software/mascota/mascotaPerfiles.php?idCliente=<?=$_GET['idCliente']?>">Regresar</a>
        <a class = "offset-10" href="/software/mascota/agregarHistorial.php?idCliente=<?=$_GET['idCliente']?>&idMascota=<?=$_GET['idMascota']?>">Agregar</a>
    </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Enfermedad</th>
                        <th scope="col">Fecha de contagio</th>
                        <th scope="col">Observaciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($listaHistorial As $historial){
                    ?>
                    <tr>
                        <td><?=$historial->getEnfermedad()?></td>
                        <td><?=$historial->getFecha()?></td>
                        <td><?=$historial->getObservaciones()?></td>
                    </tr>
                    <?php
                    }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once('../includes/footer.php');?>