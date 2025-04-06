function confirmarEliminacion(id) {
    // Mostrar cuadro de confirmación
    if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
        // Si el usuario confirma, redirige a eliminar_persona.php con el ID
        window.location.href = "eliminar_persona.php?id=" + id;
    }
}


