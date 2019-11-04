<?php
class Persona{
    private $idPersona;
    private $nombre;
    private $apellido;
    private $telefono;
    private $correo;

    public function setIdPersona($idPersona){
        $this->idPersona = $idPersona;
    }
    public function getIdPersona(){
        return $this->idPersona;
    }
    public function crearIdentificador(){
        $this->idPersona =  date("Y").substr($this->nombre, 0, 6).date("d").rand(0,9);
        return $this->idPersona;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setCorreo($correo){
        $this->correo = $correo;
    }
    public function getCorreo(){
        return $this->correo;
    }
}
?>