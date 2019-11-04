<?php
class Enfermedad{
    private $idEnfermedad;
    private $especie;
    private $enfermedad;

    public function setEspecie($especie){
        $this->especie = $especie;
    }
    public function getEspecie(){
        return $this->especie;
    }
    public function setEnfermedad($enfermedad){
        $this->enfermedad = $enfermedad;
    }
    public function getEnfermedad(){
        return $this->enfermedad;
    }
    public function setIdEnfermedad($idEnfermedad){
        $this->idEnfermedad = $idEnfermedad;
    }
    public function getIdEnfermedad(){
        return $this->idEnfermedad;
    }
}
?>