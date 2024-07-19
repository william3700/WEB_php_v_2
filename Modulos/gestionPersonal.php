<?php
include("../Conexion/conexionDB.php");
$con=new Conexion();
$listaProveedores=$con->lista_proveedores();

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
            <button type="button" class="btn btn-success me-md-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                + Agregar Categoria
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Módulo para agregar Categorias</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--FIN BOTÓN AGREGAR CATEGORIA-->
            <!--INICIO BOTÓN AGREGAR PRODUCTO-->
            <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                + Agregar Producto
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Módulo para agregar Producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--FIN BOTÓN AGREGAR PRODUCTO-->
            <!--INICIO BOTÓN AGREGAR MARCA-->
            <button type="button" class="btn btn-secondary me-md-2" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                + Agregar Marca
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Módulo para agregar Marca</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--FIN BOTÓN AGREGAR MARCA-->
            <!--INICIO BOTÓN AGREGAR USUARIO-->
            <button type="button" class="btn btn-warning me-md-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                + Agregar Usuario
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Módulo para agregar Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--FIN BOTÓN AGREGAR USUARIO-->
        </div>
    </div>
    <br />
    <div class="container">
        <div class="card border-dark mb-3">
            <div class="card-body">
                <form class="row g-3 needs-validation" novalidate>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label"><strong>Seleccionar producto</strong></label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Abrir este menú de selección</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label"><strong>Ingresar costo</strong></label>
                        <input type="text" class="form-control" id="validationCustom02" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label"><strong>Ingresar cantidad</strong></label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Abrir este menú de selección</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label"><strong>Seleccionar
                                proveedor</strong></label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Abrir este menú de selección</option>
                            <?php while($rowP = $listaProveedores->fetch_assoc()) {?>
                            <option value="<?php echo $rowP["Id"]?>"><?php echo $rowP["referencia"]?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label"><strong>Seleccionar
                                categoria</strong></label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Abrir este menú de selección</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label"><strong>Seleccionar usuario</strong></label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Abrir este menú de selección</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
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
                <?php for($i=0;$i<10;$i++){?>
                <tr>
                    <th scope="row"><?php echo $i?></th>
                    <td>Mark</td>
                    <td> $ <?php echo $i ?></td>
                    <td>
                        <button type="button" class="btn btn-primary">A</button>
                        <button type="button" class="btn btn-secondary">E</button>
                        <button type="button" class="btn btn-success">V</button>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>


</body>

</html>