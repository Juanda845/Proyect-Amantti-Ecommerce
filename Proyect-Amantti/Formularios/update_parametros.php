<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    // La sesión no está iniciada, redirige al inicio de sesión
    header("location:../Views/login.php");
    exit;
}
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
    <link rel="stylesheet" href="../Css/Styles_crud.css">
</head>

<body>
    <nav id="navegacion" class="navbar navbar-expand-md navbar">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="../Views/Administrador/index_admin.php">
                <img src="../Img/logo.jpeg" width="50" height="50" alt="Logo" class="me-2 rounded-circle"> <!-- Logo de la marca -->
                <span class="text-white title-amantti">AMANTTI</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link " href="../Views/Administrador/crud_estados.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="card-header justify-content-center">
                    <div class="card-title text-center mb-4 col-12 d-grid justify-content-center">
                        <h2 class="border border-4 border-primary rounded-4 p-2"><strong>EDITAR - PARÁMETROS</strong></h2>
                    </div>

                    <div class="container-fluid mb-5">
                        <form action="../CRUD/editar_parametros.php" method="POST">

                            <?php
                            include_once("../Suministros/conexion.php");
                            $sql = "SELECT * FROM parametros WHERE id =" . $_REQUEST['id'];
                            $resultado = $conexion->query($sql);
                            $row = $resultado->fetch_assoc();
                            ?>

                            <input type="Hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">

                            <div class="mb-5 mt-5 col-5 mx-auto">
                                <label for="Valor" class="form-label">Valor</label>
                                <input type="text" class="form-control" name="valor" id="Valor" placeholder="Valor" required value="<?php echo $row['valor'] ?>">
                            </div>

                            <div class="mb-5 text-center">
                                <button type="submit" class="btn btn-primary col-5 mt-4">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>