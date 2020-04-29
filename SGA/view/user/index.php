<?php
session_start();
if (isset($_SESSION['USER_GL'])) {
    if ($_SESSION['TYPE_USER'] == '1') {
      echo '<meta http-equiv="refresh" content="0; url=../admin/general.php">';
    } elseif ($_SESSION['TYPE_USER'] == '2') {
        echo '<meta http-equiv="refresh" content="0; url=../docente/general.php">';
    }elseif ($_SESSION['TYPE_USER'] == '3') {
      echo '<meta http-equiv="refresh" content="0; url=../user/general.php">';
    } elseif ($_SESSION['TYPE_USER'] >3 || $_SESSION['TYPE_USER'] <1 || $_SESSION['TYPE_USER'] == null) {
        echo "<script> alert('USUARIO DESCONOCIDO REINICIE SESION')";
        $_SESSION['USER_GL'] = null;
        $_SESSION['TYPE_USER'] = null;
        $_SESSION = null;
        session_unset();
        session_destroy();
        echo '<meta http-equiv="refresh" content="3; url=../../index.html">';
    }
} else {
    header('location: ../../index.html');
}
