<?php

    /*10. Rellena un array de 10 números enteros, con los 10 primeros números naturales.
        Calcula la media de los que están en posiciones pares y muestra los impares por
        pantalla.*/
    function pintar($array){
        echo "<br>";
        foreach($array as $valor){
            echo " ".$valor;
        }
    }

    $numbers = array();

    for ($i = 0; $i < 10; $i++) {
        $numbers[] += $i;
    }
    
    $suma = 0;
    for ($i = 0; $i < 10; $i+2) {
        $suma += $numbers[$i];
    }
    
    echo "<br>Suma de los números en posiciones pares: ".$suma;
    $media = $suma / 5;
    echo "<br>Media de los números en posiciones pares: ".$media;
    echo $media;

?>