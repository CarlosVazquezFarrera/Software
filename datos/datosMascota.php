<?php
require_once("../Conexion.php");
class DatosMascota{

    function registrarMascota($alias, $fechaNacimiento, $idRaza, $idCliente){
        $conectar = new Conexion();
        $conexion = $conectar->getConnection();
        
        $sqlQuery ="INSERT INTO mascota(alias, fechaNacimiento, idRaza, idCliente) VALUES (:alias, :fechaNacimiento, :idRaza, :idCliente)";
        
        $statement = $conexion->prepare($sqlQuery);

        $statement->bindParam(':alias', $alias); 
        $statement->bindParam(':fechaNacimiento', $fechaNacimiento); 
        $statement->bindParam(':idRaza', $idRaza); 
        $statement->bindParam(':idCliente', $idCliente); 
        
        try {
            $statement->execute();
            return "Registro exitoso";
        } catch (\Throwable $th) {
            return "Hubo  un  error";
        }
        
    }
}
?>