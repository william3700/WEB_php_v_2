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
                        <ol type="I">
                            <li>
                                <p>Nota taller 1 :</p>
                            </li>
                            <li>
                                <p>Nota taller 2 :</p>
                            </li>
                            <li>
                                <p>Nota taller opcional :</p>
                            </li>
                            <li>
                                <p>Nota talleres (40 %) :</p>
                            </li>
                            <li>
                                <p>Nota desempeño (10 %) :</p>
                            </li>
                            <li>
                                <p>Nota parcial (50 %) :</p>
                            </li>
                            <hr />
                            <li>
                                <p>Definitiva (100 %) :</p>
                            </li>
                        </ol>
                    </div>
                    <div class="container">
                        <div class="card text-white bg-dark mb-3 text-center">
                            <p><strong>Segundo Tercio</strong></p>
                        </div>
                        <ol type="I">
                            <li>
                                <p>Nota taller 1 :</p>
                            </li>
                            <li>
                                <p>Nota taller 2 :</p>
                            </li>
                            <li>
                                <p>Nota taller opcional :</p>
                            </li>
                            <li>
                                <p>Nota talleres (40 %) :</p>
                            </li>
                            <li>
                                <p>Nota desempeño (10 %) :</p>
                            </li>
                            <li>
                                <p>Nota parcial (50 %) :</p>
                            </li>
                        </ol>
                    </div>
                    <div class="container">
                        <div class="card text-white bg-dark mb-3 text-center">
                            <p><strong>Tercer Tercio</strong></p>
                        </div>
                        <ol type="I">
                            <li>
                                <p>Nota taller 1 :</p>
                            </li>
                            <li>
                                <p>Nota taller 2 :</p>
                            </li>
                            <li>
                                <p>Nota taller opcional :</p>
                            </li>
                            <li>
                                <p>Nota talleres (40 %) :</p>
                            </li>
                            <li>
                                <p>Nota desempeño (10 %) :</p>
                            </li>
                            <li>
                                <p>Nota parcial (50 %) :</p>
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