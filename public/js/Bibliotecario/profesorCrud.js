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
    
    // Desaparecer la alerta al hacer clic en ella
    $('#success-alert').click(function() {
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
 // Se encarga de mostrar el listado de profesores y el formulario para registrar un nuevo profesor
 document.getElementById("verProfesores").addEventListener("click", function() {
     document.getElementById("listadoProfesores").style.display = "block";
     document.getElementById("formProfesor").style.display = "none";
     document.getElementById("cabeceraProfesor").style.display = "none";

     this.parentNode.classList.add("active");
     document.getElementById("nuevoProfesor").parentNode.classList.remove("active");
 });

 document.getElementById("nuevoProfesor").addEventListener("click", function() {
     document.getElementById("listadoProfesores").style.display = "none";
     document.getElementById("formProfesor").style.display = "block";
     document.getElementById("cabeceraProfesor").style.display = "block";

     this.parentNode.classList.add("active");
    document.getElementById("verProfesores").parentNode.classList.remove("active");
});
