<?php
    require_once("../Conexion.php");
    require_once("../objetos/persona.php");
    class datosPeronas{

        function registrarUsuario($nombre, $idCliente){
            $persona = new Persona();
            $persona->setNombre($nombre);
            $conectar = new Conexion();
            $conexion = $conectar->getConnection();
            $idPersonaGenerar = $persona->crearIdentificador();
            $idPersona = $persona->getIdPersona();
                  
            $SqlQuery = "INSERT INTO clientepersona (idCliente,  idPersona) VALUES(:idCliente, :idPersona)";
            $statement = $conexion->prepare($SqlQuery);
            $statement->bindParam(':idCliente', $idCliente);
            $statement->bindParam(':idPersona', $idPersona);
            try {
                $statement->execute();
            } catch (\Throwable $th) {

            }
            
            $SqlQuery = "INSERT INTO persona (idPersona,  nombre) VALUES(:idPersona, :nombre)";
            $statement = $conexion->prepare($SqlQuery);
            $statement->bindParam(':idPersona', $idPersonaGenerar);
            $statement->bindParam(':nombre', $nombre);
            try {
                $statement->execute();
                return "Se agregó la persona: {$persona->getNombre()} al cliente {$idCliente}";   
            } catch (\Throwable $th) {
                return "Eror al agregar a la persona";
            }
        }
        function getUsuarios($idCliente){
            $conectar = new Conexion();
            $listaUsuarios = array();            
            $conexion = $conectar->getConnection();

            $SqlQuery = "SELECT p.idPersona, p.nombre, c.apellidoCabeza 
            FROM persona p JOIN clientepersona cp ON cp.idPersona = p.idPersona 
            JOIN cliente c ON cp.idCliente = c.idCliente 
            WHERE c.idCliente = :idCliente";

            $statement = $conexion->prepare($SqlQuery);
            $statement->bindParam(':idCliente', $idCliente);            
            $statement->execute();
            $empleados = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($empleados as $empleado) {
                $persona = new Persona();
                $persona->setIdPersona($empleado['idPersona']);
                $persona->setNombre($empleado['nombre']);
                $persona->setApellido($empleado['apellidoCabeza']);
                array_push($listaUsuarios, $persona);
            }
            
            return $listaUsuarios;
        }
    }
?>