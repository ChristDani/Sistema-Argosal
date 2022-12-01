function infoUsuario(codigo,nombre,tipo) 
{
    let btncambiar = document.getElementById('btncambiar')
    let btneliminar = document.getElementById('btneliminar')

    btncambiar.addEventListener("click", cambiarTipoUser(codigo,nombre,tipo), false);
    btneliminar.addEventListener("click", eliminarUsuario(codigo,nombre), false);
    console.log(codigo,nombre,tipo)
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
    document.getElementById('dnicambiar').value=codigo
    document.getElementById('nombreUserCambiar').innerHTML=nombre
    console.log(codigo,nombre,tipo)
}

function eliminarUsuario(codigo,nombre) 
{  
    document.getElementById('dniEliminar').value=codigo
    document.getElementById('nombreUserEliminar').innerHTML=nombre
    console.log(codigo,nombre)
}