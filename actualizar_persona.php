<?php
include 'conexion.php'; // Asegúrate de que la conexión esté establecida

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $discapacidad = $_POST['discapacidad'];
    $estado = $_POST['estado'];

    // Preparar la consulta de actualización
    $stmt = $conexion->prepare("UPDATE personas SET nombre=?, apellido=?, ci=?, direccion=?, telefono=?, discapacidad=?, estado=? WHERE id=?");

    // Verificar si la preparación fue exitosa
    if ($stmt === false) {
        die('Error en la preparación: ' . htmlspecialchars($conexion->error));
    }

    // Vincular los parámetros
    $stmt->bind_param("sssssssi", $nombre, $apellido, $ci, $direccion, $telefono, $discapacidad, $estado, $id);

    // Ejecutar la declaración
    if ($stmt->execute()) {
        // Redirigir a la lista de personas o mostrar un mensaje de éxito
        header("Location: index.php?page=listar_personas&mensaje=actualizado");
        exit;
    } else {
        echo 'Error al actualizar: ' . htmlspecialchars($stmt->error);
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conexion->close();
?>
