<?php

$usuarioGestion=$_POST["usuarioGestion"];
$correoGestion=$_POST["correoGestion"];
if(!empty($correoGestion) && !empty($usuarioGestion)){
   header("Location: ../Modulos/gestionPersonal.php");
}else{
    header("Location: ../index.php");
}
?>