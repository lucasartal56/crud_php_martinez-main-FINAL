<?php

require '../../modelos/Programador.php';

$_GET['pro_id'] = filter_var(base64_decode($_GET['pro_id']), FILTER_SANITIZE_NUMBER_INT);
$programador = new Programador();

$ProgramadorRegistrado = $programador->buscarId($_GET['pro_id']);


include_once '../../vistas/templates/header.php'; ?>
<h1 class="text-center">MODIFICAR DE PROGRAMADOR</h1>
<div class="row justify-content-center">
    <form action="../../controladores/programador/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="pro_id" id="pro_id" class="form-control" required value="<?= $ProgramadorRegistrado['pro_id'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pro_grado">GRADO</label>
                <br>
                <select name="pro_grado" id="pro_grado" required>
                    <option value="">Seleccione su Grado</option>
                    <option value="Subteniente" <?= $ProgramadorRegistrado['pro_grado'] == 'Subteniente' ? 'selected' : '' ?>>Subteniente</option>
                    <option value="Teniente" <?= $ProgramadorRegistrado['pro_grado'] == 'Teniente' ? 'selected' : '' ?>>Teniente</option>
                    <option value="Alferes de Fragata" <?= $ProgramadorRegistrado['pro_grado'] == 'Alferes de Fragata' ? 'selected' : '' ?>>Alferes de Fragata</option>
                    <option value="Alferes de Navio" <?= $ProgramadorRegistrado['pro_grado'] == 'Alferes de Navio' ? 'selected' : '' ?>>Alferes de Navio</option>
                </select>
            </div>
        </div>
       

        <div class="row mb-3">
            <div class="col">
                <label for="pro_arma">ARMA</label>
                <br>
                <select name="pro_arma" id="pro_arma">
                    <option value="">Seleccione su Arma</option>
                    <option value="Infantería" <?= $ProgramadorRegistrado['pro_arma'] == 'Infantería' ? 'selected' : '' ?>>Infantería</option>
                    <option value="Artillería" <?= $ProgramadorRegistrado['pro_arma'] == 'Artillería' ? 'selected' : '' ?>>Artillería</option>
                    <option value="Caballería" <?= $ProgramadorRegistrado['pro_arma'] == 'Caballería' ? 'selected' : '' ?>>Caballería</option>
                    <option value="Aviación" <?= $ProgramadorRegistrado['pro_arma'] == 'Aviación' ? 'selected' : '' ?>>Aviación</option>
                </select>
            </div>
        </div>



        <div class="row mb-3">
            <div class="col">
                <label for="pro_nombre">NOMBRE</label>
                <input type="text" name="pro_nombre" id="pro_nombre" class="form-control" required value="<?= $ProgramadorRegistrado['pro_nombre'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pro_apellido">APELLIDO</label>
                <input type="text" name="pro_apellido" id="pro_apellido" class="form-control" required value="<?= $ProgramadorRegistrado['pro_apellido'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pro_catalogo">CATALOGO</label>
                <input type="number" name="pro_catalogo" id="pro_catalogo" class="form-control" required value="<?= $ProgramadorRegistrado['pro_catalogo'] ?>">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-warning w-100">Modificar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/programador/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>