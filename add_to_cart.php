<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1; // Usuario por defecto
}

$user_id = $_SESSION['user_id'];
$id_comic = $_POST['id_comic'];

if ($id_comic) {
    // Verificar si ya existe
    $sql = "SELECT ID_compra, cantidad_producto FROM carrito WHERE ID_usuario = $user_id AND ID_comic = $id_comic";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Aumentar cantidad
        $row = $result->fetch_assoc();
        $new_qty = $row['cantidad_producto'] + 1;
        $id_compra = $row['ID_compra'];
        $sql = "UPDATE carrito SET cantidad_producto = $new_qty WHERE ID_compra = $id_compra";
    } else {
        // Insertar nuevo
        $sql = "INSERT INTO carrito (ID_comic, ID_usuario, cantidad_producto) VALUES ($id_comic, $user_id, 1)";
    }
    
    if ($conn->query($sql) === TRUE) {
        header('Location: cart.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>