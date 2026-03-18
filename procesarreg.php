<?php
include 'db.php';

$usuario = trim($_POST['usuario'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

if ($usuario === '' || $email === '' || $password === '' || $confirm_password === '') {
    echo "Por favor completa todos los campos.";
    exit;
}

if ($password !== $confirm_password) {
    echo "Las contraseñas no coinciden.";
    exit;
}

// En este ejemplo guardamos sin hashing para mantener compatibilidad con tu esquema actual.
$sql = "INSERT INTO cliente (Usuario, Email, Constraseña) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo "Error en la consulta: " . $conn->error;
    exit;
}
$stmt->bind_param('sss', $usuario, $email, $password);
if ($stmt->execute()) {
    header('Location: login.php');
    exit;
} else {
    echo "Error al registrar: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
