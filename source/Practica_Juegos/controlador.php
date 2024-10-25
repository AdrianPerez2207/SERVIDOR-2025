<?php
    session_start();
    include_once ("lib.php");

    //Incluimos la baraja en la sesión
    if (!isset($_SESSION["baraja"])){
        $_SESSION["baraja"] = generarBaraja();
    }
    //Comprobamos que no exista la sesion de cartas, si es así, creamos una nueva sesión.
    if (!isset($_SESSION["cartas"])){
        $_SESSION["cartas"] = array();
    }

    /** Llamamos a la función sacar carta, generamos una nueva sesion de cartas y las guardamos.
     * Como la partida empieza, llamamos también a la función calcular partidas.
     */
    if (isset($_GET["accion"]) && strcmp($_GET["accion"], "sacarCarta") == 0) {
        $nuevaCarta = sacarCarta();
        $_SESSION["cartas"][] = $nuevaCarta;
        calcularPartidas();
        header("Location: index.php");
    }
    /**
     * Reiniciamos las cartas y los puntos los ponemos a 0.
     */
    if (isset($_GET["accion"]) && strcmp($_GET["accion"], "reiniciarCartas") == 0) {
        reiniciarCartas();
        header("Location: index.php");
    }

    /**
     * Reiniciamos las cartas, los puntos y las partidas los ponemos a 0.
     */
    if (isset($_GET["accion"]) && strcmp($_GET["accion"], "reiniciarJuego") == 0) {
        reiniciarJuego();
        header("Location: index.php");
    }
