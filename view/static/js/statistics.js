

new Chart(bar, {
type: 'bar',
data: {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
    label: '# of Votes',
    data: [12, 19, 3, 5, 2, 3],
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

new Chart(pie, {
    type: 'pie',
    data: {
        labels: [
            'Pendientes',
            'Concretado',
            'Rechazado'
          ],
          datasets: [{
            label: 'Clientes',
            data: [300, 50, 100],
            backgroundColor: [
              '#ffbb55',
              '#41f1b6',
              '#fc3747'
            ],
            hoverOffset: 4
          }]
        }
    }   

);