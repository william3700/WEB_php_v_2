<?php
session_start();
$registroAsistencia_semestre=$_POST["registroAsistencia_semestre"];
$registroAsistencia_periodo=$_POST["registroAsistencia_periodo"];
$registroAsistencia_asignatura=$_POST["registroAsistencia_asignatura"];
if(strcmp($registroAsistencia_semestre, "Abrir este menú de selección") !== 0 && strcmp($registroAsistencia_periodo, "Abrir este menú de selección") !== 0 && strcmp($registroAsistencia_asignatura, "Abrir este menú de selección") !== 0){
    $_SESSION["registroAsistencia_semestre"]=$registroAsistencia_semestre;
    $_SESSION["registroAsistencia_periodo"]=$registroAsistencia_periodo;
    $_SESSION["registroAsistencia_asignatura"]=$registroAsistencia_asignatura;
    header("Location: ../Modulos/registroAsistencia.php");
}else{
    header("Location: ../Modulos/principal.php");
}
?>