<?php
session_start();
include("../Conexion/conexionDB.php");
$con=new Conexion();
$username=$_POST["exampleInputEmail1"];
$password=$_POST["exampleInputPassword1"];
if(!empty($username) && !empty($password)){
    $_SESSION["correoUsuarioValidacion"]=$username;
    $_SESSION["claveUsuarioValidacion"]=$password;
    $respuesta=$con->verificar_Login_Gestion($password,$username);
    if($respuesta==1){
        header("Location: principal.php");
    }else{
        header("Location: ../index.php");
    }
}else{
    header("Location: ../index.php");
}

?>