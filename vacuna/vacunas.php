<?php 
require_once("../datos/datosVacuna.php");
$objetoListaVacunas = new DatosVacuna();
$listaVacunas = $objetoListaVacunas->getVacunas();
require_once('../includes/header.php');?>
<div class="row">
    <div class="col-12 mt-1 mb-3">
        <a href = "/software/vacuna/agregarVacuna.php">Agregar vacuna</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Especie</th>
                    <th scope="col">Vacuna</th>
                    <th scope="col">Dosis</th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach($listaVacunas As $vacuna){
                ?>
                <tr>
                    <td><?=$vacuna->getEspecie()?></td>
                    <td><?=$vacuna->getVacuna()?></td>
                    <td><?=$vacuna->getDosis()?></td>
                </tr>
                <?php
                }?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once('../includes/footer.php')?>