
// let vt = document.getElementById('vti').value;
// let vc = document.getElementById('vci').value;
// let vp = document.getElementById('vpi').value;
// let vr = document.getElementById('vri').value;
let vt = document.getElementById('vt').textContent;
let vc = document.getElementById('vc').textContent;
let vp = document.getElementById('vp').textContent;
let vr = document.getElementById('vr').textContent;

// console.log(vt, vc,vp,vr);

new Chart(bar, {
type: 'bar',
data: {
    labels: ['Gestión Total', 'Concretados', 'Pendientes', 'Rechazados'],
    datasets: [{
    label: 'Clientes',
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

new Chart(pie, {
    type: 'pie',
    data: {
        labels: [
            'Concretados',
            'Pendientes',
            'Rechazados'
          ],
          datasets: [{
            label: 'Clientes',
            data: [vc, vp, vr],
            backgroundColor: [
              '#41f1b6',
              '#ffbb55',
              '#fc3747'
            ],
            hoverOffset: 4
          }]
        }
    }   

);