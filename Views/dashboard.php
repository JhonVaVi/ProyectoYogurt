<?php
include_once "Layout/header.php";
?>



<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard </h1>
    <h2>
      <strong id="mostrar_nombre_user"></strong>
    </h2>


    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Pedidos </li>
    </ol>
    <div class="row">
      <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
          <div class="card-body">Pedidos Completos <strong id="esperar">2</strong></div>
          <div class="card-footer d-flex align-items-center justify-content-between">
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
          <div class="card-body">Pedigos pendientes <strong id="prioritario">5</strong></div>
          <div class="card-footer d-flex align-items-center justify-content-between">
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
          <div class="card-body">Pedidos urgentes <strong id="urgente">0</strong> </div>
          <div class="card-footer d-flex align-items-center justify-content-between">

          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
          <div class="card-body">Pedidos Totales <strong id="total">0</strong></div>
          <div class="card-footer d-flex align-items-center justify-content-between">

          </div>
        </div>
      </div>
    </div>
    <!-- Grafica Principal -->
    <div class="row">
      <div class="col-xl-12">

        <div class="card mb-4">
          <div class="card-header">
          <i class="fas fa-chart-bar me-1"></i>
            Pie Chart Example
          </div>
          <div class="card-body">
          <canvas id="myChart" width="300" height="100"></canvas>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>

      </div>
    </div>
    <!-- Tabla De Datos -->
    <!-- <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Example
      </div>

    </div> -->
  </div>
</main>

<?php
include('Layout/footer_Dashboard.php');
?>