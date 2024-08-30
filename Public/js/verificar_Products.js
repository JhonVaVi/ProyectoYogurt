$(document).ready(function () {
    consultar();
});
var nombre_producto = document.getElementById("nombre_producto");
var precio_producto = document.getElementById("precio_producto");
var cantidad_producto = document.getElementById("cantidad_producto");
// function validarEmail(email) {
//     var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     return re.test(String(email).toLowerCase());

// }
$("#btn_nuevo_Producto").click(function (e) {
    e.preventDefault();
    //alert("Por favor llene todos los campos");
    preguntar();
});
$('#editar_datos').click(function (e) {
    e.preventDefault();
    actualizar_datos();
  });
function preguntar() {
    if (
        $("#nombre_producto").val() == 0 ||
        $("#precio_producto").val() == 0 ||
        $("#cantidad_producto").val() == 0
    ) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Falta llenar algun campo!",
        });
    } else {
        crear();

    }
}
function crear() {
    var datosFormulario = new FormData();
    datosFormulario.append("nombre", $("#nombre_producto").val());
    datosFormulario.append("precio", $("#precio_producto").val());
    datosFormulario.append("stock", $("#cantidad_producto").val());
    $.ajax({
        type: "POST",
        url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Productos.php?action=guardar",
        data: datosFormulario,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            if (response == false) {
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: "Registro no exitoso!",
                });
            } else {
                Swal.fire({
                    icon: "success",
                    title: "Exito!",
                    text: "Registro exitoso!",
                });
            }
        },
    });
}
function consultar() {
    $("#tabla").empty();
    $.ajax({
        type: "post",
        url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Productos.php?action=listar",
        success: function (response) {
            var persona = [];
            var persona = JSON.parse(response);

            var tabla = "";
            //console.log(persona.length);
            if (persona.length > 0) {
                for (var i = 0; i < persona.length; i++) {
                    tabla += "<tr>";
                    tabla += "<td>" + persona[i].id_producto + "</td>";
                    tabla += "<td>" + persona[i].nombre_producto + "</td>";
                    tabla += "<td>" + persona[i].precio_producto + "</td>";
                    tabla += "<td>" + persona[i].stock_producto + "</td>";
                    tabla += "<td>";
                    tabla += "<button class='btn btn-warning'data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='@getbootstrap'" +
                        " onclick='llenar_datos(" + persona[i].id_producto + ")'>Editar</button>";
                    tabla += "<br>";    
                    // tabla += "<button class='btn btn-danger' onclick='eliminar(" + persona[i].id_producto + ")'>Eliminar</button>";
                    tabla += "</td>";
                    tabla += "<tr>";

                }
            } else {
                tabla += "<tr>";
                tabla += "<td colspan='5'>No hay datos</td>";
                tabla += "</tr>";
            }
            $("#tabla").append(tabla);
        },
        error: function (response) {

            console.log("error");

        },
    });
}
function eliminar(id) {
    var datosFormulario = new FormData();
    datosFormulario.append("id", id);
    $.ajax({
        type: "POST",
        url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Productos.php?action=eliminar",
        data: datosFormulario,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            if (response == false) {
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: "Registro exitoso!"
                });
                consultar();
            } else {
                Swal.fire({
                    icon: "success",
                    title: "Exito!",
                    text: "Registro Eliminado!"

                });
                consultar();
            }
        },
    });
}
function llenar_datos(id_tabla_cliente) {
    var datosFormulario = new FormData();
    datosFormulario.append("id_edit", id_tabla_cliente);
    $.ajax({
      type: "POST",
      url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Productos.php?action=editar",
      data: datosFormulario,
      processData: false,
      contentType: false,
      success: function (response) {
        var persona = [];
        var persona = JSON.parse(response);
        //console.log(response);
        $("#id_producto_editar").val(persona[0].id_producto);
        $("#nombre_producto_editar").val(persona[0].nombre_producto);
        $("#precio_producto_editar").val(persona[0].precio_producto);
        $("#stock_producto_editar").val(persona[0].stock_producto);
      },
      error: function (response) {
        console.log("error");
      },
    });
  }
  function actualizar_datos() {
    var datosFormulario = new FormData();
    datosFormulario.append("nombre_producto", $("#nombre_producto_editar").val());
    datosFormulario.append("precio_producto", $("#precio_producto_editar").val());
    datosFormulario.append("stock_producto", $("#stock_producto_editar").val());
    datosFormulario.append("id_edit", $("#id_producto_editar").val());
    $.ajax({
      type: "Post",
      url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Productos.php?action=update",
      data: datosFormulario,
      processData: false,
      contentType: false,
      success: function (response) {
       console.log(response);
        if (response == false) {
            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "Registro no actualizado!"
            });
        } else {
            Swal.fire({
                icon: "success",
                title: "Exito!",
                text: "Registro actualizado!"
            });
  
        }
        consultar();
      },
      error: function (response) {
          console.log(response);
        console.log("error");
      },
    });
  }

//ventana modal

