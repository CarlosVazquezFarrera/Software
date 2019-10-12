<?php
require_once("../Conexion.php");
require_once("../objetos/enfermedad.php");

class DatosEnfermedad{
    function getEnfermedades(){
        $conectar = new Conexion();
        $listaEnfermedades = array();            
        $conexion = $conectar->getConnection();

        $SqlQuery = "SELECT es.especie, ef.enfermedad
        FROM especieenfermedad ep JOIN enfermedad ef ON ep.idEnfermedad = ef.idEnfermedad
        JOIN especie es ON ep.idEspecie = es.idEspecie
        ORDER BY es.especie";

        $statement = $conexion->prepare($SqlQuery);
        $statement->execute();

        $enfermedades = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($enfermedades as $enfermedad) {
            $enfermedadObj = new Enfermedad();
            $enfermedadObj->setEspecie($enfermedad['especie']);
            $enfermedadObj->setEnfermedad($enfermedad['enfermedad']);
            array_push($listaEnfermedades, $enfermedadObj);
        }
        return $listaEnfermedades;
    }

    function registrarEnfermedad($enfermedad, $idEspecie){

        $conectar = new Conexion();
        $conexion = $conectar->getConnection();

        $SqlQuery = "INSERT INTO enfermedad(enfermedad) VALUES(:enfermedad)";
        $statement = $conexion->prepare($SqlQuery);
        $statement->bindParam(':enfermedad', $enfermedad);
        try {
            if($statement->execute()){
                $idEnfermedad = $conexion->lastInsertId();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    
        $SqlQuery = "INSERT INTO especieenfermedad(idEspecie, idEnfermedad) VALUES(:idEspecie, :idEnfermedad)";
        $statement = $conexion->prepare($SqlQuery);
        $statement->bindParam(':idEspecie', $idEspecie);
        $statement->bindParam(':idEnfermedad', $idEnfermedad);
        try {
            if($statement->execute()){
                return "Enfermedad registrada";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    } 
}
?>