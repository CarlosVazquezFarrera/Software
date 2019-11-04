<?php
class Cliente{
    private $identificador;
    private $apellido;
    private $numeroCuenta;
    private $direccion;
    private $telefono;

    public function SetApellido($apellido){
        $this->apellido = $apellido;
    }
    public function GetApellido(){
        return $this->apellido;
    }

    public function SetNumeroCuenta($numeroCuenta){
        $this->numeroCuenta = $numeroCuenta;
    }
    public function GetNumeroCuenta(){
        return md5($this->numeroCuenta);
    }

    public function SetDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function GetDireccion(){
        return $this->direccion;
    }

    public function SetTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function GetTelefono(){
        return $this->telefono;
    }
    public function GetIdentificador(){
        $this->identificador = date("Y").substr($this->apellido, 0,4).rand(10,99);
        return $this->identificador;
    }
}
?>