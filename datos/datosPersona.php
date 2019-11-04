<?php
    require_once("../Conexion.php");
    require_once("../objetos/persona.php");
    class datosPeronas{

        function registrarUsuario($nombre, $apellido, $telefono, $correo, $idCliente){
            $persona = new Persona();
            $persona->setNombre($nombre);
            $idPersonaGenerar = $persona->crearIdentificador();
            $idPersona = $persona->getIdPersona();

            $conectar = new Conexion();
            $conexion = $conectar->getConnection();
                              
            $SqlQuery = "INSERT INTO clientepersona (idCliente,  idPersona) VALUES(:idCliente, :idPersona)";
            $statement = $conexion->prepare($SqlQuery);
            $statement->bindParam(':idCliente', $idCliente);
            $statement->bindParam(':idPersona', $idPersona);
            try {
                $statement->execute();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
            $SqlQuery = "INSERT INTO  persona (idPersona, nombre, apellido, telefono, correo) VALUES(:idPersona, :nombre, :apellido, :telefono, :correo)";
            $statement = $conexion->prepare($SqlQuery);
            $statement->bindParam(':idPersona', $idPersonaGenerar);
            $statement->bindParam(':nombre', $nombre);
            $statement->bindParam(':apellido', $apellido);
            $statement->bindParam(':telefono', $telefono);
            $statement->bindParam(':correo', $correo);
            try {
                $statement->execute();
                return "Se agregó a {$persona->getNombre()} al cliente {$idCliente}";   
            } catch (\Throwable $th) {
                return "Eror al agregar a la persona";
            }
        }
        function getUsuarios($idCliente){
            $conectar = new Conexion();
            $listaUsuarios = array();            
            $conexion = $conectar->getConnection();

            $SqlQuery = "SELECT p.idPersona, p.nombre, p.apellido, p.telefono, p.correo
            FROM persona p JOIN clientepersona cp ON p.idPersona = cp.idPersona
            WHERE cp.idCliente = :idCliente";

            $statement = $conexion->prepare($SqlQuery);
            $statement->bindParam(':idCliente', $idCliente);            
            $statement->execute();

            $empleados = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($empleados as $empleado) {
                $persona = new Persona();
                $persona->setIdPersona($empleado['idPersona']);
                $persona->setNombre($empleado['nombre']);
                $persona->setApellido($empleado['apellido']);
                $persona->setTelefono($empleado['telefono']);
                $persona->setCorreo($empleado['correo']);
                array_push($listaUsuarios, $persona);
            }
            return $listaUsuarios;
        }
        function asociarUsuario($idCliente, $idPersona){
            $conectar = new Conexion();
            $conexion = $conectar->getConnection();
                              
            $SqlQuery = "INSERT INTO clientepersona (idCliente,  idPersona) VALUES(:idCliente, :idPersona)";
            $statement = $conexion->prepare($SqlQuery);
            $statement->bindParam(':idCliente', $idCliente);
            $statement->bindParam(':idPersona', $idPersona);
            try {
                if($statement->execute()){
                    return "Registro exitoso";
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        function getDatosPersona($idPersona){
            $conectar = new Conexion();
            $conexion = $conectar->getConnection();

            $SqlQuery = "SELECT idPersona, nombre, apellido, telefono, correo
            FROM persona
            WHERE idPersona = :idPersona";

            $statement = $conexion->prepare($SqlQuery);
            $statement->bindParam(':idPersona', $idPersona);            
            $statement->execute();

            $datosPersona = $statement->fetch(PDO::FETCH_ASSOC);

            $persona = new Persona();
                       
            $persona->setIdPersona($datosPersona['idPersona']);
            $persona->setNombre($datosPersona['nombre']);
            $persona->setApellido($datosPersona['apellido']);
            $persona->setTelefono($datosPersona['telefono']);
            $persona->setCorreo($datosPersona['correo']);
            return $persona;
        }
        function actualizarPersona($idPersona, $nombre, $apellido, $telefono, $correo){
            $conectar = new Conexion();
            $conexion = $conectar->getConnection();

            $SqlQuery = "UPDATE persona
            SET 
            nombre = :nombre,
            apellido = :apellido,
            telefono = :telefono,
            correo = :correo
            WHERE idPersona = :idPersona";

            $statement = $conexion->prepare($SqlQuery);
            $statement->bindParam(':nombre', $nombre);            
            $statement->bindParam(':apellido', $apellido);            
            $statement->bindParam(':telefono', $telefono);            
            $statement->bindParam(':correo', $correo);            
            $statement->bindParam(':idPersona', $idPersona);            
            if($statement->execute()){
                return  true;
            }
            else{
                return false;
            }
        }
    }
?>