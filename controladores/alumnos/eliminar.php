<?php

require '../../modelos/Alumno.php';
$_GET['alu_id'] = filter_var(base64_decode($_GET['alu_id']), FILTER_SANITIZE_NUMBER_INT);


$AlumnoEliminar = new Alumno($_GET);


try {

    $Eliminar = $AlumnoEliminar->eliminar();

    $resultado = [
        'mensaje' => 'ALUMNOS ELMINADO EXITOSAMENTE',
        'codigo' => 1
    ];

} catch (PDOException $pe) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR ELIMINANDO EL ALUMNO EN LA BASE DE DATOS',
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
        <a href="../../controladores/alumnos/buscar.php" class="btn btn-primary w-100">Regresar</a>
    </div>
</div>
