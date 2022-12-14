let date = document.getElementById('date');
let img = document.getElementById('imagen');
let nomove = document.getElementById('nope');


var x = Math.ceil(Math.random()*13);

img.style.background = "url(view/static/imgLoginLib/"+x+".jpg)";
img.style.backgroundPosition = "center";
img.style.backgroundSize = "cover";
img.style.backgroundRepeat = "no-repeat";


(function(){

    var actualizarHora = function(){
        var tiempo = new Date(),
            hora = tiempo.getHours(),
            ampm,
            min = tiempo.getMinutes(),
            second = tiempo.getSeconds();

        var pHora = document.getElementById('hora'),
            pmin = document.getElementById('min'),
            psecond = document.getElementById('second');
            pampm = document.getElementById('pre')

        if (hora >= 13) {
            hora = hora - 12;
            ampm = 'pm';
        } else{
            ampm = 'am';
        }

        if (hora == 0){
            hora == 12;
        };

       
        pampm.textContent = ampm;

        if (hora < 10) { hora = "0" + hora};
        if (min < 10) { min = "0" + min};
        if (second < 10) { second = "0" + second};

        pHora.textContent = hora;
        pmin.textContent = min;
        psecond.textContent = second;
    };

    actualizarHora();

    var intervalo = setInterval(actualizarHora, 100)

}())

nomove.addEventListener("mouseover", move);
nomove.addEventListener("mouseout", move);
var nose = 0.01;

function move() {

    let positionright = nomove.style.right.replace('px', ' ');
    let positionbottom = nomove.style.bottom.replace('px', ' ');

    let final = positionright - (positionright - 100);

    nose++;

    let coords = nomove.getBoundingClientRect().top;

    if (positionright = 315, positionbottom = 315) {
        nomove.style.right = nose - final;
        nomove.style.top = nose + final;

        console.log("este es el 1")
    
    } if (coords = 350.109375) {
        nomove.style.right = nose + final;
        nomove.style.bottom = nose + final;
        console.log("este es el 2")

    } if (coords = -0.890625) {
        nomove.style.right = nose + final;
        nomove.style.bottom = nose + final;
        console.log("este es el 3")

    }
     else {
        console.log("Hola no se");
        
    }


    console.log(coords);



}


// 165

