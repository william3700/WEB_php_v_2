<?php
include("../Conexion/conexionDB.php");
$con=new Conexion();
$lista_usuarios_gestion=$con->lista_Usuarios_Gastos();

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
                        <a class="nav-link" href="../gestionPersonal/dashboard.php">Regresar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--FIN ENCABEZADO-->
    <br />
    <div class="container">
        <div class="card border-dark mb-3">
            <div class="card-body">
                <form method="POST" action="../gestionPersonal/gestionPersonal_general.php">
                    <div class="mb-3">
                        <label for="usuario1" class="form-label"><strong>Seleccione el usuario</strong></label>
                        <select class="form-select" id="usuario1" name="usuario1" aria-label="Default select example">
                            <option selected>Abrir este menú de selección</option>
                            <?php while($rowPr = $lista_usuarios_gestion->fetch_assoc()) {?>
                            <option value="<?php echo $rowPr["Id"]?>"><?php echo $rowPr["nombre"]?></option>
                            <?php }?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <?php  if($_POST["usuario1"]){?>
    <?php if(strcmp($_POST["usuario1"], "Abrir este menú de selección") !== 0){?>
    <?php  $id_usu=$_POST["usuario1"];?>
    <?php  $lista_usu=$con->registro_gastos_x_usuario($id_usu);?>
    <?php $serviciosPublicosUsuario=$con->suma_gastos_x_usuario($id_usu,11);?>
    <?php $entretenimientoUsuario=$con->suma_gastos_x_usuario($id_usu,12);?>
    <?php $transporteUsuario=$con->suma_gastos_x_usuario($id_usu,1);?>
    <?php $mercadoUsuario=$con->suma_gastos_x_usuario($id_usu,3);?>
    <?php $alimentosUsuario=$con->suma_gastos_x_usuario($id_usu,16);?>
    <?php $gastoTotal=$con->suma_gastos_totales_x_usuario($id_usu);?>
    <?php $otros=intval($gastoTotal)-(intval($serviciosPublicosUsuario)+intval($entretenimientoUsuario)+intval($transporteUsuario)+intval($mercadoUsuario)+intval($alimentosUsuario))?>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <input class="btn btn-primary" type="button"
                value="Servicios públicos $ <?php echo $serviciosPublicosUsuario?>">
            <input class="btn btn-success" type="submit" value="Entretenimiento $ <?php echo $entretenimientoUsuario?>">
            <input class="btn btn-danger" type="reset" value="Transporte $ <?php echo $transporteUsuario?>">
            <input class="btn btn-secondary" type="button" value="Mercado $ <?php echo $mercadoUsuario?>">
            <input class="btn btn-warning" type="submit" value="Alimentos $ <?php echo $alimentosUsuario?>">
            <input class="btn btn-info" type="reset" value="Otros $ <?php echo $otros?>">
        </div>
    </div>
    <br />
    <div class="container">
        <div class="card text-white bg-dark mb-3">
            <div class=" card-body">
                <h5>Lista de gastos de <?php echo $con->nombre_Usuario_Gestion($id_usu)?></h5>
            </div>
        </div>
    </div>
    <br />
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col" style="width:150px">Categoria</th>
                    <th scope="col" style="width:100px">Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($lista_usu->num_rows > 0) {?>
                <?php $contador=1?>
                <?php  while($row = $lista_usu->fetch_assoc()) {?>
                <tr>
                    <th scope="row"><?php echo $contador?></th>
                    <td><?php echo $con->nombre_Producto($row["producto"])?></td>
                    <td><?php echo $row["costo"]?></td>
                    <td><?php echo $row["cantidad"]?></td>
                    <td><?php echo $con->nombre_Proveedor($row["proveedor"])?></td>
                    <td><?php echo $con->nombre_Categoria($row["categoria"])?></td>
                    <td><?php echo $row["fecha"]?></td>
                </tr>
                <?php $contador+=1?>
                <?php }?>
                <?php }else{?>
                <tr>
                    <td colspan="7">Registros no encontrados ...</td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <?php }?>
    <?php }?>
</body>

</html>