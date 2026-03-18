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
    $conn->close();
    if (isset($_GET['message'])) {
        echo "<script>alert('" . $_GET['message'] . "');</script>";
    }
    ?>
    <header>
        <h1>ComicsStore - Productos</h1>
        <h3>Aqui podra encontrar los productos disponibles en nuestra tienda</h3>
    </header>
    <main id="Productinhos">

        <h2>Productos disponibles</h2>
        <button id="Carrito"><a href="cart.php" class="cart-icon">🛒 Pedidos </a><span class="cart-count"><?php echo $total; ?></span><img src="img/dec7ce51d068c8378d8dc4c9b6f32372.jpg" alt="carrinho"></button>
        <button id="Agregar"><a href="">Editar Productos</a></button>
        <div class="Producto">
            <h3>Spiderman Original Marvel Gold</h3>
            <img src="https://images.cdn3.buscalibre.com/fit-in/360x360/3c/47/3c47671432bb3b1a9824fff69e56a0cd.jpg" alt="">
            <p>Descripción: Ejemplar en excelente estado</p>
            <p>Stock: 10</p>
            <p>Precio: $10000</p>
            <form action="add_to_cart.php" method="post" style="display:inline;">
                <input type="hidden" name="id_comic" value="1">
                <button type="submit">Comprar</button>
            </form>
        </div>
        <div class="Producto">
            <h3>Invencible Volumen 1</h3>
            <img src="https://http2.mlstatic.com/D_NQ_NP_799853-MLA82179656360_022025-O.webp" alt="">
            <p>Descripción: Primera edición del cómic de Invencible</p>
            <p>Stock: 8</p>
            <p>Precio: $8500</p>
            <form action="add_to_cart.php" method="post" style="display:inline;">
                <input type="hidden" name="id_comic" value="2">
                <button type="submit">Comprar</button>
            </form>
        </div>
        <div class="Producto">
            <h3>Batman: The Dark Knight Returns</h3>
            <img src="https://tombrevoort.com/wp-content/uploads/2021/11/batman-the-dark-knight-01-rizz3n-empire-pg28.jpg" alt="">
            <p>Descripción: Clásico de Frank Miller en buen estado</p>
            <p>Stock: 12</p>
            <p>Precio: $12000</p>
            <form action="add_to_cart.php" method="post" style="display:inline;">
                <input type="hidden" name="id_comic" value="3">
                <button type="submit">Comprar</button>
            </form>
        </div>
        <div class="Producto">
            <h3>Superman: Birthright</h3>
            <img src="https://http2.mlstatic.com/D_NQ_NP_991592-MLA87776728274_072025-O.webp" alt="">
            <p>Descripción: Historia del origen de Superman</p>
            <p>Stock: 6</p>
            <p>Precio: $9500</p>
            <form action="add_to_cart.php" method="post" style="display:inline;">
                <input type="hidden" name="id_comic" value="4">
                <button type="submit">Comprar</button>
            </form>
        </div>
        <div class="Producto">
            <h3>Wonder Woman: The Circle</h3>
            <img src="https://m.media-amazon.com/images/S/compressed.photo.goodreads.com/books/1711597012i/210455755.jpg" alt="">
            <p>Descripción: Aventura de la Mujer Maravilla</p>
            <p>Stock: 9</p>
            <p>Precio: $10500</p>
            <form action="add_to_cart.php" method="post" style="display:inline;">
                <input type="hidden" name="id_comic" value="5">
                <button type="submit">Comprar</button>
            </form>
        </div>
        <div class="Producto">
            <h3>The Flash: Rebirth</h3>
            <img src="https://m.media-amazon.com/images/I/91GarRw3YHL._AC_UF1000,1000_QL80_.jpg" alt="">
            <p>Descripción: Renacimiento del Velocista Escarlata</p>
            <p>Stock: 7</p>
            <p>Precio: $9000</p>
            <form action="add_to_cart.php" method="post" style="display:inline;">
                <input type="hidden" name="id_comic" value="6">
                <button type="submit">Comprar</button>
            </form>
        </div>
        <div class="Producto">
            <h3>Green Lantern: Emerald Dawn</h3>
            <img src="https://m.media-amazon.com/images/I/81fFB7Ihg1L._AC_UF1000,1000_QL80_.jpg" alt="">
            <p>Descripción: Origen de Green Lantern</p>
            <p>Stock: 11</p>
            <p>Precio: $11000</p>
            <form action="add_to_cart.php" method="post" style="display:inline;">
                <input type="hidden" name="id_comic" value="7">
                <button type="submit">Comprar</button>
            </form>
        </div>
        <div class="Producto">
            <h3>X-Men: Dark Phoenix Saga</h3>
            <img src="https://upload.wikimedia.org/wikipedia/en/5/5e/XMen135.jpg" alt="">
            <p>Descripción: Saga clásica de los X-Men</p>
            <p>Stock: 5</p>
            <p>Precio: $13000</p>
            <form action="add_to_cart.php" method="post" style="display:inline;">
                <input type="hidden" name="id_comic" value="8">
                <button type="submit">Comprar</button>
            </form>
        </div>
        <div class="Producto">
            <h3>Avengers: Infinity War Prelude</h3>
            <img src="https://cdn.marvel.com/u/prod/marvel/i/mg/2/d0/5a611024ea639/clean.jpg" alt="">
            <p>Descripción: Preludio de la Guerra del Infinito</p>
            <p>Stock: 14</p>
            <p>Precio: $11500</p>
            <form action="add_to_cart.php" method="post" style="display:inline;">
                <input type="hidden" name="id_comic" value="9">
                <button type="submit">Comprar</button>
            </form>
        </div>
        <div class="Producto">
            <h3>Deadpool: Merc with a Mouth</h3>
            <img src="https://cdn.marvel.com/u/prod/marvel/i/mg/e/80/5a0db3afe25e0/clean.jpg" alt="">
            <p>Descripción: Colección de historias de Deadpool</p>
            <p>Stock: 10</p>
            <p>Precio: $10000</p>
            <form action="add_to_cart.php" method="post" style="display:inline;">
                <input type="hidden" name="id_comic" value="10">
                <button type="submit">Comprar</button>
            </form>
        </div>
    </main>
    <footer>
    <p>Copyright 2026 - ComicsStore</p>
    <p>Contacto: info@comicsstore.com</p>
    
        <p>Ivan Roglich</p>
        <p>Jose Ariel Paredes</p>
        <p>Emmanuel Villa</p>
        <p>Benjamin Latella</p>
    <button id="regresar"><a href="index.html">Regresar</a></button>
    </footer>
    <script>
        document.querySelectorAll('form[action="add_to_cart.php"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                fetch('add_to_cart.php', {
                    method: 'POST',
                    body: formData
                }).then(response => {
                    if (response.ok) {
                        // Aumentar contador localmente
                        const countSpan = document.querySelector('.cart-count');
                        let count = parseInt(countSpan.textContent);
                        countSpan.textContent = count + 1;
                        // Mostrar mensaje de éxito
                        alert('Producto agregado al carrito');
                    }
                });
            });
        });
    </script>
</body>
</html>