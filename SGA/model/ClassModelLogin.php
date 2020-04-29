<?php

/**
 *Josue Zambrano Reyes
 */
class ModelLogin
{

  function __construct()
  {

  }

  function get_Login($arg_User,$arg_Password)
  {
    $objeto = new Conexion();
    $conexion = $objeto->get_Conexion();
    $query = "SELECT * FROM joaquing_db.USUARIOS WHERE USER = :_USUARIO AND PASSWORD = :_PASSWORD";
    try {
      $stmt = $conexion->prepare($query);
      $stmt->bindParam(':_USUARIO',$arg_User,PDO::PARAM_STR);
      $stmt->bindParam(':_PASSWORD',$arg_Password,PDO::PARAM_STR);
    } catch (PDOException $e) {
      echo "¡Error!"." ".$e->getMessage()."<br>";
      $stmt = null;
      die();
    }

    try {

      if (isset($stmt)) {
        if ($stmt->execute()) {
          $data = $stmt->fetch();
          $stmt = null;
          return $data;
        }else {
          echo var_dump($stmt);
          echo "¡Error! -> NO SE PUEDE EJECUTAR LA CONSULTA INTENTE NUEVAMENTE"."<br>";
          $stmt = null;
          die();
        }
      }else {
        echo "¡Error!"."<br>";
        $stmt = null;
        die();
      }
    } catch (PDOException $e) {
      echo "¡Error!"." ".$e->getMessage()."<br>";
      $stmt = null;
      die();
    }
  }
}


 ?>
