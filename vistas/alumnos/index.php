<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

include_once '../templates/header.php';
require '../../modelos/Arma.php';
require '../../modelos/Grado.php';

$buscarArmas = new Arma();
$armas = $buscarArmas->mostrarArmas();
$buscargrado = new Grado();
$grados = $buscargrado->mostrarGrados();


?>
<h1 class="text-center mt-3">Formulario para agregar Alumnos</h1>
<div class="row justify-content-center mt-3">
    <form action="../../controladores/alumnos/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="alu_nombre">Nombre del Alumno</label>
                <input type="text" name="alu_nombre" id="alu_nombre" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="alu_apellido">Apellidos del Alumno</label>
                <input type="text" name="alu_apellido" id="alu_apellido" class="form-control" required>
            </div>
        </div>
        <div class="col">
            <label for="alu_grado">Grado del Alumno</label>
            <select name="alu_grado" id="alu_grado" class="form-control" required>
                <option value="">SELECCIONE...</option>
                <?php foreach ($grados as $grado) : ?>
                    <option value="<?= $grado['grad_id'] ?>"> <?= $grado['grad_nombre'] . ""  ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col mb-3">
            <label for="alu_arma">Arma del Alumno</label>
            <select name="alu_arma" id="alu_arma" class="form-control" required>
                <option value="">SELECCIONE...</option>
                <?php foreach ($armas as $arma) : ?>
                    <option value="<?= $arma['arm_id'] ?>"> <?= $arma['arm_nombre'] . ""  ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="alu_nacionalidad">Nacionalidad del Alumno</label>
                <input type="text" name="alu_nacionalidad" id="alu_nacionalidad" class="form-control" placeholder="Ej. Guatemalteco" required >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100">AGREGAR</button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <a href="/final_vasquez/controladores/alumnos/buscar.php" class="btn btn-info w-100">VER ALUMNOS INGRESADOS</a>
            </div>
        </div>
    </form>
</div>


<?php include '../templates/footer.php'; ?>