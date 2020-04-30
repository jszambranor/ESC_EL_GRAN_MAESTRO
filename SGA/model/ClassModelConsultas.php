<?php /**
 *
 */
class Consultas
{
    public function __construct()
    {
    }

    public function get_Datos($arg_Cedula)
    {
        try {
            try {
                $object = new Conexion();
                $conexion = $object->get_Conexion();
            } catch (PDOException $e) {
                $object = null;
                $conexion = null;
                echo '<script> alert("¡Error! NO SE PUEDE INSTANCIAR LA CONEXION")</script>';
                die();
            }

            try {
                $query = "SELECT * FROM maestro_db.PERSONAS_PRE WHERE CEDULA = :_CEDULA";
                $stmt = $conexion->prepare($query);
                $stmt->bindParam(':_CEDULA', $arg_Cedula, PDO::PARAM_STR);
            } catch (PDOException $e) {
                $object = null;
                $conexion = null;
                $query = null;
                $stmt = null;
                echo '<script> alert("¡Error! NO SE PUEDO ENVIAR LOS PARAMETROS A LA CONSULTA")</script>';
                die();
            }

            try {
                if (isset($stmt)) {
                    if ($stmt->execute()) {
                        $data = $stmt->fetch();
                        $stmt = null;
                        return $data;
                    } else {
                        $stmt = null;
                        echo '<script> alert("¡Error! NO SE PUEDE EJECUTAR LA CONSULTA")</script>';
                        die();
                    }
                } else {
                    $stmt = null;
                    echo '<script> alert("¡Error! CONSULTA VACIA")</script>';
                    die();
                }
            } catch (PDOException $e) {
                $object = null;
                $conexion = null;
                $query = null;
                $stmt = null;
                echo '<script> alert("¡Error! NO SE PUEDO EJECUTAR LA CONSULTA")</script>';
                die();
            }
        } catch (PDOException $e) {
            $object = null;
            $conexion = null;
            $query = null;
            $stmt = null;
            echo '<script> alert("¡Error! -> "'.$e->getMessage().')</script>';
            die();
        }
    }

    public function get_Cursos()
    {
      try {
        $object = new Conexion();
        $conexion = $object->get_Conexion();
      } catch (PDOException $e) {
        echo '<script> alert("¡Error! NO SE PUEDO OBTENER LA CONEXION A LA BASE DE DATOS")</script>';
        die();
      }
      try {
        $query = "SELECT * FROM joaquing_db.CURSOS";
        $stmt = $conexion->prepare($query);
      } catch (PDOException $e) {
        echo '<script> alert("¡Error! NO SE PUEDO PREPARAR LA CONSULTA PARA OBTENER LOS CURSOS")</script>';
        die();
      }

      try {
        if ($stmt->execute()) {
          //$cursos = "";
          while ($data = $stmt->fetch()) {
            $cursos= $cursos."<option value='".
              $data['COD_CURSO']."'>".
              $data['NOMBRE_CURSO']."
              </option>";
          }
          if (isset($data)) {
            if (isset($cursos)) {
              return $cursos;
            }else {
              return "<option>NO HAY CURSOS</option>";
            }
          }else {
            return "<option>NO HAY CURSOS</option>";
          }
        }else {
            echo '<script> alert("¡Error! NO SE PUEDO OBTENER LOS CURSOS")</script>';
        }
      } catch (PDOException $e) {
        echo '<script> alert("¡Error! -> "'.$e->getMessage().'")</script>';
      }

    }

    public function get_Catedras($arg_Cedula,$arg_Curso)
    {
      $object = new Conexion();
      $conexion = $object->get_Conexion();
      $query = "SELECT * FROM joaquing_db.DOCENTES WHERE CEDULA = :_CEDULA";
      $stmt=$conexion->prepare($query);
      $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
      $stmt->execute();
      $data = $stmt->fetch();

      if ($data['COD_CURSO'] == '01' && $data['COD_CURSO'] == '02' && $data['COD_CURSO'] == '1RO') {
        $curso = '01';
      }elseif($data['COD_CURSO'] == '2DO' && $data['COD_CURSO'] == '3RO' && $data['COD_CURSO'] == '4TO' && $data['COD_CURSO'] == '5TO' && $data['COD_CURSO'] == '6TO' && $data['COD_CURSO'] == '7MO'){
        $curso = '2-7';
      }
      $query = "SELECT * FROM joaquing_db.CATEDRAS WHERE CODIGO = $curso";
      $stmt1=$conexion->prepare($query);
      $stmt1->execute();
      $cadena = "";
      while ($data1 = $stmt->fetch()) {
        $cadena = $cadena.'
        <div class="card">
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">'.$data1['NOMBRE_CATEDRA'].'<i class="material-icons right">send</i></span>
          <p><a href="./calificaciones_catedras.php?codigo = '.$data['COD_CURSO'].'&paralelo'.$data['COD_PARALELO'].'">REGISTRAR NOTAS</a></p>
        </div>
        </div>
        ';
      }
      return $cadena;
    }

