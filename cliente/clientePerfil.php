<?php 
    require_once("../datos/datosPersona.php");
    $objetoListaPersonas = new datosPeronas();
    $listaPersonas = $objetoListaPersonas->getUsuarios($_GET['cliente']);
    require_once('../includes/header.php');
?>

    <h2>Cliente <strong><?=$_GET['cliente']?></strong></h2>
    <div class="my-4">
        <a href="/software/persona/agregarPersona.php?idCliente=<?=$_GET['cliente']?>">Agregar un nuevo integrante</a>
        <a class = "offset-8" href="/software/mascota/mascotaPerfiles.php?idCliente=<?=$_GET['cliente']?>">Ver mascotas del  cliente</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
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
                <td><?=$persona->getTelefono()?></td>
                <td><?=$persona->getCorreo()?></td>
                <td><a class = "btn btn-primary" href=#>Editar</a></td>
                <td><a class = "btn btn-primary" href=#>Eliminar</a></td>
            </tr>
            <?php
            }?>
        </tbody>
    </table>

<?php require_once('../includes/footer.php')?>