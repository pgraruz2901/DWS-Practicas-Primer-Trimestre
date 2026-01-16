let formulario = document.querySelector("form");
let resultados = document.getElementById("resultados");
let idBoton = document.getElementById("id_bot");

formulario.addEventListener("submit", function (event) {
    event.preventDefault;
});

idBoton.addEventListener("click", function () {
    fetch(url, {
        method: "GET",
    })
    .then(function (response){
        if(response.ok){
            response.json()
                .then(function(resp){
                    resultados.innerHTML = resp["datos"];
                })
                .catch
        }
    });
});
