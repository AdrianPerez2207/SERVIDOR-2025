<?php
    session_start();
    include_once ("lib.php");

    //Incluimos la baraja en la sesión
    if (!isset($_SESSION["baraja"])){
        $_SESSION["baraja"] = generarBaraja();
    }
    //Comprobamos que no exista la sesion de cartas, si es así, creamos un nuevo array.
    if (!isset($_SESSION["cartas"])){
        $_SESSION["cartas"] = array();
    }

    //Hacemos la accion para sacar una carta
    /** Llamamos a la función sacar carta, generamos una nueva sesion de cartas y las guardamos.
     * Como la partida empieza, llamamos también a la función calcular partidas.
     */
    if (isset($_GET["accion"]) && strcmp($_GET["accion"], "sacarCarta") == 0) {
        $nuevaCarta = sacarCarta();
        $_SESSION["cartas"][] = $nuevaCarta;
        calcularPartidas();
        header("Location: index.php");
    }

    if (isset($_GET["accion"]) && strcmp($_GET["accion"], "reiniciarJuego") == 0) {
        reiniciarJuego();
        header("Location: index.php");
    }
