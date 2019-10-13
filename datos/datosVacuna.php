<?php
require_once("../Conexion.php");
require_once("../objetos/vacuna.php");
class DatosVacuna{
    function registrarVacuna($vacuna, $dosis, $idEspecie){

        $conectar = new Conexion();
        $conexion = $conectar->getConnection();

        $SqlQuery = "INSERT INTO vacuna (vacuna) VALUES(:vacuna)";
        $statement = $conexion->prepare($SqlQuery);
        $statement->bindParam(':vacuna', $vacuna);
        try {
            if($statement->execute()){
                $idVacuna = $conexion->lastInsertId();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    
        $SqlQuery = "INSERT INTO vacunaespecie(idVacuna, idEspecie, dosis) VALUES(:idVacuna, :idEspecie, :dosis)";
        $statement = $conexion->prepare($SqlQuery);
        $statement->bindParam(':idVacuna', $idVacuna);
        $statement->bindParam(':idEspecie', $idEspecie);
        $statement->bindParam(':dosis', $dosis);
        try {
            if($statement->execute()){
                return "Vacuna registrada";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }   

    function getVacunas(){
        $conectar = new Conexion();
        $listaVacunas = array();            
        $conexion = $conectar->getConnection();

        $SqlQuery = "SELECT e.especie, v.vacuna, ve.dosis
        FROM vacunaespecie ve JOIN vacuna v ON ve.idVacuna = v.idVacuna
        JOIN especie e ON ve.idEspecie = e.idEspecie
        ORDER BY e.especie";

        $statement = $conexion->prepare($SqlQuery);
        $statement->execute();

        $vacunas = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($vacunas as $vacuna) {
            $vacunaObj = new vacuna();
            $vacunaObj->setEspecie($vacuna['especie']);
            $vacunaObj->setVacuna($vacuna['vacuna']);
            $vacunaObj->setDosis($vacuna['dosis']);
            array_push($listaVacunas, $vacunaObj);
        }
        return $listaVacunas;
    }

    function getVacunasEspecie($idMascota){
        $conectar = new Conexion();
        $listaVacunas = array();            
        $conexion = $conectar->getConnection();

        $SqlQuery = "SELECT v.idVacuna, v.vacuna
        FROM vacuna v JOIN vacunaespecie ve ON v.idVacuna = ve.idVacuna
        JOIN raza r ON r.IdEspecie = VE.idEspecie
        JOIN mascota m ON m.idRaza = r.IdRaza
        WHERE m.idMascota = :idMascota";

        $statement = $conexion->prepare($SqlQuery);
        $statement->bindParam(':idMascota', $idMascota); 
        $statement->execute();

        $vacunas = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($vacunas as $vacuna) {
            $vacunaObj = new vacuna();
            $vacunaObj->setIdVacuna($vacuna['idVacuna']);
            $vacunaObj->setVacuna($vacuna['vacuna']);
            array_push($listaVacunas, $vacunaObj);
        }
        return $listaVacunas;
    }

    function registrarVacunaAplicada($idMascota, $idVacuna, $observaciones){
        $conectar = new Conexion();
        $conexion = $conectar->getConnection();
        $SqlQuery = "INSERT INTO calendariovacuna(idMascota, idVacuna, fecha, observaciones) VALUES(:idMascota, :idVacuna, CURDATE(), :observaciones)";

        $statement = $conexion->prepare($SqlQuery);
        $statement->bindParam(':idMascota', $idMascota);
        $statement->bindParam(':idVacuna', $idVacuna);
        $statement->bindParam(':observaciones', $observaciones);
        try {
            if($statement->execute()){
                return "Registro exitoso";
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    function getVacunasMascota($idMascota){
        $conectar = new Conexion();
        $listaVacunas = array();            
        $conexion = $conectar->getConnection();

        $SqlQuery = "SELECT v.vacuna, ve.dosis, cv.fecha, cv.observaciones
        FROM calendariovacuna cv JOIN vacuna v ON cv.idVacuna = v.idVacuna
        JOIN vacunaespecie ve ON ve.idVacuna = v.idVacuna
        WHERE cv.idMascota = :idMascota";

        $statement = $conexion->prepare($SqlQuery);
        $statement->bindParam(':idMascota', $idMascota); 
        $statement->execute();

        $vacunas = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($vacunas as $vacuna) {
            $vacunaObj = new vacuna();
            $vacunaObj->setVacuna($vacuna['vacuna']);
            $vacunaObj->setFecha($vacuna['fecha']);
            $vacunaObj->setDosis($vacuna['dosis']);
            $vacunaObj->setObservaciones($vacuna['observaciones']);
            array_push($listaVacunas, $vacunaObj);
        }
        return $listaVacunas;
    }
}

?>