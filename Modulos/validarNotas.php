<?php 
session_start();
$datos1=$_POST["datosNotas_1"];
$datos2=$_POST["datosNotas_2"];
if(strcmp($datos1, "Abrir este menú de selección") !== 0 && strcmp($datos2, "Abrir este menú de selección") !== 0){
    $_SESSION["periodo"]=$datos1;
    $_SESSION["asignatura"]=$datos2;
    header("Location: ../Modulos/registroNotasPrimerTercio.php");
}else{
    header("Location: ../Modulos/principal.php");
}


?>