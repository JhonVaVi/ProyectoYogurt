$(document).ready(function () {
  consultar();
  //  $("#datatablesSimple").DataTable();
});
$('#editar_datos').click(function (e) {
  e.preventDefault();
  actualizar_datos();
});
var nombre_usuario = JSON.parse(sessionStorage.getItem("user"))[0].id_usuario;
var first_name = document.getElementById("cliente_name");
var last_name = document.getElementById("cliente_apellido");
var email = document.getElementById("cliente_email");


function validarEmail(email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
 
  alert( re.test(String(email).toLowerCase()));
}


  $("#buscarDni").click(function (e) {
    e.preventDefault();
    var dni = $("#dniCliente").val();
    if (dni.length == 8) {
      preguntardni(dni);
    } else {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "El DNI debe tener 8 digitos!",
      });
      return;
    }
    if (dni == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Falta llenar Este Campo campo!",
      });
      return;
    }
  });
  $("#btn_nuevo_cliente").click(function (e) {
    e.preventDefault();
    //alert("Por favor llene todos los campos");
    preguntar();
  });
  function preguntardni(dni) {
    $.ajax({
      type: "get",
      url:
        "https://dniruc.apisperu.com/api/v1/dni/" +
        dni +
        "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImNlbnR1cmlvbmphaW1lQGdtYWlsLmNvbSJ9.yTPvPJzrjUkoUi23-atHS6zUfYa-O55n8UoXHan2uv0",

      dataType: "json",

      success: function (response) {

        if (response.message != "No se encontraron resultadoss.") {
          $("#dniCliente").prop("disabled", true);
          $("#nombre_cliente").val(response.nombres).prop("disabled", true);
          $("#apellido_cliente").val(
            response.apellidoPaterno + " " + response.apellidoMaterno
          ).prop("disabled", true);
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "El DNI no existe!",
          });
        }
      },
      error: function (response) {
        console.log(response);
        console.log("error");
      },
    });
  }
  function preguntar() {
    if (
      $("#nombre_cliente").val() == 0 ||
      $("#apellido_cliente").val() == 0 ||
      $("#email_cliente").val() == 0
    ) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Falta llenar algun campo!",
      });
    } else {
      if (validarEmail($("#email_cliente").val())) {
      
      // crear();
      } else {
      
        alert("Email invalido");
      }
      
      //alert("Registro exitoso");
    }
  }
  function crear() {
    var datosFormulario = new FormData();
    datosFormulario.append("usuario", nombre_usuario);
    datosFormulario.append("dni", $("#dniCliente").val());
    datosFormulario.append("nombre_cliente", $("#nombre_cliente").val());
    datosFormulario.append("apellido_cliente", $("#apellido_cliente").val());
    datosFormulario.append("email_cliente", validarEmail($("#email_cliente").val()));


    $.ajax({
      type: "POST",
      url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Clientes.php?action=guardar",
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
    datosFormulario.append("id", nombre_usuario);
    $.ajax({
      type: "post",
      url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Clientes.php?action=listar",
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
            tabla += "<td>" + persona[i].dni_cliente + "</td>";
            tabla += "<td id='id_tabla_cliente'>" + persona[i].id_cliente + "</td>";
            tabla += "<td>" + persona[i].nombre_cliente + "</td>";
            tabla += "<td>" + persona[i].apellido_cliente + "</td>";
            tabla += "<td>" + persona[i].email_cliente + "</td>";
            tabla += "<td>";
            tabla += "<button class='btn btn-warning'data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='@getbootstrap'" +
              " onclick='llenar_datos(" + persona[i].id_cliente + ")'>Editar</button>";
            // tabla += "<button class='btn btn-danger' onclick='eliminar(" + persona[i].id_cliente + ")'>Eliminar</button>";
            tabla += "</td>";
            tabla += "<tr>";

          }
        } else {
          tabla += "<tr>";
          tabla += "<td colspan='7'>No hay registros</td>";
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
    var datosFormulario = new FormData();
    datosFormulario.append("id", id);
    $.ajax({
      type: "POST",
      url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Clientes.php?action=eliminar",
      data: datosFormulario,
      processData: false,
      contentType: false,
      success: function (response) {
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
      url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Clientes.php?action=editar",
      data: datosFormulario,
      processData: false,
      contentType: false,
      success: function (response) {
        var persona = [];
        var persona = JSON.parse(response);
        $("#id_cliente_editar").val(persona[0].id_cliente);
        $("#dni_cliente_editar").val(persona[0].dni_cliente);
        $("#nombre_cliente_editar").val(persona[0].nombre_cliente);
        $("#apellido_cliente_editar").val(persona[0].apellido_cliente);
        $("#correo_cliente_editar").val(persona[0].email_cliente);
      },
      error: function (response) {
        console.log("error");
      },
    });
  }
  function actualizar_datos() {

    var datosFormulario = new FormData();
    datosFormulario.append("usuario", nombre_usuario);
    datosFormulario.append("dni_cliente", $("#dni_cliente_editar").val());
    datosFormulario.append("nombre_cliente", $("#nombre_cliente_editar").val());
    datosFormulario.append("apellido_cliente", $("#apellido_cliente_editar").val());
    datosFormulario.append("email_cliente", $("#correo_cliente_editar").val());
    datosFormulario.append("id_edit", $("#id_cliente_editar").val());
    $.ajax({
      type: "Post",
      url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_Clientes.php?action=update",
      data: datosFormulario,
      processData: false,
      contentType: false,
      success: function (response) {

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
        console.log("error");
      },
    });
  }
  
//ventana modal

