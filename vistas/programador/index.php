<?php 

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">FORMULARIO DE PROGRAMADORES</h1>
<div class="row justify-content-center">
    <form action="../../controladores/programador/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                    <label for="pro_grado">GRADO</label>
                    <br>
                    <select name="pro_grado" id="pro_grado">
                        <option>Seleccione su Grado</option>
                        <option value="Subteniente">Subteniente</option>
                        <option value="Teniente">Teniente</option>
                        <option value="Alferes de Fragata">Alferes de Fragata</option>
                        <option value="Alferes de Navio">Alferes de Navio</option>
                    </select>
            </div>
        </div>
        <div class="row mb-3">
        <div class="col">
                <label for="pro_arma">ARMA</label>
                <br>
                <select name="pro_arma" id="pro_arma">
                    <option>Seleccione su Arma</option>
                    <option value="Infantería">Infantería</option>
                    <option value="Artillería">Artillería</option>
                    <option value="Caballería">Caballería</option>
                    <option value="Aviación">Aviación</option>
                </select>
        </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pro_nombre">NOMBRE</label>
                <input type="text" name="pro_nombre" id="pro_nombre" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pro_apellido">APELLIDO</label>
                <input type="text" name="pro_apellido" id="pro_apellido" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pro_catalogo">CATALOGO</label>
                <input type="number" name="pro_catalogo" id="pro_catalogo" class="form-control" >
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-info w-100 bg-success text-white"> GUARDAR</button>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="../../controladores/programador/buscar.php" class="btn btn-primary w-100">MOSTRAR PROGRAMADORES</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>