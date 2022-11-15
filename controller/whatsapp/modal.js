
// guardar

let contenedorModalG = document.getElementById('contenedorModalGuardarWhats');
let modalG = document.getElementById('modalGuardarWhats');

function abrirModalGuardar() {
    contenedorModalG.style.display = 'flex';
    setTimeout(function () {
        modalG.classList.toggle("modalClose");
    }, 10)
}

function cerrarModalGuardar() {
    modalG.classList.toggle("modalClose");
    setTimeout(function () {
        contenedorModalG.style.display = 'none';
    }, 200)
}

// detalles y edicion

let modal = document.getElementById('modalDetalleWhats');
let contenedorModal = document.getElementById('contenedorModalDetalleWhats');

function abrirModalDetalle(codigo) {
    // obtenemos el div donde poner los datos
    let contenidoD = document.getElementById('detallesWhats')
    // abrimos el modal
    contenedorModal.style.display = 'flex';
    setTimeout(function () {
        modal.classList.toggle("modalClose");
    }, 80)

    //mandamos la posicion al controller
    let url = 'controller/whatsapp/detalle.php';
    let formaData = new FormData()
    formaData.append('codigo', codigo)

    // traemos los datos del controller
    fetch(url, {
        method: "POST",
        body: formaData
    }).then(response => response.json())
        .then(data => {
            contenidoD.innerHTML = data.data
        }).catch(err => console.log(err))
}

function cerrarModalDetalle() {
    modal.classList.toggle("modalClose");
    setTimeout(function () {
        contenedorModal.style.display = 'none';
    }, 200)
}
