<?php

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require '../../modelos/Alumno.php';

$_POST['alu_id'] = filter_var($_POST['alu_id'], FILTER_VALIDATE_INT);
$_POST['alu_nombre'] = htmlspecialchars($_POST['alu_nombre']);
$_POST['alu_apellido'] = htmlspecialchars($_POST['alu_apellido']);
$_POST['alu_grado'] = filter_var($_POST['alu_grado'], FILTER_VALIDATE_INT);
$_POST['alu_arma'] = filter_var($_POST['alu_arma'], FILTER_VALIDATE_INT);
$_POST['alu_nacionalidad'] = htmlspecialchars($_POST['alu_nacionalidad']);


if ($_POST['alu_nombre'] == '' || $_POST['alu_apellido'] == '' || $_POST['alu_nacionalidad'] == '' || $_POST['alu_grado'] < 0 || $_POST['alu_arma'] < 0) {

    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {

        $AlumnoModificar = new Alumno($_POST);
        $Modificar = $AlumnoModificar->modificar();
        $resultado = [
            'mensaje' => 'ALUMNO MODIFICADO  SATISFACTORIAMENTE',
            'codigo' => 1
        ];

    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR MOFICIANDO EL ALUMNO  EN LA BD',
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
    <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../controladores/alumnos/buscar.php" class="btn btn-primary w-100">Regresar</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>  