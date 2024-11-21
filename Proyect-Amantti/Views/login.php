<?php
session_start();
include("../Suministros/proceso_login.php");
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="../Css/Styles_login.css">
</head>

<body>
    <!-- Ajuste de la altura de la sección -->
    <section class="vh-100 d-flex align-items-center justify-content-center m-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card bg-light" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="" method="POST">
                                <h2 class="fw-bold mb-3">INICIO DE SESIÓN</h2>
                                <a href="./Cliente/index.php"><img src="../Img/logo.jpeg" alt="logo" class="image-logo mb-2"></a>
                                <h5 class="text-muted mb-4">¡Por favor, introduce tu usuario y contraseña!</h5>

                                <div class="mb-3">
                                    <input type="email" class="form-control" name="correo" id="Correo" placeholder="Correo" required>
                                </div>

                                <div class="mb-3 position-relative">
                                    <input type="password" class="form-control" name="contraseña" id="Contraseña" placeholder="Contraseña" required>
                                    <i class="fa fa-eye-slash password-toggle" id="togglePassword"></i>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-dark col-6 mt-4" name="logueo">INICIAR SESIÓN</button>
                                </div>

                                <p class="mt-4">¿No tienes una cuenta? <a href="./register.php" class="text-muted fw-bold">Regístrate</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <!-- Jquery JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom JS -->
    <script src="../Js/eye.js"></script>

    <script>
        <?php
        if (isset($_GET['added']) && $_GET['added'] == 'true') {
            echo 'Swal.fire({
            title: "¡Éxito!",
            text: "Su cuenta ha sido creada correctamente.",
            icon: "success",
            confirmButtonText: "OK"
        }).then(function() {
            var cleanUrl = window.location.href.split("?")[0];
            window.history.replaceState({}, document.title, cleanUrl);
            location.reload();
        });';
        }
        ?>
    </script>

    <?php
    if (isset($login_error)) {
        echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "' . $login_error . '"
                    });
                </script>';
    }
    ?>
</body>

</html>