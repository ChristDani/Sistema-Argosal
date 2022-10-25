
// guardar



// detalles y edicion

let cerrar = document.getElementById('cerrar');
let abrir = document.getElementById('abrir');
let modal = document.getElementById('modal');
let contenedorModal = document.getElementById('contenedorModal');

// abrir.addEventListener("click", function(e){
//     e.preventDefault();
//     contenedorModal.style.opacity = "1";
//     contenedorModal.style.visibility = "visible";
//     modal.classList.toggle("modalClose");
// });

console.log(abrir)

abrir("click", function(){
    console.log("hola")
})
