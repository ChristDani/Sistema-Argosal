
function mostrarWhats(){
    document.getElementById('whatsapp').style.display='flex';
    document.getElementById('masiva').style.display='none';
    document.getElementById('landing').style.display='none';
}

function mostrarMasi(){
    document.getElementById('whatsapp').style.display='none';
    document.getElementById('masiva').style.display='flex';
    document.getElementById('landing').style.display='none';
}

function mostrarLand(){
    document.getElementById('whatsapp').style.display='none';
    document.getElementById('masiva').style.display='none';
    document.getElementById('landing').style.display='flex';
}

function paginaAnterior(){
    console.log("anterior");
    // $empezar2-=12;
}

// function loginFail(){
//     console.log("DNI o Clave Incorrecta");
// }