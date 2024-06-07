<?php

include_once '../templates/header.php'; ?>

<h1 class="text-center mt-3">Formulario para agregar Alumnos</h1>
<div class="row justify-content-center mt-3">
    <form action="" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="alu_nombre">Nombre del Cliente</label>
                <input type="text" name="alu_nombre" id="alu_nombre" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="alu_apellido">Apellidos del Cliente</label>
                <input type="text" name="alu_apellido" id="alu_apellido" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nit">Grado</label>
                <input type="number" name="cli_nit" id="cli_nit" min="0" step="0.01" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nit">Arma</label>
                <input type="number" name="cli_nit" id="cli_nit" min="0" step="0.01" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-info w-100">Guardar</button>
            </div>
        </div>
    </form>
</div>


<?php include '../templates/footer.php'; ?>