<?php
include_once "../Layout/header.php";
//---------------------------------------------
?>

<main>
    <div class="container-fluid px-4">

        <!-- Grafica Principal -->
        <div class="container-fluid p-3">
            <div class="card">
                <div class="card-header">
                    <h1>Crear Nuevo Cliente</h1>
                </div>
                <div class="card-body">

                    <form>
                        <div class="row g-3">
                            <div class="col-auto">
                                <input type="text" readonly class="form-control-plaintext" id="labeldniCliente" value="DNI del cliente">
                            </div>
                            <div class="col-auto">
                                <label for="inputPassword2" class="visually-hidden">DNI</label>
                                <input type="text" class="form-control" placeholder="DNI" id="dniCliente">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3" id="buscarDni">
                                    Buscar <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre Del Cliente</label>
                                <input type="text" class="form-control" id="nombre_cliente">
                            </div>
                            <div class="col-md-6">
                                <label for="apellido" class="form-label">Apellidos Del Cliente</label>
                                <input type="text" class="form-control" id="apellido_cliente">
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email_cliente" >
                            </div>
                            <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="btn_nuevo_cliente">Ingresar Nuevo Producto</button>
                            <button type="reset"class="btn btn-secondary">Limpiar Campos</button>
                            </div>
                        </div>


                       
                    </form>
                </div>
                <div class="card-footer text-end">
<a href="index.php" class="btn btn-danger">Regresar</a>
                </div>
            </div>

        </div>
        <!-- Tabla De Datos -->

    </div>
</main>




<!--  --------------------------------- -->
<?php
include_once "../Layout/footer_Customers.php";
