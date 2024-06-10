<?php 

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">FORMULARIO DE APLICACIONES</h1>
<div class="row justify-content-center">
    <form action="../../controladores/aplicacion/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="ap_nombre">NOMBRE</label>
                <input type="text" name="ap_nombre" id="ap_nombre" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="ap_descripcion">DESCRIPCION</label>
                <input type="text" name="ap_descripcion" id="ap_descripcion" class="form-control" >
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-info w-100 bg-success text-white"> GUARDAR</button>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="../../controladores/aplicacion/buscar.php" class="btn btn-primary w-100">MOSTRAR APLICACIONES</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>