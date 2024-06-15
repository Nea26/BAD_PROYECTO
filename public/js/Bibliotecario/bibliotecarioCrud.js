function confirmDeleteB(event, userId) {
    event.preventDefault();

    Swal.fire({
        title: '¿Estás seguro?',
        text: "Se eliminara el Bibliotecario del sistema, No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteFormB'+userId).submit();
        }
    })
}

//Salir del sistema
function salirSistema(event) {
    event.preventDefault();
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Se cerrará la sesión actual!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Salir!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
        }
    })
}
$(document).ready(function(){
    
    // Desaparecer la alerta al hacer clic en ella
    $('#success-alert').click(function() {
        $(this).fadeOut('slow');
    });
});