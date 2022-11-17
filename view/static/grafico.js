const ctx = document.getElementById('myChart');

let vt = document.getElementById('vt').textContent;
let vc = document.getElementById('vc').textContent;
let vp = document.getElementById('vp').textContent;
let vr = document.getElementById('vr').textContent;

// console.log(vt, vc,vp,vr);

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Gestión de Venta', 'Concretadas', 'Pendientes', 'Rechazadas'],
        datasets: [{
            label: 'Gestión',
            data: [vt, vc, vp, vr],
            borderWidth: 1,
            borderColor:
                [
                    'rgb(54, 162, 235)',
                    'rgb(75, 192, 192)',
                    'rgb(255, 205, 86)',
                    'rgb(255, 99, 132)'
                ],
            backgroundColor:
                [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ]
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