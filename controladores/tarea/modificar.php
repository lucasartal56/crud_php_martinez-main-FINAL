<?php
    //  ini_set('display_errors', '1');
    //  ini_set('display_startup_errors', '1');
    //  error_reporting(E_ALL);

require '../../modelos/Tarea.php';

// VALIDAR INFORMACION

$_POST['tarea_id'];
$_POST['tarea_nombre'] = htmlspecialchars($_POST['tarea_nombre']);
$_POST['tarea_ap_id'] = htmlspecialchars($_POST['tarea_ap_id']);
$_POST['tarea_fecha'] = htmlspecialchars($_POST['tarea_fecha']);
$_POST['tarea_estado'] = htmlspecialchars($_POST['tarea_estado']);

// var_dump($_POST);
// exit;


// var_dump($_POST);
// exit;

if ($_POST['tarea_nombre'] == '' || $_POST['tarea_ap_id'] == '' || $_POST['tarea_fecha'] == '' || $_POST['tarea_estado'] == '') {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $tarea = new Tarea($_POST);

        
        $modificar = $tarea->modificar();

        $resultado = [
            'mensaje' => 'TAREA MODIFICADA CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR MODIFICANDO EL REGISTRO A LA BD',
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
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../controladores/tarea/buscar.php" class="btn btn-primary w-100">Regresar</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>