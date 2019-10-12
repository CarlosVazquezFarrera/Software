<?php
class Enfermedad{
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
}
?>