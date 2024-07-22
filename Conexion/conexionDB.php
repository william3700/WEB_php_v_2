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


  function crear_Proveedor($nombre,$direccion){
    $referencia=$nombre."  ".$direccion;
    $sql = "INSERT INTO `Proveedores`(`nombre`, `direccion`, `referencia`) VALUES ('$nombre','$direccion','$referencia')";
    if ($this->$conexion->query($sql) === TRUE) {
    } else {
    }
  }

  function lista_proveedores(){
    $sql="SELECT * FROM `Proveedores`";
    $result = $this->$conexion->query($sql);
    return $result;
  }

  function eliminar_proveedores($id){
    $sql = "DELETE FROM `Proveedores` WHERE `Id`='$id'";
    if ($this->$conexion->query($sql) === TRUE) {
    } else {
    }
  }

  function actualizar_proveedor($id,$nombre,$direccion){
    $referencia=$nombre."  ".$direccion;
    $sql = "UPDATE `Proveedores` SET `nombre`='$nombre',`direccion`='$direccion',`referencia`='$referencia' WHERE `Id`='$id'";
    if ($this->$conexion->query($sql) === TRUE) {
    } else {
    }
  }

  function crear_Categorias($nombre){
    $sql = "INSERT INTO `Categorias`(`nombre`) VALUES ('$nombre')";
    if ($this->$conexion->query($sql) === TRUE) {
    } else {
    }
  }

  function lista_categorias(){
    $sql="SELECT * FROM `Categorias`";
    $result = $this->$conexion->query($sql);
    return $result;
  }

  function eliminar_categorias($id){
    $sql = "DELETE FROM `Categorias` WHERE `Id`='$id'";
    if ($this->$conexion->query($sql) === TRUE) {
    } else {
    }
  }

  function actualizar_categoria($id,$nombre){
    $sql = "UPDATE `Categorias` SET `nombre`='$nombre' WHERE `Id`='$id'";
    if ($this->$conexion->query($sql) === TRUE) {
    } else {
    }
  }

  function crear_Productos($nombre){
    $sql = "INSERT INTO `Productos`(`nombre`) VALUES ('$nombre')";
    if ($this->$conexion->query($sql) === TRUE) {
    } else {
    }
  }

  function lista_productos(){
    $sql="SELECT * FROM `Productos`";
    $result = $this->$conexion->query($sql);
    return $result;
  }

  function eliminar_productos($id){
    $sql = "DELETE FROM `Productos` WHERE `Id`='$id'";
    if ($this->$conexion->query($sql) === TRUE) {
    } else {
    }
  }

  function actualizar_productos($id,$nombre){
    $sql = "UPDATE `Productos` SET `nombre`='$nombre' WHERE `Id`='$id'";
    if ($this->$conexion->query($sql) === TRUE) {
    } else {
    }
  }

  function crear_Usuarios_gestion($nombre){
    $sql = "INSERT INTO `Usuarios_gestion`(`nombre`) VALUES ('$nombre')";
    if ($this->$conexion->query($sql) === TRUE) {
    } else {
    }
  }

  function lista_Usuarios_gestion(){
    $sql="SELECT * FROM `Usuarios_gestion`";
    $result = $this->$conexion->query($sql);
    return $result;
  }

  function eliminar_Usuarios_gestion($id){
    $sql = "DELETE FROM `Usuarios_gestion` WHERE `Id`='$id'";
    if ($this->$conexion->query($sql) === TRUE) {
    } else {
    }
  }

  function actualizar_Usuarios_gestion($id,$nombre){
    $sql = "UPDATE `Usuarios_gestion` SET `nombre`='$nombre' WHERE `Id`='$id'";
    if ($this->$conexion->query($sql) === TRUE) {
    } else {
    }
  }

  function verificar_Login_Gestion($clave,$usuario){
    $sql="SELECT * FROM `administrador` WHERE `correo`='$usuario' AND `clave`='$clave'";
    $result = $this->$conexion->query($sql);
    if ($result->num_rows > 0) {
      return 1;
    } else {
      return 0;
    }
}  


function mes($mes){
  switch($mes){
    case 1:
        return 'Enero';
        break;
    case 2:
        return 'Febrero';
        break;
    case 3:
        return 'Marzo';
        break;
    case 4:
        return 'Abril';
        break;
    case 5:
        return 'Mayo';
        break;                  
    case 6:
        return 'Junio';
        break;
    case 7:
        return 'Julio';
        break;        
  }

}

function registrar_Gasto($producto,$costo,$cantidad,$proveedor,$categoria,$usuario,$fecha,$mes){
  $sql = "INSERT INTO `Gastos`(`producto`, `costo`, `cantidad`, `proveedor`, `categoria`, `usuario`, `fecha`, `mes`) VALUES ('$producto','$costo','$cantidad','$proveedor','$categoria','$usuario','$fecha','$mes')";
  if ($this->$conexion->query($sql) === TRUE) {
  } else {
  }
}

function lista_Gastos(){
  $sql="SELECT * FROM `Gastos`";
  $result = $this->$conexion->query($sql);
  return $result;
}

function suma_gastos_totales(){
  $sql="SELECT * FROM `Gastos`";
  $result = $this->$conexion->query($sql);
  $resultado=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $resultado+=$row["costo"];
    }
    return $resultado;
  } else {
    return 0;
  }
}

function lista_productos_nombre($id){
  $sql="SELECT * FROM `Productos` WHERE `Id`='$id'";
  $result = $this->$conexion->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      return $row["nombre"];
    }
  } else {
    echo "Producto no encontrado ...";
  }
}

function lista_proveedor_nombre($id){
  $sql="SELECT * FROM `Proveedores` WHERE `Id`='$id'";
  $result = $this->$conexion->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      return $row["referencia"];
    }
  } else {
    echo "Producto no encontrado ...";
  }
}

