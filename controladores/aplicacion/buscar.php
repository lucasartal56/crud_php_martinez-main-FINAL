<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    require '../../modelos/Aplicacion.php';

    // consulta
    try {
        // var_dump($_GET);
        $_GET['ap_nombre'] = htmlspecialchars( $_GET['ap_nombre']);
        $_GET['ap_descripcion'] = htmlspecialchars( $_GET['ap_descripcion']);
    
        $objAplicacion = new Aplicacion ($_GET);
        $aplicaciones = $objAplicacion->buscar();
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $aplicaciones,
            'codigo' => 1
        ];
        // var_dump($aplicaciones);
        
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }       


    $alertas = ['danger', 'success', 'warning'];

    
    include_once '../../vistas/templates/header.php'; ?>

    <div class="row mb-4 justify-content-center">
        <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
            <?= $resultado['mensaje'] ?>
        </div>
    </div>
    <div class="row mb-4 justify-content-center">
        <div class="col-lg-6">
            <a href="../../vistas/aplicacion/buscar.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
        </div>
    </div>
    <h1 class="text-center">Listado de Aplicaciones</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($aplicaciones) > 0) : ?>
                        <?php foreach ($aplicaciones as $key => $aplicacion) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $aplicacion['ap_nombre'] ?></td>
                                <td><?= $aplicacion['ap_descripcion'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../../vistas/aplicacion/modificar.php?ap_id=<?= base64_encode($aplicacion['ap_id'])?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/aplicacion/eliminar.php?ap_id=<?= base64_encode($aplicacion['ap_id'])?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No hay aplicaciones registrados</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        
<?php include_once '../../vistas/templates/footer.php'; ?>  