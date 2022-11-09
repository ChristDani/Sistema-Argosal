function limpiar() {
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
        
        limpiar();
    }
}

function mostrarTelefonoRef() {
    const dni = document.getElementById('dni').value.length
    if (dni == 8) {
        document.getElementById('dtelefonoRef').style.display='block';
    }else{
        document.getElementById('dtelefonoRef').style.display='none';
        document.getElementById('telefonoRef').value='';
        document.getElementById('dproducto').style.display='none';
        document.getElementById('producto').selectedIndex = 0;

        // document.getElementById('dtelefono').style.display='none';
        // document.getElementById('telefono').value='';
    }
}

function mostrarProductos() {
    const telefonoref = document.getElementById('telefonoRef').value.length
    if (telefonoref == 9) {
        document.getElementById('dproducto').style.display='block';
    }else{
        document.getElementById('dproducto').style.display='none';
        document.getElementById('producto').selectedIndex = 0;
    }
}

// mostrar producto
document.getElementById('producto').addEventListener("change", function() {
    let valorP = document.getElementById('producto').value
    mostrarProducto(valorP)
}, false)

function mostrarProducto(valor){
    const any = "---"
    const movil = "Movil"
    const fija = "Fija"

    if (valor == movil){
        document.getElementById('dtipo').style.display='block';
        // document.getElementById('dlineaProce').style.display='block';
        // document.getElementById('doperadorCeden').style.display='block';
        // document.getElementById('dmodalidad').style.display='block';
        // document.getElementById('dplan').style.display='block';
        // document.getElementById('dequipos').style.display='block';
        // document.getElementById('dformaPago').style.display='block';
        // document.getElementById('dsec').style.display='block';
        // document.getElementById('destado').style.display='block';

        document.getElementById('dtipoFija').style.display='none';
        document.getElementById('dplanFija').style.display='none';
    }
    else if(valor == fija){
        document.getElementById('dtipoFija').style.display='block';
        // document.getElementById('dplanFija').style.display='block';
        // document.getElementById('destado').style.display='block';

        document.getElementById('dtipo').style.display='none';
        document.getElementById('dlineaProce').style.display='none';
        document.getElementById('doperadorCeden').style.display='none';
        document.getElementById('dmodalidad').style.display='none';
        document.getElementById('dplan').style.display='none';
        document.getElementById('dequipos').style.display='none';
        document.getElementById('dformaPago').style.display='none';
        document.getElementById('dsec').style.display='none';
    }
    else if(valor == any){
        document.getElementById('dtelefono').style.display='none';
        document.getElementById('telefono').value='';
        document.getElementById('dtipo').style.display='none';
        document.getElementById('dlineaProce').style.display='none';
        document.getElementById('doperadorCeden').style.display='none';
        document.getElementById('dmodalidad').style.display='none';
        document.getElementById('dplan').style.display='none';
        document.getElementById('dequipos').style.display='none';
        document.getElementById('dformaPago').style.display='none';
        document.getElementById('dsec').style.display='none';
        document.getElementById('dtipoFija').style.display='none';
        document.getElementById('dplanFija').style.display='none';
        document.getElementById('destado').style.display='none';
    }
}

// mostrar tipo
document.getElementById('tipo').addEventListener("change", function() {
    let valorT = document.getElementById('tipo').value
    mostrarTipo(valorT)
}, false)

