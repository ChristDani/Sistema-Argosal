let date = document.getElementById('date');
let logo = document.getElementById('logo');
let img = document.getElementById('imagen')

var x = Math.ceil(Math.random()*13);

img.style.background = "url(view/static/imgLoginLib/"+x+".jpg)";
img.style.backgroundPosition = "center";
img.style.backgroundSize = "cover";
img.style.backgroundRepeat = "no-repeat";


let windowscale = window.screen.width;

if (windowscale < 800) {
    date.style.display = "none";
    logo.style.display = "block";
}

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


console.log(tiempo)