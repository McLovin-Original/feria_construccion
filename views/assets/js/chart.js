
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
        datasets: [{
            label: 'Numero de usuarios registrados',
            data: [12, 19, 3, 5, 2, 3, 9],
            backgroundColor: [
                '#BAD22D',

            ],
            borderColor: [
                '#8d9e27',

            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
var ctx = document.getElementById("myChart2");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
        datasets: [{
            label: 'Numero de usuarios registrados',
            data: [19, 17, 15, 13, 11, 9, 7],
            backgroundColor: [
                '#1565c0',
                '#1976d2',
                '#1e88e5',
                '#2196f3',
                '#42a5f5',
                '#64b5f6',
                '#90caf9',
            ],
            borderColor: [
                '#267db7',

            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
