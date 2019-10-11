<?php
require_once('../objetos/cliente.php');
require_once('../Conexion.php');


class datosClientes{
      
    function registrarCliente($apellido, $numeroCuenta, $direccion, $telefono){
        
        $cliente = new Cliente();
        $conectar = new Conexion();
        $conexion = $conectar->getConnection();

        $cliente->SetApellido($apellido);
        $cliente->SetNumeroCuenta($numeroCuenta);
        $cliente->SetDireccion($direccion);
        $cliente->SetTelefono($telefono);
        
        $sqlQuery ="INSERT INTO CLIENTE (idCliente, apellidoCabeza, numeroCuenta, direccion, telefono) VALUES(:idCliente, :apellidoCabeza, :numeroCuenta, :direccion, :telefono)";
        
        $statement = $this->conexion->prepare($sqlQuery);

        $identificador = $cliente->GetIdentificador();
        $tarjeta = $cliente->GetNumeroCuenta();
        
        $statement->bindParam(':idCliente', $identificador);
        $statement->bindParam(':apellidoCabeza', $apellido);
        $statement->bindParam(':numeroCuenta', $tarjeta);
        $statement->bindParam(':direccion', $direccion);
        $statement->bindParam(':telefono', $telefono);

        try {
            $statement->execute();
            return "Se agregó al cliente: {$cliente->GetIdentificador()}";
        } catch (\Throwable $th) {
            return "Hubo une rror";
        }

        
    }
}








//$insertar->bind_param('ssss', $cliente->GetApellido(), $cliente->GetNumeroCuenta(), $cliente->GetDireccion(), $cliente->GetTelefono());

?>