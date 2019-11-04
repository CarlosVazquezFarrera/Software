<?php
class Raza{
    private $idRaza;
    private $raza;

    public function setIdRaza($idRaza){
        $this->idRaza = $raza;
    }
    public function getIdRaza(){
        return $this->idRaza;
    }

    public function setRaza($raza){
        $this->raza = $raza;
    }
    public function getRaza(){
        return  $this->raza;
    }

}
?>