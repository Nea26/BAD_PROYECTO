function confirmDeleteM(event, userId) {
    event.preventDefault();

    Swal.fire({
        title: '¿Estás seguro?',
        text: "Se eliminara el miembro del sistema, No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteFormM'+userId).submit();
        }
    })
}
