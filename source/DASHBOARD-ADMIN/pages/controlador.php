<?php
    session_start();
    include_once ("lib.php");

    if (isset($_POST["formLogin"])){
        $_SESSION["usuario"] = $_POST["email"];
        $_SESSION["proyectos"] = proyectosInicio();
        header("Location: proyectos.php");
    }

