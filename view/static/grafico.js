const ctx = document.getElementById('myChart');

let vt = document.getElementById('vt').textContent;
let vc = document.getElementById('vc').textContent;
let vp = document.getElementById('vp').textContent;
let vr = document.getElementById('vr').textContent;

// console.log(vt, vc,vp,vr);

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['V. Totales', 'V. Concretadas', 'V. Pendientes', 'V. Rechazadas'],
        datasets: [{
            label: 'Ventas del Mes',
            data: [vt, vc, vp, vr],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});