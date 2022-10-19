let paginaActualE = 1

getDataE(paginaActualE)

document.getElementById('numRegistrosE').addEventListener("change", function() {
    getDataE(paginaActualE)
}, false)

function getDataE(pagina) {

    let input = document.getElementById('busquedaE').value
    let select = document.getElementById('numRegistrosE').value
    let contenido=document.getElementById('resultadosE')
    // verificar si trae los valores

    // console.log(input)
    // console.log(select)
    // console.log(pagina)

    // para mantener la pagina al cambiar el limite de datos
    if (pagina != null) {
        paginaActualE = pagina
    }

    // le damos el origen de los datos
    let url='model/equipos.php';
    let formaData = new FormData()
    formaData.append('busqueda', input)
    formaData.append('registros', select)
    // formaData.append('pagina', pagina)
    // para mantener la pagina al cambiar el limite de datos
    formaData.append('pagina', paginaActualE)

    fetch(url,{
        method: "POST",
        body: formaData
    }).then(response=>response.json())
    .then(data=>{
        contenido.innerHTML=data.data
        document.getElementById('msgE').innerHTML = data.mensaje
        document.getElementById('munE').innerHTML = data.paginacion
    }).catch(err=>console.log(err))
}