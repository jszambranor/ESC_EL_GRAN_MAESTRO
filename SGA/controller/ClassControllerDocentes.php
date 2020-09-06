<?php
session_start();
require_once '../global/ClassGlobalConexion.php';
require_once '../model/ClassModelDocentes.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $curso = $_POST['curso'];
  $cedula = $_POST['cedula'];
  $nombres = $_POST['nombre'];
  $apellidos = $_POST['apellido'];
  $fecha = $_POST['fecha_a'];
  $edad = $_POST['edad'];
  $nacionalidad = $_POST['nacionalidad'];
  $direccion = $_POST['direcion'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $ocupacion = $_POST['ocupacion'];
  $profesion = $_POST['profesion'];
  $nivel = $_POST['nivel_educativo'];
  $whatsapp = $_POST['whatsapp'];
  $foto  = $_POST['docente_foto'];

  $formatos = array('image/jpg','image/pjpeg','image/bmp','image/jpeg','image/gif','image/png');
  if (in_array($_FILES["docente_foto"]["type"], $formatos)) {
      $foto = "img_".$cedula.".".str_replace("image/", "", $_FILES['docente_foto']["type"]);
      $x_ruta = "../images/docentes/".$foto;
      move_uploaded_file($_FILES['docente_foto']['tmp_name'], $x_ruta);
  }

  $object = new Docentes();
  $set_Docente = $object->set_Docentes($curso,$cedula,$foto,$nombres,$apellidos,$fecha,$edad,$nacionalidad,$direccion,$telefono,$correo,$ocupacion,$profesion,$nivel,$whatsapp);
  if ($set_Docente == 1) {
    echo 'REGISTRO CREADO EXITOSAMENTE';
    echo '<meta http-equiv="refresh" content="3; url=../view/admin/registroprofesor.php">';
  }else {
    echo 'NO SE CREO EL REGISTRO INTENTE NUEVAMENTE';
    //echo '<meta http-equiv="refresh" content="3; url=../view/admin/registroprofesor.php">';
  }
}else {
  echo 'RECEPCION DE DATOS NO VALIDA';
}


 ?>
