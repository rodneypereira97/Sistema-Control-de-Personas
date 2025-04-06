<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM personas WHERE id=$id";

    if ($conexion->query($sql) === TRUE) {
        header("Location: index.php?page=listar_personas&mensaje=eliminado");
        exit();
    } else {
        echo "Error al eliminar: " . $conexion->error;
    }
}

$conexion->close();
?>
