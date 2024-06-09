<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);



if (!isset($_POST['alu_id'])  ||  count($_POST['notas']) < 0) {


    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];

} else {
    try {

        $_POST['alu_id'] = filter_var($_POST['alu_id'], FILTER_VALIDATE_INT);

        $_POST['notas'] =array_filter($_POST['notas']);
        
        
        $resultado = [
            'mensaje' => 'NOTAS INGRESADAS CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR INGRESANDO LAS NOTAS EN LA BASE DE DATOS',
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
}
$alertas = ['danger', 'success', 'warning'];

include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center mt-3">
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/alumnos/index.php" class="btn btn-primary w-100">Regresar</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>