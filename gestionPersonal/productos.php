<?php 
include("../Conexion/conexionDB.php");
$con=new Conexion();
$listaProductos=$con->lista_productos();
if($_POST["nombreProductos"]){
    $nombreProductos=$_POST["nombreProductos"];
    if(!empty($nombreProductos)){
        $con->crear_Productos($nombreProductos);
        header("Location: ../gestionPersonal/productos.php");
    }
}

if($_POST["id_eliminar_productos"]){
    $id_eliminar_productos=$_POST["id_eliminar_productos"];
    $con->eliminar_productos($id_eliminar_productos);
    header("Location: ../gestionPersonal/productos.php");
}

if($_POST["id_actualizar_productos"]){
    $actualizarProductos=$_POST["actualizarProductos"];
    $id=$_POST["id_actualizar_productos"];
    $con->actualizar_productos($id,$actualizarProductos);
    header("Location: ../gestionPersonal/productos.php");   
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
                        <a class="nav-link" href="../Modulos/gestionPersonal.php">Regresar</a>
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
                <strong>Módulo de registro de productos</strong>
            </div>
        </div>
    </div>
    <br />
    <div class="container">
        <div class="card border-dark mb-3">
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="../gestionPersonal/productos.php">
                    <div class="col-md-4">
                        <label for="nombreProductos" class="form-label"><strong>Producto</strong></label>
                        <input type="text" class="form-control" id="nombreProductos" name="nombreProductos">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <p><strong>Lista de productos</strong></p>
        <div class="card border-dark mb-3">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre producto</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador=1?>
                        <?php while($row = $listaProductos->fetch_assoc()) {?>
                        <tr>
                            <th scope="row"><?php echo $contador?></th>
                            <td><?php echo $row["nombre"]?></td>
                            <td>
                                <!--INICIO BOTÓN DE ACTUALIZAR-->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#actualizarProductos<?php echo $row["Id"]?>">
                                    A
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="actualizarProductos<?php echo $row["Id"]?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form method="POST" action="../gestionPersonal/productos.php">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Módulo de
                                                        actualización
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="mb-3">
                                                            <label for="actualizarProductos"
                                                                class="form-label"><strong>Nombre
                                                                    categoria</strong></label>
                                                            <input type="text" class="form-control"
                                                                id="actualizarProductos" name="actualizarProductos"
                                                                value="<?php echo $row["nombre"]?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    <input type="hidden" id="id_actualizar_productos"
                                                        name="id_actualizar_productos" value="<?php echo $row["Id"]?>">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--FIN BOTÓN DE ACTUALIZAR-->
                                <!--INICIO BOTÓN DE ELIMINAR-->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#eliminarProductos<?php echo $row["Id"]?>">
                                    E
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="eliminarProductos<?php echo $row["Id"]?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    <?php echo $row["nombre"]?>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Desea eliminar el registro del producto ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <form method="POST" action="../gestionPersonal/productos.php">
                                                    <input type="hidden" id="id_eliminar_productos"
                                                        name="id_eliminar_productos" value="<?php echo $row["Id"]?>">
                                                    <button type="submit" class="btn btn-primary">Sí, confirmo</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--FIN BOTÓN DE ELIMINAR-->
                            </td>
                        </tr>
                        <?php $contador+=1?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>