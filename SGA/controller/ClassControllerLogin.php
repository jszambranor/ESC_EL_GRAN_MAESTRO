<?php
require_once '../global/ClassGlobalConexion.php';
require_once '../model/ClassModelLogin.php';

  try {
      $usuario = null;
      $password = null;
      $passEncryt = null;
      $objeto = new ModelLogin();
  } catch (PDOException $e) {
      echo "<script>alert('¡Error! -> NO SE PUEDE ESTABLECER LA CONEXION CON LA FUNCION DE LOGIN');
      alert('¡Error! -> ".$e->getMessage()."');
      </script>";
      die();
  }

  try {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $usuario = $_POST['usuario'];
          $password = $_POST['pass'];
          $passEncryt= sha1($password);
      } else {
          echo "¡Error! RECEPCION DE DATOS NO VALIDA";
          echo "<a href='../index.html'>Iniciar Sesion</a>";
          die();
      }
  } catch (PDOException $e) {
      echo "¡Error!"." ".$e->getMessage();
      echo "<a href='../index.html'>Iniciar Sesion</a>";
      die();
  }

  try {
      $modelLogin = $objeto->get_Login($usuario, $passEncryt);
  } catch (PDOException $e) {
      echo "¡Error!"." ".$e->getMessage();
      echo "<a href='../index.html'>Iniciar Sesion</a>";
      die();
  }

  try {
      if ($modelLogin['USER'] == $usuario && $modelLogin['PASSWORD'] == $passEncryt) {
          session_start();
          $_SESSION['USER_GL'] = $modelLogin['USER'];
          $_SESSION['TYPE_USER'] = $modelLogin['COD_USER'];
          if ($_SESSION['TYPE_USER'] == '1') {
              echo '<meta http-equiv="refresh" content="0; url=../view/admin/generaladmin.php">';
          } elseif ($_SESSION['TYPE_USER'] == '2') {
            echo '<meta http-equiv="refresh" content="0; url=../view/docente/general.php">';
          }elseif ($_SESSION['TYPE_USER'] == '3') {
              echo '<meta http-equiv="refresh" content="0; url=../view/user/general.php">';
          }
      } else {
          echo "¡Error! CREDENCIALES INCORRECTAS";
          echo "<a href='../index.html'>Iniciar Sesion</a>";
          die();
      }
  } catch (PDOException $e) {
      echo "¡Error!"." ".$e->getMessage();
      echo "<a href='../index.html'>Iniciar Sesion</a>";
      die();
  }
