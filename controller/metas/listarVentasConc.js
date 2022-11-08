let paginaActualW = 1

getDataW(paginaActualW)

document.getElementById('numRegistrosW').addEventListener("change", function() {
    getDataW(paginaActualW)
}, false)

function getDataW(pagina) {

    let input = document.getElementById('busquedaW').value
    let select = document.getElementById('numRegistrosW').value
    let contenido=document.getElementById('resultadosW')
    // verificar si trae los valores

    // console.log(input)
    // console.log(select)
    // console.log(pagina)

    // le damos el origen de los datos
    let url='controller/whatsapp/listar.php';
    let formaData = new FormData()
    formaData.append('busqueda', input)
    formaData.append('registros', select)
    formaData.append('pagina', pagina)

    fetch(url,{
        method: "POST",
        body: formaData
    }).then(response=>response.json())
    .then(data=>{
        contenido.innerHTML=data.data
        document.getElementById('msgW').innerHTML = data.mensaje
        document.getElementById('munW').innerHTML = data.paginacion
    }).catch(err=>console.log(err))
}
