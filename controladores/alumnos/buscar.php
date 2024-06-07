<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require '../../modelos/Alumno.php';


try {
    $_POST['alu_nombre'] = htmlspecialchars($_POST['alu_nombre']);
    $_POST['alu_apellido'] = htmlspecialchars($_POST['alu_apellido']);
    $_POST['alu_grado'] = filter_var($_POST['alu_grado'], FILTER_VALIDATE_INT);
    $_POST['alu_arma'] = filter_var($_POST['alu_arma'], FILTER_VALIDATE_INT);
    $_POST['alu_nacionalidad'] = htmlspecialchars($_POST['alu_nacionalidad']);
    
    
    $buscarAlumno = new Alumno($_POST);
    $buscar = $buscarAlumno->buscar();
    // var_dump($buscar);
    $resultado = [
        'mensaje' => 'ALUMNOS ENCONTRADOS',
        'codigo' => 1
    ];

} catch (PDOException $pe) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR BUSCANDO EN LA BASE DE DATOS',
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
        <a href="../../vistas/alumnos/buscar.php" class="btn btn-primary w-100">Regresar</a>
    </div>
</div>

<h1 class="text-center ">Alumnos Ingresados </h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead> 
                    <tr>
                        <th>No.</th>
                        <th>Nombre Completo</th>
                        <th>Grado</th>
                        <th>Arma</th>
                        <th>Nacionalidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 ) : ?>
                        <?php foreach ($buscar as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value['nombre_completo'] ?></td>
                                <td><?= $value['grad_nombre'] ?></td>
                                <td><?= $value['arm_nombre'] ?></td>
                                <td><?= $value['alu_nacionalidad'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle"  style=" background-color: rgba(23, 192, 204, 0.641)" ="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../../vistas/alumnos/modificar.php?alu_id=<?= base64_encode($value['alu_id'])?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href=""><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5">No hay productos registrados</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        

<?php include_once '../../vistas/templates/footer.php'; ?>  
