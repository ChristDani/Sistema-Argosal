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

    // para mantener la pagina al cambiar el limite de datos
    // if (pagina != null) {
    //     paginaActualW = pagina
    // }

    // le damos el origen de los datos
    let url='model/whatsapp.php';
    let formaData = new FormData()
    formaData.append('busqueda', input)
    formaData.append('registros', select)
    formaData.append('pagina', pagina)
    // para mantener la pagina al cambiar el limite de datos
    // formaData.append('pagina', paginaActualW)

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
