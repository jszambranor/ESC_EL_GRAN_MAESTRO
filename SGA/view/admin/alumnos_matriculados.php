<?php
session_start();
require_once '../../global/ClassGlobalConexion.php';
require_once '../../model/ClassModelMatriculas.php';
$object = new NuevasMatriculas();
$matriculas = $object->listar_AlumnosM($_GET['COD_CURSO']);
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
     <?php

     switch ($_GET['COD_CURSO']) {
       case '01':
         $curso = "INICIAL 1";
         break;
         case '02':
           $curso = "INICIAL 2";
           break;
           case '1RO':
             $curso = "PRIMERO DE BÁSICA";
             break;
             case '2DO':
               $curso = "SEGUNDO DE BÁSICA";
               break;
               case '3RO':
                 $curso = "TERCERO DE BÁSICA";
                 break;
                 case '4TO':
                   $curso = "CUARTO DE BÁSICA";
                   break;
                   case '5TO':
                     $curso = "QUINTO DE BÁSICA";
                     break;
                     case '6TO':
                       $curso = "SEXTO DE BÁSICA";
                       break;
                       case '7MO':
                         $curso = "SÉPTIMO DE BÁSICA";
                         break;
                         default:
                         echo "<script>alert('NO HAY CURSO SELECCIONADO');</script>";
                         die();
                         break;
     }

      ?>
     <title>LISTA DE CURSOS <?php echo $curso; ?></title>
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
             <p>LISTADO DE ALUMNOS <?php echo $curso; ?></p>
           </div>
           <div class="contenido">

           </div>
         </div>
       </main>

       <table class="centered highlight">
        <thead>
          <tr>
              <th>FOTO</th>
              <th>CEDULA</th>
              <th>APELLIDOS</th>
              <th>NOMBRES</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <?php echo $matriculas; ?>
          </tr>

        </tbody>
      </table>


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

         #name_al{
           color: black;
         }

         #img_alum{
           width: 100px;
           height: 100px;
         }

         #img_op{
           width: 60px;
           height: 60px;
         }
       </style>
       <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
       <script src="../../js/init.js"></script>

   </body>
 </html>
