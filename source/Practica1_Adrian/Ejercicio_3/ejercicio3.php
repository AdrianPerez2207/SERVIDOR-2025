<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejercico 3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-dark d-flex justify-content-center align-items-center p-3">
        <img src="https://www.metrothegame.com/themes/metro/dist/img/general/logo.png" alt="">
    </header>

    <main class="p-2 bg-dark">
        <div class="row">
            <?php
            $personajes = array(
                array("nombre" => "Artyom", "descripcion" => "Nuestro protagonista.", "imagen" => "https://www.metrothegame.com/assets/Uploads/pages/images/_resampled/ScaleWidthWyI3NjgiXQ/ArtyomCharacter.jpg", "frase" => "NO NACIMOS PARA VIVIR EN LOS TÚNELES."),
                array("nombre" => "Anna", "descripcion" => "La mejor francotiradora de la Orden Espartana y mujer de Artyom.", "imagen" => "https://www.metrothegame.com/assets/Uploads/pages/Game/level-3/_resampled/ScaleWidthWyI3NjgiXQ/Anna-The-Game.jpg", "frase" => "QUIERO CREER QUE HAY UN MUNDO AHÍ FUERA, ARTYOM... QUIERO SOÑAR."),
                array("nombre" => "Miller", "descripcion" => "Coronel comandante de la Orden y nuestro líder en este viaje.", "imagen" => "https://www.metrothegame.com/assets/Uploads/pages/Game/level-3/_resampled/ScaleWidthWyI3NjgiXQ/Miller-The-Game.jpg", "frase" => "SE HAN SACRIFICADO DEMASIADAS VIDAS..."),
                array("nombre" => "Stepan", "descripcion" => "Tanque humano, especializado en armas pesadas.", "imagen" => "https://www.metrothegame.com/assets/Uploads/pages/images/_resampled/ScaleWidthWyI3NjgiXQ/stepan-tile.jpg", "frase" => "CORONEL... ¡NO PODEMOS DEJARLAS AQUÍ! ¡SE LAS COMERÁN VIVAS!"),
                array("nombre" => "Sam", "descripcion" => "Comandante experimentado y exmarine estadounidense.", "imagen" => "https://www.metrothegame.com/assets/Uploads/pages/images/_resampled/ScaleWidthWyI3NjgiXQ/sam-tile.jpg", "frase" => "¡NO TE PREOCUPES, HOMBRE, TODO IRÁ BIEN!"),
                array("nombre" => "Damir", "descripcion" => "Responsable de mantener al equipo de una pieza.", "imagen" => "https://www.metrothegame.com/assets/Uploads/pages/images/_resampled/ScaleWidthWyI3NjgiXQ/damir-tile.jpg", "frase" => "ESTO ES LO QUE TIENE QUE SER LA VIDA..."),
                array("nombre" => "Idiota", "descripcion" => "Nunca juzgues un libro por su portada.", "imagen" => "https://www.metrothegame.com/assets/Uploads/pages/images/_resampled/ScaleWidthWyI3NjgiXQ/idiot-tile.jpg", "frase" => "CREO QUE EL DESTINO TE TRAJO AQUÍ...")
            );

            function pintarPersonajes($personajes){
                foreach($personajes as $personaje){
                    echo "<div class='col-12 col-sm-6 col-md-6 col-xl-4 mb-4'>";
                        echo "<div class='card shadow-lg bg-dark-subtle' style='width: 18rem; '>";
                                echo "<img src='".$personaje["imagen"]."'>";
                            echo "<div class='card-body'>";
                                echo "<h1 class='card-title text-warning-emphasis fw-bold'>".$personaje["nombre"]."</h1>";
                                echo "<p class='card-text'>".$personaje["descripcion"]."</p>";
                            echo "</div>";
                            echo "<hr>";
                            echo "<p class='text-center fw-bold'>".$personaje["frase"]."</p>";
                        echo "</div>";
                    echo "</div>";

                }
            }

            pintarPersonajes($personajes);
            ?>
        </div>
    </main>

    <footer class="bg-dark text-white d-flex justify-content-center align-items-center p-3">
        <strong>Creado por ADRIÁN PÉREZ SÁNCHEZ</strong>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
