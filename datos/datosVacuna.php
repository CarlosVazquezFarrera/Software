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
}

?>