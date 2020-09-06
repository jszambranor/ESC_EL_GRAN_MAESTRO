<?php
session_start();
require_once '../global/ClassGlobalConexion.php';
require_once '../model/ClassModelPersonas.php';
require_once '../model/ClassModelConsultas.php';
$objeto = new Personas();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // DATOS DEL ALUMNO
    $arg_Cedula = $_POST['cedula_a'];
    $arg_Foto = $_POST['alumno_foto'];
    $arg_Nombres = $_POST['nombres_a'];
    $arg_Apellidos = $_POST['apellidos_a'];
    $arg_Fecha = $_POST['fecha_a'];
    $arg_nacionalidad = $_POST['nacionalidad_a'];
    $arg_Direccion = $_POST['direccion_a'];
    $arg_Telefono = 'null';
    $arg_Correo = 'null';
    $arg_Ocupacion = 'null';
    $arg_Nivel = 'null';
    $arg_Whatsapp = 'null';
    $arg_Antecedentes = $_POST['antecedentes_a'];
    $arg_Vacuna = $_POST['vacuna_a'];
    $arg_Inst = $_POST['otra_institucion_a'];
    if ($arg_Inst == "0" || $arg_Inst == "2") {
        $arg_Nombre_Inst = "NINGUNA";
    } else {
        $arg_Nombre_Inst = $_POST['institucion_a'];
    }
    $arg_Curso = $_POST['curso'];

    // DATOS DEL REPRESENTANTE
    $arg_CedulaR = $_POST['cedula_r'];
    $arg_FotoR = $_POST['representante_foto'];
    $arg_NombresR = $_POST['nombres_r'];
    $arg_ApellidosR = $_POST['apellidos_r'];
    $arg_FechaR = '0000-02-02';
    $arg_NacionalidadR = $_POST['nacionalidad_r'];
    $arg_DireccionR = $_POST['direccion_r'];
    $arg_TelefonoR = $_POST['telefono_r'];
    $arg_CorreoR = $_POST['correo_r'];
    $arg_OcupacionR = $_POST['profesion_r'];
    $arg_NivelR = $_POST['nivel_edu'];
    $arg_WhatsappR = $_POST['whatsapp_r'];
} else {
    die();
}

try {
    // CARGA DE FOTO AL SERVIDOR
    $formatos = array('image/jpg','image/pjpeg','image/bmp','image/jpeg','image/gif','image/png');
    if (in_array($_FILES["alumno_foto"]["type"], $formatos)) {
        $arg_Foto = "img_".$arg_Cedula.".".str_replace("image/", "", $_FILES['alumno_foto']["type"]);
        $x_ruta = "/var/www/html/SGA/images/alumnos/".$arg_Foto;
        $estado  =   move_uploaded_file($_FILES['alumno_foto']['tmp_name'], $x_ruta);
    }

    // validar directorio
    if (in_array($_FILES["representante_foto"]["type"], $formatos)) {
        $arg_FotoR  = "img_".$arg_CedulaR.".".str_replace("image/", "", $_FILES['representante_foto']["type"]);
        $x_ruta = "/var/www/html/SGA/images/representantes/".$arg_FotoR;
        move_uploaded_file($_FILES['representante_foto']['tmp_name'], $x_ruta);
    }
} catch (PDOException $e) {
    echo "<script> alert('ERROR AL SUBIR LAS FOTOS -> '".$e->getMessage().");</script>";
    die();
}



try {
    $person = $objeto->set_Persona(
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
        $arg_WhatsappR,

  );
    echo '<br>';
    echo $person;
    if ($person == 1) {
        echo '<script> alert("REGISTROS CREADOS CON EXITO")</script>';
        echo '<meta http-equiv="refresh" content="0; url=../../matriculacion">';
    } elseif ($person == 2) {
        echo '<script> alert("REGISTROS YA EXISTEN")</script>';
        echo '<meta http-equiv="refresh" content="0; url=../../matriculacion">';
    } elseif ($person == 0) {
        echo '<script> alert("ERROR AL CREAR REGISTROS INTENTE NUEVAMENTE")</script>';
        echo '<meta http-equiv="refresh" content="0; url=../../matriculacion">';
    }
} catch (PDOException $e) {
    echo "<script> alert('ERROR AL LLAMAR A LA FUNCION DE REGISTRO -> '".$e->getMessage().");</script>";
    die();
}
