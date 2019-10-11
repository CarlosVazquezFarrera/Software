<?php
class Cliente{
    private $identificador;
    private $apellido;
    private $numeroCuenta;
    private $direccion;
    private $telefono;

    function SetApellido($apellido){
        $this->apellido = $apellido;
    }
    function GetApellido(){
        return $this->apellido;
    }

    function SetNumeroCuenta($numeroCuenta){
        $this->numeroCuenta = $numeroCuenta;
    }
    function GetNumeroCuenta(){
        return md5($this->numeroCuenta);
    }

    function SetDireccion($direccion){
        $this->direccion = $direccion;
    }
    function GetDireccion(){
        return $this->direccion;
    }

    function SetTelefono($telefono){
        $this->telefono = $telefono;
    }
    function GetTelefono(){
        return $this->telefono;
    }
    function GetIdentificador(){
        $this->identificador = date("Y").substr($this->apellido, 0,4).rand(10,99);
        return $this->identificador;
    }
}

?>