function confirmDeleteP(event, userId) {
    event.preventDefault();

    Swal.fire({
        title: '¿Estás seguro?',
        text: "Se eliminara el Profesor del sistema, No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteFormP'+userId).submit();
        }
    })
}


$(document).ready(function(){
    console.log('Profesor Crud');
    // Desaparecer la alerta al hacer clic en ella
    $('#success-alert').click(function() {
        $(this).fadeOut('slow');
    });
});