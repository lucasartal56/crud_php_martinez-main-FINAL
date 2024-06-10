<?php

require '../../modelos/Tarea.php';


// VALIDAR INFORMACION

$_POST['tarea_nombre'] = htmlspecialchars($_POST['tarea_nombre']);
$_POST['tarea_ap_id'] = htmlspecialchars($_POST['tarea_ap_id']);
$_POST['tarea_fecha'] = htmlspecialchars($_POST['tarea_fecha']);
$_POST['tarea_estado'] = htmlspecialchars($_POST['tarea_estado']);





if ($_POST['tarea_nombre'] == '' || $_POST['tarea_ap_id'] == '' || $_POST['tarea_fecha'] == '' || $_POST['tarea_estado'] == '') {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $tareas = new Tarea($_POST);
        $guardar = $tareas->guardar();
        $resultado = [
            'mensaje' => 'TAREA INSERTADA CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR INSERTANDO A LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }
}


$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= $resultado['detalle'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/tarea/index.php" class="btn btn-primary w-100">Volver al formulario</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>