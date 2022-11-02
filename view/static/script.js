
function mostrarWhats(){
    document.getElementById('whatsapp').style.display='flex';
    document.getElementById('aggWhats').style.display='flex';
    document.getElementById('landing').style.display='none';
    // document.getElementById('aggLand').style.display='none';
    document.getElementById('masiva').style.display='none';
}

function mostrarMasi(){
    document.getElementById('whatsapp').style.display='none';
    document.getElementById('aggWhats').style.display='none';
    document.getElementById('landing').style.display='none';
    // document.getElementById('aggLand').style.display='none';
    document.getElementById('masiva').style.display='flex';
}

function mostrarLand(){
    document.getElementById('whatsapp').style.display='none';
    document.getElementById('aggWhats').style.display='none';
    document.getElementById('landing').style.display='flex';
    // document.getElementById('aggLand').style.display='flex';
    document.getElementById('masiva').style.display='none';
}

// function scroll(){
//     console.log('hjsjd')
//     let scroll = document.getElementById('scroll');
//     console.log(scroll)

//     scroll.scrollTop = scroll.scrollHeight;
// }

// scroll();
