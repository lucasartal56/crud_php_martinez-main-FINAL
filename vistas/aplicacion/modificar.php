<?php

require '../../modelos/Aplicacion.php';

$_GET['ap_id'] = filter_var(base64_decode($_GET['ap_id']), FILTER_SANITIZE_NUMBER_INT);


$aplicacion = new Aplicacion();

$AplicacionRegistrado = $aplicacion->buscarId($_GET['ap_id']);
// var_dump($AplicacionRegistrado);
// exit;


include_once '../../vistas/templates/header.php'; ?>
<h1 class="text-center">MODIFICAR APLICACIONES</h1>
<div class="row justify-content-center">
    <form action="../../controladores/aplicacion/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="ap_id" id="ap_id" class="form-control" required value="<?= $AplicacionRegistrado['ap_id'] ?>">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col">
                <label for="ap_nombre">NOMBRE</label>
                <input type="text" name="ap_nombre" id="ap_nombre" class="form-control" required value="<?= $AplicacionRegistrado['ap_nombre'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="ap_descripcion">Descripcion</label>
                <input type="text" name="ap_descripcion" id="ap_descripcion" class="form-control" required value="<?= $AplicacionRegistrado['ap_descripcion'] ?>">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-warning w-100">Modificar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/aplicacion/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>