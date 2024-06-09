<?php

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require '../../modelos/Nota.php';


if (!isset($_POST['alu_id'])  ||  count($_POST['notas']) < 0) {


    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];

} else {
    try {
        
        $nota_alu_id = filter_var($_POST['alu_id'], FILTER_VALIDATE_INT);
        $_POST['notas'] =array_filter($_POST['notas']);



        $notas = $_POST['notas'];

 
        foreach ($notas as $materia_id => $nota) {

            $materia_id = filter_var($materia_id, FILTER_VALIDATE_INT);
            if ($materia_id === false || $materia_id <= 0) {
                die("ID de materia no es válido para $materia_id");
            }

            $nota = filter_var($nota, FILTER_VALIDATE_FLOAT);
            if ($nota === false || $nota < 0 || $nota > 100) {
                die("Nota no es válida para materia $materia_id. Debe estar entre 0 y 100");
            }

            $GuardarNotas = new Notas([
                'nota_alu_id' => $nota_alu_id,
                'nota_materia_id' => $materia_id,
                'nota' => $nota
            ]);
    

            $Notaguardardada = $GuardarNotas->modificar();
        }
        

        $resultado = [
            'mensaje' => 'NOTAS MODIFICADA CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR MODIFICANDO NOTAS EN LA BASE DE DATOS',
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
        <a href="../../vistas/notas/index.php" class="btn btn-primary w-100">Regresar</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>