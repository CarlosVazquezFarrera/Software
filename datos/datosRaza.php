<?php
require_once("../Conexion.php");

if ($_POST['idEspecie']){
    $datos = new DatosRaza();
    echo $datos->getRazas($_POST['idEspecie']);
}
class DatosRaza{
    function getRazas($idEspecie){
        $conectar = new Conexion();
        $listaRaza = "<option></option>";            
        $conexion = $conectar->getConnection();

        $SqlQuery = "SELECT r.IdRaza, r.raza
            FROM raza r JOIN especie e ON r.IdEspecie = e.idEspecie
            WHERE E.idEspecie = :idEspecie";
        $statement = $conexion->prepare($SqlQuery);
        $statement->bindParam(':idEspecie', $idEspecie);            
        $statement->execute();

        $razas = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($razas as $raza) {
            $listaRaza .= "<option value = $raza[IdRaza]>$raza[raza]</option>";
        }
        return $listaRaza; 
    }
}
?>