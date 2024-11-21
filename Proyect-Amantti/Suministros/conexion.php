<?php
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_datos = 'amantti';

// Crea la conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {
    // Conexión exitosa
}
