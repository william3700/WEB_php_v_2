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
                <strong>Módulo de registro de estudiantes : ()</strong>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card border-dark mb-3">
            <div class="card-body">
                <form class="row g-3 needs-validation" novalidate>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="validationCustom01">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Código</label>
                        <input type="text" class="form-control" id="validationCustom01">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">Correo</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" class="form-control" id="validationCustomUsername"
                                aria-describedby="inputGroupPrepend">
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">Programa</label>
                        <select class="form-select" id="programa" name="programa" aria-label="Default select example">
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
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="submit">Registrar</button>
                    </div>
                    <p>hola</p>
                </form>
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
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>
                        <button type="button" class="btn btn-primary">A</button>
                        <button type="button" class="btn btn-secondary">E</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>
                        <button type="button" class="btn btn-primary">A</button>
                        <button type="button" class="btn btn-secondary">E</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>
                        <button type="button" class="btn btn-primary">A</button>
                        <button type="button" class="btn btn-secondary">E</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


</body>

</html>