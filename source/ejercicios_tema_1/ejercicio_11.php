<?php
    /*11. Crea un array 7x7 con valores numéricos aleatorios excepto las diagonales que
        deben ser 1. A continuación muestra el array y después genera un vector que
        contenga la suma de cada fila y otro con la suma de cada columna.*/
    function pintarMatriz($matriz){
        foreach($matriz as $fila) {
            echo implode(' ', $fila). "<br/>";
        }
    }
    function sumarFilas($matriz){
        $suma = 0;
        for($i = 0; $i < count($matriz); $i++){
        
        }
        return $suma;
    }
    /*function sumarColumnas($matriz){
        $suma = 0;
        for($j = 0; $j < 7; $j++) {
            $suma += $matriz[$j][0] + $matriz[$j][1] + $matriz[$j][2] + $matriz[$j][3] + $matriz[$j][4] + $matriz[$j][5] + $matriz[$j][6];
        }
        return $suma;
    }*/
    $matriz = array();

    for($i = 0; $i < 7; $i++) {
        $fila = array();
        for($j = 0; $j < 7; $j++) {
            if($i == $j || $i + $j == 6) {
                $fila[] = 1;
            } else {
                $fila[] = rand(1, 9);
            }
        }
        $matriz[] = $fila;
    }
    echo "Array 7x7 con valores aleatorios excepto diagonales:". "<br/>";
    pintarMatriz($matriz);
    
    echo "Suma de las filas: ". sumarFilas($matriz). "<br/>";

?>