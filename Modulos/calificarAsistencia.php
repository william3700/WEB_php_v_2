<?php

include("../Conexion/conexionDB.php");
$con=new Conexion();
$id="1";
echo "<h3>Califica asistencia</h3><br/>";
$cantidad_Clases=$con->contar_clases($id,"Primer Tercio");
$cantidad_Asistencia=$con->contar_Asistencia($id,"Primer Tercio");
echo "Cantidad de clases : ".$cantidad_Clases."<br/>";
echo "Cantidad de asistencias : ".$cantidad_Asistencia."<br/>";
echo "La nota es : ".$con->calificar_Asistencia($cantidad_Clases,$cantidad_Asistencia)

?>