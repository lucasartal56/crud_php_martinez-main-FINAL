<?php
    //  ini_set('display_errors', '1');
    //  ini_set('display_startup_errors', '1');
    //  error_reporting(E_ALL);

require '../../modelos/Aplicacion.php';

// VALIDAR INFORMACION

$_POST['ap_id'] = filter_var($_POST['ap_id'], FILTER_VALIDATE_INT);
$_POST['ap_nombre'] = htmlspecialchars($_POST['ap_nombre']);
$_POST['ap_descripcion'] = htmlspecialchars($_POST['ap_descripcion']);

// var_dump($_POST);
// exit;


// var_dump($_POST);
// exit;

if ($_POST['ap_nombre'] == '' || $_POST['ap_descripcion'] == '') {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $aplicacion = new Aplicacion($_POST);

        433
        $modificar = $aplicacion->modificar();

        $resultado = [
            'mensaje' => 'APLICACION MODIFICADA CORRECTAMENTE',
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
        <a href="../../controladores/aplicacion/buscar.php" class="btn btn-primary w-100">Regresar</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>