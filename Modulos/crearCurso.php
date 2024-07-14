<?php
include("../Conexion/conexionDB.php");
$con=new Conexion();
$listaAsignaturas=$con->lista_asignaturas();
if($_POST){
    $nombreCurso=$_POST["nombreCurso"];
    $grupoCurso=$_POST["grupoCurso"];
    if(!empty($nombreCurso) && strcmp($grupoCurso, "Abrir este menú de selección") !== 0){
        $ver1=$con->verificar_Asignatura($nombreCurso,$grupoCurso);
        if($ver1==0){
            $con->crear_Asignaturas($nombreCurso,$grupoCurso);
            header("Location: ../Modulos/crearCurso.php");
        }else{
            $estado1="La asignatura ya se encuentra registrada ...";
        }
    }
}
if($_POST["id_eliminar"]){
     $id=$_POST["id_eliminar"];
     $ver2=$con->verificar_asignatura_inscritos($id);
     if($ver2==0){
        $con->eliminar_Asignaturas($id);
        header("Location: ../Modulos/crearCurso.php");
     }else{
        $estado1="La asignatura no puede ser eliminada, tiene estudiantes inscritos ...";
     }
}

if($_POST["nombreActualizado"]){
    $N1=$_POST["nombreActualizado"];
    $G1=$_POST["grupoActualizado"];
    $idA=$_POST["idActualizado"];
    $ver3=$con->verificar_Asignatura_Id($N1,$G1);
    if($ver3==0){
        $con->actualizar_asignatura($N1,$G1,$idA);
        header("Location: ../Modulos/crearCurso.php");
    }else{
        $estado1="La asignatura no puede ser actualizada, ya existe dicho registro ...";
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
                <strong>Módulo de creación asignaturas</strong>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Registro de asignaturas</strong></h5>
                        <br />
                        <p><?php echo $estado1?></p>
                        <form method="POST" action="../Modulos/crearCurso.php">
                            <div class="mb-3">
                                <label for="nombreCurso" class="form-label"><strong>Nombre asignatura</strong></label>
                                <input type="text" class="form-control" id="nombreCurso" name="nombreCurso"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="grupoCurso" class="form-label"><strong>Grupo</strong></label>

                                <select class="form-select" id="grupoCurso" name="grupoCurso"
                                    aria-label="Default select example">
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
                                    <option value="31">21</option>
                                    <option value="32">22</option>
                                    <option value="33">23</option>
                                    <option value="34">24</option>
                                    <option value="35">25</option>
                                    <option value="36">26</option>
                                    <option value="37">27</option>
                                    <option value="38">28</option>
                                    <option value="39">29</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                    <option value="60">60</option>
                                    <option value="71">71</option>
                                    <option value="72">72</option>
                                    <option value="73">73</option>
                                    <option value="74">74</option>
                                    <option value="75">75</option>
                                    <option value="76">76</option>
                                    <option value="77">77</option>
                                    <option value="78">78</option>
                                    <option value="79">79</option>
                                    <option value="80">80</option>
                                    <option value="81">81</option>
                                    <option value="82">82</option>
                                    <option value="83">83</option>
                                    <option value="84">84</option>
                                    <option value="85">85</option>
                                    <option value="86">86</option>
                                    <option value="87">87</option>
                                    <option value="88">88</option>
                                    <option value="89">89</option>
                                    <option value="90">90</option>
                                    <option value="91">91</option>
                                    <option value="92">92</option>
                                    <option value="93">93</option>
                                    <option value="94">94</option>
                                    <option value="95">95</option>
                                    <option value="96">96</option>
                                    <option value="97">97</option>
                                    <option value="98">98</option>
                                    <option value="99">99</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Grupo</th>
                                    <th scope="col">Asignatura</th>
                                    <th scope="col" style="width:100px">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($listaAsignaturas->num_rows > 0) {?>
                                <?php $contador=1?>
                                <?php while($row = $listaAsignaturas->fetch_assoc()) {?>
                                <tr>
                                    <th scope="row"><?php echo $contador?></th>
                                    <td><?php echo $row["nombre"]?></td>
                                    <td><?php echo $row["grupo"]?></td>
                                    <td><?php echo $row["asignacion"]?></td>
                                    <td>
                                        <!--INICIO ACTUALIZAR ASIGNATURA-->
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#actualizarCurso<?php echo $row["Id"]?>">
                                            A
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="actualizarCurso<?php echo $row["Id"]?>"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="POST" action="../Modulos/crearCurso.php">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Módulo de
                                                                actualización</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label for="nombreActualizado"
                                                                class="form-label"><strong>Nombre
                                                                    asignatura</strong></label>
                                                            <input type="text" class="form-control"
                                                                id="nombreActualizado" name="nombreActualizado"
                                                                value="<?php echo $row["nombre"]?>">
                                                            <br />
                                                            <label for="grupoActualizado"
                                                                class="form-label"><strong>Grupo
                                                                    asignatura</strong></label>
                                                            <select class="form-select" id="grupoActualizado"
                                                                name="grupoActualizado"
                                                                aria-label="Default select example">
                                                                <option selected><?php echo $row["grupo"]?></option>
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
                                                                <option value="31">21</option>
                                                                <option value="32">22</option>
                                                                <option value="33">23</option>
                                                                <option value="34">24</option>
                                                                <option value="35">25</option>
                                                                <option value="36">26</option>
                                                                <option value="37">27</option>
                                                                <option value="38">28</option>
                                                                <option value="39">29</option>
                                                                <option value="40">40</option>
                                                                <option value="41">41</option>
                                                                <option value="42">42</option>
                                                                <option value="43">43</option>
                                                                <option value="44">44</option>
                                                                <option value="45">45</option>
                                                                <option value="46">46</option>
                                                                <option value="47">47</option>
                                                                <option value="48">48</option>
                                                                <option value="49">49</option>
                                                                <option value="50">50</option>
                                                                <option value="51">51</option>
                                                                <option value="52">52</option>
                                                                <option value="53">53</option>
                                                                <option value="54">54</option>
                                                                <option value="55">55</option>
                                                                <option value="56">56</option>
                                                                <option value="57">57</option>
                                                                <option value="58">58</option>
                                                                <option value="59">59</option>
                                                                <option value="60">60</option>
                                                                <option value="71">71</option>
                                                                <option value="72">72</option>
                                                                <option value="73">73</option>
                                                                <option value="74">74</option>
                                                                <option value="75">75</option>
                                                                <option value="76">76</option>
                                                                <option value="77">77</option>
                                                                <option value="78">78</option>
                                                                <option value="79">79</option>
                                                                <option value="80">80</option>
                                                                <option value="81">81</option>
                                                                <option value="82">82</option>
                                                                <option value="83">83</option>
                                                                <option value="84">84</option>
                                                                <option value="85">85</option>
                                                                <option value="86">86</option>
                                                                <option value="87">87</option>
                                                                <option value="88">88</option>
                                                                <option value="89">89</option>
                                                                <option value="90">90</option>
                                                                <option value="91">91</option>
                                                                <option value="92">92</option>
                                                                <option value="93">93</option>
                                                                <option value="94">94</option>
                                                                <option value="95">95</option>
                                                                <option value="96">96</option>
                                                                <option value="97">97</option>
                                                                <option value="98">98</option>
                                                                <option value="99">99</option>
                                                                <option value="100">100</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cerrar</button>
                                                                <input type="hidden" id="idActualizado" name="idActualizado" value="<?php echo $row["Id"]?>">
                                                            <button type="submit"
                                                                class="btn btn-primary">Actualizar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--FIN ACTUALIZAR ASIGNATURA-->
                                        <!--INICIO ELIMINAR ASIGNATURA-->
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#eliminarMateria<?php echo $row["Id"]?>">
                                            E
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="eliminarMateria<?php echo $row["Id"]?>"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            <?php echo $row["asignacion"]?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Desea eliminar la asignatura ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <form method="POST" action="../Modulos/crearCurso.php">
                                                            <input type="hidden" id="id_eliminar" name="id_eliminar"
                                                                value="<?php echo $row["Id"]?>">
                                                            <button type="submit" class="btn btn-primary">Sí,
                                                                confirmo</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--FIN ELIMINAR ASIGNATURA-->
                                    </td>
                                </tr>
                                <?php $contador+=1?>
                                <?php }?>
                                <?php }else{?>
                                <tr>
                                    <td colspan="4">No hay registros disponibles ...</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>