
  
function mostrarFormulario(){
    let boton_on = document.getElementById("power-on")
    let formulario = document.getElementById("form-sesion")
    formulario.style.display="flex";
    formulario.animate([
        {transform: 'translateY(-20vh)'}

    ],{
        duration: 1000,
        easing: "ease-in",
        fill: "forwards"
    });
    
    boton_on.style.fill = 'rgba(114, 246, 255, 0.65)'
}