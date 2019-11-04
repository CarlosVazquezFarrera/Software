<?php
class Mascota{
    private $idMascota;
    private $alias;
    private $fechaNacimiento;
    private $raza;
    private $especie;

    public function setIdMascota($idMascota){
        $this->idMascota = $idMascota;
    }
    public function getIdMascota(){
        return $this->idMascota;
    }

    public function setAlias($alias){
        $this->alias = $alias;
    }
    public function getAlias(){
        return $this->alias;
    }

    public function setFechaNacimiento($fecha){
        $this->fechaNacimiento = $fecha;
    }
    public function getFechaNacimiento(){
        return $this->fechaNacimiento;
    }
    public function setRaza($raza){
        $this->raza = $raza;
    }
    public function getRaza(){
        return $this->raza;
    }

    public function setEspecie($especie){
        $this->especie = $especie;
    }
    public function getEspecie(){
        return $this->especie;
    }
}
?>