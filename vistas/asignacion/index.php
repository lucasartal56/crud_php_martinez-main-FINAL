<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require '../../modelos/Programador.php';
require '../../modelos/Aplicacion.php';
include_once '../../vistas/templates/header.php';


$progra = new Programador();
$programadores = $progra->buscar();

$app = new Aplicacion();
$aplicaciones = $app->buscar();

?>
<h1 class="text-center">FORMULARIO DE ASIGNACIONES</h1>
<div class="row justify-content-center">
    <form action="../../controladores/asignacion/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row">
            <div class="col">
                <label for="asig_pro_id">PROGRAMADORES</label>
                <select name="asig_pro_id" id="asig_pro_id" class="form-control">
                    <option value="#">SELECCIONE...</option>
                    <?php foreach ($programadores as $programador) : ?>
                        <option class="bg-secondary" value=" <?= $programador['pro_id'] ?>"> <?= $programador['pro_nombre'] . " " . $programador['pro_apellido']  ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="asig_ap_id">APLICACIONES</label>
                <select name="asig_ap_id" id="asig_ap_id" class="form-control">
                    <option value="#">SELECCIONE...</option>
                    <?php foreach ($aplicaciones as $aplicacion) : ?>
                        <option class="bg-secondary" value=" <?= $aplicacion['ap_id'] ?>"> <?= $aplicacion['ap_nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-info w-100 bg-success text-white">ASIGNAR</button>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="../../controladores/asignacion/buscar.php" class="btn btn-primary w-100">MOSTRAR ASIGNACIONES</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>