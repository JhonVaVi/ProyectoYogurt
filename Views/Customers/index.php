<?php
session_start();
include_once "../Layout/header.php";

//---------------------------------------------
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard Clientes</h1>
       

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
            <input type="text" name="" id="id_cliente_editar" hidden>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombres Del Cliente:</label>
            <input type="text" class="form-control" id="nombre_cliente_editar">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Apellidos Del Cliente:</label>
            <input type="text" class="form-control" id="apellido_cliente_editar">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Correo Del Cliente:</label>
            <input type="text" class="form-control" id="correo_cliente_editar">
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
                    Listado de Clientes
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
                            <th>ID</th>
                            <th scope="col">DNI del Cliente</th>
                            <th>Nombre del Cliente</th>
                            <th>Apellidos del Cliente</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tabla">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>


<!--  --------------------------------- -->
<?php
include_once "../Layout/footer_Customers.php";
