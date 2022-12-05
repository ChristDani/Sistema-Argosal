
// setInterval(() => {
  // let vt = document.getElementById('vt').textContent;
  // let vc = document.getElementById('vc').textContent;
  // let vp = document.getElementById('vp').textContent;
  // let vr = document.getElementById('vr').textContent;
  
  // console.log(vt,vc,vp,vr);
  // graficobarra(vt,vc,vp,vr);  
  // graficopie(vc,vp,vr);  
// }, 1000);

document.getElementById('fecharequerida').addEventListener("change", function() {
  // setInterval(() => {
    let vt = document.getElementById('vt').textContent;
    let vc = document.getElementById('vc').textContent;
    let vp = document.getElementById('vp').textContent;
    let vr = document.getElementById('vr').textContent;
    
    // console.log(vt,vc,vp,vr);
    graficobarra(vt,vc,vp,vr);  
    graficopie(vc,vp,vr);  
  // }, 1000);
}, false)

function graficobarra(vt,vc,vp,vr)
{
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
}

function graficopie(vc,vp,vr)
{
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
}

const DATA_COUNT = 12;
const labels = [];
for (let i = 0; i < DATA_COUNT; ++i) {
    labels.push(i.toString());
}
new Chart(line, {
    type: 'line',
    data: {
        labels: labels,
        datasets:[
            {
                label: 'Prueba de no se que',
                data: [0, 20, 20, 60, 60, 120, NaN, 180, 120, 125, 105, 110, 170],
                borderColor: 'red',
                fill: false,
                cubicInterpolationMode: 'monotone',
                tension:0.4
            }, {
                label: 'Cubic interpolation',
                data: [0, 20, 20, 60, 60, 120, NaN, 180, 120, 125, 105, 110, 170],
                borderColor: 'blue',
                fill: false,
                tension: 0.4
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Chart.js Line Chart - Cubic interpolation mode'
          },
        },
        interaction: {
          intersect: false,
        },
        scales: {
          x: {
            display: true,
            title: {
              display: true
            }
          },
          y: {
            display: true,
            title: {
              display: true,
              text: 'Value'
            },
            suggestedMin: -10,
            suggestedMax: 200
          }
        }
    }
})