<?php
session_start();
require_once '../../global/ClassGlobalConexion.php';
require_once '../../model/ClassModelConsultas.php';
require_once '../../global/ClassGlobalSidenav.php';
require_once '../../model/ClassModelMatriculas.php';
if (isset($_SESSION['USER_GL'])) {
    $_SESSION['USER_GL'];
    $_SESSION['TYPE_USER'];
} else {
    //header('location: ../../index.html');
}
$objectS = new Sidenav();
$object = new Consultas();
$datos_Alumnos = new NuevasMatriculas();
$data = $datos_Alumnos->get_Datos_Alumnos($_GET['cedula']);
$datos_Alumno = $object->get_Datos($data['CEDULA']);
$datos_Representante = $object->get_Datos($data['CEDULA_REPR']);
 ?>

 <!DOCTYPE html>
 <html lang="es">
   <head>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     <link rel="stylesheet" href="../../css/general_user.css">
     <link rel="stylesheet" href="../../css/sidenav.css">
     <script type="text/javascript" src="../../js/inputs.js"></script>
     <title>MATRICULACION</title>
   </head>

   <body>

     <style type="text/css">

     	#section{
     		margin-top : 3%;
     	}

     </style>

     <header>
       <?php //echo $sidenav; ?>
       <div class="navbar-fixed">
         <div class="">
           <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i>Menu</a>
         </div>
         <div class="logo">
           <div class="logo-img">
             <img src="../../../images/logo.png" alt="">
           </div>

           <div class="logo-letras">
             <p>ESCUELA PARTICULAR JOAQUIN GALLEGOS LARA</p>
           </div>
         </div>
       </div>
     </header>

     <main>

       <div class="section container">
         <div class="row card-panel">
           <div id="form-tittle" class="row card-panel">
             <p>DATOS DEL ALUMNO</p>
           </div>
           <div class="foto">
             <center>
             <img style="width:250px; height:250px" src="../../images/alumnos/<?php echo $datos_Alumno['FOTO'];?>" alt="">
           </center>
           </div>
           <div class="datos">
             <center>
             <div class="data">
               <p>CEDULA :<br> <?php echo $datos_Alumno['CEDULA']; ?></p>
             </div>
             <div class="data">
               <p>NOMBRES :<br> <?php echo $datos_Alumno['NOMBRES']; ?></p>
             </div>
             <div class="data">
               <p>APELLIDOS :<br> <?php echo $datos_Alumno['APELLIDOS']; ?></p>
             </div>
             <div class="data">
               <p>FECHA DE NACIMIENTO :<br> <?php echo $datos_Alumno['FECHA_NAC']; ?></p>
             </div>
             <br>
             <div class="data_direccion">
               <p>DIRECCION :<br> <?php echo $datos_Alumno['DIRECCION']; ?></p>
             </div>
             <br>
             <div class="data_direccion">
               <form class="" action="../../controller/ClassControllerMatricula.php" method="post">
                 <input type="text" hidden name="cedula" value="<?php echo $datos_Alumno['CEDULA']; ?>">

                 <select name="paralelo" id="paralelo" onchange="ShowSelected();" required>
                   <option value="" disabled selected>SELECCIONA UN PARALELO</option>
                   <option value="A">PARALELO A</option>
                   <option value="B">PARALELO B</option>
                 </select>
                 <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                   <i class="material-icons right">send</i>
                 </button>


               </form>


             </div>


           </center>
           </div>
         </div>

       </div>
     </main>





     <style media="screen">
       #option2{
         background-color: #95113E;
       }

       .row{
         display: inline-block;
         width: 70%;
       }
        #form-tittle{
          width: 100%;
        }
       .data{
         display: inline-block;
         width: 30%;
         height: 30%;
         margin-left: 5%;
         margin-right: 3%;
         margin-bottom: 3%;
         color: black;
         font-size: 1rem;
       }
       .data_direccion{
         width: 50%;
       }
     </style>


     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <script src="../../../js/init.js"></script>
     <script type="text/javascript">
     document.addEventListener('DOMContentLoaded', function() {
       var elems = document.querySelectorAll('select');
       var instances = M.FormSelect.init(elems);
     });
     </script>

   </body>
 </html>
