let modal = document.getElementById('modalDetalleMetas');
let contenedorModal = document.getElementById('contenedorModalDetalleMetas');

function abrirModalDetalle(codigo) {
    // obtenemos el div donde poner los datos
    let contenidoD = document.getElementById('detallesMetas')
    // abrimos el modal
    contenedorModal.style.display='flex';
    setTimeout(function () {
        modal.classList.toggle("modalClose");
    },80)

    //mandamos la posicion al controller
    let url='controller/metas/detalle.php';
    let formaData = new FormData()
    formaData.append('codigo', codigo)

    // traemos los datos del controller
    fetch(url,{
        method: "POST",
        body: formaData
    }).then(response=>response.json())
    .then(data=>{
        contenidoD.innerHTML=data.data
    }).catch(err=>console.log(err))
}

function cerrarModalDetalle() {
    modal.classList.toggle("modalClose");
    setTimeout(function () {
        contenedorModal.style.display='none';        
    }, 200)
}
