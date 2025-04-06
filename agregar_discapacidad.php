<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Persona con Discapacidad</title>
    <link rel="stylesheet" href="styles.css"> <!-- Archivo CSS opcional -->
</head>
<body>
    <h2>Agregar Persona con Discapacidad</h2>
    <form action="guardar_discapacidad.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required>

        <label for="ci">Cédula de Identidad:</label>
        <input type="text" name="ci" required>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" required>

        <label for="observacion">Observación:</label>
        <textarea name="observacion"></textarea>

        <label for="estado">Estado:</label>
        <select name="estado" required>
            <option value="Pendiente">Pendiente</option>
            <option value="Censado">Censado</option>
        </select>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
