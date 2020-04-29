<?php
/**
 *
 */
class Docentes
{
    public function __construct()
    {
    }

    public function delete_Docentes($arg_Cedula)
    {
        try {
            $object = new Conexion();
            $copnexion = $object->get_Conexion();
        } catch (PDOException $e) {
            $object = null;
            $conexion = null;
            echo '<script> alert("¡Error! NO SE PUEDE INSTANCIAR LA CONEXION")</script>';
            die();
        }

        try {
          $query = "DELETE FROM joaquing_db.DOCENTES WHERE CEDULA = :_CEDULA";
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

    public function set_Docentes($arg_Curso,$arg_Cedula,$arg_Foto,$arg_Nombres,$arg_Apellidos,$arg_Fecha,$arg_Edad,$arg_Nacionalidad,$arg_Direccion,$arg_Telefono,$arg_Correo,$arg_Ocupacion,$arg_Profesion,$arg_Nivel,$arg_Whatsapp)
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
          $query = "SELECT joaquing_db.NEW_DOCENTE(:_Curso,:_Cedula,:_Foto,:_Nombres,:_Apellidos,:_Fecha,:_Edad,:_Nacionalidad,:_Direccion,:_Telefono,:_Correo,:_Ocupacion,:_Profesion,:_Nivel,:_Whatsapp)";
          $stmt = $conexion->prepare($query);
          $stmt->bindParam(':_Curso', $arg_Curso, PDO::PARAM_STR);
          $stmt->bindParam(':_Cedula', $arg_Cedula, PDO::PARAM_STR);
          $stmt->bindParam(':_Foto', $arg_Foto, PDO::PARAM_STR);
          $stmt->bindParam(':_Nombres', $arg_Nombres, PDO::PARAM_STR);
          $stmt->bindParam(':_Apellidos', $arg_Apellidos, PDO::PARAM_STR);
          $stmt->bindParam(':_Fecha', $arg_Fecha, PDO::PARAM_STR);
          $stmt->bindParam(':_Edad', $arg_Edad, PDO::PARAM_STR);
          $stmt->bindParam(':_Nacionalidad', $arg_Nacionalidad, PDO::PARAM_STR);
          $stmt->bindParam(':_Direccion', $arg_Direccion, PDO::PARAM_STR);
          $stmt->bindParam(':_Telefono', $arg_Telefono, PDO::PARAM_STR);
          $stmt->bindParam(':_Correo', $arg_Correo, PDO::PARAM_STR);
          $stmt->bindParam(':_Ocupacion', $arg_Ocupacion, PDO::PARAM_STR);
          $stmt->bindParam(':_Profesion', $arg_Profesion, PDO::PARAM_STR);
          $stmt->bindParam(':_Nivel', $arg_Nivel, PDO::PARAM_STR);
          $stmt->bindParam(':_Whatsapp', $arg_Whatsapp, PDO::PARAM_STR);

          if (isset($stmt)) {
            if ($stmt->execute()) {
              return 1;
            }else {
              $object = null;
              $conexion = null;
              $query = null;
              $stmt = null;
              echo '<script> alert("¡Error! -> NO SE PUEDE EJECUTAR LA CONSULTA")</script>';
              return 0;
            }
          }else {
            $object = null;
            $conexion = null;
            $query = null;
            $stmt = null;
            echo '<script> alert("¡Error! -> CONSULTA VACIA")</script>';
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


    }
}
