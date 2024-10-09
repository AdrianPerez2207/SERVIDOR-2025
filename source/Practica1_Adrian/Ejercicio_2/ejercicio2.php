<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejercicio 2</title>
</head>
<body>
    <header>

    </header>
    <main>
        <?php
            $libros = array(
                array("ISBN" => "9788420479101", "titulo" => "PRESENTES", "descripcion" => "Un retrato coral, riguroso, hiperliterario y distinto -por momentos aterrador, por momentos emocionante- de una España en harapos: así empezó una dictadura eterna. Un libro excelente", "categoria" => "novela histórica", "editorial" => "Alfaguara", "foto" => "https://imagessl1.casadellibro.com/a/l/s7/01/9788420479101.webp", "precio" => 19.85 ),
                array("ISBN" => "9788466679114", "titulo" => "EL MAPA DE UN MUNDO NUEVO", "descripcion" => "Esta novela narra los años que cambiaron para siempre el curso de la historia. Cuando cada barco que regresaba a puerto podía transformar el mundo, un mapa se convertía en el bien más preciado de una corona y las hazañas de un viajero eran capaces de incendiar un imperio.", "categoria" => "novela histórica", "editorial" => " B", "foto" => "https://imagessl4.casadellibro.com/a/l/s7/14/9788466679114.webp", "precio" => 22.70 ),
                array("ISBN" => "9788466673587", "titulo" => "EL TABLERO DE LA REINA", "descripcion" => "Un thriller histórico que nos descubre los orígenes del ajedrez moderno y las intrigas de la Corte de Isabel la Católica.", "categoria" => "novela histórica", "editorial" => "B", "foto" => "https://imagessl7.casadellibro.com/a/l/s7/87/9788466673587.webp", "precio" => 21.75 ),
                array("ISBN" => "9788467074673", "titulo" => "LAS LOBAS DE POMPEYA", "descripcion" => "En un mundo a punto de extinguirse, una mujer indomable busca cambiar el rumbo de su destino.", "categoria" => "novela histórica", "editorial" => "Ediciones Destino", "foto" => "https://imagessl3.casadellibro.com/a/l/s7/73/9788467074673.webp", "precio" => 19.85 ),
                array("ISBN" => "9788425368547", "titulo" => "EL BUEN VASALLO", "descripcion" => "Hubo un tiempo en el que la península iberica estaba inmersa en guerras constantes. ", "categoria" => "novela histórica", "editorial" => " Grijalbo", "foto" => "https://imagessl7.casadellibro.com/a/l/s7/47/9788425368547.webp", "precio" => 23.65 ),
                array("ISBN" => "9788408291268", "titulo" => "EL CLAN (INSPECTORA ELENA BLANCO 5)", "descripcion" => "Magnífica, brutal y enormemente adictiva, Carmen Mola se supera en el esperado desenlace de la serie Inspectora Elena Blanco.", "categoria" => "novela negra", "editorial" => " Editorial Planeta", "foto" => "https://imagessl8.casadellibro.com/a/l/s7/68/9788408291268.webp", "precio" => 20.80 ),
                array("ISBN" => "9788466378796", "titulo" => "LAS MADRES (EDICIÓN LIMITADA) (LA NOVIA GITANA 4)", "descripcion" => "Tras el fenómeno de La novia gitana, llega la nueva entrega de la saga que cambió la novela negra española conquistando a la crítica y a más de un millón de lectores.", "categoria" => "novela negra", "editorial" => " Debolsillo", "foto" => "https://imagessl6.casadellibro.com/a/l/s7/96/9788466378796.webp", "precio" => 12.30 ),
                array("ISBN" => "9788466679923", "titulo" => "TODO MUERE (TODO ARDE 3)", "descripcion" => "Esta novela es la clave del Universo Reina Roja, el proyecto narrativo al que Juan Gómez-Jurado ha dedicado los últimos quince años.", "categoria" => "novela negra", "editorial" => "B", "foto" => "https://imagessl3.casadellibro.com/a/l/s7/23/9788466679923.webp", "precio" => 23.65 ),
                array("ISBN" => "9788466351935", "titulo" => "LA PACIENTE SILENCIOSA", "descripcion" => "SOLO ELLA SABE LO QUE SUCEDIÓ.SOLO YO PUEDO HACERLA HABLAR.", "categoria" => "novela negra", "editorial" => " Debolsillo", "foto" => "https://imagessl5.casadellibro.com/a/l/s7/35/9788466351935.webp", "precio" => 10.40 ),
                array("ISBN" => "9788420476841", "titulo" => "UN ANIMAL SALVAJE", "descripcion" => "Vuelve la «voz napoleónica, que no escribe, boxea» (El Cultural), Premio Goncourt des Lycéens, Gran Premio de Novela de la Academia Francesa, Premio Lire, Premio Qué Leer, Premio San Clemente y Premio Internacional Alicante Noir.", "categoria" => "novela negra", "editorial" => " Alfaguara", "foto" => "https://imagessl1.casadellibro.com/a/l/s7/41/9788420476841.webp", "precio" => 22.70 ),
                array("ISBN" => "9788449343032", "titulo" => "LA LEVEDAD DE LAS LIBELULAS", "descripcion" => "Carlos López-Otín, prominente figura en el ámbito de la bioquímica y la biología molecular, nos presenta una obra que fusiona magistralmente la divulgación científica y la reflexión personal. ", "categoria" => "ciencias", "editorial" => " Ediciones Paidós", "foto" => "https://imagessl2.casadellibro.com/a/l/s7/32/9788449343032.webp", "precio" => 19.85 ),
                array("ISBN" => "9788434437951", "titulo" => "LA PROPORCIÓN ÁUREA", "descripcion" => "Un clásico de la ciencia para el público no especializado que ahonda en los misterios de la relación matemática más famosa de todos los tiempos.", "categoria" => "ciencias", "editorial" => " Editorial Ariel", "foto" => "https://imagessl1.casadellibro.com/a/l/s7/51/9788434437951.webp", "precio" => 18.90 ),
                array("ISBN" => "9788492917303", "titulo" => "UNA HISTORIA DE LA INTELIGENCIA", "descripcion" => "Con lo mejor de Sapiens, Compórtate y Superintelligence, pero con un enfoque totalmente original, Breve historia de la inteligencia ofrece un cambio deparadigma sobre cómo entendemos la neurociencia y la tecnología.", "categoria" => "ciencias", "editorial" => " Tendencias", "foto" => "https://imagessl3.casadellibro.com/a/l/s7/03/9788492917303.webp", "precio" => 20.90 ),
                array("ISBN" => "9788491996897", "titulo" => "LAS MATEMÁTICAS DEL COSMOS", "descripcion" => "En esta guía sobre el cosmos, Ian Stewart describe la arquitectura del espacio y el tiempo, la materia oscura y la energía, cómo se forman las galaxias, por qué las estrellas implosionan, cómo empezó todo y cómo acabará.", "categoria" => "ciencias", "editorial" => " Editorial Crítica", "foto" => "https://imagessl7.casadellibro.com/a/l/s7/97/9788491996897.webp", "precio" => 20.80 ),
                array("ISBN" => "9788434438118", "titulo" => "LOS SIMPSON Y LAS MATEMÁTICAS", "descripcion" => "Una divertida recopilación de las enseñanzas matemáticas que aparecen en Los Simpson y un modo inmejorable de aprender esta disciplina.", "categoria" => "ciencias", "editorial" => "Editorial Ariel", "foto" => "https://imagessl8.casadellibro.com/a/l/s7/18/9788434438118.webp", "precio" => 17.00 )
            );
            function pintarLibros($libros, $categoria){
                $contador = 0;
                echo "<h2>$categoria</h2>";
                echo "<div class='row row-cols-4'>";
                    foreach($libros as $libro){
                        if($libro["categoria"] == $categoria) {
                            echo "<div class='col'>";
                                echo "<img src='{$libro["foto"]}' alt='Foto de {$libro["titulo"]}' width='100' height='150'>";
                                echo "<p>{$libro["descripcion"]}</p>";
                                echo "<h3>{$libro["titulo"]}</h3>";
                                echo "<p>Precio: {$libro["precio"]}</p>";
                            echo "</div>";
                            $contador++;
                        }
                        if($contador == 4){
                            break;
                        }
                    }
                echo "</div>";

            }

            echo "<div class='container text-center'>";
                pintarLibros($libros, "novela histórica");
                pintarLibros($libros, "novela negra");
                pintarLibros($libros, "ciencias");
            echo "</div>";
        ?>
    </main>
    <footer>

    </footer>

</body>
</html>
