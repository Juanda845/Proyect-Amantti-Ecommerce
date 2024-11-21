<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título de la página que aparece en la pestaña del navegador -->
    <title>Listado de Productos</title>
    <!-- Enlace a Bootstrap CSS para estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Enlace a Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Enlace a estilos CSS personalizados -->
    <link rel="stylesheet" href="../../Css/Styles_categorias.css">
</head>

<body>
    <!-- Barra de navegación principal -->
    <nav id="navegacion" class="navbar navbar-expand-md navbar">
        <div class="container-fluid">
            <!-- Marca de la navegación con logo -->
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="../../Img/logo.jpeg" width="50" height="50" alt="Logo" class="me-2 rounded-circle">
                <span class="text-white title-amantti">AMANTTI</span>
            </a>

            <!-- Botón para desplegar el menú en pantallas pequeñas -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido colapsable de la barra de navegación -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0 d-flex align-items-center gap-3">
                    <!-- Enlace a la página de categorías -->
                    <li class="nav-item">
                        <a class="nav-link" href="categorias.php">
                            <i class="fa-solid fa-bag-shopping fa-xl text-white"> Productos</i>
                        </a>
                    </li>
                    <!-- Enlace al carrito de compras -->
                    <li class="nav-item">
                        <a class="nav-link" href="carrito.php">
                            <i class="fa-solid fa-cart-shopping fa-xl text-white"> Carrito de compras</i>
                        </a>
                    </li>

                    <!-- Botón de inicio/cierre de sesión -->
                    <li class="nav-item">
                        <?php
                        // Comprobar si el usuario está logueado
                        if (isset($_SESSION['id_usuario'])) {
                            // Opción para cerrar sesión
                            echo '<a class="nav-link" href="../../Suministros/logout.php"><button type="button" class="btn btn-danger w-100">Cerrar Sesión</button></a>';
                        } else {
                            // Opción para iniciar sesión
                            echo '<a class="nav-link" href="../login.php"><button type="button" class="btn btn-success w-100">Iniciar Sesión</button></a>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Encabezado de la sección de productos -->
                    <div class="card-header text-center">
                        <h1 class="mb-4 p-4"><strong>PRODUCTOS DISPONIBLES</strong></h1>
                    </div>
                    <!-- Contenedor para las tarjetas de productos -->
                    <div class="row d-flex flex-wrap justify-content-start">
                        <?php
                        // Conexión a la base de datos
                        require("../../Suministros/conexion.php");
                        // Consulta SQL para obtener solo los productos activos
                        $sql = "SELECT * FROM productos WHERE estado = 1"; // Solo productos con estado activo
                        $resultado = $conexion->query($sql);
                        // Bucle para recorrer y mostrar los productos en tarjetas
                        while ($producto = $resultado->fetch_assoc()) :
                        ?>
                            <div class="col-md-3 mb-5">
                                <!-- Tarjeta que contiene el producto -->
                                <div class="card card-container">
                                    <img src="../../Img/<?php echo $producto['imagen']; ?>" class="card-img-top product-image" alt="<?php echo $producto['nombre']; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title product-title"><?php echo $producto['nombre']; ?></h5>
                                        <p class="card-text product-info"><?php echo $producto['descripcion']; ?></p>
                                        <p class="card-text product-info">$<?php echo number_format($producto['precio'], 0, ',', '.'); ?></p>
                                        <button onclick="<?php echo isset($_SESSION['id_usuario']) ? "agregarAlCarrito('" . $producto['nombre'] . "', " . $producto['precio'] . ", '" . $producto['imagen'] . "', '" . $producto['descripcion'] . "', " . $producto['cantidad'] . ", " . $producto['id'] . ");" : "window.location.href='../login.php'"; ?>" class="btn btn-primary">
                                            <i class="fas fa-shopping-cart"></i> Agregar al Carrito
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer principal -->
    <footer class="bg-light text-dark py-4">
        <div class="container">
            <div class="row">
                <!-- Sección de contacto y dirección -->
                <div class="col-md-4 mb-3 d-flex flex-column">
                    <h5>Contacto y Dirección</h5>
                    <p class="d-flex align-items-center mb-2">
                        <i class="fa-solid fa-envelope fa-2xl me-2"></i>
                        <span>email@ejemplo.com</span>
                    </p>
                    <p class="d-flex align-items-center mb-2">
                        <i class="fa-solid fa-phone fa-2xl me-2"></i>
                        <span>+57 123 456 7890</span>
                    </p>
                    <p class="d-flex align-items-center mb-2">
                        <i class="fa-solid fa-map-marker-alt fa-2xl me-2"></i>
                        <span>Calle Ficticia 123, Ciudad, País</span>
                    </p>
                </div>
                <!-- Sección del logo -->
                <div class="col-md-4 mb-3 text-center">
                    <h5>AMANTTÍ</h5>
                    <img src="../../Img/logo.jpeg" alt="Logo de AMANTTÍ" class="img-fluid rounded-circle" style="max-width: 150px;">
                </div>
                <!-- Sección de redes sociales -->
                <div class="col-md-4 mb-3 d-flex flex-column align-items-md-end">
                    <h5>Redes Sociales</h5>
                    <div class="d-flex flex-column align-items-md-end">
                        <p class="d-flex align-items-center mb-2">
                            <i class="fa-brands fa-facebook fa-2xl me-2"></i>
                            <span>facebook.com/Amantti.45</span>
                        </p>
                        <p class="d-flex align-items-center mb-2">
                            <i class="fa-brands fa-instagram fa-2xl me-2"></i>
                            <span>instagram.com/Amantti.45</span>
                        </p>
                        <p class="d-flex align-items-center mb-2">
                            <i class="fa-brands fa-x fa-2xl me-2"></i>
                            <span>x.com/Amantti.45</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright -->
        <div class="text-center py-3">
            <p>&copy; 2024 AMANTTÍ. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <!-- App JS -->
    <script src="../../Js/categorias.js"></script>
</body>

</html>