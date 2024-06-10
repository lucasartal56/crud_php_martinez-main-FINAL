<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    require_once '../../modelos/Asignacion.php';

    // consulta
    try {
      
        $_GET['asig_pro_id'] = htmlspecialchars( $_GET['asig_pro_id']);
        $_GET['asig_ap_id'] = htmlspecialchars( $_GET['asig_ap_id']);
        //   var_dump($_GET);
        //   exit;
    
        $objAsignacion = new Asignacion ($_GET);
        $asignaciones = $objAsignacion->MostrarAsignacion();
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $asignaciones,
            'codigo' => 1
        ];

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
            <a href="../../vistas/asignacion/buscar.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
        </div>
    </div>
    <h1 class="text-center">Listado de Asignaciones</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Programador</th>
                        <th>Asignacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($asignaciones) > 0) : ?>
                        <?php foreach ($asignaciones as $key => $asignacion) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $asignacion['nombre_completo'] ?></td>
                                <td><?= $asignacion['ap_nombre'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../../vistas/asignacion/modificar.php?asig_id=<?= base64_encode($asignacion['asig_id'])?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/asignacion/eliminar.php?asig_id=<?= base64_encode($asignacion['asig_id'])?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No hay asignaciones registrados</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        
<?php include_once '../../vistas/templates/footer.php'; ?>  