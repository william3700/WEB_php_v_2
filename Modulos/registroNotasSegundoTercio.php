<?php
include("../Conexion/conexionDB.php");
session_start();
$semestre=$_SESSION["periodo"];
$asignatura=$_SESSION["asignatura"];
$etapa_semestre='Primer Tercio';
$con=new Conexion();
$xE=$con->lista_Estudiantes($_SESSION["periodo"],$_SESSION["asignatura"]);
if($_POST){
  $proceso=$_POST["proceso"];
  $actividad=$_POST["actividad"];
  $id_estudiante=$_POST["id_estudiante"];
  $nota=$_POST["nota"];
  $periodo=$_SESSION["periodo"];
  $tercio='Segundo Tercio';
  if(!empty($nota) && strcmp($actividad, "Abrir este menú de selección") !== 0 && strcmp($proceso, "Abrir este menú de selección") !== 0){
    if(strcmp($proceso,"Registrar")==0){
        $bandera=$con->verificar_Estudiante($id_estudiante,$tercio,$actividad,$periodo);
        if($nota<=50 && $nota>0 && $bandera==0){
            $con->registrar_Notas($id_estudiante,$tercio,$actividad,$nota,$periodo);
        }
    }else if(strcmp($proceso,"Actualizar")==0){
        if($nota<=50 && $nota>0){
            $con->actualizar_Notas($id_estudiante,$tercio,$actividad,$nota,$periodo);
        }
    }else{
        $con->borrar_Notas($id_estudiante,$tercio,$actividad,$periodo);
    }
  }else if(strcmp($actividad, "Abrir este menú de selección") !== 0 && strcmp($proceso, "Abrir este menú de selección") !== 0){
    if(strcmp($proceso,"Eliminar")==0){
        $con->borrar_Notas($id_estudiante,$tercio,$actividad,$periodo);
    }
  }

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
                Módulo de registro de notas : <?php echo $con->nombre_Asignatura($asignatura)?> ( <?php echo $semestre?> )
            </div>
        </div>

    </div>
    <div class="container">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="../Modulos/registroNotasPrimerTercio.php">Primer
                        Tercio</a></li>
                <li class="page-item active"><a class="page-link" href="../Modulos/registroNotasSegundoTercio.php">Segundo
                        Tercio</a></li>
                <li class="page-item"><a class="page-link" href="../Modulos/registroNotasTercerTercio.php">Tercer
                        Tercio</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col" style="width:50px;text-align: center">Taller 1</th>
                    <th scope="col" style="width:50px;text-align: center">Taller 2</th>
                    <th scope="col" style="width:50px;text-align: center">Taller opcional</th>
                    <th scope="col" style="width:50px;text-align: center">Talleres (40%)</th>
                    <th scope="col" style="width:50px;text-align: center">Desempeño (10%)</th>
                    <th scope="col" style="width:50px;text-align: center">Parcial (50%)</th>
                    <th scope="col" style="width:50px;text-align: center">Defintiva (100%)</th>
                    <th scope="col" style="width:50px;text-align: center">Opción</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($xE->num_rows > 0) {?>
                <?php while($fE = $xE->fetch_assoc()) { ?>
                <tr>
                    <th scope="row"><?php echo $fE["Id"]?></th>
                    <td><?php echo $fE["nombre"]?></td>
                    <?php $T1=$con->notas_Actividades_Estudiantes($fE["Id"],$_SESSION["periodo"],'Segundo Tercio','Taller 1')?>
                    <?php $T2=$con->notas_Actividades_Estudiantes($fE["Id"],$_SESSION["periodo"],'Segundo Tercio','Taller 2')?>
                    <?php $TO=$con->notas_Actividades_Estudiantes($fE["Id"],$_SESSION["periodo"],'Segundo Tercio','Taller opcional')?>
                    <?php $P1=$con->notas_Actividades_Estudiantes($fE["Id"],$_SESSION["periodo"],'Segundo Tercio','Parcial')?>
                    <td style="text-align: center"><?php echo $T1?></td>
                    <td style="text-align: center"><?php echo $T2?></td>
                    <td style="text-align: center"><?php echo $TO?></td>
                    <?php $TP=$con->promedio_Talleres($T1,$T2,0,$TO)?>
                    <td style="text-align: center"><?php echo $TP?></td>
                    <?php $cantidad_Clases=$con->contar_clases($fE["Id"],"Segundo Tercio");?>
                    <?php $cantidad_Asistencia=$con->contar_Asistencia($fE["Id"],"Segundo Tercio");?>
                    <?php $notaAsistencia=$con->calificar_Asistencia($cantidad_Clases,$cantidad_Asistencia)?>
                    <td style="text-align: center"><?php echo $notaAsistencia?></td>
                    <td style="text-align: center"><?php echo $P1?></td>
                    <?php $Def=$con->Definitiva($TP,$notaAsistencia,$P1)?>
                    <td style="background-color: rgb(245, 183, 177);text-align: center;"><?php echo $Def ?></td>
                    <td>
                        <!--INCIO BOTÓN MODAL RGISTRO DE NOTAS-->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal<?php echo $fE["Id"]?>">
                            A
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $fE["Id"]?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Módulo de registro de notas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="../Modulos/registroNotasSegundoTercio.php">
                                        <div class="modal-body">
                                            <p><strong>Nombre :</strong> <?php echo $fE["nombre"]?></p>
                                            <!--INICIO FOMRULARIO-->
                                            <label for="proceso" class="form-label"><strong>Proceso a
                                                    realizar</strong></label>
                                            <select class="form-select" id="proceso" name="proceso"
                                                aria-label="Default select example">
                                                <option selected>Abrir este menú de selección</option>
                                                <option value="Registrar">Registrar</option>
                                                <option value="Actualizar">Actualizar</option>
                                                <option value="Eliminar">Eliminar</option>
                                            </select>
                                            <br />
                                            <label for="proceso" class="form-label"><strong>Actividad</strong></label>
                                            <select class="form-select" id="actividad" name="actividad"
                                                aria-label="Default select example">
                                                <option selected>Abrir este menú de selección</option>
                                                <option value="Taller 1">Taller 1</option>
                                                <option value="Taller 2">Taller 2</option>
                                                <option value="Taller opcional">Taller opcional</option>
                                                <option value="Parcial">Parcial</option>
                                            </select>
                                            <br />
                                            <div class="mb-3">
                                                <label for="nota" class="form-label">Ingrese la nota</label>
                                                <input type="text" class="form-control" id="nota" name="nota">
                                            </div>
                                            <!--FIN FORMULARIO-->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                                <input type="hidden" id="id_estudiante" name="id_estudiante" value="<?php echo $fE["Id"]?>">
                                            <button type="submit" class="btn btn-primary">Confirmar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--FIN BOTÓN MODAL REGISTRO DE NOTAS-->
                    </td>
                </tr>
                <?php } ?>
                <?php }else{ ?>
                <tr>
                    <td colspan="4"><strong>No hay registros disponibles ...</strong></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>



</body>

</html>