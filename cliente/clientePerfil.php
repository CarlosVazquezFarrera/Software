<?php 
    require_once("../datos/datosPersona.php");
    $objetoListaPersonas = new datosPeronas();
    $listaPersonas = $objetoListaPersonas->getUsuarios($_GET['cliente']);
?>
<?php require_once('../includes/header.php')?>
    <h2>Cliente <strong><?=$_GET['cliente']?></strong></h2>
    <a class = "mt-5" href="/software/persona/agregarPersona.php?idCliente=<?=$_GET['cliente']?>">Agregar un nuevo integrante</a>
    <a class = "offset-8" href="/software/mascota/agregarMascota.php?idCliente=<?=$_GET['cliente']?>">Agregar una mascota</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
            <?php
            foreach($listaPersonas As $persona){
            ?>
            <tr>
                <td><?=$persona->getNombre()?></td>
                <td><?=$persona->getApellido()?></td>
                <td><a class = "btn btn-primary" href=#>Editar</a></td>
                <td><a class = "btn btn-primary" href=#>Eliminar</a></td>
            </tr>
            <?php
            }?>
            <tr>
        </tbody>
    </table>

<?php require_once('../includes/footer.php')?>