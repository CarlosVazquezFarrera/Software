<?php
class Vacuna{
    private $especie;
    private $vacuna;
    private $dosis;
    
    function setEspecie($especie){
        $this->especie = $especie;
    }
    function getEspecie(){
        return $this->especie;
    }

    function setVacuna($vacuna){
        $this->vacuna = $vacuna;
    }
    function getVacuna(){
        return $this->vacuna;
    }

    function setDosis($dosis){
        $this->dosis =$dosis;
    }
    function getDosis(){
        return $this->dosis;
    }
}

?>