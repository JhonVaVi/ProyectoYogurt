var D_user = sessionStorage.getItem("user");
var descomprimir = JSON.parse(D_user);
$(document).ready(function () {

    $("#mostrar_nombre_user").text("BUEN DÍA " + descomprimir[0].nombre_usuario).css("font-weight", "bold").css("text-transform", "uppercase");

    llenar_pedidos("esperar");
    llenar_pedidos("prioritario");
    llenar_pedidos("urgente");
    llenar_total();
});
function llenar_pedidos(tipo_pedido) {
    var datosFormulario = new FormData();
    var id_usuario = descomprimir[0].id_usuario;
    datosFormulario.append("id_pedido", tipo_pedido);
    datosFormulario.append("id_usuario", id_usuario);
    $.ajax({
        type: "POST",
        url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Dashboard.php?action=datos_e",
        data: datosFormulario,
        processData: false,
        contentType: false,
        success: function (response) {
          var persona = [];
          var persona = JSON.parse(response);
            $("#"+tipo_pedido).text(persona[0].contados);
        },
        error: function (response) {
          console.log("error");
        },
      });
}
function llenar_total() {
    var datosFormulario = new FormData();
    var id_usuario = descomprimir[0].id_usuario;
    datosFormulario.append("id_usuario", id_usuario);
    $.ajax({
        type: "POST",
        url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Dashboard.php?action=datos_t",
        data: datosFormulario,
        processData: false,
        contentType: false,
        success: function (response) {
          var persona = [];
          var persona = JSON.parse(response);
            $("#total").text(persona[0].contados);
        },
        error: function (response) {
          console.log("error");
        },
      });
}

