<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require '../../modelos/Alumno.php';

$alumno = new Alumno();
$alumnos = $alumno->buscar();


include_once '../templates/header.php'; ?>
<h1 class="text-center mt-3">Seleccione al Alumno para ingresar sus notas</h1>
<div class="row justify-content-center mt-3">
    <form action="/final_vasquez/vistas/notas/ingresarNotas.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="col">
            <label for="alu_id">Seleccione al Alumno</label>
            <select name="alu_id" id="alu_id" class="form-control form-control-sm" required>
                <option value="">SELECCIONE...</option>
                <?php foreach ($alumnos as $alumno) : ?>
                    <option value="<?= $alumno['alu_id'] ?>"> <?= $alumno['nombre_completo'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="row justify-content-center mt-3">
            <button type="submit" class="btn btn-primary">Ingresar Notas</button>
        </div>
    </form>
</div>
<?php include '../templates/footer.php'; ?>