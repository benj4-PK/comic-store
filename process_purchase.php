<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1;
}

$user_id = $_SESSION['user_id'];

// Vaciar el carrito
$sql = "DELETE FROM carrito WHERE ID_usuario = $user_id";
if ($conn->query($sql) === TRUE) {
    // Redirigir con mensaje
    header('Location: productos.php?message=Compra realizada exitosamente');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>