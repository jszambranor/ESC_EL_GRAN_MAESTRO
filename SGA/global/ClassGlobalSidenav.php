<?php

/**
 *
 */
class Sidenav
{

  function __construct()
  {

  }

  public function get_Sidenav($arg_Cedula)
  {
    $object = new Consultas();
    $data = $object->get_Datos($arg_Cedula);
    $sidenav = '
    <div class="navbar-fixed">
      <div class="">
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i>Menu</a>
      </div>
      <div class="logo">
        <div class="logo-img">
          <img src="../../images/logo.png" alt="">
        </div>

        <div class="logo-letras">
          <p>ESCUELA PARTICULAR EL GRAN MAESTRO</p>
        </div>
      </div>

    </div>

    <ul id="slide-out" class="sidenav">
      <li><div class="user-view">
        <div class="background">
    <img src="images/office.jpg">
  </div>
    <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
    <a href="#name"><span class="white-text name">$data["NOMBRES"]</span></a>
    <a href="#email"><span class="white-text email">$data["CORREO"]</span></a>
  </div></li>
  <li id="li-center"><a id="option1"  href="./general.php"><i class="material-icons">home</i>Inicio</a></li>
  <li id="li-center"><a id="option5" href="../../Global/logout.php"><i class="material-icons">logout</i>Cerrar Sesion</a></li>
  <li><div class="divider"></div></li>
  <li><a class="subheader">Subheader</a></li>
  <li id="li-center"><a id="option2" class="waves-effect" href="./actualizacion_de_datos.php"><i class="material-icons">assignment</i>Actualizar Datos</a></li>
  <li id="li-center"><a id="option3" class="waves-effect" href="./calificaciones.php"><i class="material-icons">favorite</i>Calificaciones</a></li>
  <li id="li-center"><a id="option4" class="waves-effect" href="./pagos.php"><i class="material-icons">payment</i>Tus Pagos</a></li>
</ul>
    ';
    return $sidenav;
  }
}

 ?>
