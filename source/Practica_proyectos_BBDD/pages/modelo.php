<?php
    /**
     * Creamos una conexión a la base de datos y la devolvemos.
     */
    function conectarBD(){
        $dbh = null;
        //Metemos en la sesión la conexión a BBDD
        try {
            $dsn = "mysql:host=mariadb;dbname=practica_proyectos;charset=utf8mb4";
            $dbh = new PDO($dsn, 'root', 'toor');
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }
        return $dbh;
    }

    function consultarUsuarioEmail($email){
        $dbh = conectarBD();

        $stmt = $dbh->prepare("SELECT * FROM usuario WHERE email=:email");
        $stmt->bindParam(":email", $email);
        //Devuelve los resultados como array asociativo
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //Ejecuta la acción
        $stmt->execute();

        $dbh = null;

        //Mostramos los resultados, fech() devuelve una fila cada vez que lo llamamos
        //El select es sobre un campo UNIQUE, va a devolver 1 o nada
        if ($fila = $stmt->fetch()){
            return $fila;
        } else{
            return 0;
        }
    }

    function registrarUsuario($nombre, $apellidos, $fechaNacimiento, $numeroTelefono, $email, $password)
    {
        $dbh = conectarBD();
        $stmt = $dbh->prepare("INSERT INTO usuario (nombre, apellidos, fechaNacimiento, numeroTelefono, email, password)
        VALUES (?, ?, ?, ?, ?, ?)");

        if (strcmp($fechaNacimiento, "") == 0) {
            $fechaN = "2000-01-01";
        }

        //En lugar de guardar la contraseña, guardamos el hash de la contraseña.
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $apellidos);
        $stmt->bindParam(3, $fechaN);
        $stmt->bindParam(4, $numeroTelefono);
        $stmt->bindParam(5, $email);
        $stmt->bindParam(6, $passwordHash);
        //Ejecuta la acción
        $stmt->execute();
        //Obtenemos el id de la fila insertada
        $id = $dbh->lastInsertId();

        $dbh = null;

        return $id;
    }
    /*
     * Crea un nuevo proyecto
     * Insertamos todos los valores introducidos
     * Comprobamos las filas que han sido afectadas con rowCount(), si se ha ejecutado correctamente, devolvemos true,
     * si no, devolvemos false.
     */

    function crearProyecto($nombre, $fechaInicio, $fechaFinPrevista, $porcentajeCompletado, $importancia, $idUsuario){
        $dbh = conectarBD();
        $stmt = $dbh->prepare("INSERT INTO proyecto (nombre, fecha_inicio, fecha_prevista, porcentaje_completado,
                       importancia, id_usuario) VALUES 
                                                   (?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $fechaInicio);
        $stmt->bindParam(3, $fechaFinPrevista);
        $stmt->bindParam(4, $porcentajeCompletado);
        $stmt->bindParam(5, $importancia);
        $stmt->bindParam(6, $idUsuario);
        //Ejecuta la acción
        $stmt->execute();

        $dbh = null;
        //rowCount() devuelve el número de filas afectadas por la consulta
        if ($stmt->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Recuperamos todos los proyectos generados por el usuario.
     * Llamamos a la BBDD, cambiamos el modo de fetch para que nos devuelva un array asociativo.
     * @param $idUsuario
     * @return array|false
     */
    function recuperarProyectos($idUsuario){
        $dbh = conectarBD();
        $stmt = $dbh->prepare("SELECT * FROM proyecto WHERE id_usuario = :idUsuario");
        $stmt->bindParam(":idUsuario", $idUsuario);
        $stmt->execute();
        //Devuelve los resultados como array asociativo
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $proyectos = $stmt->fetchAll();
        return $proyectos;
    }

    /**
     * Recuperamos un proyecto con el id especificado.
     * @param $idProyecto
     * @return mixed
     */
    function recuperarProyecto($idProyecto){
        $dbh = conectarBD();
        $stmt = $dbh->prepare("SELECT * FROM proyecto WHERE id = :idProyecto");
        $stmt->bindParam(":idProyecto", $idProyecto);
        $stmt->execute();
        //Devuelve un solo resultado
        $proyectos = $stmt->fetch();
        return $proyectos;
    }

    /**
     * Eliminamos un proyecto con el id especificado.
     * @param $id
     * @return bool
     */
    function eliminarProyecto($id){
        $dbh = conectarBD();
        $stmt = $dbh->prepare("DELETE FROM proyecto WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $dbh = null;
        if ($stmt->rowCount() == 1){
            return true;
        } else{
            return false;
        }
    }

    /**
     * Buscamos un proyecto en la base de datos que coincida con el nombre del proyecto.
     * @param $nombre
     * @return array|false
     */
    function buscarProyecto($nombre){
        $dbh = conectarBD();
        $stmt = $dbh->prepare("SELECT * FROM proyecto WHERE nombre LIKE :nombre AND id_usuario = :id");
        $stmt->bindParam(":id", $_SESSION["usuario"]["id"]);
        //Consultamos el nombre sin importar lo que tenemos delante o detrás
        $nombre = "%" . $nombre . "%";
        $stmt->bindParam(":nombre", $nombre);
        $stmt->execute();
        //Devuelve los resultados como array asociativo
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        $dbh = null;
        return $resultado;
    }

    /**
     * Modificamos un proyecto con el id especificado. Le pasamos los datos por parámetros.
     * @param $idProyecto
     * @param $nombre
     * @param $fechaInicio
     * @param $fechaFinPrevista
     * @param $porcentaje
     * @param $importancia
     * @return bool
     */
    function modificarProyecto($idProyecto, $nombre, $fechaInicio, $fechaFinPrevista, $porcentaje, $importancia)
    {
        $dbh = conectarBD();
        $stmt = $dbh->prepare("UPDATE proyecto SET nombre = :nombre, fecha_inicio = :fechaInicio, 
                    fecha_prevista = :fechaFinPrevista, porcentaje_completado = :porcentaje, importancia = :importancia 
                WHERE id = :idProyecto");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":fechaInicio", $fechaInicio);
        $stmt->bindParam(":fechaFinPrevista", $fechaFinPrevista);
        $stmt->bindParam(":porcentaje", $porcentaje);
        $stmt->bindParam(":importancia", $importancia);
        $stmt->bindParam(":idProyecto", $idProyecto);
        $stmt->execute();
        if($stmt->rowCount() == 1) {
            return true;
        } else{
            return false;
        }
    }
