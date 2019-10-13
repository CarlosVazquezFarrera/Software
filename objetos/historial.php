<?php
class Historial{
    private $enfermedad;
    private $fecha;
    private $observaciones;

    function setEnfermedad($enfermedad){
        $this->enfermedad = $enfermedad;
    }
    function getEnfermedad(){
        return $this->enfermedad;
    }

    function setFecha($fecha){
        $this->fecha = $fecha;
    }
    function getFecha(){
        return $this->fecha;
    }

    function setObservaciones($observaciones){
        $this->observaciones = $observaciones;
    }
    function getObservaciones(){
        return $this->observaciones;
    }
}
?>