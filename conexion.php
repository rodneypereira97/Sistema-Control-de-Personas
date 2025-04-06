<?php
// Configuración de la base de datos
$localhost = "localhost"; // Generalmente es localhost
$username = "root"; // Cambia esto por tu nombre de usuario de MySQL
$password = ""; // Cambia esto por tu contraseña de MySQL
$dbname = "control_personas"; // Nombre de la base de datos que creaste

// Crear conexión
$conexion  = new mysqli($localhost, $username, $password, $dbname);

// Verificar conexión
if ($conexion ->connect_error) {
    die("Conexión fallida: " . $conexion ->connect_error);
}


// Aquí puedes realizar tus consultas a la base de datos
// ...


?>
