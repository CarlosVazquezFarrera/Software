<?php
class Historial{
    private $enfermedad;
    private $fecha;
    private $observaciones;

    public function setEnfermedad($enfermedad){
        $this->enfermedad = $enfermedad;
    }
    public function getEnfermedad(){
        return $this->enfermedad;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setObservaciones($observaciones){
        $this->observaciones = $observaciones;
    }
    public function getObservaciones(){
        return $this->observaciones;
    }
}
?>