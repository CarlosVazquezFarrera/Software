<?php
require_once("../Conexion.php");
require_once("../objetos/historial.php");

class DatosHistorial{
    function registrarHistorial($idMascota, $idEnfermedad, $observaciones){
        $conectar = new Conexion();
        $listaEnfermedades = array();            
        $conexion = $conectar->getConnection();

        $SqlQuery = "INSERT INTO historialmedico(idMascota, idEnfermedad, fecha, observaciones) VALUES(:idMascota, :idEnfermedad, CURDATE(), :observaciones)";
        $statement = $conexion->prepare($SqlQuery);
        $statement->bindParam(':idMascota', $idMascota);     
        $statement->bindParam(':idEnfermedad', $idEnfermedad);     
        $statement->bindParam(':observaciones', $observaciones);     
        try {
            if($statement->execute()){
                return "Registro exitoso";
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    function getHistorial($idMascota){
        $conectar = new Conexion();
        $listaHistorial = array();            
        $conexion = $conectar->getConnection();

        $SqlQuery = "SELECT e.enfermedad, hm.fecha, hm.observaciones
        FROM historialmedico hm JOIN enfermedad e ON hm.idEnfermedad = e.idEnfermedad
        WHERE hm.idMascota = :idMascota";

        $statement = $conexion->prepare($SqlQuery);
        $statement->bindParam(':idMascota', $idMascota);            
        $statement->execute();
        $datosHistorial = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($datosHistorial As $datoHistorial){
            $historial = new Historial();
            $historial->setEnfermedad($datoHistorial['enfermedad']);
            $historial->setFecha($datoHistorial['fecha']);
            $historial->setObservaciones($datoHistorial['observaciones']);
            array_push($listaHistorial, $historial);
        }
        return $listaHistorial;
    }
}
?>