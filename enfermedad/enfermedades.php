<?php 
require_once("../datos/datosEnfermedad.php");
$objetoEenfermedades = new DatosEnfermedad();
$listaEnfermedades = $objetoEenfermedades->getEnfermedades();
require_once('../includes/header.php');?>
<div class="row">
    <div class="col-12 mt-1 mb-3">
        <a href = "/software/enfermedad/agregarEnfermedad.php">Agregar enfermedad</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Especie</th>
                    <th scope="col">Vacuna</th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach($listaEnfermedades As $enfermedad){
                ?>
                <tr>
                    <td><?=$enfermedad->getEspecie();?></td>
                    <td><?=$enfermedad->getEnfermedad();?></td>
                </tr>
                <?php
                }?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once('../includes/footer.php')?>