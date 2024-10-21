<?php
    session_start();
    include_once ("lib.php");

    //Guardamos el email en la sesión del usuario, le añadimos los proyectos iniciales.
    if (isset($_POST["formLogin"])){
        $_SESSION["usuario"] = $_POST["email"];
        $_SESSION["proyectos"] = proyectosInicio();
        header("Location: proyectos.php");
    }

    //Hacemos la acción de cerrar sesión.
    if (isset($_GET["accion"]) && strcmp($_GET["accion"], "cerrarSesion") == 0) {
        if (isset($_SESSION["usuario"])) {
            cerrarSesion();
            header("Location: proyectos.php");
        } else {
            header("Location: login.php");
        }
    }

    /*
     * Comprobamos que la acción tenga un valor y comprobamos que la accón sea igual a borrarProyecto.
     */

    if (isset($_GET["accion"]) && strcmp($_GET["accion"], "borrarProyecto") == 0) {
        //Eliminamos el proyecto con la posición (id) que le pasamos por parámetro.
        eliminarProyecto($_GET["posicion"]);
        header("Location: proyectos.php");
    }

    /*
     * Comprobamos los datos enviados por parámetro y los añadimos a los proyectos ya existentes.
     */
    if (isset($_POST["formProyecto"])){
        addProyecto($_POST["id"], $_POST["nombre"], $_POST["fechaInicio"], $_POST["fechaFinPrevista"],
            $_POST["porcentaje"], $_POST["importancia"]);
        header("Location: proyectos.php");
    }

    if (isset($_GET["accion"]) && strcmp($_GET["accion"], "borrarTodos") == 0) {
        eliminarTodos();
        header("Location: proyectos.php");
    }



