<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
  <link rel="stylesheet" href="../Public/css/estilos_pdf.css">

  <title>Yogur PyD</title>
</head>

<body>

  <div class="container">
    <div id="app" class="col-11">

      <h2>Nota de Compra</h2>
      <div class="row my-3">
        <div class="col-10">
          <h1>Yogur PyD</h1>
          <p>Jequetepeque - La Libertad </p>
          <p>Plaza de armas</p>

        </div>
        <div class="col-2">
          <img src="../Public/img/logo.jpg" style="width: 100%;height: 100px;" />
        </div>
      </div>

      <hr />

      <div class="row fact-info mt-3">
        <div class="col-3">
          <h5>Facturar a</h5>
          <p id="nombre_cliente">
            Arian Manuel Garcia Reynoso
          </p>
        </div>
        <div class="col-3">
          <h5>Facturado por</h5>
          <p id="nombre_usuario">
            Cotui, Sanchez Ramirez
            Santa Fe, #19
            arianmanuel75@gmail.com
          </p>
        </div>
        <div class="col-3">
          <h5>N° de factura</h5>
          <h5>Fecha</h5>
          <h5>Fecha de vencimiento</h5>
        </div>
        <div class="col-3">
          <h5 id="id_pedido">103</h5>
          <p id="fecha_pedido">09/05/2019</p>
          <p id="fecha_vencimiento">09/05/2019</p>

        </div>
      </div>

      <div class="row my-5">
        <table class="table table-borderless factura">
          <thead>
            <tr>
              <th>Cant.</th>
              <th>Descripcion</th>
              <th>Tipo de Pedido</th>
              <th>Importe</th>
            </tr>
          </thead>
          <tbody>
            
            <tr>
              <td id="cantidad_pedido">1</td>
              <td id="nombre_producto">Clases de Cha-Cha-Cha</td>
              <td id="tipo_pedido">3,000.00</td>
              <td id="precio">3,000.00</td>
            </tr>
            <tr>
              <td></td>
              <td ></td>
              <td id="igb">IGB(18%)</td>
              <td id="precio_igb">3,000.00</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th></th>
              <th>Total Factura</th>
              <th id="monto_final">RD$15,000.00</th>
            </tr>
          </tfoot>
        </table>
      </div>

      <div class="cond row">
        <div class="col-12 mt-3">
          <h4>Condiciones y formas de pago</h4>
          <p>El pago se debe realizar en un plazo de 15 dias.</p>
          
        </div>
      </div>
    </div>

    <div class="container">
      <button class=" btn btn-primary float-end m-2"  onclick="generar()">Imprimir</button>
      <button class=" btn btn-danger float-end m-2"  onclick="regresar()">regresar</button>
      </div>
  </div>

  <script src="../Public/js/pdf.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>