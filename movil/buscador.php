<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" href="../tools/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Resultados de Búsqueda</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
            <?php
            // Simulación de productos (normalmente vendrían de una base de datos)
            $productos = [
                ['nombre' => 'iPhone 16 Pro', 'precio' => '1.345€', 'imagen' => '../img/iphone.jpg'],
                ['nombre' => 'Intel i7 16GB 4090RTX', 'precio' => '1.321€', 'imagen' => '../img/pc.png'],
                ['nombre' => 'Teclado Gaming', 'precio' => '45€', 'imagen' => '../img/teclado.png'],
                ['nombre' => 'Logitech G Superlight', 'precio' => '81€', 'imagen' => '../img/raton.png'],
            ];

            if (isset($_GET['query'])) {
                $query = strtolower(trim($_GET['query']));
                $found = false;

                foreach ($productos as $producto) {
                    if (strpos(strtolower($producto['nombre']), $query) !== false) {
                        $found = true;
                        echo '<div class="col text-center">';
                        echo '<div class="card shadow-sm h-100">';
                        echo '<img src="' . $producto['imagen'] . '" class="card-img-top" alt="' . $producto['nombre'] . '">';
                        echo '<div class="card-body">';
                        echo '<h6 class="card-title">' . $producto['nombre'] . '</h6>';
                        echo '<p class="card-text text-muted">' . $producto['precio'] . '</p>';
                        echo '</div></div></div>';
                    }
                }

                if (!$found) {
                    echo '<p>No se encontraron resultados para "' . htmlspecialchars($query) . '".</p>';
                }
            } else {
                echo '<p>No se ha realizado ninguna búsqueda.</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>