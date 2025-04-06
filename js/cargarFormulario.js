function cargarFormulario(accion, id = null) {
    let url = '';
    if (accion === 'agregar') {
        url = 'agregar_persona.php'; // archivo para agregar
    } else if (accion === 'editar') {
        window.location.href = 'index.php?page=editar_persona&id=' + id; // archivo para editar
    }
    $('#contenido').load(url); // Cargar el formulario en el div
}


$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('mensaje')) {
        const mensaje = urlParams.get('mensaje');
        if (mensaje === 'nuevo') {
            $('#modalNuevoRegistro').modal('show'); // Mostrar el modal de nuevo registro
        } else if (mensaje === 'actualizado') {
            $('#modalConfirmacion').modal('show'); // Mostrar el modal de actualización
        }
    }
});

