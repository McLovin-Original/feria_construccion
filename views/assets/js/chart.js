$.ajax({
  type: "POST",
  url: "inicio-grafica",
  success: function(data){
      var data = JSON.parse(data);
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Stands", "Conferencias", "Aprendices", "Adminstrativo", "Instructor", "Empresario", "Otro", "Total de visitantes"],
          datasets: [{
              label: 'Estadisticas Feria',
              data: [data[0], data[1], data[2], data[3], data[4], data[5], data[6], data[7]],
              backgroundColor: [
                  '#BAD22D',
                  '#BAD22D',
                  '#BAD22D',
                  '#BAD22D',
                  '#BAD22D',
                  '#BAD22D',
                  '#BAD22D',
                  '#BAD22D'

              ],
              borderColor: [
                  '#8d9e27',
                  '#8d9e27',
                  '#8d9e27',
                  '#8d9e27',
                  '#8d9e27',
                  '#8d9e27',
                  '#8d9e27',
                  '#8d9e27'

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
  }
});
