// console.log('holaaaaaaaa')
// alert('empezando paginacion XD')

const botones = document.querySelectorAll('#paginador a');
const anterior = document.querySelector('#anterior');
const siguiente = document.querySelector('#siguiente');

for (let i=0; i<botones.length; i++){
    botones[i].addEventListener('click', function (e) {
        const num = e.target.dataset.pagina;
        const fd = new FormData();
        fd.append('numero',num);

        fetch('controller/masiva/listarAjax.php', {method: 'post', body:fd})
        .then(function(j){return j.json();})
        .then(function(d){
            console.log(d);
            const resultados = document.getElementById('resultados');
            const paginador = document.getElementById('paginador');

            resultados.innerHTML='';
            d.respuesta.forEach( p => {
                resultados.innerHTML += "<tr><td align='center'></td></tr> ";
                
                
            });

        });

        // console.log(num);
        e.preventDefault();
    });
}

siguiente.addEventListener('click', function (s) {
    console.log('siguiente');
});

anterior.addEventListener('click', function (s) {
    console.log('anterior');
});
