/*  Este codigo de Java es para que cuando el usuario pulse una casilla del formulario cambie de Color */
const inputs = document.querySelectorAll(".input-box input");
inputs.forEach(input => {
    input.addEventListener("focus", function() {
        const inputBox = this.closest('.input-box');
        if(inputBox){
            inputBox.classList.add("focus");
        }
    });

    input.addEventListener("blur", function() {
        const inputBox = this.closest('.input-box');
        if(inputBox && !this.value){
            inputBox.classList.remove("focus");
        }
    })
});

/*   Este codigo es para que no aparezacan las pantallas de login y registro al mismo tiempo*/
var linkTextLogin = document.getElementById("linkTextLogin");
var linkTextRegistro = document.getElementById("linkTextRegistro");
var formLogin = document.querySelector(".contenedor-form-login");
var formRegistro = document.querySelector(".contenedor-form-registro");

linkTextLogin.addEventListener("click",function(){
    event.preventDefault();
    formLogin.classList.add('inactive');
    formRegistro.classList.remove('inactive');
})

linkTextRegistro.addEventListener("click",function(){
    event.preventDefault();
    formLogin.classList.remove('inactive');
    formRegistro.classList.add('inactive');
})