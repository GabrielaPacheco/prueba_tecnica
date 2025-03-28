$(document).on('click', '.deleteAlumno', function () {
    var alumnoId = $(this).data('id');
    var boton = $(this); // Guarda la referencia al botón

    if (confirm('¿Estás seguro de eliminar este alumno?')) {
        $.ajax({
            url: "/alumnos/" + alumnoId,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    boton.closest('tr').remove();
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function (xhr) {
                console.error("Error en la petición AJAX:", xhr.responseText);
                alert("Error al eliminar el alumno. Revisa la consola.");
            }
        });
    }
});
