<?php
class Vacuna{
    private $idVacuna;
    private $especie;
    private $vacuna;
    private $dosis;
    private $observaciones;
    private $fecha;

    public function setIdVacuna($idVacuna){
        $this->idVacuna = $idVacuna;
    }
    public function getIdVacuna(){
        return $this->idVacuna;
    }
    
    public function setEspecie($especie){
        $this->especie = $especie;
    }
    public function getEspecie(){
        return $this->especie;
    }

    public function setVacuna($vacuna){
        $this->vacuna = $vacuna;
    }
    public function getVacuna(){
        return $this->vacuna;
    }

    public function setDosis($dosis){
        $this->dosis =$dosis;
    }
    public function getDosis(){
        return $this->dosis;
    }
    
    public function setObservaciones($observaciones){
        $this->observaciones = $observaciones;
    }
    public function getObservaciones(){
        return $this->observaciones;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function getFecha(){
        return $this->fecha;
    }
}

?>