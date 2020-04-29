<?php
session_start();
require_once '../../Global/ClassGlobalConexion.php';
require_once '../../Model/ClassModelConsultas.php';
if (isset($_SESSION['USER_GL'])) {
    $_SESSION['USER_GL'];
    $_SESSION['TYPE_USER'];

    $object = new Consultas();
    $data = $object->get_Datos($_SESSION['USER_GL']);
} else {
    //header('location: ../../index.html');
}
 ?>
  <!DOCTYPE html>
  <html lang="es">
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" href="../../css/general_user.css">
      <link rel="stylesheet" href="../../css/sidenav.css">
      <title>Inicio</title>
    </head>

    <body>

      <header>

        <div class="navbar-fixed">
          <div class="">
          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i>Menu</a>
          </div>
          <div class="logo">
            <div class="logo-img">
              <img src="../../images/logo.png" alt="">
            </div>

            <div class="logo-letras">
              <p>ESCUELA PARTICULAR JOAQUIN GALLEGOS LARA</p>
            </div>
          </div>

        </div>

        <ul id="slide-out" class="sidenav">
          <li><div class="user-view">
            <div class="background">
        <img src="images/office.jpg">
      </div>
        <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
        <a href="#name"><span class="white-text name"><?php echo $data['NOMBRES'] ?></span></a>
        <a href="#email"><span class="white-text email"><?php echo $data['CORREO'] ?></span></a>
      </div></li>
      <li id="li-center"><a id="option1" href="./general.php"><i class="material-icons">home</i>Inicio</a></li>
      <li id="li-center"><a id="option5" href="../../Global/logout.php"><i class="material-icons">logout</i>Cerrar Sesion</a></li>
      <li><div class="divider"></div></li>
      <li><a class="subheader">Subheader</a></li>
      <li id="li-center"><a id="option2" class="waves-effect" href="./actualizacion_de_datos.php"><i class="material-icons">assignment</i>Actualizar Datos</a></li>
      <li id="li-center"><a id="option3" class="waves-effect" href="./calificaciones.php"><i class="material-icons">favorite</i>Calificaciones</a></li>
      <li id="li-center"><a id="option4" class="waves-effect" href="./pagos.php"><i class="material-icons">payment</i>Tus Pagos</a></li>
    </ul>


      </header>

      <main id="main">

      <div class="contenedor1">
        <div class="contenido">
          <div class="titulo">
            <p>CALIFICACIONES</p>
          </div>

          <div id="card1" class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="../../images/icons/actualizar.png" height="150px">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4"><a href="./actualizacion_de_datos.php">ACTUALIZACION DE DATOS</a><i class="material-icons right">chevron_right</i></span>
            </div>
          </div>

          <div id="card1" class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="../../images/icons/pagos.png" height="150px">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4"><a href="./calificaciones_semanales.php">REPORTE DE PAGOS</a><i class="material-icons right">chevron_right</i></span>
            </div>
          </div>

          <div id="card1" class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="../../images/icons/examen.png" height="150px">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4"><a href="./calificaciones_semanales.php"> REPORTE DE CALIFICACIONES</a><i class="material-icons right">chevron_right</i></span>
            </div>
          </div>
        </div>
        </div>
 </main>


      <style media="screen">
      #option1{
        background-color: #95113E;
      }

      </style>


      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script src="../../js/init.js"></script>
    </body>
  </html>
