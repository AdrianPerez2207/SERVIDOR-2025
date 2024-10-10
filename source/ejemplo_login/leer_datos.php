<?php
    session_start();
    if (isset($_SESSION['nombre'])) {
        echo $_SESSION['nombre'] . "<br>";
    }
    if (isset($_SESSION['apellidos'])) {
        echo $_SESSION['apellidos'] . "<br>";
    }
    if (isset($_SESSION['email'])) {
        echo $_SESSION['email'] . "<br>";
    }
    if (isset($_SESSION['telefono'])) {
        echo $_SESSION['telefono'] . "<br>";
    }
    if (isset($_SESSION['password'])) {
        echo $_SESSION['password'] . "<br>";
    }
?>
    <a class="button" href='cerrar_sesion.php'>Cerrar sesión</a>