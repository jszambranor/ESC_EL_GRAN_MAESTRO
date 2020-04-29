<?php
/**
 *
 */
class Personas
{
    public function __construct()
    {
    }

    public function set_Persona(
        $arg_Cedula,
        $arg_Foto,
        $arg_Nombres,
        $arg_Apellidos,
        $arg_Fecha,
        $arg_Nacionalidad,
        $arg_Direccion,
        $arg_Telefono,
        $arg_Correo,
        $arg_Ocupacion,
        $arg_Nivel,
        $arg_Whatsapp,
        $arg_Antecedentes,
        $arg_Vacuna,
        $arg_Inst,
        $arg_Nombre_Inst,
        $arg_Curso,
        $arg_CedulaR,
        $arg_FotoR,
        $arg_NombresR,
        $arg_ApellidosR,
        $arg_FechaR,
        $arg_NacionalidadR,
        $arg_DireccionR,
        $arg_TelefonoR,
        $arg_CorreoR,
        $arg_OcupacionR,
        $arg_NivelR,
        $arg_WhatsappR
  ) {
        try {
            $objeto = new Conexion();
            $conexion = $objeto->get_Conexion();
        } catch (PDOException $e) {
            echo "<script> alert('ERROR AL OBTENER LA CONEXION A LA BASE DE DATOS -> '".$e->getMessage().");</script>";
            die();
        }

        try {
            $query = "CALL joaquing_db.MATRICULAS_PRE(
              :_CEDULA,:_FOTO,:_NOMBRES,:_APELLIDOS,:_FECHA,:_NACIONALIDAD,:_DIRECCION,:_TELEFONO,:_CORREO,:_OCUPACION,:_NIVEL,:_WHATSAPP,:_ANTECEDENTES,:_VACUNAS,:_INSTITUCION,:_NOMBRE_INSTITUCION,:_CURSO,
              :_CEDULA_R,:_FOTO_R,:_NOMBRES_R,:_APELLIDOS_R,:_FECHA_R,:_NACIONALIDAD_R,:_DIRECCION_R,:_TELEFONO_R,:_CORREO_R,:_OCUPACION_R,:_NIVEL_R,:_WHATSAPP_R)";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':_CEDULA', $arg_Cedula, PDO::PARAM_STR);
            $stmt->bindParam(':_FOTO', $arg_Foto, PDO::PARAM_STR);
            $stmt->bindParam(':_NOMBRES', $arg_Nombres, PDO::PARAM_STR);
            $stmt->bindParam(':_APELLIDOS', $arg_Apellidos, PDO::PARAM_STR);
            $stmt->bindParam(':_FECHA', $arg_Fecha, PDO::PARAM_STR);
            $stmt->bindParam(':_NACIONALIDAD', $arg_Nacionalidad, PDO::PARAM_STR);
            $stmt->bindParam(':_DIRECCION', $arg_Direccion, PDO::PARAM_STR);
            $stmt->bindParam(':_TELEFONO', $arg_Telefono, PDO::PARAM_STR);
            $stmt->bindParam(':_CORREO', $arg_Correo, PDO::PARAM_STR);
            $stmt->bindParam(':_OCUPACION', $arg_Ocupacion, PDO::PARAM_STR);
            $stmt->bindParam(':_NIVEL', $arg_Nivel, PDO::PARAM_STR);
            $stmt->bindParam(':_WHATSAPP', $arg_Whatsapp, PDO::PARAM_STR);
            $stmt->bindParam(':_ANTECEDENTES', $arg_Antecedentes, PDO::PARAM_STR);
            $stmt->bindParam(':_VACUNAS', $arg_Vacuna, PDO::PARAM_STR);
            $stmt->bindParam(':_INSTITUCION', $arg_Inst, PDO::PARAM_STR);
            $stmt->bindParam(':_NOMBRE_INSTITUCION', $arg_Nombre_Inst, PDO::PARAM_STR);
            $stmt->bindParam(':_CURSO', $arg_Curso, PDO::PARAM_STR);

            $stmt->bindParam(':_CEDULA_R', $arg_CedulaR, PDO::PARAM_STR);
            $stmt->bindParam(':_FOTO_R', $arg_FotoR, PDO::PARAM_STR);
            $stmt->bindParam(':_NOMBRES_R', $arg_NombresR, PDO::PARAM_STR);
            $stmt->bindParam(':_APELLIDOS_R', $arg_ApellidosR, PDO::PARAM_STR);
            $stmt->bindParam(':_FECHA_R', $arg_FechaR, PDO::PARAM_STR);
            $stmt->bindParam(':_NACIONALIDAD_R', $arg_NacionalidadR, PDO::PARAM_STR);
            $stmt->bindParam(':_DIRECCION_R', $arg_DireccionR, PDO::PARAM_STR);
            $stmt->bindParam(':_TELEFONO_R', $arg_TelefonoR, PDO::PARAM_STR);
            $stmt->bindParam(':_CORREO_R', $arg_CorreoR, PDO::PARAM_STR);
            $stmt->bindParam(':_OCUPACION_R', $arg_OcupacionR, PDO::PARAM_STR);
            $stmt->bindParam(':_NIVEL_R', $arg_NivelR, PDO::PARAM_STR);
            $stmt->bindParam(':_WHATSAPP_R', $arg_WhatsappR, PDO::PARAM_STR);

        } catch (PDOException $e) {
            echo "<script> alert('ERROR AL PREPARAR LA CONSULTA -> '".$e->getMessage().");</script>";
            echo '<meta http-equiv="refresh" content="5; url=../view/user/Matriculacion/matriculacion.php">';
            die();
        }

        try {
            if (isset($stmt)) {
                try {
                    if ($stmt->execute()) {
                        $stmt = null;
                        return 1;
                    }else {
                        $stmt = null;
                        $object = new Consultas();
                        $alumno = $object->get_Datos($arg_Cedula);
                        $representante = $object->get_Datos($arg_CedulaR);
                        if ($alumno['CEDULA'] == $arg_Cedula){
                          if ($representante['CEDULA'] == $arg_CedulaR) {
                            return 2;
                          }
                        }else {
                          return 0;
                        }
                    }
                } catch (PDOException $e) {
                    echo "<script> alert('ERROR NO SE PUEDE EJECUTAR LA CONSULTA->');</script>";
                    echo $e->getMessage();
                    //echo '<meta http-equiv="refresh" content="5; url=../view/user/Matriculacion/matriculacion.php">';
                    die();
                }
            } else {
                echo "<script> alert('ERROR LA CONSULTA NO ESTA DEFINIDA ->');</script>";
                echo $e->getMessage();
                //echo '<meta http-equiv="refresh" content="5; url=../view/user/Matriculacion/matriculacion.php">';
                die();
            }
        } catch (PDOException $e) {
            echo "<script> alert('ERROR AL EJECUTAR LA CONSULTA -> ');</script>";
            echo $e->getMessage();
            //echo '<meta http-equiv="refresh" content="5; url=../view/user/Matriculacion/matriculacion.php">';
            die();
        }
    }
}
