<?php
    /**
     * Creamos los 5 primeros proyectos, para pintar los días transcurridos llamamos a la función calcularDiasTranscurridos.
     * @return array[]
     * @throws DateMalformedStringException
     */
    function proyectosInicio(){
        return array(
            array("id" => 1, "nombre" => "EcoCasa", "fechaInicio" => "2024/01/01", "fechaFinPrevista" => "2024/06/30",
                "diasTranscurridos" => calcularDiasTranscurridos("2024/01/01"), "porcentajeCompletado" => "40%",
                "importancia" => "5"),
            array("id" => 2, "nombre" => "App de Salud", "fechaInicio" => "2024/02/15", "fechaFinPrevista" => "2024/10/15",
                "diasTranscurridos" => calcularDiasTranscurridos("2024/02/15"), "porcentajeCompletado" => "25%",
                "importancia" => "4"),
            array("id" => 3, "nombre" => "Rediseño Web", "fechaInicio" => "2024/03/01", "fechaFinPrevista" => "2024/09/01",
                "diasTranscurridos" => calcularDiasTranscurridos("2024/03/01"), "porcentajeCompletado" => "60%",
                "importancia" => "3"),
            array("id" => 4, "nombre" => "Formación Interna", "fechaInicio" => "2024/04/10", "fechaFinPrevista" => "2024/12/10",
                "diasTranscurridos" => calcularDiasTranscurridos("2024/04/10"), "porcentajeCompletado" => "10%",
                "importancia" => "4"),
            array("id" => 5, "nombre" => "Investigación de Mercado", "fechaInicio" => "2024/05/20", "fechaFinPrevista" => "2024/11/20",
                "diasTranscurridos" => calcularDiasTranscurridos("2024/05/20"), "porcentajeCompletado" => "5%",
                "importancia" => "2")
        );
    }

    /**
     * Calculamos el núemero de dáis transcurridos entre la fecha de inicio y la fecha actual.
     * Primero creamos la fecha actual y la fecha de inicio en formato DateTime.
     * Luego calculamos el intervalo entre ambas fechas con diff y finalmente obtenemos el número de días transcurridos con format.
     * @param $fechaInicio string
     * @return string devuelve el número de días transcurridos
     * @throws DateMalformedStringException
     */
    function calcularDiasTranscurridos($fechaInicio){
        $fechaActual = new DateTime();
        $fechaInicioCambiada = new DateTime($fechaInicio);
        $intervalo = $fechaActual->diff($fechaInicioCambiada);
        return $intervalo->format('%a');
    }

    /**
     * Buscamos la posición del elemento y lo eliminamos. AL quedar un espacio vacío dentro del array debemos de
     * volver a numerar los elementos y quitar los espacios vacíos con array_values.
     * @param $id
     * @return void
     */
    function eliminarProyecto($id){
        foreach ($_SESSION["proyectos"] as $proyecto) {
            if ($proyecto['id'] == $id) {
                unset($_SESSION["proyectos"][$proyecto]);
            }
        }
            $_SESSION["proyectos"] = array_values($_SESSION["proyectos"]);
            header("Location: proyectos.php");
    }

    /** Le pasamos todos los datos por parámetro y los añadimos a un nuevo array, luego los guardamos en la sesión
     * @param $id
     * @param $nombre
     * @param $fechaInicio
     * @param $fechaFinPrevista
     * @param $porcentajeCompletado
     * @param $importancia
     * @return void
     */
    function añadirProyecto($id, $nombre, $fechaInicio, $fechaFinPrevista, $porcentajeCompletado, $importancia){
        $proyectoNuevo = array(
          "id" => $id,
          "nombre" => $nombre,
          "fechaInicio" => $fechaInicio,
          "fechaFinPrevista" => $fechaFinPrevista,
          "diasTranscurridos" => calcularDiasTranscurridos($fechaInicio),
          "porcentajeCompletado" => $porcentajeCompletado,
          "importancia" => $importancia
        );

        $_SESSION["proyectos"][] = $proyectoNuevo;
    }