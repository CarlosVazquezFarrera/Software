<?php
class Enfermedad{
    private $idEnfermedad;
    private $especie;
    private $enfermedad;

    function setEspecie($especie){
        $this->especie = $especie;
    }
    function getEspecie(){
        return $this->especie;
    }

    function setEnfermedad($enfermedad){
        $this->enfermedad = $enfermedad;
    }
    function getEnfermedad(){
        return $this->enfermedad;
    }

    function setIdEnfermedad($idEnfermedad){
        $this->idEnfermedad = $idEnfermedad;
    }
    function getIdEnfermedad(){
        return $this->idEnfermedad;
    }
}
?>