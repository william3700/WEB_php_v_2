<?php
session_start();
if(!isset($_SESSION["usuarioGestion"]) && !isset($_SESSION["claveGestion"])){
    header("Location: ../index.php");
}else{

}
include("../Conexion/conexionDB.php");
$con=new Conexion();
$serviciosT = [];
$mercadoT=[];
$entretenimientoT=[];
$gasT=[];
$aguaT=[];
$energiaT=[];
$meses=array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
'Octubre', 'Noviembre', 'Diciembre');
foreach($meses as $mes){
    $serviciosT[]= $con->total_servicio_publicos_x_mes(11,$mes);
    $mercadoT[]= $con->total_mercado_x_mes(3,$mes);
    $entretenimientoT[]=$con->total_entretenimiento_x_mes(12,$mes);
    $gasT[]=$con->total_servicio_publico_diferencial_x_mes(26,$mes);
    $energiaT[]=$con->total_servicio_publico_diferencial_x_mes(25,$mes);
    $aguaT[]=$con->total_servicio_publico_diferencial_x_mes(22,$mes);
}

$claroHogar=$con->gasto_total_entretenimiento(16);
$disneyPlus=$con->gasto_total_entretenimiento(18);
$streaming= $con->gasto_total_entretenimiento(17);

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
                        <a class="nav-link" href="../Modulos/destruirSesion.php">Salir</a>
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
                <strong>Dashboar : Gastos personales</strong>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="../Modulos/gestionPersonal.php" role="button">+ Registrar Nuevos Gastos</a>
            <a class="btn btn-success" href="../gestionPersonal/gestionPersonal_general.php" role="button">+ Registro General Gastos</a>
        </div>
    </div>
    <br />
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Servicios públicos</h5>
                        <hr />
                        <p class="card-text" style="text-align:right"> $ <?php echo $con->total_servicio_publicos(11);?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Mercado</h5>
                        <hr />
                        <p class="card-text" style="text-align:right"> $ <?php echo $con->total_mercado(3);?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-dark bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Entretenimiento</h5>
                        <hr />
                        <p class="card-text" style="text-align:right"> $ <?php echo $con->total_entretenimiento(12);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <!--INICIO GRÁFICO ESTADÍSTICO-->
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Detalle Servicios Públicos.</h5>
                        <div>
                            <canvas id="myChart" with="100%" height="300%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Detalle Mercado</h5>
                        <div>
                            <canvas id="myChart2" with="100%" height="300%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Detalle Entretenimiento</h5>
                        <div>
                            <canvas id="myChart3" with="100%" height="300%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="card border-dark mb-3">
            <div class="card-body text-dark">
                <h5 class="card-title">Comparación Gastos Principales</h5>
                <canvas id="myChart4"></canvas>
            </div>
        </div>
        <br />
        <div class="card border-dark mb-3">
            <div class="card-body text-dark">
                <h5 class="card-title">Comparación Gastos</h5>
                <canvas id="myChart5"></canvas>
            </div>
        </div>




    </div>
    <!--FIN GRÁFICO ESTADÍSTICO-->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [{
                label: 'Servicios públicos por mes',
                data: eval(<?php echo json_encode($serviciosT)?>),
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>

    <script>
    const ctx2 = document.getElementById('myChart2');
    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                'Octubre', 'Noviembre', 'Diciembre'
            ],
            datasets: [{
                label: 'Mercado por mes',
                data: eval(<?php echo json_encode($mercadoT)?>),
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>

    <script>
    const ctx3 = document.getElementById('myChart3');
    new Chart(ctx3, {
        type: 'doughnut',
        data: {
            labels: [
                'Claro Hogar + Internet + Telefonia',
                'Disney plus',
                'Plataformas de streaming'
            ],
            datasets: [{
                label: 'Entretenimiento',
                data: [eval(<?php echo json_encode($claroHogar)?>), eval(<?php echo json_encode($disneyPlus)?>), eval(<?php echo json_encode($streaming)?>)],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>

    <script>
    const ctx4 = document.getElementById('myChart4');
    new Chart(ctx4, {
        type: 'scatter',
        data: {
            labels: [
                'Enero',
                'Febrero',
                'Marzo',
                'April',
                'Mayo',
                'Junio',
                'Julio',
                'Agosto',
                'Septiembre',
                'Octubre',
                'Noviembre',
                'Diciembre'
            ],
            datasets: [{
                type: 'line',
                label: 'Acueducto y alcantarillado',
                data: eval(<?php echo json_encode($aguaT)?>),
                borderColor: 'rgb(52, 152, 219)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)'
            }, {
                type: 'line',
                label: 'Energía eléctrica',
                data: eval(<?php echo json_encode($energiaT)?>),
                fill: false,
                borderColor: 'rgb(211, 84, 0)'
            } ,{
                type: 'line',
                label: 'Gas',
                data: eval(<?php echo json_encode($gasT)?>),
                fill: false,
                borderColor: 'rgb(34, 153, 84)'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>

    <script>
    const ctx5 = document.getElementById('myChart5');
    new Chart(ctx5, {
        type: 'scatter',
        data: {
            labels: [
                'January',
                'February',
                'March',
                'April',
                'Mayo',
                'Junio',
                'Julio',
                'Agosto',
                'Septiembre',
                'Octubre',
                'Noviembre',
                'Diciembre'
            ],
            datasets: [{
                type: 'bar',
                label: 'Mercado',
                data: eval(<?php echo json_encode($mercadoT)?>),
                borderColor: 'rgb(0, 0, 0)',
                backgroundColor: 'rgba(146, 43, 33)'
            }, {
                type: 'bar',
                label: 'Servicios públicos',
                data: eval(<?php echo json_encode($serviciosT)?>),
                fill: false,
                borderColor: 'rgb(0, 0, 0)',
                backgroundColor: 'rgba(30, 132, 73 )'
            }, {
                type: 'bar',
                label: 'Entretenimiento',
                data: eval(<?php echo json_encode($entretenimientoT)?>),
                fill: true,
                borderColor: 'rgb(0, 0, 0)',
                backgroundColor: 'rgba(211, 84, 0)'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>


</body>

</html>