<?php 

include_once '../../vistas/templates/header.php';

require_once '../../modelos/Aplicacion.php';

$app = new Aplicacion();
$aplicaciones = $app->buscar();


?>



<h1 class="text-center">FORMULARIO DE ASIGNACIÓN DE TAREAS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/tarea/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
         <div class="row mb-3">
            <div class="col">
                <label for="tarea_nombre">NOMBRE DE TAREA</label>
                <input type="text" name="tarea_nombre" id="tarea_nombre" class="form-control" >
            </div>
        </div>        
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-info w-100 bg-success text-white">BUSCAR</button>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>

   