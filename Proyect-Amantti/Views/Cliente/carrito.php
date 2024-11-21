<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("location:../login.php");
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Título de la página que aparece en la pestaña del navegador -->
    <title>Carrito de compras</title>
    <!-- Enlace a Bootstrap CSS para estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Enlace a Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Enlace a estilos CSS personalizados -->
    <link rel="stylesheet" href="../../Css/Styles_carrito.css">
</head>

<body>
    <!-- Barra de navegación principal -->
    <nav id="navegacion" class="navbar navbar-expand-md">
        <div class="container-fluid">
            <!-- Marca de la navegación con logo -->
            <a class="navbar-brand d-flex align-items-center p-2" href="index.php">
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

                    <!-- Botón de cierre de sesión -->
                    <li class="nav-item">
                        <?php
                        // Comprobar si el usuario está logueado
                        if (isset($_SESSION['id_usuario'])) {
                            // Opción para cerrar sesión
                            echo '<a class="nav-link" href="../../Suministros/logout.php"><button type="button" class="btn btn-danger">Cerrar Sesión</button></a>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección del Carrito de Compras -->
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card p-1">
                        <div class="container-titles d-flex">
                            <h4 class="card-title-1 m-2">Tu carrito de compras</h4>
                            <h6 class="card-title-2 mt-3">(<span id="numProductos"></span>) Productos</h6>
                        </div>
                    </div>
                    <div class="card border border-dark-subtle shadow-0 mt-3">
                        <div class="m-4" id="carrito">
                            <!-- Aquí se mostrarán los productos en el carrito -->
                        </div>
                    </div>
                </div>

                <!-- Compra -->
                <div class="col-md-3 sm-mt-2">
                    <div class="card shadow-0 border border-dark-subtle">
                        <div class="card-body text-center">
                            <div>
                                <label for="selectPayment" class="h5"><strong>MÉTODOS DE PAGO</strong></label>
                                <select class="select-payment form-select mb-2" id="selectPayment" aria-label="SELECCIONAR">
                                    <option selected disabled>SELECCIONAR</option>
                                    <option value="1">PAGO CONTRA ENTREGA</option>
                                    <option value="2">PASO PSE</option>
                                </select>
                                <hr>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Precio total:</p>
                                <p class="mb-2 fw-bold" id="precioTotal">$0.00</p>
                            </div>

                            <div class="mt-3">
                                <a id="showAlertBtn-payment" href="#" class="btn btn-1 w-100 shadow-0 mb-2"><i class="fa-solid fa-bag-shopping"></i> Realizar compra</a>
                                <a href="categorias.php" class="btn btn-2 btn-light w-100 mt-2 text-dark">Volver a la tienda</a>
                            </div>

                            <div class="mt-5">
                                <h5 class="mb-2">MÉTODOS DE PAGO</h5>
                                <div class="mt-3">
                                    <img src="../../Img/pagos.png" class="img-fluid" alt="...">
                                </div>
                            </div>
                        </div>
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
    <!-- Carrito JS -->
    <script src="../../Js/carrito.js"></script>
</body>

</html>