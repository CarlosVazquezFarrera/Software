<?php
require_once("../Conexion.php");
require_once("../objetos/mascota.php");
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

    function getMascotas($idCliente){
        $conectar = new Conexion();
        $listaMascotas = array();            
        $conexion = $conectar->getConnection();

        $SqlQuery = "SELECT m.idMascota, m.alias, m.fechaNacimiento, e.especie, r.raza	
        FROM mascota m JOIN raza r ON m.idRaza = r.IdRaza
        JOIN especie e ON r.IdEspecie = e.idEspecie
        WHERE m.idCliente = :idCliente";

        $statement = $conexion->prepare($SqlQuery);
        $statement->bindParam(':idCliente', $idCliente);            
        try {
            $statement->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }

        $mascotas = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($mascotas as $mascota){
            $animal = new Mascota();
            $animal->setIdMascota($mascota['idMascota']);
            $animal->setAlias($mascota['alias']);
            $animal->setFechaNacimiento($mascota['fechaNacimiento']);
            $animal->setRaza($mascota['raza']);
            $animal->setEspecie($mascota['especie']);
            array_push($listaMascotas, $animal);
        }
        return $listaMascotas;
    }
}
?>