function mostrarTipo(valor){
    const any = "---"
    const newline = "Linea Nueva"
    const porta = "Portabilidad"
    const reno = "Renovacion"
    
    if(valor == newline){
        document.getElementById('dtelefono').style.display='none';
        document.getElementById('telefono').value='---';
        document.getElementById('dlineaProce').style.display='none';
        document.getElementById('lineaProce').selectedIndex = 0;
        document.getElementById('doperadorCeden').style.display='none';
        document.getElementById('operadorCeden').selectedIndex = 0;
        document.getElementById('dmodalidad').style.display='block';
        document.getElementById('modalidad').selectedIndex = 0;
        document.getElementById('dplan').style.display='none';
        document.getElementById('plan').selectedIndex = 0;
        document.getElementById('dequipos').style.display='none';
        document.getElementById('equipos').selectedIndex = 0;
        document.getElementById('dformaPago').style.display='none';
        document.getElementById('formaPago').selectedIndex = 0;
        document.getElementById('dsec').style.display='none';
        document.getElementById('sec').value = '';

        document.getElementById('modalidad').addEventListener("change", function() {
            let valorA = document.getElementById('modalidad').value
            mostrarNewLine(valorA)
        }, false)
        
        function mostrarNewLine(val){
            const post = "Postpago"
            const prep = "Prepago"
            const any2 = "---"
        
            if (val == post) {
                document.getElementById('dplan').style.display='block';
                document.getElementById('plan').selectedIndex = 0;
                document.getElementById('dequipos').style.display='block';
                document.getElementById('equipos').selectedIndex = 0;
                document.getElementById('dformaPago').style.display='block';
                document.getElementById('formaPago').selectedIndex = 0;
                document.getElementById('dsec').style.display='block';
                document.getElementById('sec').value = '';
                // document.getElementById('destado').style.display='block';
                // document.getElementById('estado').selectedIndex = 0;
            }
            else if (val == prep) {
                document.getElementById('dplan').style.display='none';
                document.getElementById('plan').selectedIndex = 0;
                document.getElementById('dequipos').style.display='block';
                document.getElementById('equipos').selectedIndex = 0;
                document.getElementById('dformaPago').style.display='none';
                document.getElementById('formaPago').selectedIndex = 1;
                document.getElementById('dsec').style.display='block';
                document.getElementById('sec').value = '';
                // document.getElementById('destado').style.display='block';
                // document.getElementById('estado').selectedIndex = 0;
            }
            else if (val == any2) {
                document.getElementById('dplan').style.display='none';
                document.getElementById('plan').selectedIndex = 0;
                document.getElementById('dequipos').style.display='none';
                document.getElementById('equipos').selectedIndex = 0;
                document.getElementById('dformaPago').style.display='none';
                document.getElementById('formaPago').selectedIndex = 0;
                document.getElementById('dsec').style.display='none';
                document.getElementById('sec').value = '';
                // document.getElementById('destado').style.display='none';
                // document.getElementById('estado').selectedIndex = 0;        
            }
        }
    }
    else if (valor == porta){
        document.getElementById('dtelefono').style.display='block';
        document.getElementById('telefono').value='';
        document.getElementById('dlineaProce').style.display='block';
        document.getElementById('lineaProce').selectedIndex = 0;
        document.getElementById('doperadorCeden').style.display='block';
        document.getElementById('operadorCeden').selectedIndex = 0;
        document.getElementById('dmodalidad').style.display='block';
        document.getElementById('modalidad').selectedIndex = 1;
        document.getElementById('dplan').style.display='none';
        document.getElementById('plan').selectedIndex = 0;
        document.getElementById('dequipos').style.display='none';
        document.getElementById('equipos').selectedIndex = 0;
        document.getElementById('dformaPago').style.display='none';
        document.getElementById('formaPago').selectedIndex = 0;
        document.getElementById('dsec').style.display='none';
        document.getElementById('sec').value = '';

        document.getElementById('modalidad').addEventListener("change", function() {
            let valorB = document.getElementById('modalidad').value
            mostrarPorta(valorB)
        }, false)
        
        function mostrarPorta(val){
            const post = "Postpago"
            const prep = "Prepago"
            const any2 = "---"
        
            if (val == post) {
                document.getElementById('dplan').style.display='block';
                document.getElementById('plan').selectedIndex = 0;
                document.getElementById('dequipos').style.display='block';
                document.getElementById('equipos').selectedIndex = 0;
                document.getElementById('dformaPago').style.display='block';
                document.getElementById('formaPago').selectedIndex = 0;
                document.getElementById('dsec').style.display='block';
                document.getElementById('sec').value = '';
                // document.getElementById('destado').style.display='block';
                // document.getElementById('estado').selectedIndex = 0;
            }
            else if (val == prep) {
                document.getElementById('dplan').style.display='none';
                document.getElementById('plan').selectedIndex = 0;
                document.getElementById('dequipos').style.display='block';
                document.getElementById('equipos').selectedIndex = 0;
                document.getElementById('dformaPago').style.display='none';
                document.getElementById('formaPago').selectedIndex = 1;
                document.getElementById('dsec').style.display='block';
                document.getElementById('sec').value = '';
                // document.getElementById('destado').style.display='block';
                // document.getElementById('estado').selectedIndex = 0;
            }
            else if (val == any2) {
                document.getElementById('dplan').style.display='none';
                document.getElementById('plan').selectedIndex = 0;
                document.getElementById('dequipos').style.display='none';
                document.getElementById('equipos').selectedIndex = 0;
                document.getElementById('dformaPago').style.display='none';
                document.getElementById('formaPago').selectedIndex = 0;
                document.getElementById('dsec').style.display='none';
                document.getElementById('sec').value = '';
                // document.getElementById('destado').style.display='none';
                // document.getElementById('estado').selectedIndex = 0;        
            }
        }
    }
    else if(valor == reno){
        document.getElementById('dtelefono').style.display='block';
        document.getElementById('telefono').value='';
        document.getElementById('dlineaProce').style.display='none';
        document.getElementById('lineaProce').selectedIndex = 1;
        document.getElementById('doperadorCeden').style.display='none';
        document.getElementById('operadorCeden').selectedIndex = 0;
        document.getElementById('dmodalidad').style.display='none';
        document.getElementById('modalidad').selectedIndex = 1;
        document.getElementById('dplan').style.display='block';
        document.getElementById('plan').selectedIndex = 0;
        document.getElementById('dequipos').style.display='block';
        document.getElementById('equipos').selectedIndex = 0;
        document.getElementById('dformaPago').style.display='none';
        document.getElementById('formaPago').selectedIndex = 0;
        document.getElementById('dsec').style.display='none';
        document.getElementById('sec').value = '';
    }
    else if(valor == any){
        document.getElementById('dtelefono').style.display='none';
        document.getElementById('telefono').value='---';
        document.getElementById('dlineaProce').style.display='none';
        document.getElementById('lineaProce').selectedIndex = 0;
        document.getElementById('doperadorCeden').style.display='none';
        document.getElementById('operadorCeden').selectedIndex = 0;
        document.getElementById('dmodalidad').style.display='none';
        document.getElementById('modalidad').selectedIndex = 0;
        document.getElementById('dplan').style.display='none';
        document.getElementById('plan').selectedIndex = 0;
        document.getElementById('dequipos').style.display='none';
        document.getElementById('equipos').selectedIndex = 0;
        document.getElementById('dformaPago').style.display='none';
        document.getElementById('formaPago').selectedIndex = 0;
        document.getElementById('dsec').style.display='none';
        document.getElementById('sec').value = '';
    }
}



