<?php

require '../../modelos/Programador.php';


// VALIDAR INFORMACION
$_POST['pro_grado'] = htmlspecialchars($_POST['pro_grado']);
$_POST['pro_arma'] = htmlspecialchars($_POST['pro_arma']);
$_POST['pro_nombre'] = htmlspecialchars($_POST['pro_nombre']);
$_POST['pro_apellido'] = htmlspecialchars($_POST['pro_apellido']);
$_POST['pro_catalogo'] ;


if ($_POST['pro_grado'] == '' || $_POST['pro_arma'] == '' || $_POST['pro_nombre'] == '' || $_POST['pro_apellido'] == '' || $_POST['pro_catalogo'] == '') {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $programadores = new Programador($_POST);
        $guardar = $programadores->guardar();
        $resultado = [
            'mensaje' => 'PROGRAMADOR INSERTADO CORRECTAMENTE',
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
        <a href="../../vistas/programador/index.php" class="btn btn-primary w-100">Volver al formulario</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>