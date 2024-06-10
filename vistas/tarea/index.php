<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require '../../modelos/Aplicacion.php';
include_once '../../vistas/templates/header.php';

$app = new Aplicacion();
$aplicaciones = $app->buscar();

?>
<h1 class="text-center">FORMULARIO DE ASIGNACIONES</h1>
<div class="row justify-content-center">
    <form action="../../controladores/tarea/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="tarea_nombre">NOMBRE DE TAREA</label>
                <input type="text" name="tarea_nombre" id="tarea_nombre" class="form-control" >
            </div>
        </div> 
        <div class="row">
            <div class="col">
                <label for="tarea_ap_id">APLICACIONES</label>
                <select name="tarea_ap_id" id="tarea_ap_id" class="form-control">
                    <option value="#">SELECCIONE...</option>
                    <?php foreach ($aplicaciones as $aplicacion) : ?>
                        <option class="bg-secondary" value=" <?= $aplicacion['ap_id'] ?>"> <?= $aplicacion['ap_nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="tarea_fecha">FECHA DE REALIZACIÓN</label>
                <input type="date" name="tarea_fecha" id="tarea_fecha" class="form-control" >
            </div>
        </div> 
        <div class="row mb-3">
            <div class="col">
                    <label for="tarea_estado">ESTADO DE TAREA</label>
                    <br>
                    <select name="tarea_estado" id="tarea_estado">
                        <option>Seleccione...</option>
                        <option value="Finalizada">Finalizada</option>
                        <option value="No Iniciada">No Iniciada</option>
                    </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-info w-100 bg-success text-white">ASIGNAR TAREA</button>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="../../controladores/tarea/buscar.php" class="btn btn-primary w-100">MOSTRAR ASIGNACIONES</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>