<?php
include("../Conexion/conexionDB.php");
$con=new Conexion();
$enviarReporteAsigantura=$_POST["enviarReporteAsigantura"];
$enviarReporteTipo=$_POST["enviarReporteTipo"];
$enviarReporteSemestre=$_POST["enviarReporteSemestre"];
if(strcmp($enviarReporteAsigantura, "Abrir este menú de selección") == 0 || strcmp($enviarReporteTipo, "Abrir este menú de selección") == 0 || strcmp($enviarReporteSemestre, "Abrir este menú de selección") == 0){
  header("Location: ../Modulos/principal.php");
}
$listaEstudiantes=$con->lista_Estudiantes($enviarReporteSemestre,$enviarReporteAsigantura);
$nombreAsigantura1=$con->nombre_Asignatura($enviarReporteAsigantura);
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
                <strong>Reporte general <?php echo $enviarReporteTipo?> : <?php echo $nombreAsigantura1?>
                    (<?php echo $enviarReporteSemestre?>)</strong>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Programa</th>
                    <th scope="col">Opción</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($listaEstudiantes->num_rows > 0) {?>
                <?php $contador=1?>
                <?php while($row = $listaEstudiantes->fetch_assoc()) {?>
                <tr>
                    <th scope="row"><?php echo $contador?></th>
                    <td><?php echo $row["nombre"]?></td>
                    <td><?php echo $row["programa"]?></td>
                    <td>
                        <?php if(strcmp($enviarReporteTipo,'Asistencia')==0){?>
                            <!--INICIO VENTANA DE INFORMACIÓN-->
                            <?php include("../Modulos/ventanaAsistencia.php")?>
                            <!--FIN VENTANA DE INFORMACIÓN-->
                        <?php }else{ ?>
                            <!--INICIO VENTANA DE INFORMACIÓN-->
                            <?php include("../Modulos/ventanaNotas.php")?>
                            <!--FIN VENTANA DE INFORMACIÓN-->
                        <?php }?>
                    </td>
                </tr>
                <?php $contador+=1?>
                <?php }?>
                <?php }else{?>
                <tr>
                    <td colspan="4">
                        <strong>No existen registros disponibles ...</strong>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

</body>

</html>