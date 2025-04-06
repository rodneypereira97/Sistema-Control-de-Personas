<?php
include 'conexion.php'; // Asegúrate de que la ruta sea correcta

// Verifica si se recibe el ID
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Usar una declaración preparada para evitar inyecciones SQL
    $stmt = $conexion->prepare("SELECT * FROM personas WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verifica si se encontró la persona
    if ($resultado->num_rows > 0) {
        $persona = $resultado->fetch_assoc();
    } else {
        echo "<p>No se encontró la persona.</p>";
        exit; // Termina el script si no hay persona
    }
} else {
    echo "<p>ID no válido.</p>";
    exit; // Termina el script si no se proporciona un ID válido
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Persona</title>
</head>
<body>
    <h2>Editar Persona</h2>
    <form method="post" action="actualizar_persona.php">
    <input type="hidden" name="id" value="<?php echo $persona['id']; ?>">
    <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo htmlspecialchars ($persona['nombre']); ?>">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" value="<?php echo ($persona['apellido']); ?>">
        </div>
        <div class="mb-3">
            <label for="ci" class="form-label">Cédula</label>
            <input type="text" class="form-control" name="ci" value="<?php echo ($persona['ci']); ?>">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" name="direccion" value="<?php echo ($persona['direccion']); ?>">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="telefono" value="<?php echo ($persona['telefono']); ?>">
        </div>
        <div class="mb-3">
            <label for="discapacidad" class="form-label">Discapacidad</label>
            <input type="text" class="form-control" name="discapacidad" value="<?php echo ($persona['discapacidad']); ?>">
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-control" name="estado">
                <option value="Activo" <?php if ($persona['estado'] == 'Activo') echo  'selected'; ?>>Activo</option>
                <option value="Inactivo" <?php if ($persona['estado'] == 'Inactivo') echo 'selected'; ?>>Inactivo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" onclick="window.location.href='index.php?page=listar_personas'">
    Cancelar
</button>

    </form>
</body>
</html>
