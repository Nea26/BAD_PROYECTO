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
$(document).ready(function(){
    
    // Desaparecer la alerta al hacer clic en ella
    $('#success-alert').click(function() {
        $(this).fadeOut('slow');
    });
    // Desaparecer la alerta al hacer clic en ella
    $('.alert').click(function () {
        $(this).fadeOut('slow');
    });
});
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
// // Se encarga de mostrar el listado de miembros y el formulario para registrar un nuevo miembro
 document.getElementById("verMiembros").addEventListener("click", function() {
     document.getElementById("listadoMiembros").style.display = "block";
     document.getElementById("formMiembro").style.display = "none";
     document.getElementById("cabeceraMiembro").style.display = "none";

     this.parentNode.classList.add("active");
     document.getElementById("nuevoMiembro").parentNode.classList.remove("active");
 });

 document.getElementById("nuevoMiembro").addEventListener("click", function() {
     document.getElementById("listadoMiembros").style.display = "none";
     document.getElementById("formMiembro").style.display = "block";
     document.getElementById("cabeceraMiembro").style.display = "block";

     this.parentNode.classList.add("active");
     document.getElementById("verMiembros").parentNode.classList.remove("active");
 });