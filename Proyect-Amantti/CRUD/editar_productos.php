<?php
include('../Suministros/conexion.php');

// Verificar si la sesión está iniciada
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("location:../Views/login.php");
    exit;
}

// Obtener los datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];
$categoria = $_POST['categoria'];
$proveedor = $_POST['proveedor'];
$imagen = $_FILES['imagen']['name']; // Obtiene el nombre del archivo de imagen

// SQL para actualizar el producto
$sql = "UPDATE productos SET
        nombre='" . $nombre . "',
        descripcion='" . $descripcion . "',
        precio='" . $precio . "',
        cantidad='" . $cantidad . "',
        estado='" . $estado . "',
        categoria='" . $categoria . "',
        proveedor='" . $proveedor . "'";

// Solo se actualiza la imagen si se subió una nueva
if (!empty($imagen)) {
    // Mueve la imagen a la carpeta de destino (ajusta la ruta según sea necesario)
    $imagenPath = '../Img/' . basename($imagen);
    move_uploaded_file($_FILES['imagen']['tmp_name'], $imagenPath);
    
    $sql .= ", imagen='" . $imagen . "'";
}

$sql .= " WHERE id = '" . $id . "'";

// Ejecutar la consulta
if ($conexion->query($sql)) {
    header("location:../Views/Administrador/crud_productos.php?edited=true");
} else {
    echo "Error al editar el producto: " . $conexion->error;
}

$conexion->close();
?>
