var nombre_usuario = JSON.parse(sessionStorage.getItem("user"))[0].nombre_usuario;
var id_usuario = JSON.parse(sessionStorage.getItem("user"))[0].id_usuario;
var nombre_cliente = document.getElementById("nombre_cliente");
var nombre_producto = document.getElementById("nombre_producto");
var cantidad_producto = document.getElementById("cantidad_producto");
var tiempo_pedido = document.getElementById("tiempo_pedido");
var tipo_pedido = document.getElementById("tipo_pedido");
var monto_final = document.getElementById("monto_final");
$(document).ready(function () {
    consultar();
    $('#nombre_usuario').val(nombre_usuario);
    consultarCliente();
    consultarProducto();
});
$('#editar_datos').click(function (e) {
    e.preventDefault();
    actualizar_datos();
});
$("#btn_nuevo_Pedido").click(function (e) {
    e.preventDefault();
    preguntar();

});

function preguntar() {
    if (
        $("#nombre_cliente").val() == 0 ||
        $("#nombre_producto").val() == 0 ||
        $("#nombre_usuario").val() == 0 ||
        $("#cantidad_producto").val() == 0 ||
        $("#tiempo_pedido").val() == 0 ||
        $("#tipo_pedido").val() == 0 ||
        $("#monto_final").val() == 0
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
    datosFormulario.append("usuario", id_usuario);
    datosFormulario.append("cliente", $("#nombre_cliente").val());
    datosFormulario.append("producto", $("#nombre_producto").val());
    datosFormulario.append("cantidad", $("#cantidad_producto").val());
    datosFormulario.append("fecha_pedido", $("#tiempo_pedido").val());
    datosFormulario.append("tipo_pedido", $("#tipo_pedido").val());
    datosFormulario.append("monto_final", $("#monto_final").val());
    $.ajax({
        type: "POST",
        url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Pedidos.php?action=guardar",
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
    var datosFormulario = new FormData();
    datosFormulario.append("id_usuario", id_usuario);

    $.ajax({
        type: "post",
        url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Pedidos.php?action=listar",
        data: datosFormulario,
        processData: false,
        contentType: false,
        success: function (response) {

            var persona = [];
            var persona = JSON.parse(response);

            var tabla = "";
            if (persona.length > 0) {
                for (var i = 0; i < persona.length; i++) {
                    tabla += "<tr>";
                    tabla += "<td>" + persona[i].id_pedido + "</td>";
                    tabla += "<td>" + persona[i].nombre_usuario + "</td>";
                    tabla += "<td>" + persona[i].nombre_cliente + "</td>";
                    tabla += "<td>" + persona[i].nombre_producto + "</td>";
                    tabla += "<td>" + persona[i].cantidad_pedido + "</td>";
                    tabla += "<td>" + persona[i].fecha_pedido + "</td>";
                    tabla += "<td>" + persona[i].tipo_pedido + "</td>";
                    tabla += "<td>" + persona[i].monto_pedido + "</td>";
                    tabla += "<td>";
                    tabla += "<button class='btn btn-warning'data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='@getbootstrap'" +
                        "onclick='llenar_datos(" + persona[i].id_pedido + ")'><i class='bi bi-pencil-square'></i></button>";
                    tabla += " ";
                    tabla += "<button class='btn btn-danger' onclick='eliminar(" + persona[i].id_pedido + ")'><i class='bi bi-trash'></i></button>";
                    tabla += " ";
                    tabla += "<button class='btn btn-primary' onclick='pdf(" + persona[i].id_pedido + ")'><i class='bi bi-filetype-pdf'></i></button>"
                    tabla += "</td>";
                    tabla += "<tr>";

                }
            } else {
                tabla += "<tr>";
                tabla += "<td>No hay datos registros</td>";
                tabla += "<tr>";
            }

            $("#tabla").append(tabla);
        },
        error: function (response) {

            console.log("error");

        },
    });
}
function eliminar(id) {
    //id usuario //id_cliente // id_producto 
    var datosFormulario = new FormData();
    datosFormulario.append("id", id);
    $.ajax({
        type: "POST",
        url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Pedidos.php?action=eliminar",
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
function consultarCliente() {
    $("#nombre_cliente").empty();
    $("#nombre_cliente_editar").empty();
    var datosFormulario = new FormData();
    datosFormulario.append("id", id_usuario);
    $.ajax({
        type: "post",
        url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Clientes.php?action=listar",
        data: datosFormulario,
        processData: false,
        contentType: false,
        success: function (response1) {
            var persona = [];
            var persona = JSON.parse(response1);

            var tabla = "";
            for (var i = 0; i < persona.length; i++) {
                tabla += "<option value='" + persona[i].id_cliente + "'>" + persona[i].nombre_cliente + "</option>";
            }
            $("#nombre_cliente").append(tabla);
            $("#nombre_cliente_editar").append(tabla);
        },
        error: function (response1) {

            console.log("error");

        },
    });
}
function consultarProducto() {
    $("#nombre_producto").empty();
    $("#nombre_producto_editar").empty();
    $.ajax({
        type: "post",
        url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Productos.php?action=listar",
        success: function (response) {
            var persona = [];
            var persona = JSON.parse(response);
            var i
            var tabla = "";
            for ( i = 0; i < persona.length; i++) {
                tabla += "<option value='" + persona[i].id_producto + "'>" + persona[i].nombre_producto + "</option>";
            }
            $("#nombre_producto").append(tabla);
            $("#nombre_producto_editar").append(tabla);

        },
        error: function (response) {

            console.log("error");

        },
    });
}
function preciop(valuerr) {
    console.log(valuerr);
}
function llenar_datos(id_tabla_cliente) {

    var datosFormulario = new FormData();
    datosFormulario.append("id_edit", id_tabla_cliente);
    $.ajax({
        type: "post",
        url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Pedidos.php?action=editar",
        data: datosFormulario,
        processData: false,
        contentType: false,
        success: function (response) {
            var persona = [];
            var persona = JSON.parse(response);

            $("#id_pedido_editar").val(persona[0].id_pedido);
            $("#nombre_usuario_editar").val(persona[0].usuario);
            $("#nombre_cliente_editar").val(persona[0].cliente);
            $("#nombre_producto_editar").val(persona[0].producto);
            $("#cantidad_pedido_editar").val(persona[0].cantidad_pedido);
            $("#fecha_pedido_editar").val(persona[0].fecha_pedido);
            $("#tipo_pedido_editar").val(persona[0].tipo_pedido);
            $("#monto_pedido_editar").val(persona[0].monto_pedido);

        },
        error: function (response) {

            console.log("error");

        },
    });
}
function actualizar_datos() {
    var datosFormulario = new FormData();
    datosFormulario.append("id_pedido", $("#id_pedido_editar").val());
    datosFormulario.append("usuario", $("#nombre_usuario_editar").val());
    datosFormulario.append("cliente", $("#nombre_cliente_editar").val());
    datosFormulario.append("producto", $("#nombre_producto_editar").val());
    datosFormulario.append("cantidad_pedido", $("#cantidad_pedido_editar").val());
    datosFormulario.append("fecha_pedido", $("#fecha_pedido_editar").val());
    datosFormulario.append("tipo_pedido", $("#tipo_pedido_editar").val());
    datosFormulario.append("monto_pedido", $("#monto_pedido_editar").val());
    $.ajax({
        type: "post",
        url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Pedidos.php?action=update",
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
                    text: "Registro Actualizado!"

                });
                consultar();
            }
        },
    });
}

function pdf(id_tabla_cliente) {
    var datosFormulario = new FormData();

    datosFormulario.append("id_pedido", id_tabla_cliente);
    datosFormulario.append("id_usuario", id_usuario);
    $.ajax({
        type: "post",
        url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Pedidos.php?action=lista_e",
        data: datosFormulario,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            var persona = [];
            var persona = JSON.parse(response);
            //onsole.log(response);
            localStorage.setItem("persona", JSON.stringify(persona));
            window.location.href = "http://localhost:80/Proyecto_yogurt/Views/pdf.php";
        },
        error: function (response) {

            console.log("error");

        },
    });
}
