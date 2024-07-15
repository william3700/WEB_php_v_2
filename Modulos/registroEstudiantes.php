<?php
include("../Conexion/conexionDB.php");
$con=new Conexion();
session_start();
$materia=$con->nombre_Asignatura($_SESSION["asignatura"]);
$listaEstudiantes=$con->lista_Estudiantes($_SESSION["periodo"],$_SESSION["asignatura"]);
if($_POST){
    $validacionNombre=strtoupper($_POST["validacionNombre"]);
    $validacionCodigo=$_POST["validacionCodigo"];
    $validacionCorreo=$_POST["validacionCorreo"];
    $validacionPrograma=$_POST["validacionPrograma"];
    if( !empty($validacionCorreo) && !empty($validacionCodigo) && !empty($validacionNombre) && strcmp($validacionPrograma, "Abrir este menú de selección") !== 0){
        $verf1=$con->verificar_Registro_Estudiantes($validacionCodigo,$validacionCorreo,$validacionNombre);
        if($verf1==0){
            $con->registrar_Estudiantes($validacionNombre,$validacionCodigo,$validacionPrograma,$_SESSION["asignatura"],$validacionCorreo,$_SESSION["periodo"]);
            header("Location: ../Modulos/registroEstudiantes.php");
        }else{
            $notificacion="El estudiante ya se encuentra registrado ...";
        }
    }else{
        $notificacion="Debe verificar todos los campos, ninguno debe quedar en blanco ...";
    }
}
if($_POST["id_eliminar_estudiante"]){
    $id_e=$_POST["id_eliminar_estudiante"];
    $con->eliminar_Estudiantes($id_e);
    header("Location: ../Modulos/registroEstudiantes.php");
}

