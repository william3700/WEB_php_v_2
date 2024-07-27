<?php
session_start();
if(!isset($_SESSION["claveUsuarioValidacion"]) && !isset($_SESSION["correoUsuarioValidacion"])){
    header("Location: ../index.php");
}else{

}
include("../Conexion/conexionDB.php");
date_default_timezone_set('America/Bogota');

$con=new Conexion();
$listaAsignaturas=$con->lista_asignaturas();
$registros_enviados=$con->registro_envio_correos_lista();
$mensaje1= "No hay registros disponibles ...";

if($_POST){
        $asignatura=$_POST["asignatura"];
        $periodo=$_POST["periodo"];
        $motivo=$_POST["motivo"];
        $etapa=$_POST["etapa"];
        $cursoR=$con->nombre_Asignatura($asignatura);
        $motivoR=$etapa."  ".$motivo;
        $fechaR=date("Y-m-d");
        $listaEstudiantes=$con->lista_Estudiantes($periodo,$asignatura);
        if(strcmp($motivo, "Asistencia") !== 0){
            //echo $con->nombre_Asignatura($asignatura)."  ".$periodo."   ".$motivo."   ".$etapa."<br/>";
            if ($listaEstudiantes->num_rows > 0) {
                while($row = $listaEstudiantes->fetch_assoc()) {
                    $fecha=date("Y-m-d");
                    $nota_estudiante=$con->reporteNotas($row["Id"],$etapa,$motivo,$periodo);
                    if($nota_estudiante){
                        //$con->enviar_Correo_Nota($row["correo"],$row["nombre"],$nota_estudiante);
                        //INICIO ENVIAR CORREO NOTAS



                        //FIN ENVIAR CORREO NOTAS
                    }else{
                        //$con->enviar_Correo_Nota($row["correo"],$row["nombre"],"No presentó");
                        //INICIO ENVIAR CORREO NOTAS



                        //FIN ENVIAR CORREO NOTAS
                    }
                }
                $con->registro_envio_correos($cursoR,$motivoR,$fechaR);     
                header("Location: ../Modulos/enviarMensajes.php"); 
            }
        }else{
            //echo $con->nombre_Asignatura($asignatura)."  ".$periodo."   ".$motivo."   ".$etapa."<br/>";
            if ($listaEstudiantes->num_rows > 0) {
                while($row = $listaEstudiantes->fetch_assoc()) {
                    $fecha=date("Y-m-d");
                    $estadoAsistencia=$con->reporte_Asistencia_x_estudiante_fecha($row["Id"],$etapa,$periodo,$fecha);  
                    $rowAsistencia = $estadoAsistencia->fetch_assoc();
                    if($rowAsistencia["estado"]){
                        //$con->enviar_Correo_Asistencia($row["correo"],$row["nombre"],$rowAsistencia["estado"]);
                        //INICIO ENVIAR CORREO NOTAS



                        //FIN ENVIAR CORREO NOTAS
                    }
                }
                $con->registro_envio_correos($cursoR,$motivoR,$fechaR);     
                header("Location: ../Modulos/enviarMensajes.php"); 
            }
        }  
  } else {
    $mensaje1= "No hay registros disponibles ...";
  }


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
    <title>Document</title>
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
                        <a class="nav-link" href="../Modulos/principal.php">Administrador</a>
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
                Módulo para enviar reportes por correo.
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="../Modulos/enviarMensajes.php" novalidate>
                    <div class="col-md-4">
                        <label for="asignatura" class="form-label">Selecciones el curso</label>
                        <select class="form-select" id="asignatura" name="asignatura"
                            aria-label="Default select example">
                            <option selected>Abrir este menú de selección</option>
                            <?php   while($row = $listaAsignaturas->fetch_assoc()) {?>
                            <option value="<?php echo $row["Id"]?>"><?php echo $row["asignacion"]?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="motivo" class="form-label">Seleccione el tipo de correo</label>
                        <select class="form-select" id="motivo" name="motivo" aria-label="Default select example">
                            <option selected>Abrir este menú de selección</option>
                            <option value="Asistencia">Asistencia</option>
                            <option value="Taller 1">Taller 1</option>
                            <option value="Taller 2">Taller 2</option>
                            <option value="Taller 3">Taller 3</option>
                            <option value="Taller opcional">Taller opcional</option>
                            <option value="Parcial">Parcial</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="periodo" class="form-label">Periodo</label>
                        <select class="form-select" id="periodo" name="periodo" aria-label="Default select example">
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
                    </div>
                    <div class="col-md-4">
                        <label for="etapa" class="form-label">Seleccione etapa</label>
                        <select class="form-select" id="etapa" name="etapa" aria-label="Default select example">
                            <option selected>Abrir este menú de selección</option>
                            <option value="Primer Tercio">Primer Tercio</option>
                            <option value="Segundo Tercio">Segundo Tercio</option>
                            <option value="Tercer Tercio">Tercer Tercio</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-success" type="submit">Enviar correos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br />
    <div class="container">
        <div class="card border-dark mb-3">
            <div class="card-body">
                <strong>Lista de correos enviado.</strong>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Motivo</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($registros_enviados->num_rows > 0) {?>
                <?php $contador=1?>
                <?php while($rowre = $registros_enviados->fetch_assoc()) {?>
                <tr>
                    <th scope="row"><?php echo $contador?></th>
                    <td><?php echo $rowre["curso"]?></td>
                    <td><?php echo $rowre["motivo"]?></td>
                    <td><?php echo $rowre["fecha"]?></td>
                </tr>
                <?php $contador+=1?>
                <?php }?>
                <?php }else{?>
                <tr>
                    <td colspan="5"><strong><?php echo $mensaje1?></strong></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>



</body>

</html>