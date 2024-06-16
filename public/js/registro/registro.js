document.getElementById("mostrarBiblio").addEventListener("click", function() {
    document.getElementById("registrarBibliotecario").style.display = "block";
    document.getElementById("registrarProfesor").style.display = "none";
    document.getElementById("registrarMiembro").style.display = "none";

    this.parentNode.classList.add("active");
    document.getElementById("mostrarProfesor").parentNode.classList.remove("active");
    document.getElementById("mostrarMiembro").parentNode.classList.remove("active");
});

document.getElementById("mostrarProfesor").addEventListener("click", function() {
    document.getElementById("registrarBibliotecario").style.display = "none";
    document.getElementById("registrarProfesor").style.display = "block";
    document.getElementById("registrarMiembro").style.display = "none";

    this.parentNode.classList.add("active");
    document.getElementById("mostrarBiblio").parentNode.classList.remove("active");
    document.getElementById("mostrarMiembro").parentNode.classList.remove("active");
});

document.getElementById("mostrarMiembro").addEventListener("click", function() {
    document.getElementById("registrarBibliotecario").style.display = "none";
    document.getElementById("registrarProfesor").style.display = "none";
    document.getElementById("registrarMiembro").style.display = "block";

    this.parentNode.classList.add("active");
    document.getElementById("mostrarBiblio").parentNode.classList.remove("active");
    document.getElementById("mostrarProfesor").parentNode.classList.remove("active");
});

$(document).ready(function(){
    
    // Desaparecer la alerta al hacer clic en ella
    $('.alert').click(function() {
        $(this).fadeOut('slow');
    });
});