<?php
    session_start();
    include_once ("modelo.php");

    //Formuarios
    if ($_POST){
        //Cada formulario se distingue por su name del botón submit

        //Formulario de registro----------------
        if (isset($_POST["formRegistro"])){
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $fechaNacimiento = $_POST["fechaNacimiento"];
            $numeroTelefono = $_POST["numeroTelefono"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            //Consultamos si el email ya esta registrado
            if (consultarUsuarioEmail($email)){
                header("location: registro.php?error=emailYaRegistrado");
            } else{
                //Registrar el usuario en la base de datos
                $id = registrarUsuario($nombre, $apellidos, $fechaNacimiento, $numeroTelefono, $email, $password);

                //Si ha funcionadolo metemos en la sesión
                $_SESSION["usuario"] = array("email" => $email, "id" => $id);
                header("location: proyectos.php"); //Redireccionamos a la página de proyectos
            }
        }

        //Formulario de login----------------
        if (isset($_POST["formLogin"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
            $usuario = consultarUsuarioEmail($email);
            //Consultamos si el email ya esta registrado
            if ($usuario){
                //Comprobamos el password
                if (password_verify($password, $usuario["password"])){
                    //Si ha funcionadolo metemos en la sesión
                    $_SESSION["usuario"] = array("email" => $email, "id" => $usuario["id"]);
                    header("location: proyectos.php"); //Redireccionamos a la página de proyectos
                } else{
                    header("location: login.php?error=errorLogin");
                }
            } else{
                header("location: login.php?error=errorLogin");
            }
        }

        //Formulario para crear un nuevo proyecto
        if(isset($_POST["formProyecto"])) {
            $nombre = $_POST["nombre"];
            $fechaInicio = $_POST["fechaInicio"];
            $fechaFinPrevista = $_POST["fechaFinPrevista"];
            $porcentaje = $_POST["porcentaje"];
            $importancia = $_POST["importancia"];
            $idUsuario = $_SESSION["usuario"]["id"];

            $proyectoNuevo = crearProyecto($nombre, $fechaInicio, $fechaFinPrevista, $porcentaje, $importancia, $idUsuario);
            if ($proyectoNuevo){
                header("Location: proyectos.php");
            } else{
                header("Location: nuevoProyecto.php?error=errorCrearProyecto");
            }

        }

        //Modificar un proyecto
        if (isset($_POST["modificar"])){
            $idProyecto = $_POST["id"];
            $nombre = $_POST["nombre"];
            $fechaInicio = $_POST["fecha_inicio"];
            $fechaFinPrevista = $_POST["fecha_prevista"];
            $porcentaje = $_POST["porcentaje_completado"];
            $importancia = $_POST["importancia"];
            $resultado = modificarProyecto($idProyecto, $nombre, $fechaInicio, $fechaFinPrevista, $porcentaje, $importancia);
            if ($resultado) {
                header("Location: proyectos.php");
            } else {
                header("Location: proyectos.php?error=errorModificarProyecto");
            }
        }

    }

    if ($_GET){
        //-------------Eliminar proyectos----------------
        if (isset($_GET["accion"]) && $_GET["accion"] == "borrarProyecto"){
            $id = $_GET["id"];
            $proyectoEliminado = eliminarProyecto($id);
            if ($proyectoEliminado){
                header("Location: proyectos.php");
            } else{
                header("Location: proyectos.php?error=errorEliminarProyecto");
            }
        }

        //Cerramos la sesión
        if (isset($_GET["accion"]) && $_GET["accion"] == "cerrarSesion"){
            session_destroy();
            header("Location: login.php");
        }
    }



