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

            //Consultamos si el email ya esta registrado
            if (consultarUsuarioEmail($email)){
                //Comprobamo el password
                $datos = consultarHash($email);
                $passwordHash = $datos["password"];
                if (password_verify($password, $passwordHash)){
                    //Si ha funcionadolo metemos en la sesión
                    $_SESSION["usuario"] = array("email" => $email, "id" => $datos["id"]);
                    header("location: proyectos.php"); //Redireccionamos a la página de proyectos
                } else{
                    header("location: login.php?error=errorLogin");
                }
            } else{
                header("location: login.php?error=errorLogin");
            }
        }
    }



