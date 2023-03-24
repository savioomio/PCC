function mostrarSenha() {
    var password = document.querySelector(".password");
    var img = document.querySelector(".cadeado")
    if (password.type === "password") {
        img.src='imgs/cadeado-aberto.png'
        password.type = "text";
        
    } else {
        img.src='imgs/cadeado.png'
        password.type = "password";
    }
}
