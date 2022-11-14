const selecionado = document.querySelector("#checkbox");
var tipo = document.getElementById("txtPass");

selecionado.addEventListener("change", (el) => {
    if (selecionado.checked) {
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
});

selecionado.dispatchEvent(new Event("change"));
