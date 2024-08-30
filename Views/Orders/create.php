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
                            <label for="" class="form-label">Usuario</label>
                            <input type="email" class="form-control" name="usuario" id="nombre_usuario"  disabled aria-describedby="emailHelpId" placeholder="user">

                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Nombre del Cliente</label>
                                <select class="form-control" name="" id="nombre_cliente">
                                    <option value=""> </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Nombre del Producto</label>
                                <select class="form-control" name="" id="nombre_producto" >
                                    <option  onclick="preciop(dd)" value=""> </option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Cantidad Del Producto</label>
                            <input type="number" class="form-control" id="cantidad_producto" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Fecha Del Pedido</label>
                            <input type="date" class="form-control" id="tiempo_pedido" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Tipo de Pedido</label>
                                <select class="form-control"  name="" id="tipo_pedido">
                                    <option value="urgente">urgente </option>
                                    <option value="prioritario">prioritario</option>
                                    <option value="esperar">puede esperar</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Monto final</label>
                            
                            <input type="text"  class="form-control" id="monto_final" aria-describedby="emailHelp">

                        </div>
                        <button type="submit" class="btn btn-primary" id="btn_nuevo_Pedido">Ingresar Nuevo Pedido</button>
                        <button type="reset"class="btn btn-secondary">Limpiar Campos</button>
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
include_once "../Layout/footer_Orders.php";
