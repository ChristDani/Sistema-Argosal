
document.getElementById('producto').addEventListener("change", function() {
    let valorP = document.getElementById('producto').value
    mostrarProducto(valorP)
}, false)

document.getElementById('tipo').addEventListener("change", function() {
    let valorT = document.getElementById('tipo').value
    mostrarTipo(valorT)
}, false)

function mostrarProducto(valor){
    const any = "---"
    const movil = "Movil"
    const fija = "Fija"

    if (valor == movil){
        document.getElementById('dtipo').style.display='block';
        document.getElementById('tipo').value='Seleccione Tipo';
        document.getElementById('destado').style.display='none';
        // document.getElementById('estado').value='Pendiente';
        document.getElementById('dtipoFija').style.display='none';
        document.getElementById('dplanFija').style.display='none';
        document.getElementById('dlineaProce').style.display='none';
    }
    else if(valor == fija){
        document.getElementById('dtipoFija').style.display='block';
        document.getElementById('dplanFija').style.display='block';
        document.getElementById('destado').style.display='block';
        document.getElementById('dtipo').style.display='none';
        document.getElementById('dlineaProce').style.display='none';
    }
    else if(valor == any){
        document.getElementById('producto').value='Seleccione Producto';
        document.getElementById('dtipo').style.display='none';
        document.getElementById('dtipoFija').style.display='none';
        document.getElementById('dplanFija').style.display='none';
        document.getElementById('destado').style.display='none';
        document.getElementById('dlineaProce').style.display='none';
    }
}

function mostrarTipo(valor){
    const any = "---"
    const porta = "Portabilidad"
    const reno = "Renovacion"
    
    if (valor == porta){
        document.getElementById('dlineaProce').style.display='block';
        // document.getElementById('destado').style.display='block';
        // document.getElementById('estado').value='Pendiente';
        // document.getElementById('dtipoFija').style.display='none';
        // document.getElementById('dplanFija').style.display='none';
    }
    else if(valor == any){
        document.getElementById('dlineaProce').style.display='none';
        document.getElementById('tipo').value='Seleccione Tipo';
    }
}
