<?php
    session_start();
    include ("lib.php");

    if (isset($_POST["email"])){
        $_SESSION["usuario"] = $_POST["email"];
        $_SESSION["proyectos"] = proyectosInicio();
        header("Location: proyectos.php");
    }
