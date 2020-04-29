<?php
session_start();
require_once '../../global/ClassGlobalConexion.php';
require_once '../../model/ClassModelMatriculas.php';
//$cod_Curso = $_GET['COD_CURSO'];
$object = new NuevasMatriculas();
$list_curso = $object->get_Cursos();
 ?>

 <!DOCTYPE html>
 <html lang="es-ES" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     <link rel="stylesheet" href="../../css/general_user.css">
     <link rel="stylesheet" href="../../css/sidenav.css">
     <title>LISTA DE CURSOS</title>
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

      <main>
         <div class="contenedor">
           <div class="titulo">
             <p>LISTADO DE CURSOS</p>
           </div>
           <div class="contenido">
             <?php echo $list_curso; ?>
           </div>
         </div>
       </main>


       <style media="screen">
         .contenedor{
           width: 90%;
           background-color: white;
           border-color: orange;
         }
         .contenido{
           padding-left: 5%;
           background-color: white;
           border-color: orange;
         }
         .titulo{
           margin-bottom: 3%;
         }
         .card{
           display: inline-block;
           width: 40%;
         }

         .card{
           display: inline-block;
           background-color: #95113E;
           width: 20%;
           margin-left: 5%;
           margin-right: 5%;
           margin-bottom: 3%;
           margin-top: 3%;
           font-style: bold;
           text-align: center;
         }
         span{
           color: white;
         }
         a{
           color:white;
         }
       </style>
       <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
       <script src="../../js/init.js"></script>

   </body>
 </html>
