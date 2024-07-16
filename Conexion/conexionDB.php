<?php

class Conexion{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $DB="BD_Academica_v_1";
    public $conexion;
    
    function __construct() {
        $this->$conexion=new mysqli("localhost", "root", "","BD_Academica_v_1");
        if ($this->$conexion->connect_error) {
            die("Connection failed: " . $conexion->connect_error);
        }else{
        }
    }

    function mostrar($m){
        return $m;
    }

    function lista_Estudiantes($periodo,$asignatura){
        $result = $this->$conexion->query("SELECT * FROM `Usuarios` WHERE `periodo`='$periodo' AND `asignatura`='$asignatura'");
        return $result;
    }

    function notas_Actividades_Estudiantes($id,$periodo,$tercio,$actividad){
        $result = $this->$conexion->query("SELECT * FROM `Notas` WHERE `Id_estudiante`='$id' AND `tercio`='$tercio' AND `periodo`='$periodo' AND `actividad`='$actividad'");
        while($row = $result->fetch_assoc()) {
            return $row["nota"];
        }
    }

    function promedio_Talleres($t1,$t2,$t3,$to){
      if(empty($to)){
        $resultado=round(($t1+$t2)/2);
      }else{
        if($t1==$t2){
          $resultado=round((max($t1,$to)+$t2)/2);
        }else if($t1>$to && $to>$t2){
          $resultado=round(($t1+$to)/2);
        }else if($t1<$to && $to<$t2){
          $resultado=round(($t2+$to)/2);
        }else if($t1<$to && $t2<$to && $t1<$t2){
          $resultado=round(($t2+$to)/2);
        }else if($t1<$to && $t2<$to && $t2<$t1){
          $resultado=round(($t1+$to)/2);
        }else if($t1>$to && $t2>$to){
          $resultado=round(($t1+$t2)/2);
        }
      }
        if(!empty($resultado)){
            return $resultado;
        }
    }

    function promedio_Talleres_3($t1,$t2,$t3,$to){
      if(empty($to)){
        $resultado=round(($t1+$t2+$t3)/3);
      }else{
        if($t1==$t2 && $t1==$t3){
          $resultado=round((max($t1,$to)+$t2+$t3)/3);
        }else if($t3>$t1 && $t2>$t1 && $to>$t1){
          $resultado=round(($t3+$t2+$to)/3);
        }else if($t3>$t2 && $t1>$t2 && $to>$t2){
          $resultado=round(($t3+$t1+$to)/3);
        }else if($t1>$t3 && $t2>$t3 && $to>$t3){
          $resultado=round(($t2+$t1+$to)/3);
        }else if($t1>$to && $t2>$to && $t3>$to){
          $resultado=round(($t2+$t1+$t3)/3);
        }
      }
        if(!empty($resultado)){
            return $resultado;
        }
    }

    function Definitiva($nt,$nd,$p){
        $resultado=round(0.4*$nt+0.1*$nd+0.5*$p);
        if(!empty($resultado)){
            return $resultado;
        }
    }

    function registrar_Notas($Id_estudiante,$tercio,$actividad,$nota,$periodo){
        $sql = "INSERT INTO `Notas`(`Id_estudiante`, `tercio`, `actividad`, `nota`, `periodo`, `estado`) VALUES ('$Id_estudiante','$tercio','$actividad','$nota','$periodo','1')";
        if ($this->$conexion->query($sql) === TRUE) {
        } else {
        }
    }

    function actualizar_Notas($Id_estudiante,$tercio,$actividad,$nota,$periodo){
        $sql="UPDATE `Notas` SET `nota`='$nota',`estado`='2' WHERE `Id_estudiante`='$Id_estudiante'  AND `tercio`='$tercio'  AND `actividad`='$actividad' AND `periodo`='$periodo'";
        if ($this->$conexion->query($sql) === TRUE) {
        } else {
        }
    }   

    function borrar_Notas($Id_estudiante,$tercio,$actividad,$periodo){
        $sql="DELETE FROM `Notas` WHERE `Id_estudiante`='$Id_estudiante'  AND `tercio`='$tercio'  AND `actividad`='$actividad' AND `periodo`='$periodo'";
        if ($this->$conexion->query($sql) === TRUE) {
        } else {
        }
    }   

    function verificar_Estudiante($Id_estudiante,$tercio,$actividad,$periodo){
        $sql="SELECT * FROM `Notas` WHERE `Id_estudiante`='$Id_estudiante'  AND `tercio`='$tercio'  AND `actividad`='$actividad' AND `periodo`='$periodo'";
        $result = $this->$conexion->query($sql);
        if ($result->num_rows > 0) {
          return 1;
        } else {
          return 0;
        }
    }  

    function lista_asignaturas(){
      $sql="SELECT * FROM `asignaturas`";
      $result = $this->$conexion->query($sql);
      return $result;
    }

