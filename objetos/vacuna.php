<?php
class Vacuna{
    private $idVacuna;
    private $especie;
    private $vacuna;
    private $dosis;
    private $observaciones;
    private $fecha;

    function setIdVacuna($idVacuna){
        $this->idVacuna = $idVacuna;
    }
    function getIdVacuna(){
        return $this->idVacuna;
    }
    
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
    
    function setObservaciones($observaciones){
        $this->observaciones = $observaciones;
    }
    function getObservaciones(){
        return $this->observaciones;
    }

    function setFecha($fecha){
        $this->fecha = $fecha;
    }
    function getFecha(){
        return $this->fecha;
    }
}

?>