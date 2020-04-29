<?php
session_start();
if (isset($_SESSION['USER_GL'])) {
  header('location : ../view/index.php');
}else {
  header('location : ../index.html');
}

 ?>
