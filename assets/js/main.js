document.addEventListener("DOMContentLoaded", () => {
    const formContacto = document.getElementById("formContacto");

    if (formContacto) {
        formContacto.addEventListener("submit", (e) => {
            e.preventDefault();
            alert("Mensaje enviado correctamente");
            formContacto.reset();
        });
    }
});
