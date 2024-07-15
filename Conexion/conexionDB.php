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
        $resultado=round(($t1+$t2)/2);
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

  function verificar_Asistencia($id,$periodo){
    $sql="SELECT * FROM `Asistencia` WHERE `Id_estudiante`='$id' AND `periodo`='$periodo'";
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




}

?>