<?php
class Mascota{
    private $idMascota;
    private $alias;
    private $fechaNacimiento;
    private $raza;
    private $especie;

    function setIdMascota($idMascota){
        $this->idMascota = $idMascota;
    }
    function getIdMascota(){
        return $this->idMascota;
    }

    function setAlias($alias){
        $this->alias = $alias;
    }
    function getAlias(){
        return $this->alias;
    }

    function setFechaNacimiento($fecha){
        $this->fechaNacimiento = $fecha;
    }
    function getFechaNacimiento(){
        return $this->fechaNacimiento;
    }

    function setRaza($raza){
        $this->raza = $raza;
    }
    function getRaza(){
        return $this->raza;
    }

    function setEspecie($especie){
        $this->especie = $especie;
    }
    function getEspecie(){
        return $this->especie;
    }
}
?>