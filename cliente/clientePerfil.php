<?php 
    require_once("../datos/datosPersona.php");
    $datos = new datosPeronas();
    $resultado = false;

    if(isset($_GET['idPersona'])){
        $resultado = $datos->eliminarPersona($_GET['idCliente'], $_GET['idPersona']);
    }
    
    $listaPersonas = $datos->getUsuarios($_GET['idCliente']);
    
    require_once('../includes/header.php');
?>
<div class="row">
    <?php if($resultado == true){?>
    <div class="col-12">
        <div class="alert alert-dark alert-dismissible fade show text-center" role="alert">
            <strong>Se ha desvinculado a la persona de este cliente</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <?php
    }?>
</div>
<div class="row">
    <div class="col-12">
        <h2>Cliente <strong><?=$_GET['idCliente']?></strong></h2>
        <div class="my-4">
            <a href="/software/persona/agregarPersona.php?idCliente=<?=$_GET['idCliente']?>">Agregar un nuevo integrante</a>
            <a class = "offset-8" href="/software/mascota/mascotaPerfiles.php?idCliente=<?=$_GET['idCliente']?>">Ver mascotas del  cliente</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Desvincular</th>
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
                    <td><a class = "btn btn-primary" href="/software/persona/editarPersona.php?idCliente=<?=$_GET['idCliente']?>&idPersona=<?=$persona->getIdPersona()?>">Editar</a></td>
                    <td><a class = "btn btn-primary" href=# onclick="eliminar('<?=$persona->getIdPersona()?>','<?=$_GET['idCliente']?>')">Desvincular</a></td>
                </tr>
                <?php
                }?>
            </tbody>
        </table>
    </div>
</div>
    

<?php require_once('../includes/footer.php')?>