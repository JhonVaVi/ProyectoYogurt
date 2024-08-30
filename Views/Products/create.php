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
                    <h1>Crear Nuevo Producto</h1>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre Del Producto</label>
                            <input type="text" class="form-control" id="nombre_producto" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Precio Del Producto</label>
                            <input type="text" class="form-control" id="precio_producto" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Stock Del Producto</label>
                            <input type="number" class="form-control" id="cantidad_producto" aria-describedby="emailHelp">

                        </div>
                        <button type="submit" class="btn btn-primary" id="btn_nuevo_Producto">Ingresar Nuevo Producto</button>
                        <button type="reset" class="btn btn-secondary">Limpiar Campos</button>
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
<?php
// ---------------------------------
include_once "../Layout/footer_Products.php";
