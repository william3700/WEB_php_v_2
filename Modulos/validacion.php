<?php
$username=$_POST["exampleInputEmail1"];
$password=$_POST["exampleInputPassword1"];
if(!empty($username) && !empty($password)){
    header("Location: ../Modulos/principal.php");
}else{
    header("Location: ../index.php");
}

?>