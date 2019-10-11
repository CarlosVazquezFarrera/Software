<?php
class Persona{
    private $idPersona;
    private $nombre;
    private $apellido;

    function setIdPersona($idPersona){
        $this->idPersona = $idPersona;
    }
    function getIdPersona(){
        return $this->idPersona;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function getNombre(){
        return $this->nombre;
    }

    function setApellido($apellido){
        $this->apellido = $apellido;
    }
    function getApellido(){
        return $this->apellido;
    }
    function crearIdentificador(){
        $this->idPersona =  date("Y").substr($this->nombre, 0, 6).date("d").rand(0,9);
        return $this->idPersona;
    }
}
?>