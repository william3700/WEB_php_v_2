<?php
include("../Conexion/conexionDB.php");
$con=new Conexion();
$listaAsignaturas=$con->lista_asignaturas();
$listaAsignaturas1=$con->lista_asignaturas();
$listaAsignaturas2=$con->lista_asignaturas();
$listaAsignaturas3=$con->lista_asignaturas();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Sistema de Gestión Académica</title>
</head>

<body>
    <!--INICIO ENCABEZADO-->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema de gestión</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Conversiones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gastos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--FIN ENCABEZADO-->
    <br />
    <div class="container">
        <div class="card text-white bg-dark mb-3">
            <div class="card-body">
                <strong>Módulo de administración</strong>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card border-dark">
                    <div class="card-body">
                        <h5 class="card-title">Registrar estudiantes</h5>
                        <p class="card-text">Módulo que permite registrar a los estudiantes en las asignaturas y
                            semestres respectivos.</p>
                        <!--INICIO MODAL REGISTRO ESTUDIANTES-->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#registroEstudiantes">
                            Enviar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="registroEstudiantes" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="../Modulos/validacionEstudiantes.php">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Módulo de registro de
                                                estudiantes
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!--INICIO-->
                                            <label for="datosNotas_1"
                                                class="form-label"><strong>Semestre</strong></label>
                                            <select class="form-select" id="registroEstudiante_semestre"
                                                name="registroEstudiante_semestre" aria-label="Default select example">
                                                <option selected>Abrir este menú de selección</option>
                                                <option value="2024-I">2024-I</option>
                                                <option value="2024-II">2024-II</option>
                                                <option value="2025-I">2025-I</option>
                                                <option value="2025-II">2025-II</option>
                                                <option value="2026-I">2026-I</option>
                                                <option value="2026-II">2026-II</option>
                                                <option value="2027-I">2027-I</option>
                                                <option value="2027-II">2027-II</option>
                                                <option value="2028-I">2028-I</option>
                                                <option value="2028-II">2028-II</option>
                                                <option value="2029-I">2029-I</option>
                                                <option value="2029-II">2029-II</option>
                                                <option value="2030-I">2030-I</option>
                                                <option value="2030-II">2030-II</option>
                                            </select>
                                            <br />
                                            <label for="datosNotas_2"
                                                class="form-label"><strong>Asignatura</strong></label>
                                            <select class="form-select" id="registroEstudiante_asignatura"
                                                name="registroEstudiante_asignatura"
                                                aria-label="Default select example">
                                                <option selected>Abrir este menú de selección</option>
                                                <?php   while($row = $listaAsignaturas->fetch_assoc()) {?>
                                                <option value="<?php echo $row["Id"]?>"><?php echo $row["asignacion"]?>
                                                </option>
                                                <?php }?>
                                            </select>
                                            <!--FIN-->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--FIN MODAL REGISTRO ESTUDIANTES-->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-dark">
                    <div class="card-body">
                        <h5 class="card-title">Crear cursos</h5>
                        <p class="card-text">Módulo que permite crear nuevas asignaturas y/o grupos.</p>
                        <!--INICIO-->
                        <a class="btn btn-primary" href="../Modulos/crearCurso.php" role="button">Crear</a>
                        <!--FIN-->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-dark">
                    <div class="card-body">
                        <h5 class="card-title">Registro de Asistencia</h5>
                        <p class="card-text">Módulo para registrar la asistencia de los estudiantes durante el semestre
                            académico.</p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#registrarAsistencia">
                            Entrar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="registrarAsistencia" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" action="../Modulos/validacionAsistencia.php">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Registro de asistencia</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!--INICIO REGISTRO ASISTENCIA-->
                                            <label for="registroAsistencia_semestre"
                                                class="form-label"><strong>Semestre</strong></label>
                                            <select class="form-select" id="registroAsistencia_semestre"
                                                name="registroAsistencia_semestre" aria-label="Default select example">
                                                <option selected>Abrir este menú de selección</option>
                                                <option value="2024-I">2024-I</option>
                                                <option value="2024-II">2024-II</option>
                                                <option value="2025-I">2025-I</option>
                                                <option value="2025-II">2025-II</option>
                                                <option value="2026-I">2026-I</option>
                                                <option value="2026-II">2026-II</option>
                                                <option value="2027-I">2027-I</option>
                                                <option value="2027-II">2027-II</option>
                                                <option value="2028-I">2028-I</option>
                                                <option value="2028-II">2028-II</option>
                                                <option value="2029-I">2029-I</option>
                                                <option value="2029-II">2029-II</option>
                                                <option value="2030-I">2030-I</option>
                                                <option value="2030-II">2030-II</option>
                                            </select>
                                            <br />
                                            <label for="registroAsistencia_periodo" class="form-label"><strong>Periodo
                                                    académico</strong></label>
                                            <select class="form-select" id="registroAsistencia_periodo"
                                                name="registroAsistencia_periodo" aria-label="Default select example">
                                                <option selected>Abrir este menú de selección</option>
                                                <option value="Primer Tercio">Primer Tercio</option>
                                                <option value="Segundo Tercio">Segundo Tercio</option>
                                                <option value="Tercer Tercio">Tercer Tercio</option>
                                            </select>
                                            <br />
                                            <label for="registroAsistencia_asignatura"
                                                class="form-label"><strong>Asignatura</strong></label>
                                            <select class="form-select" id="registroAsistencia_asignatura"
                                                name="registroAsistencia_asignatura"
                                                aria-label="Default select example">
                                                <option selected>Abrir este menú de selección</option>
                                                <?php   while($row = $listaAsignaturas2->fetch_assoc()) {?>
                                                <option value="<?php echo $row["Id"]?>"><?php echo $row["asignacion"]?>
                                                </option>
                                                <?php }?>
                                            </select>
                                            <!--FIN REGISTRO ASISTENCIAS-->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-dark">
                    <div class="card-body">
                        <h5 class="card-title">Registro de notas</h5>
                        <p class="card-text">Módulo que permite registrar las notas de los estudiantes, durante el
                            desarrollo del semestre académico.</p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#registroNotas">
                            Entrar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="registroNotas" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="../Modulos/validarNotas.php">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Módulo de selección</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!--INICIO -->
                                            <label for="datosNotas_1"
                                                class="form-label"><strong>Semestre</strong></label>
                                            <select class="form-select" id="datosNotas_1" name="datosNotas_1"
                                                aria-label="Default select example">
                                                <option selected>Abrir este menú de selección</option>
                                                <option value="2024-I">2024-I</option>
                                                <option value="2024-II">2024-II</option>
                                                <option value="2025-I">2025-I</option>
                                                <option value="2025-II">2025-II</option>
                                                <option value="2026-I">2026-I</option>
                                                <option value="2026-II">2026-II</option>
                                                <option value="2027-I">2027-I</option>
                                                <option value="2027-II">2027-II</option>
                                                <option value="2028-I">2028-I</option>
                                                <option value="2028-II">2028-II</option>
                                                <option value="2029-I">2029-I</option>
                                                <option value="2029-II">2029-II</option>
                                                <option value="2030-I">2030-I</option>
                                                <option value="2030-II">2030-II</option>
                                            </select>
                                            <br />
                                            <label for="datosNotas_2"
                                                class="form-label"><strong>Asignatura</strong></label>
                                            <select class="form-select" id="datosNotas_2" name="datosNotas_2"
                                                aria-label="Default select example">
                                                <option selected>Abrir este menú de selección</option>
                                                <?php   while($row = $listaAsignaturas1->fetch_assoc()) {?>
                                                <option value="<?php echo $row["Id"]?>"><?php echo $row["asignacion"]?>
                                                </option>
                                                <?php }?>
                                            </select>
                                            <!--FIN -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Entrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-dark">
                    <div class="card-body">
                        <h5 class="card-title">Reporte general</h5>
                        <p class="card-text">Este módulo permite conocer el estado general, de notas y asistencia, de
                            los estudiantes; pero no permite la edición.</p>
                        <!--INICIO-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Mostrar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" action="../Modulos/validacionReportes.php">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Módulo de selección</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!--INICIO -->
                                            <label for="enviarReporteSemestre"
                                                class="form-label"><strong>Semestre</strong></label>
                                            <select class="form-select" id="enviarReporteSemestre"
                                                name="enviarReporteSemestre" aria-label="Default select example">
                                                <option selected>Abrir este menú de selección</option>
                                                <option value="2024-I">2024-I</option>
                                                <option value="2024-II">2024-II</option>
                                                <option value="2025-I">2025-I</option>
                                                <option value="2025-II">2025-II</option>
                                                <option value="2026-I">2026-I</option>
                                                <option value="2026-II">2026-II</option>
                                                <option value="2027-I">2027-I</option>
                                                <option value="2027-II">2027-II</option>
                                                <option value="2028-I">2028-I</option>
                                                <option value="2028-II">2028-II</option>
                                                <option value="2029-I">2029-I</option>
                                                <option value="2029-II">2029-II</option>
                                                <option value="2030-I">2030-I</option>
                                                <option value="2030-II">2030-II</option>
                                            </select>
                                            <br />
                                            <label for="datosNotas_1"
                                                class="form-label"><strong>Asignatura</strong></label>
                                            <select class="form-select" id="enviarReporteAsigantura" name="enviarReporteAsigantura"
                                                aria-label="Default select example">
                                                <option selected>Abrir este menú de selección</option>
                                                <?php   while($row = $listaAsignaturas3->fetch_assoc()) {?>
                                                <option value="<?php echo $row["Id"]?>"><?php echo $row["asignacion"]?>
                                                </option>
                                                <?php }?>
                                            </select>
                                            <br />
                                            <label for="enviarReporteTipo" class="form-label"><strong>Tipo de
                                                    reporte</strong></label>
                                            <select class="form-select" id="enviarReporteTipo" name="enviarReporteTipo" aria-label="Default select example">
                                                <option selected>Abrir este menú de selección</option>
                                                <option value="Notas">Notas</option>
                                                <option value="Asistencia">Asistencia</option>
                                            </select>
                                            <!--FIN -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Ver</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--FIN-->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-dark">
                    <div class="card-body">
                        <h5 class="card-title">Notificaciones</h5>
                        <p class="card-text">En este módulo permite enviar correo de notificación a los estudiantes
                            sobre notas y asistencia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />


</body>

</html>