<button type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#exampleModal<?php echo $row["Id"]?>">
    Ver
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $row["Id"]?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de asistencia
                    (<?php echo $enviarReporteSemestre?>)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <strong>Nombre : </strong><?php echo $row["nombre"]?>
                    </div>
                    <div class="card-body">
                        <!--INICIO TABLA DE ASISTENCIAS PRIMER TERCIO-->
                        <div class="card text-white bg-dark mb-3 text-center">
                            <p><strong>Primer Tercio</strong></p>
                        </div>
                        <table class="table table-hover table-success">
                            <thead>
                                <tr>
                                    <th scope="col">Clase</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $idA=$row["Id"]?>
                                <?php $contadorA=1?>
                                <?php $reporteA=$con->reporte_Asistencia($idA,'Primer Tercio',$enviarReporteSemestre)?>
                                <?php if ($reporteA->num_rows > 0) {?>
                                <?php while($rowA = $reporteA->fetch_assoc()) {?>
                                <tr>
                                    <th scope="row"><?php echo $contadorA?></th>
                                    <td><?php echo $rowA["fecha"]?></td>
                                    <td><?php echo $rowA["estado"]?></td>
                                </tr>
                                <?php $contadorA+=1?>
                                <?php }?>
                                <?php }else{?>
                                <tr>
                                    <td colspan="3">
                                        <strong>No existen registros disponibles ...</strong>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <!--FIN TABLA DE ASISTENCIAS-->
                        <br />
                        <!--INICIO TABLA DE ASISTENCIAS SEGUNDO TERCIO-->
                        <div class="card text-white bg-dark mb-3 text-center">
                            <p><strong>Segundo Tercio</strong></p>
                        </div>
                        <table class="table table-hover table-success">
                            <thead>
                                <tr>
                                    <th scope="col">Clase</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $idA=$row["Id"]?>
                                <?php $contadorA=1?>
                                <?php $reporteA=$con->reporte_Asistencia($idA,'Segundo Tercio',$enviarReporteSemestre)?>
                                <?php if ($reporteA->num_rows > 0) {?>
                                <?php while($rowA = $reporteA->fetch_assoc()) {?>
                                <tr>
                                    <th scope="row"><?php echo $contadorA?></th>
                                    <td><?php echo $rowA["fecha"]?></td>
                                    <td><?php echo $rowA["estado"]?></td>
                                </tr>
                                <?php $contadorA+=1?>
                                <?php }?>
                                <?php }else{?>
                                <tr>
                                    <td colspan="3">
                                        <strong>No existen registros disponibles ...</strong>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <!--FIN TABLA DE ASISTENCIAS-->
                        <br />
                        <!--INICIO TABLA DE ASISTENCIAS TERCER TERCIO-->
                        <div class="card text-white bg-dark mb-3 text-center">
                            <p><strong>Tercer Tercio</strong></p>
                        </div>
                        <table class="table table-hover table-success">
                            <thead>
                                <tr>
                                    <th scope="col">Clase</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $idA=$row["Id"]?>
                                <?php $contadorA=1?>
                                <?php $reporteA=$con->reporte_Asistencia($idA,'Tercer Tercio',$enviarReporteSemestre)?>
                                <?php if ($reporteA->num_rows > 0) {?>
                                <?php while($rowA = $reporteA->fetch_assoc()) {?>
                                <tr>
                                    <th scope="row"><?php echo $contadorA?></th>
                                    <td><?php echo $rowA["fecha"]?></td>
                                    <td><?php echo $rowA["estado"]?></td>
                                </tr>
                                <?php $contadorA+=1?>
                                <?php }?>
                                <?php }else{?>
                                <tr>
                                    <td colspan="3">
                                        <strong>No existen registros disponibles ...</strong>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <!--FIN TABLA DE ASISTENCIAS-->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>