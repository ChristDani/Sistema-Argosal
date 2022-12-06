function infoUsuario(codigo,nombre,tipo) 
{
    let contenido = document.getElementById('detalleuserespecifico')
    let btncambiar = document.getElementById('btncambiar')
    let btneliminar = document.getElementById('btneliminar')
    let btneditarmetas = document.getElementById('btneditarmetas')
    let contenedorbtneditarmetas = document.getElementById('contenedorbtneditarmetas')
    if (tipo === "1") 
    {
        contenedorbtneditarmetas.classList.add('d-none')
        btncambiar.innerHTML="Descender"
        btncambiar.classList.remove("btn-success")
        btncambiar.classList.add("btn-warning")
    }
    if (tipo === "2") 
    {
        contenedorbtneditarmetas.classList.add('d-none')
        btncambiar.innerHTML="Descender"
        btncambiar.classList.remove("btn-success")
        btncambiar.classList.add("btn-warning")
    }
    else if (tipo === "0") 
    {
        contenedorbtneditarmetas.classList.remove('d-none')
        btncambiar.innerHTML="Ascender"            
        btncambiar.classList.remove("btn-warning")       
        btncambiar.classList.add("btn-success")
    }
    btncambiar.addEventListener("click", cambiarTipoUser(codigo,nombre,tipo), false);
    btneliminar.addEventListener("click", eliminarUsuario(codigo,nombre), false);
    btneditarmetas.addEventListener("click", editarMetasAsesor(codigo), false);

    let url='controller/usuario/detalleUser.php';
    let formaData = new FormData()
    formaData.append('dni', codigo)

    fetch(url,{
        method: "POST",
        body: formaData
    }).then(response=>response.json())
    .then(data=>{
        contenido.innerHTML=data.data
    }).catch(err=>console.log(err))
}

function infoUsuarioModera(codigo,tipo) 
{ 
    let btneditarmetas = document.getElementById('btneditarmetas')    
    btneditarmetas.addEventListener("click", editarMetasAsesor(codigo), false);
    let contenedorbtneditarmetas = document.getElementById('contenedorbtneditarmetas')
    if (tipo === "2" || tipo === "1") 
    {
        contenedorbtneditarmetas.classList.add('d-none')
    }
    else if (tipo === "0") 
    {
        contenedorbtneditarmetas.classList.remove('d-none')
    }
    let contenido = document.getElementById('detalleuserespecifico')
    let url='controller/usuario/detalleUser.php';
    let formaData = new FormData()
    formaData.append('dni', codigo)

    fetch(url,{
        method: "POST",
        body: formaData
    }).then(response=>response.json())
    .then(data=>{
        contenido.innerHTML=data.data
    }).catch(err=>console.log(err))
}

function editarUsuario(dni,nombre,clave,foto,fotoPerfil) 
{
    document.getElementById('dniedit').value=dni
    document.getElementById('nombreedit').value=nombre
    document.getElementById('claveedit2').value=clave
    document.getElementById('fotoedit1').value=foto
    document.getElementById('fotoPerfiledit1').value=foto
    document.getElementById('fotoPerfilmuestra').src="view/static/ProfileIMG/"+fotoPerfil;
}

document.getElementById('fotoPerfiledit').addEventListener("change", function() {
    let hdsjfcjsdf = document.getElementById('fotoPerfiledit').value;
    function dataURItoBlob(dataURI) {
        // convert base64/URLEncoded data component to raw binary data held in a string
        var byteString;
        if (dataURI.split(",")[0].indexOf("base64") >= 0)
            byteString = atob(dataURI.split(",")[1]);
        else byteString = unescape(dataURI.split(",")[1]);

        // separate out the mime component
        var mimeString = dataURI.split(",")[0].split(":")[1].split(";")[0];

        // write the bytes of the string to a typed array
        var ia = new Uint8Array(byteString.length);
        for (var i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }

        return new Blob([ia], { type: mimeString });
    }
    var blob = dataURItoBlob(imagen);
    let parseoImg = new File([blob], `foto.png`, { type: "image/jpeg" });
    document.getElementById('fotoPerfilmuestra').classList.add('d-none');
    document.getElementById('fotoPerfileditmuestra').src=""+dataURItoBlob(hdsjfcjsdf);
    document.getElementById('fotoPerfileditmuestra').classList.remove('d-none');
}, false)

function cambiarTipoUser(codigo,nombre,tipo) 
{
    let btnascdesc = document.getElementById('btnascdesc')
    document.getElementById('dnicambiar').value=codigo
    document.getElementById('tipocambiar').value=tipo
    if (tipo === "1" || tipo === "2") 
    {
        btnascdesc.innerHTML="Descender"    
        btnascdesc.classList.remove("btn-success")   
        btnascdesc.classList.add("btn-warning")   
        document.getElementById('nombreUserCambiar').innerHTML="¿Estás seguro que deseas DESCENDER a "+nombre+"?";
    }
    else if (tipo === "0") 
    {
        btnascdesc.innerHTML="Ascender"            
        btnascdesc.classList.remove("btn-warning")          
        btnascdesc.classList.add("btn-success")           
        document.getElementById('nombreUserCambiar').innerHTML="¿Estás seguro que deseas ASCENDER a "+nombre+"?";
    }
}

function eliminarUsuario(codigo,nombre) 
{  
    document.getElementById('dniEliminar').value=codigo
    document.getElementById('nombreUserEliminar').innerHTML=nombre
}

function editarMetasAsesor(code) 
{
    let contenido = document.getElementById('detallemetasasesor')
    let url='controller/usuario/editarmetasasesor.php';
    let formaData = new FormData()
    formaData.append('dni', code)

    fetch(url,{
        method: "POST",
        body: formaData
    }).then(response=>response.json())
    .then(data=>{
        contenido.innerHTML=data.data
    }).catch(err=>console.log(err))
}