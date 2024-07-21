<?php
//echo md5('830085'); 
date_default_timezone_set('America/Bogota');
include("../Conexion/conexionDB.php");
$con=new Conexion();
$listaProveedores=$con->lista_proveedores();
$listaProveedoresA=$con->lista_proveedores();
$lista_categorias=$con->lista_categorias();
$lista_categoriasA=$con->lista_categorias();
$listaProductos=$con->lista_productos();
$listaProductosA=$con->lista_productos();
$lista_Usuarios_gestion=$con->lista_Usuarios_gestion();
$lista_Gastos=$con->lista_Gastos();
$lista_Usuarios_Gastos=$con->lista_Usuarios_Gastos();

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

if($_POST["id_eliminar"]){
    $con->eliminar_Registro_Gestion($_POST["id_eliminar"]);
    header("Location: ../Modulos/gestionPersonal.php");
}


if($_POST["id_actualizar"]){
   $productoActualizar=$_POST["productoActualizar"];
   $costoActualizar=$_POST["costoActualizar"];
   $actualizarCantidad=$_POST["actualizarCantidad"];
   $proveedorActualizar=$_POST["proveedorActualizar"];
   $categoriaActualizar=$_POST["categoriaActualizar"];
   $usuarioActualizar=$_POST["usuarioActualizar"];
   $id=$_POST["id_actualizar"];
   $con->actualizar_Gastos($id,$productoActualizar,$costoActualizar, $actualizarCantidad,$proveedorActualizar,$categoriaActualizar,$usuarioActualizar);
   header("Location: ../Modulos/gestionPersonal.php");
  //echo $actualizarCantidad;
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
                        <a class="nav-link" href="../gestionPersonal/dashboard.php">Regresar</a>
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
                    <th scope="col" style="width:150px">Costo</th>
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
                        <!--INICIO BOTÓN ACTUALIZAR-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#registroActualizar<?php echo $row["Id"] ?>">
                            A
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="registroActualizar<?php echo $row["Id"] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" action="../Modulos/gestionPersonal.php">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Módulo de actualización</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card border-dark mb-3">
                                                <div class="card-body">
                                                    <label for="productoActualizar"
                                                        class="form-label"><strong>Seleccionar
                                                            producto</strong></label>
                                                    <select class="form-select" id="productoActualizar"
                                                        name="productoActualizar" aria-label="Default select example">
                                                        <option value="<?php echo $row["producto"]?>" selected>
                                                            <?php echo $con->lista_productos_nombre($row["producto"]) ?>
                                                        </option>
                                                        <?php while($rowPr = $listaProductosA->fetch_assoc()) {?>
                                                        <option value="<?php echo $rowPr["Id"]?>">
                                                            <?php echo $rowPr["nombre"]?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>

                                                <div class="card-body">
                                                    <label for="costoActualizar"
                                                        class="form-label"><strong>Costo</strong></label>
                                                    <input type="text" class="form-control" id="costoActualizar"
                                                        name="costoActualizar" value="<?php echo $row["costo"]?>">
                                                </div>

                                                <div class="card-body">
                                                    <label for="actualizarCantidad" class="form-label"><strong>Ingresar
                                                            cantidad</strong></label>
                                                    <select class="form-select" id="actualizarCantidad"
                                                        name="actualizarCantidad"  aria-label="Default select example">
                                                        <option selected><?php echo $row["cantidad"]?></option>
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


                                                <div class="card-body">
                                                    <label for="proveedorActualizar"
                                                        class="form-label"><strong>Seleccionar
                                                            proveedor</strong></label>
                                                    <select class="form-select" id="proveedorActualizar"
                                                        name="proveedorActualizar" aria-label="Default select example">
                                                        <option value="<?php echo $row["proveedor"]?>" selected>
                                                            <?php echo $con->lista_proveedor_nombre($row["proveedor"]) ?>
                                                        </option>
                                                        <?php while($rowPr1 = $listaProveedoresA->fetch_assoc()) {?>
                                                        <option value="<?php echo $rowPr1["Id"]?>">
                                                            <?php echo $rowPr1["nombre"]?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>

                                                <div class="card-body">
                                                    <label for="categoriaActualizar"
                                                        class="form-label"><strong>Seleccionar
                                                            proveedor</strong></label>
                                                    <select class="form-select" id="categoriaActualizar"
                                                        name="categoriaActualizar" aria-label="Default select example">
                                                        <option value="<?php echo $row["categoria"]?>" selected>
                                                            <?php echo $con->lista_categoria_nombre($row["categoria"]) ?>
                                                        </option>
                                                        <?php while($rowPr1 = $lista_categoriasA->fetch_assoc()) {?>
                                                        <option value="<?php echo $rowPr1["Id"]?>">
                                                            <?php echo $rowPr1["nombre"]?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>

                                                <div class="card-body">
                                                    <label for="usuarioActualizar"
                                                        class="form-label"><strong>Seleccionar
                                                            usuario</strong></label>
                                                    <select class="form-select" id="usuarioActualizar"
                                                        name="usuarioActualizar" aria-label="Default select example">
                                                        <option value="<?php echo $row["usuario"]?>" selected>
                                                            <?php echo $con->lista_usuario_gestion_nombre($row["usuario"]) ?>
                                                        </option>
                                                        <?php while($rowPr1 = $lista_Usuarios_Gastos->fetch_assoc()) {?>
                                                        <option value="<?php echo $rowPr1["Id"]?>">
                                                            <?php echo $rowPr1["nombre"]?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <input type="hidden" id="id_actualizar" name="id_actualizar"
                                                value="<?php echo $row["Id"] ?>">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--FIN BOTÓN ACTUALIZAR-->
                        <!--INICIO BOTÓN BORRAR-->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#eliminarRegistroGasto<?php echo $row["Id"]?>">
                            E
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="eliminarRegistroGasto<?php echo $row["Id"]?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            <?php echo $con->lista_productos_nombre($row["producto"]) ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Desea eliminar el registro ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <form method="POST" action="../Modulos/gestionPersonal.php">
                                            <input type="hidden" id="id_eliminar" name="id_eliminar"
                                                value="<?php echo $row["Id"]?>">
                                            <button type="submit" class="btn btn-primary">Sí, confirmo</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN BOTÓN BORRAR-->
                        <!--INICIO BOTÓN VER-->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#verRegistroGasto<?php echo $row["Id"]?>">
                            V
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="verRegistroGasto<?php echo $row["Id"]?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Reporte detallado</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="card border-dark mb-3">
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="productoVer"
                                                            class="form-label"><strong>Producto</strong></label>
                                                        <p><?php echo $con->lista_productos_nombre($row["producto"])?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-group">
                                                <div class="card border-dark mb-3 text-dark bg-light text-center">
                                                    <div class="card-body">
                                                        <div class="mb-3">
                                                            <label for="costoVer"
                                                                class="form-label"><strong>Costo</strong></label>
                                                            <p> $ <?php echo $row["costo"]?></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card border-dark mb-3 text-center">
                                                    <div class="card-body">
                                                        <div class="mb-3">
                                                            <label for="cantidadVer"
                                                                class="form-label"><strong>Cantidad</strong></label>
                                                            <p> <?php echo $row["cantidad"]?></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card border-dark mb-3 text-dark bg-light text-center">
                                                    <div class="card-body">
                                                        <div class="mb-3">
                                                            <label for="fechaVer" class="form-label"><strong>Fecha de
                                                                    pago</strong></label>
                                                            <p> <?php echo $row["fecha"]?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-dark mb-3">
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="proveedorVer"
                                                            class="form-label"><strong>Proveedor</strong></label>
                                                        <p> <?php echo $con->nombre_Proveedor($row["proveedor"])?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card border-dark mb-3 text-dark bg-light">
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="categoriaVer"
                                                            class="form-label"><strong>Categoria</strong></label>
                                                        <p> <?php echo $con->nombre_Categoria($row["categoria"])?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card border-dark mb-3 text-dark bg-light">
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="categoriaVer"
                                                            class="form-label"><strong>Usuario</strong></label>
                                                        <p> <?php echo $con->nombre_Usuario_Gestion($row["usuario"])?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN BOTÓN VER-->
                    </td>
                </tr>
                <?php $contador+=1?>
                <?php }?>
            </tbody>
        </table>
    </div>


</body>

</html>