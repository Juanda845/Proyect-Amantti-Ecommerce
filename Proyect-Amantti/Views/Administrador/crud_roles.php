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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
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

    <div class="container my-5">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="card-header justify-content-center">
                    <div class="card-title text-center col-12 d-grid justify-content-center">
                        <h1 class="border border-4 border-primary rounded-4 p-2"><strong>BIENVENIDO ADMINISTRADOR <span><?php echo $nombre; ?></span></strong></h1>
                    </div>
                    <div class="card-title text-center mb-4 col-12 d-grid justify-content-center">
                        <h2 class="border border-4 border-primary rounded-4 p-2"><strong>CRUD - ROLES</strong></h2>
                    </div>
                    <div class="container-fluid">
                        <table id="table_responsive" class="table table-light table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">rol</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require("../../Suministros/conexion.php");
                                $sql = $conexion->query(
                                    "SELECT id, rol FROM roles"
                                );
                                while ($resultado = $sql->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <!-- Datos de categoría en cada fila -->
                                        <th scope="row"><?php echo $resultado['id'] ?></th>
                                        <th><?php echo $resultado['rol'] ?></th>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#table_responsive').DataTable({
                "responsive": true, // Habilitar el modo responsive
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json" // Establecer el idioma a español
                }
            });
        });
    </script>
</body>

</html>