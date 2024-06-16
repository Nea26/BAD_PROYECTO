
document.getElementById("mostrarProfesor").addEventListener("click", function () {

    document.getElementById("registrarProfesor").style.display = "block";
    document.getElementById("registrarMiembro").style.display = "none";

    this.parentNode.classList.add("active");

    document.getElementById("mostrarMiembro").parentNode.classList.remove("active");
});

document.getElementById("mostrarMiembro").addEventListener("click", function () {

    document.getElementById("registrarProfesor").style.display = "none";
    document.getElementById("registrarMiembro").style.display = "block";

    this.parentNode.classList.add("active");

    document.getElementById("mostrarProfesor").parentNode.classList.remove("active");
});

$(document).ready(function () {

    // Desaparecer la alerta al hacer clic en ella
    $('.alert').click(function () {
        $(this).fadeOut('slow');
    });
});