    function nombre_Asignatura($id){
      $sql="SELECT * FROM `asignaturas` WHERE `Id`='$id'";
      $result = $this->$conexion->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          return $row["asignacion"];
        }
      } else {
      }
    }

    function crear_Asignaturas($nombre,$grupo){
      $asignacion=$nombre." Grupo ".$grupo;
      $sql = "INSERT INTO `asignaturas`(`nombre`, `grupo`, `asignacion`) VALUES ('$nombre','$grupo','$asignacion')";
      if ($this->$conexion->query($sql) === TRUE) {
      } else {
      }
    }

    function verificar_Asignatura($nombre,$grupo){
      $sql = "SELECT * FROM `asignaturas` WHERE `nombre`='$nombre' AND `grupo`='$grupo'";
      $result = $this->$conexion->query($sql);
      if ($result->num_rows > 0) {
        return 1;
      } else {
        return 0;
      }
    }

    function eliminar_Asignaturas($id){
      $sql = "DELETE FROM `asignaturas` WHERE `Id`='$id'";
      if ($this->$conexion->query($sql) === TRUE) {
      } else {
      }
    }

    function verificar_asignatura_inscritos($id){
      $result = $this->$conexion->query("SELECT * FROM `Usuarios` WHERE `asignatura`='$id'");
      if ($result->num_rows > 0) {
        return 1;
      }else{
        return 0;
      }
    }

    function verificar_Asignatura_Id($nombre,$grupo){
      $sql = "SELECT * FROM `asignaturas` WHERE `nombre`='$nombre' AND `grupo`='$grupo'";
      $result = $this->$conexion->query($sql);
      if ($result->num_rows > 0) {
        return 1;
      } else {
        return 0;
      }
    }

    function actualizar_asignatura($nombre,$grupo,$id){
      $asignacion=$nombre." Grupo ".$grupo;
      $sql = "UPDATE `asignaturas` SET `nombre`='$nombre',`grupo`='$grupo',`asignacion`='$asignacion' WHERE `Id`='$id'";
      if ($this->$conexion->query($sql) === TRUE) {
      } else {
      }
    }

    function registrar_Estudiantes($nombre,$codigo,$programa,$asignatura,$correo,$periodo){
      $sql = "INSERT INTO `Usuarios`(`nombre`, `codigo`, `programa`, `asignatura`, `correo`, `periodo`) VALUES ('$nombre','$codigo','$programa','$asignatura','$correo','$periodo')";
      if ($this->$conexion->query($sql) === TRUE) {
      } else {
      }
  }

  function verificar_Registro_Estudiantes($codigo,$correo,$nombre){
    $sql = "SELECT * FROM `Usuarios` WHERE `codigo`='$codigo' OR `correo`='$correo' OR `nombre`='$nombre'";
    $result = $this->$conexion->query($sql);
    if ($result->num_rows > 0) {
      return 1;
    } else {
      return 0;
    }
  }

  function eliminar_Estudiantes($id){
    $sql = "DELETE FROM `Usuarios` WHERE `Id`='$id'";
    if ($this->$conexion->query($sql) === TRUE) {
    } else {
    }
  }

  function actualizar_Estudiantes($id,$nombre,$codigo,$correo,$programa,$periodo,$asignatura){
    $sql="UPDATE `Usuarios` SET `nombre`='$nombre',`codigo`='$codigo',`programa`='$programa',`asignatura`='$asignatura',`correo`='$correo',`periodo`='$periodo' WHERE `Id`='$id'";
    if ($this->$conexion->query($sql) === TRUE) {  
    } else {
    }
  }

  function buscar_Estudiantes($nombre,$codigo,$correo){
    $sql = "SELECT * FROM `Usuarios` WHERE `codigo`='$codigo' OR `correo`='$correo' OR `nombre`='$nombre'";
    $result = $this->$conexion->query($sql);
    if ($result->num_rows > 0) {
      return 1;
    } else {
      return 0;
    }
  }

  function marcar_Asistencia($id_estudiante,$fecha,$periodo,$etapa,$hora,$semestre){
    $sql="INSERT INTO `Asistencia`(`Id_estudiante`, `fecha`, `periodo`, `estado`, `hora`,`semestre`) VALUES ('$id_estudiante','$fecha','$periodo','$etapa','$hora','$semestre')";
    if ($this->$conexion->query($sql) === TRUE) {
    } else {
    }
  }

  function verificar_Asistencia($id,$periodo,$fecha){
    $sql="SELECT * FROM `Asistencia` WHERE `Id_estudiante`='$id' AND `periodo`='$periodo' AND `fecha`='$fecha'";
    $result = $this->$conexion->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if(strcmp($row["estado"], "Asistencia") == 0){
            return 1;
        }else if(strcmp($row["estado"], "Falla") == 0){
            return 2;
        }
      }
    } else {
      return 0;
    }
  }

  function actualizar_Asistencia($id,$estado){
    $sql = "UPDATE `Asistencia` SET `estado`='$estado' WHERE `Id_estudiante`='$id'";
    if ($this->$conexion->query($sql) === TRUE) {
    } else {
    }
  }

  function contar_Asistencia($id,$periodo){
     $sql = "SELECT * FROM `Asistencia` WHERE `Id_estudiante`='$id' AND `periodo`='$periodo' AND `estado`='Asistencia'";
     $result = $this->$conexion->query($sql);
     $contador=0;
     if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $contador+=1;
      }
      return $contador;
    } else {
      return 0;
    }
  } 

  function contar_clases($id,$periodo){
      $sql = "SELECT * FROM `Asistencia` WHERE `Id_estudiante`='$id' AND `periodo`='$periodo'";
      $result = $this->$conexion->query($sql);
      $contador=0;
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $contador+=1;
      }
      return $contador;
    } else {
    }
  } 

  function calificar_Asistencia($Nclases,$Nasistencia){
    if(!empty($Nclases) && !empty($Nasistencia)){
      return (($Nasistencia/$Nclases)*50);
    }
  }

  function reporte_Asistencia($id,$periodo,$semestre){
    $sql = "SELECT * FROM `Asistencia` WHERE `Id_estudiante`='$id' AND `periodo`='$periodo' AND `semestre`='$semestre'";
    $result = $this->$conexion->query($sql);
    return $result;
  }

  function reporteNotas($id,$tercio,$actividad,$periodo){
      $sql="SELECT * FROM `Notas` WHERE `Id_estudiante`='$id' AND `periodo`='$periodo' AND `actividad`='$actividad' AND `tercio`='$tercio'";
      $result = $this->$conexion->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          return $row["nota"];
        }
      } else {
      }
  }



}

?>