// detalles y edicion

function editar() {
    const movilE = "Movil"
    const fijaE = "Fija "

    document.getElementById('cancel').classList.toggle("hidden");
    document.getElementById('edit').classList.toggle("hidden");
    document.getElementById('dsave').classList.toggle("hidden");


    let prod = document.getElementById('productoEdit').value

    if (prod == movilE) {
        document.getElementById('planReEdit').classList.toggle("hidden");
        document.getElementById('planReEditM').classList.toggle("hidden");
        document.getElementById('equipoEdit').classList.toggle("hidden");
        document.getElementById('equipoEditM').classList.toggle("hidden");
        document.getElementById('formaPgEdit').classList.toggle("hidden");
        document.getElementById('formaPgEditM').classList.toggle("hidden");
        document.getElementById('telefRefEdit').classList.toggle("hidden");
        document.getElementById('telefRefEditM').classList.toggle("hidden");
        document.getElementById('secEdit').classList.toggle("hidden");
        document.getElementById('secEditM').classList.toggle("hidden");
        document.getElementById('estadoEdit').classList.toggle("hidden");
        document.getElementById('estadoEditM').classList.toggle("hidden");
    }
    else if (prod == fijaE) {
        document.getElementById('planFijaEdit').classList.toggle("hidden");
        document.getElementById('planFijaEditM').classList.toggle("hidden");
        document.getElementById('telefRefEdit').classList.toggle("hidden");
        document.getElementById('telefRefEditM').classList.toggle("hidden");
        document.getElementById('secEdit').classList.toggle("hidden");
        document.getElementById('secEditM').classList.toggle("hidden");
        document.getElementById('estadoEdit').classList.toggle("hidden");
        document.getElementById('estadoEditM').classList.toggle("hidden");
    }


}

function cancel() {
    const movilE = "Movil"
    const fijaE = "Fija "

    document.getElementById('cancel').classList.toggle("hidden");
    document.getElementById('edit').classList.toggle("hidden");
    document.getElementById('dsave').classList.toggle("hidden");

    let prod = document.getElementById('productoEdit').value

    if (prod == movilE) {
        document.getElementById('planReEdit').classList.toggle("hidden");
        document.getElementById('planReEditM').classList.toggle("hidden");
        document.getElementById('equipoEdit').classList.toggle("hidden");
        document.getElementById('equipoEditM').classList.toggle("hidden");
        document.getElementById('formaPgEdit').classList.toggle("hidden");
        document.getElementById('formaPgEditM').classList.toggle("hidden");
        document.getElementById('telefRefEdit').classList.toggle("hidden");
        document.getElementById('telefRefEditM').classList.toggle("hidden");
        document.getElementById('secEdit').classList.toggle("hidden");
        document.getElementById('secEditM').classList.toggle("hidden");
        document.getElementById('estadoEdit').classList.toggle("hidden");
        document.getElementById('estadoEditM').classList.toggle("hidden");
    }
    else if (prod == fijaE) {
        document.getElementById('planFijaEdit').classList.toggle("hidden");
        document.getElementById('planFijaEditM').classList.toggle("hidden");
        document.getElementById('telefRefEdit').classList.toggle("hidden");
        document.getElementById('telefRefEditM').classList.toggle("hidden");
        document.getElementById('secEdit').classList.toggle("hidden");
        document.getElementById('secEditM').classList.toggle("hidden");
        document.getElementById('estadoEdit').classList.toggle("hidden");
        document.getElementById('estadoEditM').classList.toggle("hidden");
    }

}
