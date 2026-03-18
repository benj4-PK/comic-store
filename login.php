<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ComicsStore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>ComicsStore</h1>
        <h3>Accede para encontrar tus productos</h3>
    </header>
    <main>
        <section class="register-wrapper">
            <h1>Iniciar sesión</h1>
            <form method="POST" action="procesarlogin.php" class="register-form">
                <input class="register-field" type="text" name="usuario" placeholder="Nombre de usuario" required>
                <input class="register-field" type="password" name="password" placeholder="Contraseña" required>
                <button class="register-button" type="submit">Iniciar sesión</button>
            </form>
            <p>¿No tienes cuenta? <a class="link-home" href="reg.php">Regístrate aquí</a></p>
            <a class="link-home" href="index.html">Volver a la tienda</a>
        </section>
    </main>
</body>
</html>
