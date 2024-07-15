<?php
include("../Conexion/conexionDB.php");
session_start();
date_default_timezone_set('America/Bogota');
$hoy = date("Y-m-d");
$hora=date('H:m:s');
$con=new Conexion();
$xE=$con->lista_Estudiantes($_SESSION["registroAsistencia_semestre"],$_SESSION["registroAsistencia_asignatura"]);
$nombreAsignatura=$con->nombre_Asignatura($_SESSION["registroAsistencia_asignatura"]);
if($_POST["marcarAsistencia"]){
    $id_estudiante=$_POST["idAsistencia"];
    $con->marcar_Asistencia($id_estudiante,$hoy,$_SESSION["registroAsistencia_periodo"],'Asistencia',$hora,$_SESSION["registroAsistencia_semestre"]);
    header("Location: ../Modulos/registroAsistencia.php");
}else if($_POST["marcarFalla"]){
    $id_estudiante=$_POST["idFalla"];
    $con->marcar_Asistencia($id_estudiante,$hoy,$_SESSION["registroAsistencia_periodo"],'Falla',$hora,$_SESSION["registroAsistencia_semestre"]);
    header("Location: ../Modulos/registroAsistencia.php");
}
if($_POST["cambiarAsistenciaFalla"]){
    $d1=$_POST["cambiarAsistenciaFalla"];
    $con->actualizar_Asistencia($d1,'Falla');
}else if($_POST["cambiarAsistenciaOK"]){
    $d2=$_POST["cambiarAsistenciaOK"];
    $con->actualizar_Asistencia($d2,'Asistencia');
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
                Módulo de registro de asistencia <?php echo $_SESSION["registroAsistencia_periodo"]?> :
                <?php echo $nombreAsignatura?>
                (<?php echo $_SESSION["registroAsistencia_semestre"]?>)
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($xE->num_rows > 0) {?>
                <?php $contador=1?>
                <?php while($row = $xE->fetch_assoc()){?>
                <tr>
                    <th scope="row"><?php echo $contador?></th>
                    <td><?php echo $row["nombre"]?></td>
                    <td><?php echo $hoy?></td>
                    <!--INICIO BOTONES DE OPCIONES-->
                    <?php $ea2=$row["Id"]?>
                    <?php $ea1=$con->verificar_Asistencia($ea2,$_SESSION["registroAsistencia_periodo"],$hoy)?>
                    <?php if($ea1==1){?>
                    <td>
                        <!--INICIO BOTÓN ASISTENCIA-->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModalAcAs<?php echo $row["Id"]?>">
                            Asistencia
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalAcAs<?php echo $row["Id"]?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row["nombre"]?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Desea actualiza la asistencia ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <form method="POST">
                                            <input type="hidden" id="cambiarAsistenciaFalla" name="cambiarAsistenciaFalla" value="<?php echo $row["Id"]?>">
                                            <button type="submit" class="btn btn-primary">Sí, confirmo</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN BOTÓN ASISTENCIA-->
                    </td>
                    <?php }else if($ea1==2){?>
                    <td>
                        <!--INICIO BOTÓN FALLA-->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModalAcFa<?php echo $row["Id"]?>">
                            Falla
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalAcFa<?php echo $row["Id"]?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row["nombre"]?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Desea actualiza la asistencia ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                            <form method="POST">
                                            <input type="hidden" id="cambiarAsistenciaOK" name="cambiarAsistenciaOK" value="<?php echo $row["Id"]?>">
                                            <button type="submit" class="btn btn-primary">Sí, confirmo</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN BOTÓN FALLA-->
                    </td>
                    <?php }else{?>
                    <td>
                        <!--INICIO ASISTENCIA-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#confirmarAsistencia<?php echo $row["Id"]?>">
                            A
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="confirmarAsistencia<?php echo $row["Id"]?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row["nombre"]?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Desea confirmar la <strong>ASISTENCIA</strong> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <form method="POST" action="../Modulos/registroAsistencia.php">
                                            <input type="hidden" id="marcarAsistencia" name="marcarAsistencia"
                                                value="Asistencia">
                                            <input type="hidden" id="idAsistencia" name="idAsistencia"
                                                value="<?php echo $row["Id"]?>">
                                            <button type="submit" class="btn btn-primary">Sí, confirmo</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN ASISTENCIA-->
                        <!--INICIO FALLA-->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#confirmarFalla<?php echo $row["Id"]?>">
                            F
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="confirmarFalla<?php echo $row["Id"]?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row["nombre"]?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Desea confirmar la <strong>FALLA</strong> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <form method="POST" action="../Modulos/registroAsistencia.php">
                                            <input type="hidden" id="marcarFalla" name="marcarFalla" value="Falla">
                                            <input type="hidden" id="idFalla" name="idFalla"
                                                value="<?php echo $row["Id"]?>">
                                            <button type="submit" class="btn btn-primary">Sí, confirmo</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN FALLA-->
                    </td>
                    <?php }?>

                    <!--FIN BOTONES DE OPCIONES-->
                </tr>
                <?php $contador+=1?>
                <?php }?>
                <?php }else{?>
                <tr>
                    <td colspan="4"><strong>No existen registro disponibles ...</strong></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>





</body>

</html>