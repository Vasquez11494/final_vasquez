<?php
require_once '../../modelos/Alumno.php';
require_once '../../modelos/Arma.php';
require_once '../../modelos/Grado.php';

include_once '../templates/header.php';
$_GET['alu_id'] = filter_var(base64_decode($_GET['alu_id']), FILTER_SANITIZE_NUMBER_INT);

$modificar = new Alumno();
$Alumno = $modificar->buscarId($_GET['alu_id']);

$buscarArmas = new Arma();
$armas = $buscarArmas->mostrarArmas();
$buscargrado = new Grado();
$grados = $buscargrado->mostrarGrados();

//  var_dump($Alumno);
?>

<h1 class="text-center mt-3">Alumno a Modificar</h1>
<div class="row justify-content-center mt-3">
    <form action="../../controladores/alumnos/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="alu_id" id="alu_id" value="<?= $Alumno['alu_id'] ?>" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="alu_nombre">Nombre del Alumno</label>
                <input type="text" name="alu_nombre" id="alu_nombre" value="<?= $Alumno['alu_nombre'] ?>" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="alu_apellido">Apellidos del Alumno</label>
                <input type="text" name="alu_apellido" id="alu_apellido" value="<?= $Alumno['alu_apellido'] ?>" class="form-control" required>
            </div>
        </div>
        <div class="col">
            <label for="alu_grado">Grado del Alumno</label>
            <select name="alu_grado" id="alu_grado" class="form-control" required>
                <option value="">SELECCIONE...</option>
                <?php foreach ($grados as $grado) : ?>
                    <option value="<?= $grado['grad_id'] ?>" <?= ($grado['grad_id'] == $Alumno['alu_grado']) ? 'selected' : '' ?>> <?= $grado['grad_nombre'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col mb-3">
            <label for="alu_arma">Arma del Alumno</label>
            <select name="alu_arma" id="alu_arma" class="form-control" required>
                <option value="">SELECCIONE...</option>
                <?php foreach ($armas as $arma) : ?>
                    <option value="<?= $arma['arm_id'] ?>" <?= ($arma['arm_id'] == $Alumno['alu_arma']) ? 'selected' : '' ?>> <?= $arma['arm_nombre'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="alu_nacionalidad">Nacionalidad del Alumno</label>
                <input type="text" name="alu_nacionalidad" id="alu_nacionalidad" class="form-control" value="<?= $Alumno['alu_nacionalidad'] ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-info w-100">MODIFICAR</button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <a href="../../controladores/alumnos/buscar.php" class="btn btn-danger w-100">CANCELAR</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>