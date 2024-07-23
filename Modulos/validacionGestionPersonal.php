<?php
session_start();
include("../Conexion/conexionDB.php");
$con=new Conexion();
$usuarioGestion=$_POST["usuarioGestion"];
$claveGestion=$_POST["claveGestion"];
if(!empty($claveGestion) && !empty($usuarioGestion)){
   $_SESSION["usuarioGestion"]=$usuarioGestion;
   $_SESSION["claveGestion"]=$claveGestion;
   $respuesta=$con->verificar_Login_Gestion($claveGestion,$usuarioGestion);
   if($respuesta==1){
        header("Location: ../gestionPersonal/dashboard.php");
   }else{
        header("Location: ../index.php");
   }

}else{
    header("Location: ../index.php");
}
?>