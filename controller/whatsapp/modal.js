
// detalles y edicion

function abrirModalDetalle(codigo) {
    // obtenemos el div donde poner los datos
    let contenidoD = document.getElementById('detallesWhats');

    //mandamos la posicion al controller
    let url = 'controller/whatsapp/detalle.php';
    let formaData = new FormData();
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

