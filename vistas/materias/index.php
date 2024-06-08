<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

include_once '../templates/header.php';?>

<h1 class="text-center mt-3">Formulario para agregar Materias</h1>
<div class="row justify-content-center mt-3">
    <form action="../../controladores/materias/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="materia_nombre">Nombre de la materia</label>
                <input type="text" name="materia_nombre" id="materia_nombre" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100">AGREGAR</button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <a href="/final_vasquez/controladores/materias/buscar.php" class="btn btn-info w-100">VER MATERIAS INGRESADAS</a>
            </div>
        </div>
    </form>
</div>


<?php include '../templates/footer.php'; ?>