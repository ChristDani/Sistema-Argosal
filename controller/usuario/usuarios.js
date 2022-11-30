function eliminarUsuario(codigo,nombre) 
{
    // console.log("funciona / "+codigo+" / "+nombre)    
    document.getElementById('code').value=codigo
    document.getElementById('nombreUser').innerHTML=nombre
    // document.getElementById('nombreUser').innerHTML=nombre.trim()
}

function editarUsuario(dni,nombre,clave,foto,fotoPerfil) 
{
    document.getElementById('dniedit').value=dni
    document.getElementById('nombreedit').value=nombre
    document.getElementById('claveedit2').value=clave
    document.getElementById('fotoedit1').value=foto
    document.getElementById('fotoPerfiledit1').value=fotoPerfil
}