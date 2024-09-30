<?php

    function pintar($array){
        echo "<br>";
        foreach($array as $valor){
            echo " ".$valor;
        }
    }
    
    $numeros = array();
    for ($i = 0; $i < 8; $i++) {
        do{
            $combinacion = rand(0, 49);
        } while(in_array($combinacion, $numeros));
        $numeros[] = $combinacion;
    }
    sort($numeros);
    pintar($numeros);


?>