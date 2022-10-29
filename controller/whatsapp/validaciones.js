
document.getElementById('producto').addEventListener("change", function() {
    let valorP = document.getElementById('producto').value
    mostrarProducto(valorP)
}, false)

// document.getElementById('tipo').addEventListener("change", function() {
//     let valorT = document.getElementById('tipo').value
//     mostrarTipo(valorT)
// }, false)

function mostrarDNI() {
    const nombre = document.getElementById('nombre').value.length
    if (nombre > 0) {
        document.getElementById('ddni').style.display='block';
    }else{
        document.getElementById('ddni').style.display='none';
        document.getElementById('dni').value='';
        document.getElementById('dtelefono').style.display='none';
        document.getElementById('telefono').value='';
        document.getElementById('dproducto').style.display='none';
        document.getElementById('producto').selectedIndex = 0;
        
        document.getElementById('dtipo').style.display='none';
        document.getElementById('dlineaProce').style.display='none';
        document.getElementById('doperadorCeden').style.display='none';
        document.getElementById('dmodalidad').style.display='none';
        document.getElementById('dplan').style.display='none';
        document.getElementById('dequipos').style.display='none';
        document.getElementById('dformaPago').style.display='none';
        document.getElementById('dtelefonoRef').style.display='none';
        document.getElementById('telefonoRef').value='';
        document.getElementById('dsec').style.display='none';
        document.getElementById('dtipoFija').style.display='none';
        document.getElementById('dplanFija').style.display='none';
        document.getElementById('destado').style.display='none';
    }
}

function mostrarTelefono() {
    const dni = document.getElementById('dni').value.length
    if (dni > 0) {
        document.getElementById('dtelefono').style.display='block';
    }else{
        document.getElementById('dtelefono').style.display='none';
        document.getElementById('telefono').value='';
        document.getElementById('dproducto').style.display='none';
        document.getElementById('producto').selectedIndex = 0;
    }
}

function mostrarProductos() {
    const telefono = document.getElementById('telefono').value.length
    if (telefono > 0) {
        document.getElementById('dproducto').style.display='block';
    }else{
        document.getElementById('dproducto').style.display='none';
        document.getElementById('producto').selectedIndex = 0;
    }
}

function mostrarProducto(valor){
    const any = "---"
    const movil = "Movil"
    const fija = "Fija"

    if (valor == movil){
        document.getElementById('dtipo').style.display='block';
        document.getElementById('dlineaProce').style.display='block';
        document.getElementById('doperadorCeden').style.display='block';
        document.getElementById('dmodalidad').style.display='block';
        document.getElementById('dplan').style.display='block';
        document.getElementById('dequipos').style.display='block';
        document.getElementById('dformaPago').style.display='block';
        document.getElementById('dtelefonoRef').style.display='block';
        document.getElementById('dsec').style.display='block';
        document.getElementById('destado').style.display='block';

        document.getElementById('dtipoFija').style.display='none';
        document.getElementById('dplanFija').style.display='none';
    }
    else if(valor == fija){
        document.getElementById('dtipoFija').style.display='block';
        document.getElementById('dplanFija').style.display='block';
        document.getElementById('destado').style.display='block';

        document.getElementById('dtipo').style.display='none';
        document.getElementById('dlineaProce').style.display='none';
        document.getElementById('doperadorCeden').style.display='none';
        document.getElementById('dmodalidad').style.display='none';
        document.getElementById('dplan').style.display='none';
        document.getElementById('dequipos').style.display='none';
        document.getElementById('dformaPago').style.display='none';
        document.getElementById('dtelefonoRef').style.display='block';
        document.getElementById('telefonoRef').value='';
        document.getElementById('dsec').style.display='none';
    }
    else if(valor == any){
        document.getElementById('dtipo').style.display='none';
        document.getElementById('dlineaProce').style.display='none';
        document.getElementById('doperadorCeden').style.display='none';
        document.getElementById('dmodalidad').style.display='none';
        document.getElementById('dplan').style.display='none';
        document.getElementById('dequipos').style.display='none';
        document.getElementById('dformaPago').style.display='none';
        document.getElementById('dtelefonoRef').style.display='none';
        document.getElementById('telefonoRef').value='';
        document.getElementById('dsec').style.display='none';
        document.getElementById('dtipoFija').style.display='none';
        document.getElementById('dplanFija').style.display='none';
        document.getElementById('destado').style.display='none';
    }
}

function mostrarTipo(valor){
    const any = "---"
    const porta = "Portabilidad"
    const reno = "Renovacion"
    
    if (valor == porta){
        document.getElementById('dlineaProce').style.display='block';
    }
    else if(valor == reno){
        document.getElementById('dlineaProce').style.display='block';
    }
    else if(valor == any){
        document.getElementById('dlineaProce').style.display='none';
    }
}

// detalles y edicion
