<?php
require_once '../../modelos/Asignacion.php';
require_once '../../modelos/Aplicacion.php';
require_once '../../modelos/Programador.php';
require_once '../../modelos/Tarea.php';

$_GET['tarea_id'] = filter_var(base64_decode($_GET['tarea_id']), FILTER_SANITIZE_NUMBER_INT);

$tarea_id = $_GET['tarea_id'];

$tareaModel = new Tarea();
$DatosEncontrados = $tareaModel->MostrarTareaEncontradas($tarea_id);

$app = new Aplicacion();
$aplicaciones = $app->buscar();

// Verifica los datos recibidos
if ($DatosEncontrados) {
    $tarea_nombre = $DatosEncontrados['tarea_nombre'];
    $tarea_ap_id = $DatosEncontrados['tarea_ap_id'];
    $tarea_fecha = $DatosEncontrados['tarea_fecha'];
    $tarea_estado = $DatosEncontrados['tarea_estado'];
} else {
    // Manejo de error si no se encuentran los datos
    $tarea_nombre = '';
    $tarea_ap_id = '';
    $tarea_fecha = '';
    $tarea_estado = '';
}

include_once '../../vistas/templates/header.php';
?>

<h1 class="text-center">Modificar Tarea</h1>
<div class="row justify-content-center">
    <form action="../../controladores/tarea/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <input type="hidden" name="tarea_id" id="tarea_id" value="<?= htmlspecialchars($tarea_id) ?>">
        
        <div class="row mb-3">
            <div class="col">
                <label for="tarea_nombre">Nombre de Tarea</label>
                <input type="text" name="tarea_nombre" id="tarea_nombre" class="form-control" value="<?= htmlspecialchars($tarea_nombre) ?>" required>
            </div>
        </div> 
        <div class="row">
            <div class="col">
                <label for="tarea_ap_id">Aplicaciones</label>
                <select name="tarea_ap_id" id="tarea_ap_id" class="form-control" required>
                    <option value="">Seleccione...</option>
                    <?php foreach ($aplicaciones as $aplicacion) : ?>
                        <option value="<?= htmlspecialchars($aplicacion['ap_id']) ?>" <?= $aplicacion['ap_id'] == $tarea_ap_id ? 'selected' : '' ?>><?= htmlspecialchars($aplicacion['ap_nombre']) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="tarea_fecha">Fecha de Realización</label>
                <input type="date" name="tarea_fecha" id="tarea_fecha" class="form-control" value="<?= htmlspecialchars($tarea_fecha) ?>" required>
            </div>
        </div> 
        <div class="row mb-3">
            <div class="col">
                <label for="tarea_estado">Estado de Tarea</label>
                <select name="tarea_estado" id="tarea_estado" class="form-control" required>
                    <option value="">Seleccione...</option>
                    <option value="Finalizada" <?= $tarea_estado == 'Finalizada' ? 'selected' : '' ?>>Finalizada</option>
                    <option value="No Iniciada" <?= $tarea_estado == 'No Iniciada' ? 'selected' : '' ?>>No Iniciada</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-info w-100 bg-success text-white">Modificar Tarea</button>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="../../controladores/tarea/buscar.php" class="btn btn-primary w-100">Mostrar Tareas</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>
