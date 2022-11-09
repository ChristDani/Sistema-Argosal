let paginaActualVC = 1

getDataVC(paginaActualVC)

document.getElementById('numRegistrosVC').addEventListener("change", function() {
    getDataVC(paginaActualVC)
}, false)

function getDataVC(pagina) {

    let input = document.getElementById('busquedaVC').value
    let select = document.getElementById('numRegistrosVC').value
    let contenido=document.getElementById('resultadosVC')
    // verificar si trae los valores

    // console.log(input)
    // console.log(select)
    // console.log(pagina)

    // le damos el origen de los datos
    let url='controller/metas/listar.php';
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
        document.getElementById('msgVC').innerHTML = data.mensaje
        document.getElementById('munVC').innerHTML = data.paginacion
    }).catch(err=>console.log(err))
}
