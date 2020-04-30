<?php
/**
 *
 */
class Calificaciones
{

  function __construct()
  {

  }

  public function get_Notas_Q1_P1($arg_Cedula,$arg_Lectivo,$arg_Parcial,$arg_Quimestre)
  {
    $objeto = new Conexion();
    $conexion = $objeto->get_Conexion();
    $query = "SELECT * FROM maestro_db.CALIFICACIONES WHERE CEDULA_ALUMNO = :_CEDULA AND COD_QUIMESTRE = :_QUIMESTRE AND COD_PARCIAL = :_PARCIAL AND COD_LECTIVO = :_COD_LECTIVO";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':_CEDULA',$arg_Cedula,PDO::PARAM_STR);
    $stmt->bindParam(':_QUIMESTRE',$arg_Quimestre,PDO::PARAM_INT);
    $stmt->bindParam(':_PARCIAL',$arg_Parcial,PDO::PARAM_INT);
    $stmt->bindParam(':_COD_LECTIVO',$arg_Lectivo,PDO::PARAM_STR);

    if (isset($stmt)) {
      if ($stmt->execute()) {
        $data = $stmt->fetch();
        return ($data);
      }else {
        echo '<script> alert("¡Error! NO SE PUEDO OBTENER LAS CALIFICACIONES")</script>';
      }
    }else{
      echo '<script> alert("¡Error! NO SE PUEDO OBTENER LAS CALIFICACIONES PROBLEMAS EN LA COSNULTA")</script>';
    }
  }
}

 ?>
