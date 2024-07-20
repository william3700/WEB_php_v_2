<?php
include("../Conexion/conexionDB.php");
$con=new Conexion();
$usuarioGestion=$_POST["usuarioGestion"];
$claveGestion=$_POST["claveGestion"];
if(!empty($claveGestion) && !empty($usuarioGestion)){
   $respuesta=$con->verificar_Login_Gestion($claveGestion,$usuarioGestion);
   if($respuesta==1){
        header("Location: ../Modulos/gestionPersonal.php");
   }else{
        header("Location: ../index.php");
   }

}else{
    header("Location: ../index.php");
}
?>