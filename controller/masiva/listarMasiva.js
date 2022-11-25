let paginaActualM = 1

getDataM(paginaActualM)

document.getElementById('numRegistrosM').addEventListener("change", function() {
    getDataM(paginaActualM)
}, false)

function getDataM(pagina) {

    let input = document.getElementById('busquedaM').value
    let select = document.getElementById('numRegistrosM').value
    let contenido=document.getElementById('resultadosM')
    // verificar si trae los valores

    // console.log(input)
    // console.log(select)
    // console.log(pagina)

    // para mantener la pagina al cambiar el limite de datos
    // if (pagina != null) {
    //     paginaActualM = pagina
    // }

    // le damos el origen de los datos
    let url='controller/masiva/listar.php';
    let formaData = new FormData()
    formaData.append('busqueda', input)
    formaData.append('registros', select)
    formaData.append('pagina', pagina)
    // para mantener la pagina al cambiar el limite de datos
    // formaData.append('pagina', paginaActualM)

    fetch(url,{
        method: "POST",
        body: formaData
    }).then(response=>response.json())
    .then(data=>{
        contenido.innerHTML=data.data
        document.getElementById('munM').innerHTML = data.paginacion
    }).catch(err=>console.log(err))
}