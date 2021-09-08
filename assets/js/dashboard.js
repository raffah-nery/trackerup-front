(function () {
  'use strict'
  var ctx = document.getElementById('myChart')
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        'Domingo',
        'Segunda',
        'Terça',
        'Quarta',
        'Quinta',
        'Sexta',
        'Sábado'
      ],
      datasets: [{
        data: [
          0,
          12,
          17,
          26,
          14,
          13,
          8
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#f26829',
        borderWidth: 4,
        pointBackgroundColor: '#f26829'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
})()
