var local = localStorage.getItem('persona');

var persona = JSON.parse(local);
var fecha = new Date(persona[0].fecha_pedido);
var fecha_w = fecha.getDate() + '/' + fecha.getMonth() + '/' + fecha.getFullYear();
var dias = 15;
fecha.setDate(fecha.getDate() + dias);
var fecha_vencimiento = fecha.getDate() + '/' + fecha.getMonth() + '/' + fecha.getFullYear();

function igb() {
   var igb;// = document.getElementById('precio_igb').value;
   var precio = persona[0].monto_pedido;// = document.getElementById('precio');
   igb = precio * 0.18;
   return igb;
}
function pagototal() {
   var total = igb();
   //   var precio = document.getElementById('precio').value;

   var precio = persona[0].monto_pedido;
   var precioTotal = precio + total;

   return precioTotal;
}







document.getElementById('nombre_usuario').innerHTML = persona[0].nombre_usuario;
document.getElementById('nombre_producto').innerHTML = persona[0].nombre_producto;
document.getElementById('nombre_cliente').innerHTML = persona[0].nombre_cliente;
document.getElementById('cantidad_pedido').innerHTML = persona[0].cantidad_pedido;;
document.getElementById('fecha_pedido').innerHTML = fecha_w;
document.getElementById('fecha_vencimiento').innerHTML = fecha_vencimiento;
document.getElementById('id_pedido').innerHTML = persona[0].id_pedido;
document.getElementById('tipo_pedido').innerHTML = persona[0].tipo_pedido;
document.getElementById('precio').innerHTML = persona[0].monto_pedido + ".00";
document.getElementById('precio_igb').innerHTML = igb();
document.getElementById('monto_final').innerHTML = pagototal();


function generar() {

   var boton = document.getElementById('app');
   html2pdf().from(boton).save(
      'pedido.pdf',
   );
}
function regresar(){
   localStorage.removeItem('persona');
   window.location.href = "Orders/index.php"
}