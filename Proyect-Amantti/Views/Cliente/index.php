<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Título de la página que aparece en la pestaña del navegador -->
    <title>AMANTTI</title>
    <!-- Enlace a la hoja de estilos de Bootstrap desde un CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Enlace a la hoja de estilos de Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Enlace a la hoja de estilos personalizada para el diseño específico de la página -->
    <link rel="stylesheet" href="../../Css/Styles_index.css">
</head>

<body>
    <!-- Barra de navegación principal que se expande en dispositivos de tamaño medio y superior -->
    <nav id="navegacion" class="navbar navbar-expand-md navbar">
        <div class="container-fluid">
            <!-- Marca de la navegación que incluye el logo y el nombre -->
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="../../Img/logo.jpeg" width="50" height="50" alt="Logo" class="me-2 rounded-circle"> <!-- Logo de la marca -->
                <span class="text-white title-amantti">AMANTTI</span>
            </a>
            <!-- Botón para togglear el menú en pantallas pequeñas -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> <!-- Icono para el botón de menú -->
            </button>
            <!-- Contenido colapsable de la barra de navegación -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto d-flex align-items-center p-2 gap-3">
                    <!-- Enlace a la sección de productos destacados -->
                    <li class="nav-item active">
                        <a class="nav-link" href="#productos-destacados">
                            <i class="fa-solid fa-bag-shopping fa-xl text-white"> Productos destacados</i>
                        </a>
                    </li>
                    <!-- Enlace a la sección de tips -->
                    <li class="nav-item active">
                        <a class="nav-link" href="#tips">
                            <i class="fa-solid fa-wand-magic-sparkles fa-xl text-white"> Tips</i>
                        </a>
                    </li>
                    <!-- Enlace a la sección de enfoque estratégico -->
                    <li class="nav-item active">
                        <a class="nav-link" href="#enfoque">
                            <i class="fa-solid fa-book fa-xl text-white"> Enfoque estratEgico</i>
                        </a>
                    </li>
                    <!-- Enlace a la página de productos -->
                    <li class="nav-item active">
                        <a class="nav-link" href="categorias.php">
                            <i class="fa-solid fa-shop fa-xl text-white"> Productos</i>
                        </a>
                    </li>
                    <!-- Enlace al carrito de compras, redirige según el estado de la sesión del usuario -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo isset($_SESSION['id_usuario']) ? 'carrito.php' : '../login.php'; ?>">
                            <i class="fa-solid fa-cart-shopping fa-xl text-white"> Carrito</i>
                        </a>
                    </li>
                    <!-- Enlace para iniciar o cerrar sesión según el estado de la sesión del usuario -->
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['id_usuario'])) { // Si el usuario está logueado
                            echo '<a class="nav-link" href="../../Suministros/logout.php"><button type="button" class="btn btn-danger">Cerrar Sesión</button></a>';
                        } else { // Si no está logueado
                            echo '<a class="nav-link" href="../login.php"><button type="button" class="btn btn-success">Iniciar Sesión</button></a>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carrusel de imágenes que se deslizan automáticamente -->
    <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicadores del carrusel para navegar entre las imágenes -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <!-- Contenedor de las imágenes del carrusel -->
        <div class="carousel-inner">
            <!-- Primer elemento del carrusel, activo por defecto -->
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="../../Img/Carrusel-1.png" class="d-block w-100" alt="..."> 
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-black">¡BIENVENIDOS A AMANTTÍ!</h5>
                    <p class="text-black">Amantti: Donde la belleza se transforma en arte.</p>
                </div>
            </div>
            <!-- Segundo elemento del carrusel -->
            <div class="carousel-item" data-bs-interval="2000">
                <img src="../../Img/Carrusel-2.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block"> 
                    <h5 class="text-black">¡BIENVENIDOS A AMANTTÍ!</h5> 
                    <p class="text-black">Amantti: Donde la belleza se transforma en arte.</p> 
                </div>
            </div>
            <!-- Tercer elemento del carrusel -->
            <div class="carousel-item" data-bs-interval="2000">
                <img src="../../Img/Carrusel-3.png" class="d-block w-100" alt="..."> 
                <div class="carousel-caption d-none d-md-block"> 
                    <h5 class="text-black">¡BIENVENIDOS A AMANTTÍ!</h5>
                    <p class="text-black">Amantti: Donde la belleza se transforma en arte.</p> 
                </div>
            </div>
        </div>
        <!-- Botón para ir al slide anterior -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <!-- Botón para ir al siguiente slide -->
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Sección para mostrar los productos destacados -->
    <section id="productos-destacados">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Encabezado de la sección de productos destacados -->
                    <div class="card-header text-center">
                        <h3 class="mb-3"><strong>PRODUCTOS DESTACADOS</strong></h3>
                    </div>
                    <!-- Contenedor de los productos destacados -->
                    <div class="row d-flex flex-wrap justify-content-center">
                        <?php
                        // Conexión a la base de datos
                        require("../../Suministros/conexion.php");
                        // Consulta para obtener los productos destacados por sus IDs
                        $sql = "SELECT * FROM productos WHERE id IN (6, 9, 14)";
                        $resultado = $conexion->query($sql);
                        // Bucle para mostrar cada producto destacado
                        while ($producto = $resultado->fetch_assoc()) :
                        ?>
                            <!-- Contenedor para cada producto -->
                            <div class="col-md-4 mb-5 d-flex">
                                <div class="card card-container">
                                    <img src="../../Img/<?php echo $producto['imagen']; ?>" class="card-img-top product-image" alt="<?php echo $producto['nombre']; ?>">
                                    <div class="card-body text-center">
                                        <h5 class="card-title product-title"><?php echo $producto['nombre']; ?></h5>
                                        <p class="card-text product-info"><?php echo $producto['descripcion']; ?></p>
                                        <p class="card-text product-info">$<?php echo number_format($producto['precio'], 0, ',', '.'); ?></p>
                                        <button onclick="<?php echo isset($_SESSION['id_usuario']) ? "agregarAlCarrito('" . $producto['nombre'] . "', " . $producto['precio'] . ", '" . $producto['imagen'] . "', '" . $producto['descripcion'] . "', " . $producto['cantidad'] . ");" : "window.location.href='../login.php'"; ?>" class="btn btn-primary">
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

    <!-- Sección de Tips y Consejos -->
    <section id="tips" class="tips-consejos">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Encabezado de la sección de tips -->
                    <div class="card-header text-center">
                        <h3 class="mb-3"><strong>TIPS</strong></h3>
                        <p class="text-muted">Aquí te compartimos algunos consejos útiles para aprovechar al máximo nuestros productos.</p>
                    </div>
                    <div class="row d-flex flex-wrap justify-content-center">
                        <!-- Contenedor para el primer tip -->
                        <div class="col-md-4 mb-5 d-flex">
                            <div class="card card-tip">
                                <video class="card-video" controls>
                                    <source src="../../Videos/Video-Tip-1.mp4" type="video/mp4">
                                    Tu navegador no soporta el elemento de video.
                                </video>
                                <div class="card-body text-center">
                                    <h5 class="card-title">Tip 1</h5>
                                    <p class="card-text">Aprende a cuidar tus productos para que duren más.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Contenedor para el segundo tip -->
                        <div class="col-md-4 mb-5 d-flex">
                            <div class="card card-tip">
                                <video class="card-video" controls>
                                    <source src="../../Videos/Video-Tip-2.mp4" type="video/mp4">
                                    Tu navegador no soporta el elemento de video.
                                </video>
                                <div class="card-body text-center">
                                    <h5 class="card-title">Tip 2</h5>
                                    <p class="card-text">Descubre trucos para maximizar el uso de nuestros productos.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Contenedor para el tercer tip -->
                        <div class="col-md-4 mb-5 d-flex">
                            <div class="card card-tip">
                                <video class="card-video" controls>
                                    <source src="../../Videos/Video-Tip-3.mp4" type="video/mp4">
                                    Tu navegador no soporta el elemento de video.
                                </video>
                                <div class="card-body text-center">
                                    <h5 class="card-title">Tip 3</h5>
                                    <p class="card-text">Consejos de expertos para obtener los mejores resultados.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Encabezado para el resultado final -->
                        <div class="text-center my-3">
                            <h3><strong>RESULTADO FINAL</strong></h3>
                        </div>
                        <div class="row justify-content-center">
                            <!-- Contenedor para el video del resultado final -->
                            <div class="col-md-8 mb-5 d-flex">
                                <div class="card card-final">
                                    <video class="card-video" controls>
                                        <source src="../../Videos/Video-Resultado-Final.mp4" type="video/mp4">
                                        Tu navegador no soporta el elemento de video.
                                    </video>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Resultado Final</h5>
                                        <p class="card-text">Aquí puedes ver el resultado final de nuestros productos en acción.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Enfoque Estratégico -->
    <section id="enfoque" class="enfoque-estrategico">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Encabezado de la sección -->
                    <div class="card-header text-center">
                        <h3 class="mb-3"><strong>ENFOQUE ESTRATÉGICO</strong></h3>
                        <p class="text-muted">Descubre nuestra misión, visión y objetivos que guían nuestro camino.</p>
                    </div>
                    <div class="row d-flex flex-wrap justify-content-center">
                        <!-- Contenedor para la Misión -->
                        <div class="col-md-4 mb-5 d-flex">
                            <div class="card card-tip text-center">
                                <div class="card-body">
                                    <i class="fa-solid fa-bullseye fa-2xl" style="color: #000000;"></i>
                                    <h5 class="card-title">Misión</h5>
                                    <p class="card-text">Ser una empresa líder en aplicaciones tecnológicas en el sector de la belleza personalizada, conectando a millones de usuarios con expertos de la industria para generar un mercado global de servicios de belleza y cuidado personal, impulsado por la tecnología y la innovación.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Contenedor para la Visión -->
                        <div class="col-md-4 mb-5 d-flex">
                            <div class="card card-tip text-center">
                                <div class="card-body">
                                    <i class="fa-regular fa-eye fa-2xl" style="color: #000000;"></i>
                                    <h5 class="card-title">Visión</h5>
                                    <p class="card-text">Convertirnos para el año 2034 en la plataforma de referencia nacional en el manejo del bienestar integral, ofreciendo soluciones personalizadas en belleza, salud y estilo de vida, empoderando a millones de colombianos a alcanzar su máximo potencial.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Contenedor para los Objetivos -->
                        <div class="col-md-4 mb-5 d-flex">
                            <div class="card card-tip text-center">
                                <div class="card-body">
                                    <i class="fa-regular fa-gem fa-2xl" style="color: #000000;"></i>
                                    <h5 class="card-title">Objetivos</h5>
                                    <p class="card-text">Desarrollar y lanzar una plataforma de comercio electrónico integral que revolucione la industria de la belleza, ofreciendo a los usuarios una experiencia de compra personalizada y enriquecedora a través de la exploración de productos, acceso a información detallada, tutoriales donde compartir conocimientos y experiencias.</p>
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

    <!-- Script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>