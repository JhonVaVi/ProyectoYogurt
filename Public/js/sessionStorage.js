var D_user = sessionStorage.getItem("user");
var descomprimir = JSON.parse(D_user);
$('#btn_deslogin').click(function (e) { 
  
  sessionStorage.removeItem("user");
  window.location.href = "http://localhost:80/Proyecto_yogurt/Views/login.php";
});
$(document).ready(function () {

    if (descomprimir != null) {

    } else {
        window.location.href = "http://localhost:80/Proyecto_yogurt/Views/login.php";
    }
});