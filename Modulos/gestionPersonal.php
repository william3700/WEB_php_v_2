<?php
//echo md5('830085'); 
date_default_timezone_set('America/Bogota');
include("../Conexion/conexionDB.php");
$con=new Conexion();
$listaProveedores=$con->lista_proveedores();
$lista_categorias=$con->lista_categorias();
$listaProductos=$con->lista_productos();
$lista_Usuarios_gestion=$con->lista_Usuarios_gestion();
$lista_Gastos=$con->lista_Gastos();

if($_POST["producto"]){
    $producto=$_POST["producto"];
    $costo=$_POST["costo"];
    $cantidad=$_POST["cantidad"];
    $proveedor=$_POST["proveedor"];
    $categoria=$_POST["categoria"];
    $usuario=$_POST["usuario"];
    $fecha = date("Y-m-d");
    $mes=$con->mes(date("m"));
    if(!empty($costo) && strcmp($usuario, "Abrir este menú de selección") !== 0 && strcmp($categoria, "Abrir este menú de selección") !== 0 && strcmp($proveedor, "Abrir este menú de selección") !== 0 && strcmp($cantidad, "Abrir este menú de selección") !== 0 && strcmp($producto, "Abrir este menú de selección") !== 0){
        $con->registrar_Gasto($producto,$costo,$cantidad,$proveedor,$categoria,$usuario,$fecha,$mes);
        header("Location: ../Modulos/gestionPersonal.php");
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
                        <a class="nav-link" href="../index.php">Salir</a>
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
                <strong>Módulo de gestión personal</strong>
            </div>
        </div>
    </div>
    <br />
    <div class="container">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <!--INICIO BOTON AGREGAR PROVEEDORES-->
            <a class="btn btn-primary" href="../gestionPersonal/proveedores.php" role="button">+ Agregar Proveedor</a>
            <!--FIN BOTÓN AGREGAR PROVEEDORES-->
            <!--INICIO BOTÓN AGREGAR CATEGORIA-->
            <a class="btn btn-success" href="../gestionPersonal/categoria.php" role="button">+ Agregar Categoria</a>
            <!--FIN BOTÓN AGREGAR CATEGORIA-->
            <!--INICIO BOTÓN AGREGAR PRODUCTO-->
            <a class="btn btn-danger" href="../gestionPersonal/productos.php" role="button">+ Agregar Producto</a>
            <!--FIN BOTÓN AGREGAR PRODUCTO-->
            <!--INICIO BOTÓN AGREGAR USUARIO-->
            <a class="btn btn-warning" href="../gestionPersonal/usuarios.php" role="button">+ Agregar Usuarios</a>
            <!--FIN BOTÓN AGREGAR USUARIO-->
        </div>
    </div>
    <br />
    <div class="container">
        <div class="card border-dark mb-3">
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="../Modulos/gestionPersonal.php" novalidate>
                    <div class="col-md-4">
                        <label for="producto" class="form-label"><strong>Seleccionar producto</strong></label>
                        <select class="form-select" id="producto" name="producto" aria-label="Default select example">
                            <option selected>Abrir este menú de selección</option>
                            <?php while($rowPr = $listaProductos->fetch_assoc()) {?>
                            <option value="<?php echo $rowPr["Id"]?>"><?php echo $rowPr["nombre"]?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="costo" class="form-label"><strong>Ingresar costo</strong></label>
                        <input type="text" class="form-control" id="costo" name="costo" required>
                    </div>
                    <div class="col-md-4">
                        <label for="cantidad" class="form-label"><strong>Ingresar cantidad</strong></label>
                        <select class="form-select" id="cantidad" name="cantidad" aria-label="Default select example">
                            <option selected>Abrir este menú de selección</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="proveedor" class="form-label"><strong>Seleccionar
                                proveedor</strong></label>
                        <select class="form-select" id="proveedor" name="proveedor" aria-label="Default select example">
                            <option selected>Abrir este menú de selección</option>
                            <?php while($rowP = $listaProveedores->fetch_assoc()) {?>
                            <option value="<?php echo $rowP["Id"]?>"><?php echo $rowP["referencia"]?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="categoria" class="form-label"><strong>Seleccionar
                                categoria</strong></label>
                        <select class="form-select" id="categoria" name="categoria" aria-label="Default select example">
                            <option selected>Abrir este menú de selección</option>
                            <?php while($rowC = $lista_categorias->fetch_assoc()) {?>
                            <option value="<?php echo $rowC["Id"]?>"><?php echo $rowC["nombre"]?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="usuario" class="form-label"><strong>Seleccionar usuario</strong></label>
                        <select class="form-select" id="usuario" name="usuario" aria-label="Default select example">
                            <option selected>Abrir este menú de selección</option>
                            <?php while($rowUsu = $lista_Usuarios_gestion->fetch_assoc()) {?>
                            <option value="<?php echo $rowUsu["Id"]?>"><?php echo $rowUsu["nombre"]?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="submit">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br />
    <div class="container">
        <div class="card text-white bg-dark mb-3">
            <div class="card-body">
                <strong>Listado de gastos</strong>
            </div>
        </div>
    </div>
    <br />
    <div class="container">
        <p><strong>Gastos totales : $ </strong><?php echo $con->suma_gastos_totales()?></p>
    </div>
    <br />
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Costo</th>
                    <th scope="col" style="width:150px">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $contador=1?>
                <?php   while($row = $lista_Gastos->fetch_assoc()) {?>
                <tr>
                    <th scope="row"><?php echo $contador?></th>
                    <td><?php echo $con->lista_productos_nombre($row["producto"]) ?></td>
                    <td> $ <?php echo $row["costo"] ?></td>
                    <td>
                        <button type="button" class="btn btn-primary">A</button>
                        <button type="button" class="btn btn-secondary">E</button>
                        <button type="button" class="btn btn-success">V</button>
                    </td>
                </tr>
                <?php $contador+=1?>
                <?php }?>
            </tbody>
        </table>
    </div>


</body>

</html>