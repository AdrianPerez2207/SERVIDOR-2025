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
            if (isset($_SESSION["puntos"]) && $_SESSION["puntos"] >= 7.5){
                echo('<a href="controlador.php?accion=sacarCarta" class="btn disabled border-0">
                        <img src="./cartas/dorso-rojo.svg" alt=""></a>');
            } else{
                echo('<a href="controlador.php?accion=sacarCarta" class="m-1"><img src="./cartas/dorso-rojo.svg" alt=""></a>');
            }
            if (isset($_SESSION["cartas"])) {
                foreach ($_SESSION["cartas"] as $carta) {
                    echo('<img src="./' . $carta['imagen'] . '" alt="" class="m-1">');
                }
            }
        ?>
    
    </div>
    <div class="d-flex">
        <div class="m-2">
            <a href="controlador.php?accion=reiniciarCartas" class="btn btn-primary">Reiniciar Cartas</a>
        </div>
        <div class="m-2">
            <a href="controlador.php?accion=reiniciarJuego" class="btn btn-primary">Reiniciar Juego</a>
        </div>
    </div>
    <div>
        <?php
            if (isset($_SESSION["partidas"]) && isset($_SESSION["ganadas"]) && isset($_SESSION["perdidas"])){
        ?>
                <div class="d-flex gap-4">
                    <div class="d-flex flex-column gap-2">
                        <strong>Puntos: <?= $_SESSION["puntos"] ?></strong>
                        <strong>Partidas: <?= $_SESSION["partidas"]; ?></strong>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <strong>Partidas Ganadas: <?= $_SESSION["ganadas"]; ?></strong>
                        <strong> PartidasPerdidas: <?= $_SESSION["perdidas"]; ?></strong>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
