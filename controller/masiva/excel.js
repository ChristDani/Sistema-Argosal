function exportarExcel(nombre) 
{
    let busqueda = document.getElementById('busquedaM').value

    // console.log(busqueda, nombre)

    let url='controller/masiva/excel.php';
    let formaData = new FormData()
    formaData.append('busqueda', busqueda)
    formaData.append('nombre', nombre)

    fetch(url,{
        method: "POST",
        body: formaData
    })
}