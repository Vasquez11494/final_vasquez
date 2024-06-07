<?php

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
require '../../modelos/Alumno.php';

$_POST['alu_nombre'] = htmlspecialchars($_POST['alu_nombre']);
$_POST['alu_apellido'] = htmlspecialchars($_POST['alu_apellido']);
$_POST['alu_grado'] = filter_var($_POST['alu_grado'], FILTER_VALIDATE_INT);
$_POST['alu_arma'] = filter_var($_POST['alu_arma'], FILTER_VALIDATE_INT);

if ($_POST['alu_nombre'] == '' || $_POST['alu_apellido'] == '' || $_POST['alu_grado'] < 0 || $_POST['alu_arma'] < 0) {

    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {

        $AlumnoNuevo = new Alumno($_POST);
        $guardar = $AlumnoNuevo;
        $resultado = [
            'mensaje' => 'CLINTE INGRESADO  CORRECTAMENTE',
            'codigo' => 1
        ];

    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR INSERTANDO A LA BD',
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