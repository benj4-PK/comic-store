<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? $conn->real_escape_string(trim($_POST['email'])) : '';
    $password = isset($_POST['password']) ? $conn->real_escape_string(trim($_POST['password'])) : '';

    if (!$email || !$password) {
        header('Location: login.php?error=' . urlencode('Completa todos los campos.'));
        exit;
    }

    $sql = "SELECT ID_usuario, Usuario, Email, Constraseña FROM cliente WHERE Email = '$email' LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($user['Constraseña'] === $password) {
            $_SESSION['user_id'] = $user['ID_usuario'];
            $_SESSION['username'] = $user['Usuario'];
            header('Location: productos.php');
            exit;
        }
    }

    header('Location: login.php?error=' . urlencode('Correo o contraseña incorrectos.'));
    exit;
}

header('Location: login.php');
exit;
