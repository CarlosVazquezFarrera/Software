<?php
class Especie{
    private $idEspecie;
    private $especie;

    public function setIdEspecie($idEspecie){
        $this->idEspecie = $idEspecie;
    }
    public function getIdEspecie(){
        return $this->idEspecie;
    }
    public function setEspecie($especie){
        $this->especie = $especie;
    }
    public function getEspecie(){
        return $this->especie;
    }

}
?>