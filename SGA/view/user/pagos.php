<?php
session_start();
require_once '../../Global/ClassGlobalConexion.php';
require_once '../../Model/ClassModelConsultas.php';
require_once '../../Global/ClassGlobalSidenav.php';
if (isset($_SESSION['USER_GL'])) {
    $_SESSION['USER_GL'];
    $_SESSION['TYPE_USER'];
} else {
    //header('location: ../../index.html');
}
$objectS = new Sidenav();
$sidenav = $objectS->get_Sidenav($_SESSION['USER_GL']);
 ?>

 <!DOCTYPE html>
 <html lang="es">
   <head>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     <link rel="stylesheet" href="../../css/general_user.css">
     <link rel="stylesheet" href="../../css/sidenav.css">
     <title>Home</title>
   </head>

   <body>

     <header>
       <?php echo $sidenav; ?>
     </header>

     <main>

     </main>

     <footer>
       <div>Icons made by <a href="https://www.flaticon.es/autores/monkik" title="monkik">monkik</a> from <a href="https://www.flaticon.es/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/"                 title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
     </footer>

     <style media="screen">
       #option4{
         background-color: #95113E;
       }
     </style>


     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <script src="../../js/init.js"></script>
   </body>
 </html>
