<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow" style="background-color: rgba(1, 1, 1, 0.896); box-shadow: 15px 2px 10px;" id="nav_top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../../src/images/logo.png" alt="Logo" style="width: 40px; height: 40px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav justify-content-center text-center mx-auto">
                <li class="nav-item px-4">
                    <a class="nav-link active" aria-current="page" href="/final_vasquez/vistas/inicio/index.php"><i class="bi bi-house-fill me-2"></i>Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="alumnosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-square me-2"></i>Alumnos</a>
                    <ul class="dropdown-menu" aria-labelledby="alumnosDropdown">
                        <li><a class="dropdown-item" href="/final_vasquez/vistas/alumnos/index.php"><i class="bi bi-person-plus me-2"></i>Crear Alumnos</a></li>
                        <li><a class="dropdown-item" href="/final_vasquez/vistas/alumnos/buscar.php"><i class="bi bi-eye-fill me-2"></i>Buscar Alumnos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="productosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-clipboard2-pulse-fill me-2"></i>Materias</a>
                    <ul class="dropdown-menu" aria-labelledby="productosDropdown">
                        <li><a class="dropdown-item" href="/final_vasquez/vistas/materias/index.php"><i class="bi bi-book me-2"></i>Crear Materias</a></li>
                        <li><a class="dropdown-item" href="/final_vasquez/controladores/materias/buscar.php"><i class="bi bi-eye-fill me-2"></i>Ver Materias</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="historiaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-clipboard-check-fill me-2"></i>Califcaciones</a>
                    <ul class="dropdown-menu" aria-labelledby="historiaDropdown">
                        <li><a class="dropdown-item" href="/final_vasquez/vistas/notas/index.php"><i class="bi bi-file-earmark-arrow-up me-2"></i>Ingresar Calificaciones</a></li>
                        <li><a class="dropdown-item" href="/final_vasquez/vistas/notas/index.php"><i class="bi bi-pencil me-2"></i>Modificar Calificaciones</a></li>
                        <li><a class="dropdown-item" href="/final_vasquez/vistas/notas/buscarAlumno.php"><i class="bi bi-eye-fill me-2"></i>Ver Tarjeta de Calificaciones</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="navbar-text">
            <b>Escuela de Informatica</b>
        </div>
    </div>
</nav>
