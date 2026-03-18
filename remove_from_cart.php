<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1;
}

$id_compra = $_POST['id_compra'];

if ($id_compra) {
    $sql = "DELETE FROM carrito WHERE ID_compra = $id_compra AND ID_usuario = " . $_SESSION['user_id'];
    if ($conn->query($sql) === TRUE) {
        header('Location: cart.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>