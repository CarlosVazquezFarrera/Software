<?php
require_once('Conexion.php');

class DatosCliente{
      function tieneDescuento($idCliente){
        $conectar = new Conexion();
        $conexion = $conectar->getConnection();
        $resultado = '';

        $SqlQuery = "SELECT vista
        FROM cliente
        WHERE idCliente = :idCliente";
        $statement = $conexion->prepare($SqlQuery);
        $statement->bindParam(':idCliente', $idCliente);
        $statement->execute();
        
        $visitas = $statement->fetch(PDO::FETCH_ASSOC);
        $numeroVisitas = $visitas['vista'];
        if ($numeroVisitas >= 9){
            $SqlQuery = "UPDATE  cliente
            SET vista = 0
            WHERE idCliente = :idCliente";

            $statement = $conexion->prepare($SqlQuery);
            $statement->bindParam(':idCliente', $idCliente);
            $statement->execute();

            $resultado = 'descuento';
        }
        else{
            $SqlQuery = "UPDATE  cliente
            SET vista = :visitas
            WHERE idCliente = :idCliente";
            $numeroVisitas++;

            $statement = $conexion->prepare($SqlQuery);
            $statement->bindParam(':visitas', $numeroVisitas);
            $statement->bindParam(':idCliente', $idCliente);
            $statement->execute();
        }
        return $resultado;
        
    }
}
?>