function lista_categoria_nombre($id){
  $sql="SELECT * FROM `Categorias` WHERE `Id`='$id'";
  $result = $this->$conexion->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      return $row["nombre"];
    }
  } else {
    echo "Producto no encontrado ...";
  }
}

function lista_usuario_gestion_nombre($id){
  $sql="SELECT * FROM `Usuarios_gestion` WHERE `Id`='$id'";
  $result = $this->$conexion->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      return $row["nombre"];
    }
  } else {
    echo "Producto no encontrado ...";
  }
}

function nombre_Categoria($id){
  $sql="SELECT * FROM `Categorias` WHERE `Id`='$id'";
  $result = $this->$conexion->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      return $row["nombre"];
    }
  } else {
    return "Categoria no encontrado ...";
  }
}

function nombre_Producto($id){
  $sql="SELECT * FROM `Productos` WHERE `Id`='$id'";
  $result = $this->$conexion->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      return $row["nombre"];
    }
  } else {
    return "Categoria no encontrado ...";
  }
}


function nombre_Usuario_Gestion($id){
  $sql="SELECT * FROM `Usuarios_gestion` WHERE `Id`='$id'";
  $result = $this->$conexion->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      return $row["nombre"];
    }
  } else {
    return "Categoria no encontrado ...";
  }
}

function nombre_Proveedor($id){
  $sql="SELECT * FROM `Proveedores` WHERE `Id`='$id'";
  $result = $this->$conexion->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      return $row["referencia"];
    }
  } else {
    return "Categoria no encontrado ...";
  }
}

function eliminar_Registro_Gestion($id){
  $sql = "DELETE FROM `Gastos` WHERE `Id`='$id'";
  if ($this->$conexion->query($sql) === TRUE) {
  } else {
  }
}

function lista_Usuarios_Gastos(){
  $sql="SELECT * FROM `Usuarios_gestion`";
  $result = $this->$conexion->query($sql);
  return $result;
}

function actualizar_Gastos($id,$producto,$costo,$cantidad,$proveedor,$categoria,$usuario){
  $sql = "UPDATE `Gastos` SET `producto`='$producto',`costo`='$costo',`cantidad`='$cantidad',`proveedor`='$proveedor',`categoria`='$categoria',`usuario`='$usuario' WHERE `Id`='$id'";
  if ($this->$conexion->query($sql) === TRUE) {
  } else {
  }
}


//CONSULTAS PARA EL DASHBOARD

function total_servicio_publicos($var){
  $sql = "SELECT * FROM `Gastos` WHERE `categoria`='$var'";
  $result = $this->$conexion->query($sql);
  $total=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $total+=$row["costo"];
    }
  } else {
    $total=0;
  }
  return $total;
}

function total_mercado($var){
  $sql = "SELECT * FROM `Gastos` WHERE `categoria`='$var'";
  $result = $this->$conexion->query($sql);
  $total=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $total+=$row["costo"];
    }
  } else {
    $total=0;
  }
  return $total;
}

function total_entretenimiento($var){
  $sql = "SELECT * FROM `Gastos` WHERE `categoria`='$var'";
  $result = $this->$conexion->query($sql);
  $total=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $total+=$row["costo"];
    }
  } else {
    $total=0;
  }
  return $total;
}


function total_servicio_publicos_x_mes($var,$mes){
  $sql = "SELECT * FROM `Gastos` WHERE `categoria`='$var' AND `mes`='$mes'";
  $result = $this->$conexion->query($sql);
  $total=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $total+=$row["costo"];
    }
  } else {
    $total=0;
  }
  return $total;
}

function total_mercado_x_mes($var,$mes){
  $sql = "SELECT * FROM `Gastos` WHERE `categoria`='$var' AND `mes`='$mes'";
  $result = $this->$conexion->query($sql);
  $total=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $total+=$row["costo"];
    }
  } else {
    $total=0;
  }
  return $total;
}

function gasto_total_entretenimiento($var){
  $sql = "SELECT * FROM `Gastos` WHERE `producto`='$var'";
  $result = $this->$conexion->query($sql);
  $total=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $total+=$row["costo"];
    }
  } else {
    $total=0;
  }
  return $total;
}

function total_entretenimiento_x_mes($var,$mes){
  $sql = "SELECT * FROM `Gastos` WHERE `categoria`='$var' AND `mes`='$mes'";
  $result = $this->$conexion->query($sql);
  $total=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $total+=$row["costo"];
    }
  } else {
    $total=0;
  }
  return $total;
}


function total_servicio_publico_diferencial_x_mes($var,$mes){
  $sql = "SELECT * FROM `Gastos` WHERE `producto`='$var' AND `mes`='$mes'";
  $result = $this->$conexion->query($sql);
  $total=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $total+=$row["costo"];
    }
  } else {
    $total=0;
  }
  return $total;
}

function registro_gastos_x_usuario($usuario){
  $sql = "SELECT * FROM `Gastos` WHERE `usuario`='$usuario'";
  $result = $this->$conexion->query($sql);
  return $result;
}

function suma_gastos_x_usuario($usuario,$var){
  $sql="SELECT * FROM `Gastos` WHERE `usuario`='$usuario' AND `categoria`='$var'";
  $result = $this->$conexion->query($sql);
  $resultado=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $resultado+=$row["costo"];
    }
    return $resultado;
  } else {
    return 0;
  }
}

function suma_gastos_totales_x_usuario($usuario){
  $sql="SELECT * FROM `Gastos` WHERE `usuario`='$usuario'";
  $result = $this->$conexion->query($sql);
  $resultado=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $resultado+=$row["costo"];
    }
    return $resultado;
  } else {
    return 0;
  }
}


}

?>