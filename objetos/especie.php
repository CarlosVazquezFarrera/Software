<?php
class Especie{
    private $idEspecie;
    private $especie;

    function setIdEspecie($idEspecie){
        $this->idEspecie = $idEspecie;
    }
    function getIdEspecie(){
        return $this->idEspecie;
    }

    function setEspecie($especie){
        $this->especie = $especie;
    }
    function getEspecie(){
        return $this->especie;
    }

}
?>