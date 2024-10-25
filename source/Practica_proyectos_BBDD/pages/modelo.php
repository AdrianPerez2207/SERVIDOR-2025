<?php
    /**
     * Creamos una conexión a la base de datos y la devolvemos.
     */
    function conectarBD(){
        $dbh = null;
        //Metemos en la sesión la conexión a BBDD
        try {
            $dsn = "mysql:host=mariadb;dbname=practica_proyectos;charset=utf8mb4";
            $dbh = new PDO($dsn, 'usuario', 'usuario');
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
            return 1;
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

    function consultarHash($email){
        $dbh = conectarBD();

        $stmt = $dbh->prepare("SELECT password FROM usuario WHERE email=:email");
        $stmt->bindParam(":email", $email);
        //Devuelve los resultados como array asociativo
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //Ejecuta la acción
        $stmt->execute();

        $dbh = null;

        //Devuelve el password como hash del usuario con ese email
        if ($fila = $stmt->fetch()){
            return $fila;
        } else{
            return null;
        }
    }

        /**
         * Creamos los 5 primeros proyectos, para pintar los días transcurridos llamamos a la función calcularDiasTranscurridos.
         * @return array[]
         * @throws DateMalformedStringException
         */
        function proyectosInicio()
        {
            return array(
                array("id" => 1, "nombre" => "EcoCasa", "fechaInicio" => "2024/01/01", "fechaFinPrevista" => "2024/06/30",
                    "diasTranscurridos" => calcularDiasTranscurridos("2024/01/01"), "porcentajeCompletado" => "40%",
                    "importancia" => "5"),
                array("id" => 2, "nombre" => "App de Salud", "fechaInicio" => "2024/02/15", "fechaFinPrevista" => "2024/10/15",
                    "diasTranscurridos" => calcularDiasTranscurridos("2024/02/15"), "porcentajeCompletado" => "25%",
                    "importancia" => "4"),
                array("id" => 3, "nombre" => "Rediseño Web", "fechaInicio" => "2024/03/01", "fechaFinPrevista" => "2024/09/01",
                    "diasTranscurridos" => calcularDiasTranscurridos("2024/03/01"), "porcentajeCompletado" => "60%",
                    "importancia" => "3"),
                array("id" => 4, "nombre" => "Formación Interna", "fechaInicio" => "2024/04/10", "fechaFinPrevista" => "2024/12/10",
                    "diasTranscurridos" => calcularDiasTranscurridos("2024/04/10"), "porcentajeCompletado" => "10%",
                    "importancia" => "4"),
                array("id" => 5, "nombre" => "Investigación de Mercado", "fechaInicio" => "2024/05/20", "fechaFinPrevista" => "2024/11/20",
                    "diasTranscurridos" => calcularDiasTranscurridos("2024/05/20"), "porcentajeCompletado" => "5%",
                    "importancia" => "2")
            );
        }

        /**
         * Calculamos el número de dáis transcurridos entre la fecha de inicio y la fecha actual.
         * Primero creamos la fecha actual y la fecha de inicio en formato DateTime.
         * Luego calculamos el intervalo entre ambas fechas con diff y finalmente obtenemos el número de días transcurridos con format.
         * @param $fechaInicio string
         * @return string devuelve el número de días transcurridos
         * @throws DateMalformedStringException
         */
        function calcularDiasTranscurridos($fechaInicio)
        {
            $fechaActual = new DateTime();
            $fechaInicioCambiada = new DateTime($fechaInicio);
            $intervalo = $fechaActual->diff($fechaInicioCambiada);
            return $intervalo->format('%a');
        }