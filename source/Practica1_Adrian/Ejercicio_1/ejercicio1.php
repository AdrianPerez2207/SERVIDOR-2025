<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<?php
    function subtotal($linea_pedido) {
        $subtotalPrecio = ($linea_pedido["precio"] * $linea_pedido["cant"]);

        if ($linea_pedido["iva_r"] == 0){
            $subtotalPrecio *= 1.21;
        } else {
            $subtotalPrecio *= 1.10;
        }
        return $subtotalPrecio;
    }

    function total($carrito) {
        $total = 0;
        foreach ($carrito as $linea_pedido) {
            $total += subtotal($linea_pedido);
        }
        return $total;
    }
    $carrito = array(
        array("id" => 1234, "nombre" => "PS4", "precio" => 349.95, "cant" => 2, "iva_r" => 0),
        array("id" => 1235, "nombre" => "iPhone XS", "precio" => 1249.95, "cant" => 1, "iva_r" => 0),
        array("id" => 1236, "nombre" => "Chocolate", "precio" => 9.95, "cant" => 5, "iva_r" => 1),
        array("id" => 1237, "nombre" => "Café", "precio" => 15.50, "cant" => 3, "iva_r" => 1),
        array("id" => 1238, "nombre" => "PC portátil", "precio" => 893, "cant" => 1, "iva_r" => 0),
        array("id" => 1239, "nombre" => "Tomates", "precio" => 1.50, "cant" => 4, "iva_r" => 1)
    );
    function pintarTabla($carrito){
        echo "<table class='table table-dark table-striped-columns'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>IVA</th><th>Total</th></tr>";
        foreach ($carrito as $linea_pedido) {
            echo "<tr>";
            echo "<td>".$linea_pedido["id"]."</td>";
            echo "<td>".$linea_pedido["nombre"]."</td>";
            echo "<td>".$linea_pedido["precio"]."</td>";
            echo "<td>".$linea_pedido["cant"]."</td>";
            echo "<td>".$linea_pedido["iva_r"]."</td>";
            echo "<td>".subtotal($linea_pedido)."</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td colspan='5' class='text-end'>Total</td>";
        echo "<td>".total($carrito)."</td>";
        echo "</tr>";
        echo "</table>";
    }

    pintarTabla($carrito);

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
