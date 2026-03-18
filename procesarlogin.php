<?php
session_start();
include 'db.php';

$usuario = trim($_POST['usuario'] ?? '');
$password = $_POST['password'] ?? '';

if ($usuario === '' || $password === '') {
    echo "Por favor llena usuario y contraseña.";
    exit;
}

$sql = "SELECT ID_usuario, Usuario, Constraseña FROM cliente WHERE Usuario = ? LIMIT 1";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo "Error en la consulta: " . $conn->error;
    exit;
}
$stmt->bind_param('s', $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($password === $row['Constraseña']) {
        $_SESSION['user_id'] = $row['ID_usuario'];
        $_SESSION['usuario'] = $row['Usuario'];
        header('Location: inicio.php');
        exit;
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}

$stmt->close();
$conn->close();
