var first_name = document.getElementById("first_name");
var last_name = document.getElementById("last_name");
var email = document.getElementById("email");
var password = document.getElementById("password");
var password_confirm = document.getElementById("password_confirm");
$('#btn_nuevo_user').click(function (e) {
    e.preventDefault();
    //alert("Por favor llene todos los campos");
    preguntar();
});
$('#btn_login').click(function (e) {
    e.preventDefault();
    //verificar campos 
    if ($('#pass').val() == 0 || $('#correo').val() == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Falta llenar algun campo!',
        })
    }else{
        login();
    }



});


function preguntar() {
    if (first_name.value.length == 0 || last_name.value.length == 0 || email.value.length == 0 || password.value.length == 0 || password_confirm.value.length == 0) {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Falta llenar algun campo!',

        })
    } else {
        if (password.value != password_confirm.value) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Las Contraseñas no Coinciden !',
            })
            limpiar();
        } else {

            crear();
            //alert("Registro exitoso");

        }
    }
}
function crear() {
    var datosFormulario = new FormData();
    datosFormulario.append("nombre", $("#first_name").val());
    datosFormulario.append("apellido", $("#last_name").val());
    datosFormulario.append("email", $("#email").val());
    datosFormulario.append("password", $("#password").val());
    // console.log(datosFormulario.get("nombre"));
    // console.log(datosFormulario.get("apellido"));
    // console.log(datosFormulario.get("email"));
    // console.log(datosFormulario.get("password"));
    $.ajax({
        type: "POST",
        url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_User.php?action=guardar",
        data: datosFormulario,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            if(response == true){
                Swal.fire({
                    icon: 'success',
                    title: 'Registro exitoso',
                    text: 'Bienvenido',
                })
               
                window.location.href = "http://localhost:80/Proyecto_yogurt/Views/login.php";
                limpiar();
            }
        }

    });
}
function login() {
    var datosFormulario = new FormData();
    datosFormulario.append("pass", $("#pass").val());
    datosFormulario.append("correo", $("#correo").val());
 
    $.ajax({
        type: "POST",
        url: "http://localhost:80/Proyecto_yogurt/Controllers/Controller_User.php?action=userExists",
        data: datosFormulario,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = JSON.parse(response);
            if (res.length > 0) {
                window.location.href = "http://localhost:80/Proyecto_yogurt/Views/dashboard.php";
                  sessionStorage.setItem("user", response);
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Usuario no existe!',
                })
            }

         
           
        }



    });
}
























function limpiar() {
    first_name.value = "";
    last_name.value = "";
    email.value = "";
    password.value = "";
    password_confirm.value = "";
}
