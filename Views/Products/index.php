<?php
include_once "../Layout/header.php";
//---------------------------------------------
?>
<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Products</h1>

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
              <input type="text" name="" id="id_producto_editar" hidden>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nombres Del Producto:</label>
                <input type="text" class="form-control" id="nombre_producto_editar">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Precio Del Producto:</label>
                <input type="text" class="form-control" id="precio_producto_editar">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Stock Del Producto:</label>
                <input type="text" class="form-control" id="stock_producto_editar">
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
          Listado de Productos
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
              <th>Nombre</th>
              <th>Precio</th>
              <th>Stock</th>
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
include_once "../Layout/footer_Products.php";
