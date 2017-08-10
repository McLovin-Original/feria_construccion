
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
