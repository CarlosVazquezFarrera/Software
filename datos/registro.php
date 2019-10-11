<?php
require_once('../objetos/cliente.php');
require_once('../Conexion.php');


class datosClientes{
    private $cliente;
    private $conectar; 
    private $conexion;
       
    function registrarCliente($apellido, $numeroCuenta, $direccion, $telefono){
        
        $this->cliente = new Cliente();
        $this->conectar = new Conexion();
        $this->conexion = $this->conectar->getConnection();

        $this->cliente->SetApellido($apellido);
        $this->cliente->SetNumeroCuenta($numeroCuenta);
        $this->cliente->SetDireccion($direccion);
        $this->cliente->SetTelefono($telefono);
        
        $sqlQuery ="INSERT INTO CLIENTE (idCliente, apellidoCabeza, numeroCuenta, direccion, telefono) VALUES(:idCliente, :apellidoCabeza, :numeroCuenta, :direccion, :telefono)";
        
        $statement = $this->conexion->prepare($sqlQuery);

        $identificador = $this->cliente->GetIdentificador();
        $tarjeta = $this->cliente->GetNumeroCuenta();
        
        $statement->bindParam(':idCliente', $identificador);
        $statement->bindParam(':apellidoCabeza', $apellido);
        $statement->bindParam(':numeroCuenta', $tarjeta);
        $statement->bindParam(':direccion', $direccion);
        $statement->bindParam(':telefono', $telefono);

        try {
            $statement->execute();
            return "Se agregó al cliente: {$this->cliente->GetIdentificador()}";
        } catch (\Throwable $th) {
            return "Hubo une rror";
        }

        
    }
}








//$insertar->bind_param('ssss', $cliente->GetApellido(), $cliente->GetNumeroCuenta(), $cliente->GetDireccion(), $cliente->GetTelefono());

?>