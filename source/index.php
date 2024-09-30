<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Ejemplo PHP</h2>

    <?php
    echo "<Strong>Escrito desde PHP</strong>";
    //Variable
    $precio = 5.6;
    echo "<br>El Precio es: " . $precio;

    $precio = "Cinco coma seis";

    echo "<br>El Precio es: " . $precio . "<br>";

    var_dump($precio); //Depurar el valor de las variables, especialmente objetos y arrays.

    $mayoEdad = TRUE;
    if ($mayoEdad){
        echo "<br>El usuario es mayor de edad.";
    }
    ?>

</body>

</html>