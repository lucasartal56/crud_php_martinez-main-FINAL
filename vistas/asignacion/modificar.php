<?php
require_once '../../modelos/Asignacion.php';
require_once '../../modelos/Aplicacion.php';
require_once '../../modelos/Programador.php';

$_GET['asig_id'] = filter_var(base64_decode($_GET['asig_id']), FILTER_SANITIZE_NUMBER_INT);



$progra = new Programador();
$programadores = $progra->buscar();

$app = new Aplicacion();
$aplicaciones = $app->buscar();

$asignacion = new Asignacion();
$AsignacionRegistrado = $asignacion->buscarId($_GET['asig_id']);
// var_dump($AsignacionRegistrado);
// exit; 

// Verifica los datos recibidos

include_once '../../vistas/templates/header.php';
?>

<h1 class="text-center">Modificar Asignaciones</h1>
<div class="row justify-content-center">
    <form action="../../controladores/asignacion/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">

        <input type="hidden" name="asig_id" id="asig_id" value="<?= $AsignacionRegistrado['asig_id'] ?>">

        <div class="row">
            <div class="col">
                <label for="asig_pro_id">PROGRAMADORES</label>
                <select name="asig_pro_id" id="asig_pro_id" class="form-control">
                    <option value="#">SELECCIONE...</option>
                    <?php foreach ($programadores as $programador) : ?>
                        <?php $selected = ($programador['pro_id'] == $AsignacionRegistrado['asig_pro_id']) ? 'selected' : ''; ?>
                        <option class="bg-secondary" value="<?= $programador['pro_id'] ?>" <?= $selected ?>> <?= $programador['pro_nombre'] . " " . $programador['pro_apellido']  ?></option>
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
                        <?php $selected = ($aplicacion['ap_id'] == $AsignacionRegistrado['asig_ap_id']) ? 'selected' : ''; ?>
                        <option class="bg-secondary" value="<?= $aplicacion['ap_id'] ?>" <?= $selected ?>> <?= $aplicacion['ap_nombre'] ?></option>
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
