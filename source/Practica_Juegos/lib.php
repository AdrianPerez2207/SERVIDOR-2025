<?php
    function generarBaraja(){
        return array(
            array("valor" => 1, "palo" => "corazones", "imagen" => "cartas/c1.svg"),
            array("valor" => 2, "palo" => "corazones", "imagen" => "cartas/c2.svg"),
            array("valor" => 3, "palo" => "corazones", "imagen" => "cartas/c3.svg"),
            array("valor" => 4, "palo" => "corazones", "imagen" => "cartas/c4.svg"),
            array("valor" => 5, "palo" => "corazones", "imagen" => "cartas/c5.svg"),
            array("valor" => 6, "palo" => "corazones", "imagen" => "cartas/c6.svg"),
            array("valor" => 7, "palo" => "corazones", "imagen" => "cartas/c7.svg"),
            array("valor" => 0.5, "palo" => "corazones", "imagen" => "cartas/c11.svg"),
            array("valor" => 0.5, "palo" => "corazones", "imagen" => "cartas/c12.svg"),
            array("valor" => 0.5, "palo" => "corazones", "imagen" => "cartas/c13.svg"),

            array("valor" => 1, "palo" => "diamantes", "imagen" => "cartas/d1.svg"),
            array("valor" => 2, "palo" => "diamantes", "imagen" => "cartas/d2.svg"),
            array("valor" => 3, "palo" => "diamantes", "imagen" => "cartas/d3.svg"),
            array("valor" => 4, "palo" => "diamantes", "imagen" => "cartas/d4.svg"),
            array("valor" => 5, "palo" => "diamantes", "imagen" => "cartas/d5.svg"),
            array("valor" => 6, "palo" => "diamantes", "imagen" => "cartas/d6.svg"),
            array("valor" => 7, "palo" => "diamantes", "imagen" => "cartas/d7.svg"),
            array("valor" => 0.5, "palo" => "diamantes", "imagen" => "cartas/d11.svg"),
            array("valor" => 0.5, "palo" => "diamantes", "imagen" => "cartas/d12.svg"),
            array("valor" => 0.5, "palo" => "diamantes", "imagen" => "cartas/d13.svg"),

            array("valor" => 1, "palo" => "picas", "imagen" => "cartas/p1.svg"),
            array("valor" => 2, "palo" => "picas", "imagen" => "cartas/p2.svg"),
            array("valor" => 3, "palo" => "picas", "imagen" => "cartas/p3.svg"),
            array("valor" => 4, "palo" => "picas", "imagen" => "cartas/p4.svg"),
            array("valor" => 5, "palo" => "picas", "imagen" => "cartas/p5.svg"),
            array("valor" => 6, "palo" => "picas", "imagen" => "cartas/p6.svg"),
            array("valor" => 7, "palo" => "picas", "imagen" => "cartas/p7.svg"),
            array("valor" => 0.5, "palo" => "picas", "imagen" => "cartas/p11.svg"),
            array("valor" => 0.5, "palo" => "picas", "imagen" => "cartas/p12.svg"),
            array("valor" => 0.5, "palo" => "picas", "imagen" => "cartas/p13.svg"),

            array("valor" => 1, "palo" => "treboles", "imagen" => "cartas/t1.svg"),
            array("valor" => 2, "palo" => "treboles", "imagen" => "cartas/t2.svg"),
            array("valor" => 3, "palo" => "treboles", "imagen" => "cartas/t3.svg"),
            array("valor" => 4, "palo" => "treboles", "imagen" => "cartas/t4.svg"),
            array("valor" => 5, "palo" => "treboles", "imagen" => "cartas/t5.svg"),
            array("valor" => 6, "palo" => "treboles", "imagen" => "cartas/t6.svg"),
            array("valor" => 7, "palo" => "treboles", "imagen" => "cartas/t7.svg"),
            array("valor" => 0.5, "palo" => "treboles", "imagen" => "cartas/t11.svg"),
            array("valor" => 0.5, "palo" => "treboles", "imagen" => "cartas/t12.svg"),
            array("valor" => 0.5, "palo" => "treboles", "imagen" => "cartas/t13.svg"),
        );
    }

    /**Barajamos la baraja con el metodo "shuffle", la extraemos del principio y la devolvemos.
     * @return mixed|null
     *
     */
    function sacarCarta(){
        shuffle($_SESSION["baraja"]);
        return array_shift($_SESSION["baraja"]);
    }

    /**Vaciamos la sesión de cartas y volvemos a generar todas las cartas en la sesión de la baraja.
     * @return void
     */
    function reiniciarJuego(){
        $_SESSION["cartas"] = array();
        $_SESSION["baraja"] = generarBaraja();
    }

    /** Calculamos las partidas, ganadas, perdidas y el total de puntos.
     * Antes de calcular las partidas, comprobamos que la sesión de partidas, perdidas y ganadas existan.
     * @return void
     */
    function calcularPartidas(){
        $totalPuntos = 0;
        if (!isset($_SESSION["partidas"])){
            $_SESSION["partidas"] = 0;
        }
        if (!isset($_SESSION["perdidas"])){
            $_SESSION["perdidas"] = 0;
        }
        if (!isset($_SESSION["ganadas"])){
            $_SESSION["ganadas"] = 0;
        }
        foreach ($_SESSION["cartas"] as $carta) {
            $totalPuntos += $carta["valor"];
        }
        if ($totalPuntos > 7.5){
            $_SESSION["partidas"]++;
            $_SESSION["perdidas"]++;
        } else if ($totalPuntos == 7.5){
            $_SESSION["partidas"]++;
            $_SESSION["ganadas"]++;
        }

    }