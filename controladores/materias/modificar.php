<?php

require '../../modelos/Materia.php';

$_POST['materia_id'] = filter_var($_POST['materia_id'], FILTER_VALIDATE_INT);
$_POST['materia_nombre'] = htmlspecialchars($_POST['materia_nombre']);

if ($_POST['materia_id'] == '' || $_POST['materia_nombre'] == '') {

    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {

        $ModificarMateria = new Materia($_POST);
        $Modificar = $ModificarMateria->modificar();
        $resultado = [
            'mensaje' => 'MATERIA MODIFICADO  SATISFACTORIAMENTE',
            'codigo' => 1
        ];

    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR MOFICIANDO LA MATERIA EN LA BD',
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
        <a href="../../controladores/materias/buscar.php" class="btn btn-primary w-100">Regresar</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>  