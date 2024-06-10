<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    require '../../modelos/Programador.php';

    // consulta
    try {
        // var_dump($_GET);
        $_GET['pro_nombre'] = htmlspecialchars( $_GET['pro_nombre']);
        $_GET['pro_apellido'] = htmlspecialchars( $_GET['pro_apellido']);
    
        $objProgramador = new Programador ($_GET);
        $programadores = $objProgramador->buscar();
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $programadores,
            'codigo' => 1
        ];
        // var_dump($programadores);
        
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
            <a href="../../vistas/programador/buscar.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
        </div>
    </div>
    <h1 class="text-center">Listado de Programadores</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Grado</th>
                        <th>Arma</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Catalogo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($programadores) > 0) : ?>
                        <?php foreach ($programadores as $key => $programador) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $programador['pro_grado'] ?></td>
                                <td><?= $programador['pro_arma'] ?></td>
                                <td><?= $programador['pro_nombre'] ?></td>
                                <td><?= $programador['pro_apellido'] ?></td>
                                <td><?= $programador['pro_catalogo'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../../vistas/programador/modificar.php?pro_id=<?= base64_encode($programador['pro_id'])?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/programador/eliminar.php?pro_id=<?= base64_encode($programador['pro_id'])?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No hay programadores registrados</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        
<?php include_once '../../vistas/templates/footer.php'; ?>  