<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    include 'db.php';
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['user_id'] = 1;
    }
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT SUM(cantidad_producto) as total FROM carrito WHERE ID_usuario = $user_id";
    $result = $conn->query($sql);
    $total = 0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total = $row['total'] ? $row['total'] : 0;
    }
    ?>
    <header>
        <h1>Pedidos</h1>
        <button id="Carrito"><a href="productos.php" class="cart-icon"><- Volver </a></button>
    </header>
    <main>
        <h2>Tu Carrito</h2>
        <?php
        $sql = "SELECT c.ID_compra, p.Nombre, p.Precio, c.cantidad_producto FROM carrito c JOIN productos p ON c.ID_comic = p.ID_comic WHERE c.ID_usuario = $user_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table border='1' style='width:100%;'>";
            echo "<tr><th>Nombre</th><th>Cantidad</th><th>Precio Unitario</th><th>Total</th><th>Acción</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Nombre'] . "</td>";
                echo "<td>" . $row['cantidad_producto'] . "</td>";
                echo "<td>$" . $row['Precio'] . "</td>";
                echo "<td>$" . ($row['Precio'] * $row['cantidad_producto']) . "</td>";
                echo "<td><form action='remove_from_cart.php' method='post' style='display:inline;'>";
                echo "<input type='hidden' name='id_compra' value='" . $row['ID_compra'] . "'>";
                echo "<button type='submit' class='btn-eliminar'>Eliminar</button>";
                echo "</form></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<br><form action='process_purchase.php' method='post'>";
            echo "<button type='submit' class='btn-comprar'>Realizar Compra</button>";
            echo "</form>";
        } else {
            echo "<p>Tu carrito está vacío.</p>";
        }
        $conn->close();
        ?>
    </main>
    
</body>
</html>