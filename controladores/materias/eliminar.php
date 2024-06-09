<?php

require '../../modelos/Materia.php';

$_GET['materia_id'] = filter_var(base64_decode($_GET['materia_id']), FILTER_SANITIZE_NUMBER_INT);

$EliminarMateria = new Materia($_GET);

try {

    $Eliminar = $EliminarMateria->eliminar();

    $resultado = [
        'mensaje' => 'MATERIA ELMINADO EXITOSAMENTE',
        'codigo' => 1
    ];

} catch (PDOException $pe) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR ELIMINANDO LA MATERIA EN LA BASE DE DATOS',
        'detalle' => $pe->getMessage(),
        'codigo' => 0
    ];
} catch (Exception $e) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
        'detalle' => $e->getMessage(),
        'codigo' => 0
    ];
}

$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center mt-3">
    <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../controladores/materias/buscar.php" class="btn btn-primary w-100">Regresar</a>
    </div>
</div>
