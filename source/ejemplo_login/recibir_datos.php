<?php
    session_start();
    if ($_POST){
        $_SESSION['nombre'] = $_POST['nombre'];
        if (isset($_POST['apellidos'])){
            $_SESSION['apellidos'] = $_POST['apellidos'];
        }
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['telefono'] = $_POST['telefono'];
        $_SESSION['password'] = $_POST['password'];
    }
    header('Location: leer_datos.php');
