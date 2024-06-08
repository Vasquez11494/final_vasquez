<?php

require '../../modelos/Materia.php';
$_GET['materia_id'] = filter_var(base64_decode($_GET['materia_id']), FILTER_SANITIZE_NUMBER_INT);


$MateriaModificar = new Materia();

$MateriaModificada = $MateriaModificar->BuscarID($_GET['materia_id']);

include_once '../templates/header.php'; ?>

<h1 class="text-center mt-3">Modificar Materia </h1>
<div class="row justify-content-center mt-3">
    <form action="../../controladores/materias/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="materia_id" id="materia_id" value="<?= $MateriaModificada['materia_id'] ?>" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="materia_nombre">Nombre de la materia</label>
                <input type="text" name="materia_nombre" id="materia_nombre" value="<?= $MateriaModificada['materia_nombre'] ?>" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-info w-100">MODIFICAR</button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <a href="../../controladores/materias/buscar.php" class="btn btn-danger w-100">CANCELAR</a>
            </div>
        </div>
    </form>
</div>


<?php include '../templates/footer.php'; ?>