
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
var nombre = [];
var contar = [];
function llenar_tablas() {
  var datosFormulario = new FormData();
  var id_usuario = descomprimir[0].id_usuario;
  datosFormulario.append("id_usuario", id_usuario);
  $.ajax({
    type: "POST",
    url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Dashboard.php?action=datos_g",
    data: datosFormulario,
    processData: false,
    contentType: false,
    success: function (response) {

      var persona = [];
      var persona = JSON.parse(response);

      for (let i = 0; i < persona.length; i++) {

        nombre.push(persona[i].tipo_pedido);
        contar.push(persona[i].contados);
      }
      const ctx = document.getElementById('myChart').getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: nombre,
          datasets: [{
            label: '# pedidos',
            data: contar,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
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
    }
  });
}

$(document).ready(function () {
  llenar_tablas();
});

