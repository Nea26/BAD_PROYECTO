// // Para el navbar de registro de usuarios en la vista de administrador
// // Se encarga de mostrar los formularios de registro de bibliotecarios, profesores y miembros
// document.getElementById("mostrarBiblio").addEventListener("click", function() {
//     document.getElementById("registrarBibliotecario").style.display = "block";
//     document.getElementById("registrarProfesor").style.display = "none";
//     document.getElementById("registrarMiembro").style.display = "none";

//     this.parentNode.classList.add("active");
//     document.getElementById("mostrarProfesor").parentNode.classList.remove("active");
//     document.getElementById("mostrarMiembro").parentNode.classList.remove("active");
// });

// document.getElementById("mostrarProfesor").addEventListener("click", function() {
//     document.getElementById("registrarBibliotecario").style.display = "none";
//     document.getElementById("registrarProfesor").style.display = "block";
//     document.getElementById("registrarMiembro").style.display = "none";

//     this.parentNode.classList.add("active");
//     document.getElementById("mostrarBiblio").parentNode.classList.remove("active");
//     document.getElementById("mostrarMiembro").parentNode.classList.remove("active");
// });

// document.getElementById("mostrarMiembro").addEventListener("click", function() {
//     document.getElementById("registrarBibliotecario").style.display = "none";
//     document.getElementById("registrarProfesor").style.display = "none";
//     document.getElementById("registrarMiembro").style.display = "block";

//     this.parentNode.classList.add("active");
//     document.getElementById("mostrarBiblio").parentNode.classList.remove("active");
//     document.getElementById("mostrarProfesor").parentNode.classList.remove("active");
    
// });
// // Se encarga de mostrar el listado de miembros y el formulario para registrar un nuevo miembro
// document.getElementById("verMiembros").addEventListener("click", function() {
//     document.getElementById("listadoMiembros").style.display = "block";
//     document.getElementById("formMiembro").style.display = "none";
//     document.getElementById("cabeceraMiembro").style.display = "none";

//     this.parentNode.classList.add("active");
//     document.getElementById("nuevoMiembro").parentNode.classList.remove("active");
// });

// document.getElementById("nuevoMiembro").addEventListener("click", function() {
//     document.getElementById("listadoMiembros").style.display = "none";
//     document.getElementById("formMiembro").style.display = "block";
//     document.getElementById("cabeceraMiembro").style.display = "block";

//     this.parentNode.classList.add("active");
//     document.getElementById("verMiembros").parentNode.classList.remove("active");
// });
// Se encarga de mostrar el listado de bibliotecarios y el formulario para registrar un nuevo bibliotecario
document.getElementById("verBibliotecarios").addEventListener("click", function() {
    document.getElementById("listadoBibliotecarios").style.display = "block";
    document.getElementById("formBibliotecario").style.display = "none";
    document.getElementById("cabeceraBibliotecario").style.display = "none";

    this.parentNode.classList.add("active");
    document.getElementById("nuevoBibliotecario").parentNode.classList.remove("active");
});

document.getElementById("nuevoBibliotecario").addEventListener("click", function() {
    document.getElementById("listadoBibliotecarios").style.display = "none";
    document.getElementById("formBibliotecario").style.display = "block";
    document.getElementById("cabeceraBibliotecario").style.display = "block";

    this.parentNode.classList.add("active");
    document.getElementById("verBibliotecarios").parentNode.classList.remove("active");
});
$(document).ready(function(){
    
    // Desaparecer la alerta al hacer clic en ella
    $('#success-alert').click(function() {
        $(this).fadeOut('slow');
    });
});