if($_POST["actualizarId"]){
    $actualizarId=$_POST["actualizarId"];
    $actualizarNombre=$_POST["actualizarNombre"];
    $actualizarCodigo=$_POST["actualizarCodigo"];
    $actualizarCorreo=$_POST["actualizarCorreo"];
    $actualizarPrograma=$_POST["actualizarPrograma"];
    $per1=$_SESSION["asignatura"];
    $per2=$_SESSION["periodo"];
    if(!empty($actualizarNombre) && !empty($actualizarCodigo) && !empty($actualizarCorreo) && !empty($actualizarPrograma)){
     $verf2=$con->buscar_Estudiantes($actualizarNombre,$actualizarCodigo,$actualizarCorreo);
        $con->actualizar_Estudiantes($actualizarId,$actualizarNombre,$actualizarCodigo,$actualizarCorreo,$actualizarPrograma,$per2,$per1);
        header("Location: ../Modulos/registroEstudiantes.php");

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
                <strong>Módulo de registro de estudiantes : <?php echo $materia?>
                    (<?php echo $_SESSION["periodo"]?>)</strong>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card border-dark mb-3">
            <div class="card-body">
                <!--INICIO FORMULARIO REGISTRO-->
                <form method="POST" action="../Modulos/registroEstudiantes.php" class="row g-3 needs-validation">
                    <div class="col-md-4">
                        <label for="validacionNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="validacionNombre" name="validacionNombre">
                    </div>
                    <div class="col-md-4">
                        <label for="validacionCodigo" class="form-label">Código</label>
                        <input type="text" class="form-control" id="validacionCodigo" name="validacionCodigo">
                    </div>
                    <div class="col-md-4">
                        <label for="validacionCorreo" class="form-label">Correo</label>

                        <input type="email" class="form-control" id="validacionCorreo" name="validacionCorreo"
                            aria-describedby="inputGroupPrepend">

                    </div>
                    <div class="col-md-3">
                        <label for="validacionPrograma" class="form-label">Programa</label>
                        <select class="form-select" id="validacionPrograma" name="validacionPrograma"
                            aria-label="Default select example">
                            <option selected>Abrir este menú de selección</option>
                            <option value="Ingeniería estadística">Ingeniería estadística</option>
                            <option value="Ingeniería eléctrica">Ingeniería eléctrica</option>
                            <option value="Ingeniería civil">Ingeniería civil</option>
                            <option value="Ingeniería sistemas">Ingeniería sistemas</option>
                            <option value="Ingeniería industrial">Ingeniería industrial</option>
                            <option value="Ingeniería electrónica">Ingeniería electrónica</option>
                            <option value="Ingeniería mecánica">Ingeniería mecánica</option>
                            <option value="Ingeniería ambiental">Ingeniería ambiental</option>
                            <option value="Ingeniería biomédica">Ingeniería biomédica</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="submit">Registrar</button>
                    </div>
                </form>
                <!--FIN FORMULARIO REGISTRO-->
                <p><strong><?php echo $notificacion?></strong></p>
            </div>
        </div>
    </div>
    <div class="container">
        <p><strong>Lista de estudiantes registrados</strong></p>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Código</th>
                    <th scope="col">Programa</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($listaEstudiantes->num_rows > 0) {?>
                <?php $contador=1?>
                <?php while($row = $listaEstudiantes->fetch_assoc()) {?>
                <tr>
                    <th scope="row"><?php echo $contador?></th>
                    <td><?php echo $row["nombre"] ?></td>
                    <td><?php echo $row["codigo"] ?></td>
                    <td><?php echo $row["programa"] ?></td>
                    <td><?php echo $row["correo"] ?></td>
                    <td>
                        <!--INICIO BOTÓN ACTUALIZAR-->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#actualizarE<?php echo $row["Id"] ?>">
                            A
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="actualizarE<?php echo $row["Id"] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="../Modulos/registroEstudiantes.php">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Módulo de actualización</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card text-center border-dark">
                                                <p><strong><?php echo $materia?></strong></p>
                                                <p><?php echo $_SESSION["periodo"]?></p>
                                            </div>
                                            <br />
                                            <label for="actualizarNombre"
                                                class="form-label"><strong>Nombre</strong></label>
                                            <input type="text" id="actualizarNombre" name="actualizarNombre" class="form-control"
                                                value="<?php echo $row["nombre"] ?>">
                                            <br />
                                            <label for="actualizarCodigo"
                                                class="form-label"><strong>Código</strong></label>
                                            <input type="text"  id="actualizarCodigo" name="actualizarCodigo"class="form-control"
                                                value="<?php echo $row["codigo"] ?>">
                                            <br />
                                            <label for="actualizarPrograma"
                                                class="form-label"><strong>Programa</strong></label>
                                            <select class="form-select"  id="actualizarPrograma" name="actualizarPrograma" aria-label="Default select example">
                                                <option selected><?php echo $row["programa"] ?></option>
                                                <option value="Ingeniería estadística">Ingeniería estadística</option>
                                                <option value="Ingeniería eléctrica">Ingeniería eléctrica</option>
                                                <option value="Ingeniería civil">Ingeniería civil</option>
                                                <option value="Ingeniería sistemas">Ingeniería sistemas</option>
                                                <option value="Ingeniería industrial">Ingeniería industrial</option>
                                                <option value="Ingeniería electrónica">Ingeniería electrónica</option>
                                                <option value="Ingeniería mecánica">Ingeniería mecánica</option>
                                                <option value="Ingeniería ambiental">Ingeniería ambiental</option>
                                                <option value="Ingeniería biomédica">Ingeniería biomédica</option>
                                            </select>
                                            <br />
                                            <label for="actualizarCorreo"
                                                class="form-label"><strong>Correo</strong></label>
                                            <input type="text"  id="actualizarCorreo" name="actualizarCorreo" class="form-control"
                                                value="<?php echo $row["correo"] ?>">
                                        </div>
                                        <br />
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancelar</button>
                                                <input type="hidden"  id="actualizarId" name="actualizarId" value="<?php echo $row["Id"]?>">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--FIN BOTÓN ACTUALIZAR-->
                        <!--INICIO BOTÓN ELIMINAR-->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#eliminarE<?php echo $row["Id"] ?>">
                            E
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="eliminarE<?php echo $row["Id"] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row["nombre"]?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Desea eliminar el registro del estudiante ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <form method="POST" action="../Modulos/registroEstudiantes.php">
                                            <input type="hidden" id="id_eliminar_estudiante"
                                                name="id_eliminar_estudiante" value="<?php echo $row["Id"] ?>">
                                            <button type="submit" class="btn btn-primary">Sí, confirmo</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN BOTÓN ELIMINAR-->
                    </td>
                </tr>
                <?php $contador+=1?>
                <?php }?>
                <?php }else{?>
                <tr>
                    <td colspan="6"><strong>No hay registros disponibles ...</strong></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>


</body>

</html>