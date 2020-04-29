<?php
session_start();
if (isset($_SESSION['USER_GL'])) {
    if ($_SESSION['TYPE_USER'] == 1) {
        header('location : ./admin/index.php');
    } elseif ($_SESSION['TYPE_USER'] == 2) {
        header('location : ./user/index.php');
    } elseif ($_SESSION['TYPE_USER'] >2 || $_SESSION['TYPE_USER'] <1 || $_SESSION['TYPE_USER'] == null) {
        echo "<script> alert('USUARIO DESCONOCIDO REINICIE SESION')";
        $_SESSION['USER_GL'] = null;
        $_SESSION['TYPE_USER'] = null;
        $_SESSION = null;
        session_unset();
        session_destroy();
        header('location: ../index.html');
    }
} else {
    header('location: ../index.html');
}
