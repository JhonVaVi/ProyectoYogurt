<?php
include_once "../Layout/header.php";
//---------------------------------------------
?>

<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Orders</h1>

    <!-- Grafica Principal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Datos </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <input type="text" name="" id="id_pedido_editar" hidden>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nombres Del Usuario:</label>
                <input type="text" class="form-control" id="nombre_usuario_editar" disabled>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nombre Del Cliente:</label>
                <select class="form-control" name="" id="nombre_cliente_editar">
                  <option value=""> </option>
                </select>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nombre Del Pedido:</label>
                <select class="form-control" name="" id="nombre_producto_editar">
                  <option value=""> </option>
                </select>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Cantidad Del Producto:</label>
                <input type="number" class="form-control" id="cantidad_pedido_editar">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Fecha De La Entrega:</label>
                <input type="date" class="form-control" id="fecha_pedido_editar">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Tipo de Pedido:</label>
                <select class="form-control" name="" id="tipo_pedido_editar">
                  <option value="urgente">urgente </option>
                  <option value="prioritario">prioritario</option>
                  <option value="esperar">puede esperar</option>
                </select>
                <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Monto Del Pedido:</label>
                <input type="text" class="form-control" id="monto_pedido_editar">
              </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="editar_datos" data-bs-dismiss="modal">Editar datos</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Tabla De Datos -->
    <div class="card mb-4">
      <div class="card-header">
        <div class="text-end">
          <i class="fas fa-table mr-1"></i>
          Listado de Pedidos
        </div>
        <div class="text-start">
          <a href="create.php" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i>
            Create
          </a>
        </div>

      </div>
      <div class="card-body">
      <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre del Usuario</th>
             
              <th>Nombre Cliente</th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Fecha de Pedido</th>
              <th>Tipo de Pedido</th>
              <th>Monto</th>
              <th>Categoria</th>
            </tr>
          </thead>
         
          <tbody id="tabla">

            <tr>
           
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>


<!--  --------------------------------- -->
<?php
include_once "../Layout/footer_Orders.php";
