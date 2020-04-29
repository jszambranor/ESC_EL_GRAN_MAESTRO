<?php
session_start();
require_once '../global/ClassGlobalConexion.php';
require_once '../model/ClassModelRegistroProfesor.php';
$regristro = new Personas();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Cedula = $_POST['cedula'];
    $Foto= $_POST['docente_foto'];
    $Nombres = $_POST['nombres'];
    $Apellidos = $_POST['apellidos'];
    $Fecha = $_POST['fecha_a'];
    $Edad = $_POST['edad'];
    $Nacionalidad = $_POST['nacionalidad'];
    $Direccion = $_POST['direccion'];
    $Telefono = 'telofono';
    $Correo = 'correo';
    $Ocupacion = 'ocupacion';
    $Profesion = 'profesion';
    $Nivel = 'nivel_educativo';
    $Whatsapp = 'whatsapp';
} else {
    die();
}
try {
    $formatos = array('image/jpg','image/pjpeg','image/bmp','image/jpeg','image/gif','image/png');
    if (in_array($_FILES["docente_foto"]["type"], $formatos)) {
        $Foto = "img_".$arg_Cedula.".".str_replace("image/", "", $_FILES['docente_foto']["type"]);
        $x_ruta = "../Images/Docentes/".$Foto;
        move_uploaded_file($_FILES['docente_foto']['tmp_name'], $x_ruta);
    }
} catch (PDOException $e) {
    echo "<script> alert('ERROR AL SUBIR LAS FOTOS -> '".$e->getMessage().");</script>";
    die();
}
echo $Foto;
echo "<br>";

try {
    $person = $objeto->set_Docentes(
        $Cedula,
        $Foto
        $Nombres,
        $Apellidos,
        $Fecha,
        $Edad,
        $Nacionalidad,
        $Direccion,
        $Telefono,
        $Correo,
        $Ocupacion,
        $Profesion,
        $Nivel,
        $Whatsapp,

  );

 if ($person == 1) {
        echo "REGISTROS CREADOS CON EXITO";
        echo '<meta http-equiv="refresh" content="5; url=../view/admin/registroprofesor.php">';
    } else {
        echo "ERROR AL CREAR REGISTROS INTENTE NUEVAMENTE";
        echo '<meta http-equiv="refresh" content="5; url=../view/admin/registroprofesor.php">';
    }
} catch (PDOException $e) {
    echo "<script> alert('ERROR AL LLAMAR A LA FUNCION DE REGISTRO -> '".$e->getMessage().");</script>";
    die();
}

?>
