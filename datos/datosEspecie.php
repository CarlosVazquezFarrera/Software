<?php
require_once("../Conexion.php");
require_once("../objetos/especie.php");
class DatosEspecie{
    function getEspecies(){
        $conectar = new Conexion();
        $listaEspecies = array();            
        $conexion = $conectar->getConnection();

        $SqlQuery = "SELECT IdEspecie, especie
        FROM Especie";
        $statement = $conexion->prepare($SqlQuery);
        $statement->execute();
        
        $especies = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($especies as $especie) {
            $objEspecie = new Especie();
            $objEspecie->setIdEspecie($especie['IdEspecie']);
            $objEspecie->setEspecie($especie['especie']);
            array_push($listaEspecies, $objEspecie);
        }
        return $listaEspecies;
    }
}
?>