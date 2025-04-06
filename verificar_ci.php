<?php
include 'conexion.php'; // Conectar a la base de datos

// Verificar si el parámetro ci está presente
if (isset($_GET['ci'])) {
    $ci = $_GET['ci'];

    // Verificar si el CI ya existe en la base de datos
    $sql_check_ci = "SELECT COUNT(*) AS total FROM personas WHERE ci = '$ci'";
    $result_check_ci = $conexion->query($sql_check_ci);
    $row = $result_check_ci->fetch_assoc();

    // Si el CI existe, devolver 'existe', de lo contrario 'disponible'
    if ($row['total'] > 0) {
        echo 'existe';
    } else {
        echo 'disponible';
    }
}
?>
