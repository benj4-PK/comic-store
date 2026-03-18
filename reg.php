<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
    
   
</head>
<body>
    <header>
        <h1>Registro</h1>
    </header>
    <main>
        <section class="register-wrapper">
            <h1>Crear cuenta</h1>


            <form method="POST" action="procesarreg.php" class="register-form">
                <input class="register-field" type="text" name="usuario" placeholder="Nombre de usuario">
                <input class="register-field" type="email" name="email" placeholder="Correo electrónico">
                <input class="register-field" type="password" name="password" placeholder="Contraseña" required>
                <input class="register-field" type="password" name="confirm_password" placeholder="Confirmar contraseña" required>
                <button class="register-button" type="submit">Registrarse</button>
                <p>¿Tienes una cuenta? <a class="link-home" href="login.php">Inicia Sesion aqui</a></p>
            </form>

            <a class="link-home" href="index.html">Volver a la tienda</a>
        </section>
    </main>
</body>
</html>