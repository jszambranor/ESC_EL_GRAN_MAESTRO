<?php
/**
 *
 */
class NuevasMatriculas
{
    public function __construct()
    {
    }

    public function get_Datos_Alumnos($arg_Cedula)
    {
        try {
            $object = new Conexion();
            $conexion = $object->get_Conexion();
        } catch (PDOException $e) {
            echo '<script> alert("¡Error! NO SE PUEDE INSTANCIAR LA CONEXION")</script>';
            die();
        }

        try {
            $query = "SELECT CEDULA,CEDULA_REPR FROM maestro_db.ALUMNOS_PRE WHERE CEDULA = :_CEDULA";
            $stmt=$conexion->prepare($query);
            $stmt->bindParam(':_CEDULA', $arg_Cedula, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo '<script> alert("¡Error! NO SE PUEDE PREPARA LA CONSULTA")</script>';
            die();
        }

        if (isset($stmt)) {
            if ($stmt->execute()) {
                $data = $stmt->fetch();
                return ($data);
            } else {
                echo '<script> alert("¡Error! NO SE PUEDE EJECUTAR LA CONSULTA")</script>';
            }
        } else {
            echo '<script> alert("¡Error! CONSULTA VACIA")</script>';
        }
    }

    public function listar_Alumnos($cod_Curso)
    {
        try {
            $object = new Conexion();
            $conexion = $object->get_Conexion();
        } catch (PDOException $e) {
            echo '<script> alert("¡Error! NO SE PUEDE INSTANCIAR LA CONEXION")</script>';
            die();
        }

        try {
            $query = 'SELECT CEDULA,FOTO,NOMBRES,APELLIDOS,COD_CURSO FROM maestro_db.PERSONAS_PRE,maestro_db.MATRICULAS_PRE WHERE CEDULA = CEDULA_ALUMNO AND COD_CURSO = :_CURSO';
            $stmt=$conexion->prepare($query);
            $stmt->bindParam(':_CURSO', $cod_Curso);
        } catch (PDOException $e) {
            echo '<script> alert("¡Error! NO SE PUEDE ENVIAR PARAMETROS A LA CONSULTA")</script>';
            die();
        }

        try {
            $cadena ="";
            if (isset($stmt)) {
                if ($stmt->execute()) {
                    while ($data = $stmt->fetch()) {
                        $cadena = $cadena.'
                      <tr>
                      <td><img id="img_alum" src="../../images/alumnos/'.$data["FOTO"].'"/></td>
                      <td>'.$data["CEDULA"].'</td>
                      <td>'.$data["APELLIDOS"].'</td>
                      <td>'.$data["NOMBRES"].'</td>
                      <td><a id="name_al" href="./nuevo_alumno_matricula.php?cedula='.$data["CEDULA"].'"><img id="img_op" src ="../../images/icons/lista-de-verificacion.png"/></a></td>
                      </tr>
                      ';
                    }
                    return ($cadena);
                } else {
                    echo '<script> alert("¡Error! NO SE PUEDE EJECUTAR LA CONSULTA")</script>';
                    die();
                }
            } else {
                echo '<script> alert("¡Error! CONSULTA VACIA INTENTE NUEVAMENTE")</script>';
                die();
            }
        } catch (PDOException $e) {
            echo '<script> alert("¡Error! NO SE PUEDE EJECUTAR LA CONSULTA --> '.$e->getMessage().'")</script>';
            die();
        }
    }

    public function get_Cursos()
    {
        try {
            $object = new Conexion();
            $conexion = $object->get_Conexion();
        } catch (PDOException $e) {
            echo '<script> alert("¡Error! NO SE PUEDE INSTANCIAR LA CONEXION")</script>';
            die();
        }

        try {
            $query = "SELECT * FROM joaquing_db.CURSOS";
            $stmt = $conexion->prepare($query);
            $stmt->execute();
            $cadena  = "";
            $contador = 0;
            while ($data = $stmt->fetch()) {
                $contador++;
                $cadena = $cadena.'
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="../../../img/logo.jpeg" style="height:150px">
            </div>
            <div class="card-content">
              <span class="card-title activator white-text text-darken-4">'.$data['NOMBRE_CURSO'].'<i class="material-icons right">send</i></span>
              <p><a href="./lista_alumnos_matricula.php?COD_CURSO='.$data['COD_CURSO'].'">LISTA DE ALUMNOS</a></p>
            </div>
          </div>
          ';
            }

            if (isset($data)) {
                return ($cadena);
            } else {
                echo '<script> alert("¡Error! NO SE PUEDE LISTAR LOS CURSOS")</script>';
            }
        } catch (PDOException $e) {
        }
    }

    public function new_Matricula($arg_Cedula,$arg_Paralelo)
    {
      try {
          $object = new Conexion();
          $conexion = $object->get_Conexion();
      } catch (PDOException $e) {
          echo '<script> alert("¡Error! NO SE PUEDE INSTANCIAR LA CONEXION")</script>';
          die();
      }

      try {
        $query = "CALL maestro_db.MATRICULAS(:_CEDULA,:_PARALELO)";
      } catch (PDOException $e) {
        echo '<script> alert("¡Error! NO SE CREAR LA CONSULTA")</script>';
      }

      try {
        $stmt = $conexion->prepare($query);
      } catch (PDOException $e) {
        echo '<script> alert("¡Error! NO SE PUEDE PREPARAR LA CONSULTA")</script>';
      }

      try {
        $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
        $stmt->bindParam(':_PARALELO',$arg_Paralelo,PDO::PARAM_STR);
      } catch (PDOException $e) {
        echo '<script> alert("¡Error! NO SE PUEDE ENVIAR LOS PARAMETROS A LA CONSULTA")</script>';
      }

      if (isset($stmt)) {
        if ($stmt->execute()) {
          return 1;
        }else{
          return 0;
        }
      }else{
        return 2;
      }

    }

    public function cursoMatricula($arg_Cedula)
    {
      try {
          $object = new Conexion();
          $conexion = $object->get_Conexion();
      } catch (PDOException $e) {
          echo '<script> alert("¡Error! NO SE PUEDE INSTANCIAR LA CONEXION")</script>';
          die();
      }

      try {
        $query="SELECT COD_CURSO FROM maestro_db.MATRICULAS WHERE CEDULA_ALUMNO = :_CEDULA";
      } catch (PDOException $e) {
        echo '<script> alert("¡Error! NO SE PUEDE CREAR LA CONSULTA")</script>';
      }

      try {
        $stmt = $conexion->prepare($query);
      } catch (PDOException $e) {
        echo '<script> alert("¡Error! NO SE PUEDE PREPARAR LA CONSULTA")</script>';
      }

      try {
        $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
      } catch (PDOException $e) {
        echo '<script> alert("¡Error! NO SE PUEDE ENVIAR PARAMETROS A LA CONSULTA")</script>';
      }

      if (isset($stmt)) {
        if ($stmt->execute()) {
          $data = $stmt->fetch();
          return $data;
        }
        return null;
      }else {
        return null;
      }
    }
}
