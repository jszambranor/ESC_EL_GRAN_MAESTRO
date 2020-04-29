<?php
/**
 *
 */
class Alumnos
{
    public function __construct()
    {
    }

    public function delete_Alumno($arg_Cedula)
    {
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
          $query = "DELETE FROM joaquing_db.ALUMNOS WHERE CEDULA = :_CEDULA";
          $stmt = $conexion->prepare($query);
          $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
        } catch (PDOException $e) {
          echo '<script> alert("¡Error! NO SE PUEDE PREPARAR LA CONSULTA")</script>';
          die();
        }

        try {
          if ($stmt->execute()) {
            return 1;
          }else{
            return 0;
          }
        } catch (PDOException $e) {
          $object = null;
          $conexion = null;
          $query = null;
          $stmt = null;
          echo '<script> alert("¡Error! NO SE PUEDO EJECUTAR LA CONSULTA")</script>';
          die();
        }

    }
}
