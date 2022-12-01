function infoUsuario(codigo,nombre,tipo) 
{
    let contenido = document.getElementById('detalleuserespecifico')
    let btncambiar = document.getElementById('btncambiar')
    let btneliminar = document.getElementById('btneliminar')
    if (tipo === "1") 
    {
        btncambiar.innerHTML="Descender"
        btncambiar.classList.remove("btn-success")
        btncambiar.classList.add("btn-warning")
    }
    else if (tipo === "0") 
    {
        btncambiar.innerHTML="Ascender"            
        btncambiar.classList.remove("btn-warning")       
        btncambiar.classList.add("btn-success")
    }
    btncambiar.addEventListener("click", cambiarTipoUser(codigo,nombre,tipo), false);
    btneliminar.addEventListener("click", eliminarUsuario(codigo,nombre), false);

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
    document.getElementById('fotoPerfiledit1').value=fotoPerfil
}

function cambiarTipoUser(codigo,nombre,tipo) 
{
    let btnascdesc = document.getElementById('btnascdesc')
    document.getElementById('dnicambiar').value=codigo
    document.getElementById('tipocambiar').value=tipo
    if (tipo === "1") 
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