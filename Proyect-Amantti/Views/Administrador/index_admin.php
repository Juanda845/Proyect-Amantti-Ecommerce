<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    // La sesión no está iniciada, redirige al inicio de sesión
    header("location:../login.php");
    exit;
}
// Obtén el nombre del usuario de la sesión
$nombre = $_SESSION['nombre'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Configuración de la página -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN - AMANTTI</title>

    <!-- Enlaces a archivos de estilo CSS y fuentes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../Css/Styles_crud.css">
</head>

<body>
    <!-- Barra de navegación -->
    <nav id="navegacion" class="navbar navbar-expand-md navbar">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="index_admin.php">
                <img src="../../Img/logo.jpeg" width="50" height="50" alt="Logo" class="me-2 rounded-circle"> <!-- Logo de la marca -->
                <span class="text-white title-amantti">AMANTTI</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarku">
                <ul class="navbar-nav ms-auto d-flex align-items-center p-2 gap-3">
                    <!-- Enlace a la sección de categorías -->
                    <li class="nav-item">
                        <a class="nav-link" href="crud_categorias.php">
                            <i class="fa-solid fa-list fa-xl text-white"> Categorías</i>
                        </a>
                    </li>
                    <!-- Enlace a la sección de detalle facturas -->
                    <li class="nav-item">
                        <a class="nav-link" href="crud_detalle_factura.php">
                            <i class="fa-solid fa-file-invoice fa-xl text-white"> Detalle facturas</i>
                        </a>
                    </li>
                    <!-- Enlace a la sección de facturas -->
                    <li class="nav-item">
                        <a class="nav-link" href="crud_facturas.php">
                            <i class="fa-solid fa-file-invoice fa-xl text-white"> Facturas</i>
                        </a>
                    </li>
                    <!-- Enlace a la sección de estados -->
                    <li class="nav-item">
                        <a class="nav-link" href="crud_estados.php">
                            <i class="fa-solid fa-flag fa-xl text-white"> Estados</i>
                        </a>
                    </li>
                    <!-- Enlace a la sección de productos -->
                    <li class="nav-item">
                        <a class="nav-link" href="crud_productos.php">
                            <i class="fa-solid fa-box fa-xl text-white"> Productos</i>
                        </a>
                    </li>
                    <!-- Enlace a la sección de proveedores -->
                    <li class="nav-item">
                        <a class="nav-link" href="crud_proveedores.php">
                            <i class="fa-solid fa-truck fa-xl text-white"> Proveedores</i>
                        </a>
                    </li>
                    <!-- Enlace a la sección de roles -->
                    <li class="nav-item">
                        <a class="nav-link" href="crud_roles.php">
                            <i class="fa-solid fa-user-shield fa-xl text-white"> Roles</i>
                        </a>
                    </li>
                    <!-- Enlace a la sección de usuarios -->
                    <li class="nav-item">
                        <a class="nav-link" href="crud_usuarios.php">
                            <i class="fa-solid fa-users fa-xl text-white"> Usuarios</i>
                        </a>
                    </li>
                    <!-- Botón para cerrar sesión -->
                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="../../Suministros/logout.php">
                            <button type="button" class="btn btn-danger">Cerrar Sesión</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container my-5">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-center">
                <div class="card-header border border-5 border-light rounded-4">
                    <div class="card-header bg-light text-white text-center p-2">
                        <h2 class="card-title p-3 mb-2 text-black">BIENVENIDO ADMINISTRADOR</h2>
                        <h3 class="card-text mb-2 text-black"><span><?php echo $nombre; ?></span></h3>
                        <h3 class="card-text"><small class="text-black">Al sistema de administración de:</small></h3>
                        <img src="../../Img/logo.jpeg" class="card-img img-small" alt="Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>