    public function get_Alumnos_Q1_P1($arg_Curso, $arg_Paralelo)
    {
      $objeto = new Conexion();
      $conexion = $objeto->get_Conexion();
      $query = "SELECT CEDULA_ALUMNO, NOMBRES, APELLIDOS FROM joaquing_db.MATRICULAS, joaquing_db.PERSONAS WHERE COD_CURSO = :_CURSO AND COD_PARALELO = :_PARALELO AND  CEDULA = CEDULA_ALUMNO ";
      $stmt = $conexion->prepare($query);
      $stmt->bindParam(':_CURSO',$arg_Curso,PDO::PARAM_STR);
      $stmt->bindParam(':_PARALELO',$arg_Paralelo,PDO::PARAM_STR);
      $stmt->execute();
      $cadena = "";
      while ($data=$stmt->fetch()) {
        $cadena=$cadena.'
        <div id="alumnos" class="row card-panel">
          <div class="img">
            <img src="../../images/alumnos/img'.$data['FOTO'].' alt="">
          </div>
          <div class="nombres">
            <p>'.$data["NOMBRES"]." ".$data["APELLIDOS"].'</p>
          </div>
          <div class="nombres">
          <a class="waves-effect waves-light btn" href="./notas_alumnos.php?CEDULA_ALUMNO='.$data["CEDULA_ALUMNO"].'&COD_LECTIVO='.$data["COD_LECTIVO"].'&COD_QUIMESTRE=1&COD_PARCIAL=1">VER NOTAS</a>
          </div>
        </div>
        ';
      }
    }

    public function get_Alumnos_Q1_P2($arg_Curso, $arg_Paralelo)
    {
      $objeto = new Conexion();
      $conexion = $objeto->get_Conexion();
      $query = "SELECT CEDULA_ALUMNO, NOMBRES, APELLIDOS FROM joaquing_db.MATRICULAS, joaquing_db.PERSONAS WHERE COD_CURSO = :_CURSO AND COD_PARALELO = :_PARALELO AND  CEDULA = CEDULA_ALUMNO ";
      $stmt = $conexion->prepare($query);
      $stmt->bindParam(':_CURSO',$arg_Curso,PDO::PARAM_STR);
      $stmt->bindParam(':_PARALELO',$arg_Paralelo,PDO::PARAM_STR);
      $stmt->execute();
      $cadena = "";
      while ($data=$stmt->fetch()) {
        $cadena=$cadena.'
        <div id="alumnos" class="row card-panel">
          <div class="img">
            <img src="../../images/alumnos/img'.$data['FOTO'].' alt="">
          </div>
          <div class="nombres">
            <p>'.$data["NOMBRES"]." ".$data["APELLIDOS"].'</p>
          </div>
          <div class="nombres">
          <a class="waves-effect waves-light btn" href="./notas_alumnos.php?CEDULA_ALUMNO='.$data["CEDULA_ALUMNO"].'&COD_LECTIVO='.$data["COD_LECTIVO"].'&COD_QUIMESTRE=1&COD_PARCIAL=2">VER NOTAS</a>
          </div>
        </div>
        ';
      }
    }

    public function get_Alumnos_Q2_P1($arg_Curso, $arg_Paralelo)
    {
      $objeto = new Conexion();
      $conexion = $objeto->get_Conexion();
      $query = "SELECT CEDULA_ALUMNO, NOMBRES, APELLIDOS FROM joaquing_db.MATRICULAS, joaquing_db.PERSONAS WHERE COD_CURSO = :_CURSO AND COD_PARALELO = :_PARALELO AND  CEDULA = CEDULA_ALUMNO ";
      $stmt = $conexion->prepare($query);
      $stmt->bindParam(':_CURSO',$arg_Curso,PDO::PARAM_STR);
      $stmt->bindParam(':_PARALELO',$arg_Paralelo,PDO::PARAM_STR);
      $stmt->execute();
      $cadena = "";
      while ($data=$stmt->fetch()) {
        $cadena=$cadena.'
        <div id="alumnos" class="row card-panel">
          <div class="img">
            <img src="../../images/alumnos/img'.$data['FOTO'].' alt="">
          </div>
          <div class="nombres">
            <p>'.$data["NOMBRES"]." ".$data["APELLIDOS"].'</p>
          </div>
          <div class="nombres">
          <a class="waves-effect waves-light btn" href="./notas_alumnos.php?CEDULA_ALUMNO='.$data["CEDULA_ALUMNO"].'&COD_LECTIVO='.$data["COD_LECTIVO"].'&COD_QUIMESTRE=2&COD_PARCIAL=1">VER NOTAS</a>
          </div>
        </div>
        ';
      }
    }

    public function get_Alumnos_Q2_P2($arg_Curso, $arg_Paralelo)
    {
      $objeto = new Conexion();
      $conexion = $objeto->get_Conexion();
      $query = "SELECT CEDULA_ALUMNO, NOMBRES, APELLIDOS FROM joaquing_db.MATRICULAS, joaquing_db.PERSONAS WHERE COD_CURSO = :_CURSO AND COD_PARALELO = :_PARALELO AND  CEDULA = CEDULA_ALUMNO ";
      $stmt = $conexion->prepare($query);
      $stmt->bindParam(':_CURSO',$arg_Curso,PDO::PARAM_STR);
      $stmt->bindParam(':_PARALELO',$arg_Paralelo,PDO::PARAM_STR);
      $stmt->execute();
      $cadena = "";
      while ($data=$stmt->fetch()) {
        $cadena=$cadena.'
        <div id="alumnos" class="row card-panel">
          <div class="img">
            <img src="../../images/alumnos/img'.$data['FOTO'].' alt="">
          </div>
          <div class="nombres">
            <p>'.$data["NOMBRES"]." ".$data["APELLIDOS"].'</p>
          </div>
          <div class="nombres">
          <a class="waves-effect waves-light btn" href="./notas_alumnos.php?CEDULA_ALUMNO='.$data["CEDULA_ALUMNO"].'&COD_LECTIVO='.$data["COD_LECTIVO"].'&COD_QUIMESTRE=2&COD_PARCIAL=2">VER NOTAS</a>
          </div>
        </div>
        ';
      }
    }
}
