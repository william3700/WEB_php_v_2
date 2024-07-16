<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#exampleModal1<?php echo $row["Id"]?>">
    Ver
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal1<?php echo $row["Id"]?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reporte Notas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <strong>Nombre : </strong><?php echo $row["nombre"]?>
                    </div>
                    <div class="container">
                        <div class="card text-white bg-dark mb-3 text-center">
                            <p><strong>Primer Tercio</strong></p>
                        </div>
                        <?php $nt1_1=$con->reporteNotas($row["Id"],'Primer Tercio','Taller 1',$enviarReporteSemestre)?>
                        <?php $nt2_1=$con->reporteNotas($row["Id"],'Primer Tercio','Taller 2',$enviarReporteSemestre)?>
                        <?php $nto_1=$con->reporteNotas($row["Id"],'Primer Tercio','Taller opcional',$enviarReporteSemestre)?>
                        <?php $np_1=$con->reporteNotas($row["Id"],'Primer Tercio','Parcial',$enviarReporteSemestre)?>
                        <?php $cantidad_Clases_1=$con->contar_clases($row["Id"],"Primer Tercio");?>
                        <?php $cantidad_Asistencia_1=$con->contar_Asistencia($row["Id"],"Primer Tercio");?>
                        <?php $notaAsistencia_1=$con->calificar_Asistencia($cantidad_Clases_1,$cantidad_Asistencia_1)?>
                        <ol type="I">
                            <li>
                                <p>Nota taller 1 : <?php echo $nt1_1?></p>
                            </li>
                            <li>
                                <p>Nota taller 2 : <?php echo $nt2_1?></p>
                            </li>
                            <li>
                                <p>Nota taller opcional : <?php echo $nto_1?></p>
                            </li>
                            <li>
                                <p>Nota talleres (40 %) : <?php echo $con->promedio_Talleres($nt1_1,$nt2_1,0,$nto_1)?>
                                </p>
                            </li>
                            <li>
                                <p>Nota desempeño (10 %) : <?php echo $notaAsistencia_1 ?></p>
                            </li>
                            <li>
                                <p>Nota parcial (50 %) : <?php echo $np_1?></p>
                            </li>
                            <hr />
                            <li>
                                <p>Definitiva (100 %) : <?php echo $con->Definitiva($con->promedio_Talleres($nt1_1,$nt2_1,0,$nto_1),$notaAsistencia_1,$np_1)?></p>
                            </li>
                        </ol>
                    </div>
                    <div class="container">
                        <div class="card text-white bg-dark mb-3 text-center">
                            <p><strong>Segundo Tercio</strong></p>
                        </div>
                        <?php $nt1_2=$con->reporteNotas($row["Id"],'Segundo Tercio','Taller 1',$enviarReporteSemestre)?>
                        <?php $nt2_2=$con->reporteNotas($row["Id"],'Segundo Tercio','Taller 2',$enviarReporteSemestre)?>
                        <?php $nto_2=$con->reporteNotas($row["Id"],'Segundo Tercio','Taller opcional',$enviarReporteSemestre)?>
                        <?php $np_2=$con->reporteNotas($row["Id"],'Segundo Tercio','Parcial',$enviarReporteSemestre)?>
                        <?php $cantidad_Clases_2=$con->contar_clases($row["Id"],"Segundo Tercio");?>
                        <?php $cantidad_Asistencia_2=$con->contar_Asistencia($row["Id"],"Segundo Tercio");?>
                        <?php $notaAsistencia_2=$con->calificar_Asistencia($cantidad_Clases_2,$cantidad_Asistencia_2)?>
                        <ol type="I">
                            <li>
                                <p>Nota taller 1 : <?php echo $nt1_2?></p>
                            </li>
                            <li>
                                <p>Nota taller 2 : <?php echo $nt2_2?></p>
                            </li>
                            <li>
                                <p>Nota taller opcional : <?php echo $nto_2?></p>
                            </li>
                            <li>
                                <p>Nota talleres (40 %) :<?php echo $con->promedio_Talleres($nt1_2,$nt2_2,0,$nto_2)?></p>
                            </li>
                            <li>
                                <p>Nota desempeño (10 %) :<?php echo $notaAsistencia_2 ?></p>
                            </li>
                            <li>
                                <p>Nota parcial (50 %) : <?php echo $np_2?></p>
                            </li>
                            <hr />
                            <li>
                                <p>Definitiva (100 %) : <?php echo $con->Definitiva($con->promedio_Talleres($nt1_2,$nt2_2,0,$nto_2),$notaAsistencia_2,$np_2)?></p>
                            </li>
                        </ol>
                    </div>
                    <div class="container">
                        <div class="card text-white bg-dark mb-3 text-center">
                            <p><strong>Tercer Tercio</strong></p>
                        </div>
                        <?php $nt1_3=$con->reporteNotas($row["Id"],'Tercer Tercio','Taller 1',$enviarReporteSemestre)?>
                        <?php $nt2_3=$con->reporteNotas($row["Id"],'Tercer Tercio','Taller 2',$enviarReporteSemestre)?>
                        <?php $nt3_3=$con->reporteNotas($row["Id"],'Tercer Tercio','Taller 3',$enviarReporteSemestre)?>
                        <?php $nto_3=$con->reporteNotas($row["Id"],'Tercer Tercio','Taller opcional',$enviarReporteSemestre)?>
                        <?php $np_3=$con->reporteNotas($row["Id"],'Tercer Tercio','Parcial',$enviarReporteSemestre)?>
                        <?php $cantidad_Clases_3=$con->contar_clases($row["Id"],"Tercer Tercio");?>
                        <?php $cantidad_Asistencia_3=$con->contar_Asistencia($row["Id"],"Tercer Tercio");?>
                        <?php $notaAsistencia_3=$con->calificar_Asistencia($cantidad_Clases_3,$cantidad_Asistencia_3)?>
                        <ol type="I">
                            <li>
                                <p>Nota taller 1 : <?php echo $nt1_3?></p>
                            </li>
                            <li>
                                <p>Nota taller 2 : <?php echo $nt2_3?></p>
                            </li>
                            <li>
                                <p>Nota taller 3 : <?php echo $nt3_3?></p>
                            </li>
                            <li>
                                <p>Nota taller opcional : <?php echo $nto_3?></p>
                            </li>
                            <li>
                                <p>Nota talleres (40 %) : <?php echo $con->promedio_Talleres_3($nt1_3,$nt2_3,$nt3_3,$nto_3)?></p>
                            </li>
                            <li>
                                <p>Nota desempeño (10 %) : <?php echo $notaAsistencia_3?></p>
                            </li>
                            <li>
                                <p>Nota parcial (50 %) : <?php echo $np_3?></p>
                            </li>
                            <hr />
                            <li>
                                <p>Definitiva (100 %) : <?php echo $con->Definitiva($con->promedio_Talleres($nt1_3,$nt2_3,$nt3_3,$nto_3),$notaAsistencia_3,$np_3)?></p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>