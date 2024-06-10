<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    require_once '../../modelos/Tarea.php';


    // consulta
    try {
      
        $_GET['tarea_nombre'] = htmlspecialchars( $_GET['tarea_nombre']);
        //   var_dump($_GET);
        //   exit;
    
        $objTarea = new Tarea ($_GET);
        $tareas = $objTarea->MostrarTarea();

        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $tareas,
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
            <a href="../../vistas/tarea/buscar.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
        </div>
    </div>
    <h1 class="text-center">Listado de Asignaciones de Tareas</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre de Asignación</th>
                        <th>Aplicación</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($tareas) > 0) : ?>
                        <?php foreach ($tareas as $key => $tarea) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $tarea['tarea_nombre'] ?></td>
                                <td><?= $tarea['ap_nombre'] ?></td>
                                <td><?= $tarea['tarea_fecha'] ?></td>
                                <td><?= $tarea['tarea_estado'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../../vistas/tarea/modificar.php?tarea_id=<?= base64_encode($tarea['tarea_id'])?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/tarea/eliminar.php?tarea_id=<?= base64_encode($tarea['tarea_id'])?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No hay tareas registrados</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        
<?php include_once '../../vistas/templates/footer.php'; ?>  