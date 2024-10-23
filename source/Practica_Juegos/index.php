<?php
    session_start();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Juego de las siete y media</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        img{
            width: 100px;
            height: 200px;
        }
    </style>
</head>
<body class="m-4">
<header>
    <h3>Haga clic en el dorso de la carta para pedir otra carta:</h3>
</header>
<main>
    <div id="contenedor">
        <?php
            echo('<a href="controlador.php?accion=sacarCarta"><img src="./cartas/dorso-rojo.svg" alt="" class="m-1"></a>');
            if (isset($_SESSION["cartas"])) {
                foreach ($_SESSION["cartas"] as $carta) {
                    echo('<img src="./' . $carta['imagen'] . '" alt="" class="m-1">');
                }
            }

        ?>
    
    </div>
    <div class="m-6">
        <a href="controlador.php?accion=reiniciarJuego" class="btn btn-primary">Reiniciar</a>
    </div>
    <div>
        <?php
        if (isset($_SESSION["partidas"]) && isset($_SESSION["ganadas"]) && isset($_SESSION["perdidas"])){
        ?>
        <p>Partidas: <?= $_SESSION["partidas"]; ?></p>
        <p>Partidas Ganadas: <?= $_SESSION["ganadas"]; ?></p>
        <p> PartidasPerdidas: <?= $_SESSION["perdidas"]; ?></p>
        <?php
            }
        ?>
    </div>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
