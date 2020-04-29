<?php
require_once '../../global/ClassGlobalConexion.php';
require_once '../../model/ClassModelConsultaNotas.php';
session_start();
if (isset($_SESSION['USER_GL'])) {
    $_SESSION['USER_GL'];
    $_SESSION['TYPE_USER'];
} else {
    //header('location: ../../index.html');
}
$alumno = $_GET['CEDULA_ALUMNO'];
$lectivo = $_GET['COD_LECTIVO'];
$quimestre = $_GET['COD_QUIMESTRE'];
$parcial = $_GET['COD_PARCIAL'];
$object = new Calificaciones();
$calificaciones = $object->get_Notas_Q1_P1($alumno,$lectivo,$parcial,$quimestre);
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
     <title>CALIFICACIONES POR ALUMNO</title>
   </head>
   <body>

     <header>

     </header>

     <main>
       <div class="section">
       <div id="row1" class="row card-panel">
           <p>CALIFICACIONES DE</p>
         </div>
    <form class="col s12">
      <div id="row" class="row card-panel">
        <div class="titulo">
          <p>CALIFICACIONES DE TAREAS</p>
        </div>

      <table class="centered">
        <thead>
          <th class="col s2">NOTA 1</th>
          <th class="col s2">NOTA 2</th>
          <th class="col s2">NOTA 3</th>
          <th class="col s2">NOTA 4</th>
          <th class="col s2">NOTA 5</th>
        </thead>
      </table>
      <div class="input">
          <div class="input-field col s2">
            <input type="number" name="nota_tareas_1" value="<?php echo $calificaciones["TAREAS_N1"]; ?>">
          </div>
          <div class="input-field col s2">
            <input type="number" name="nota_tareas_2" value="<?php echo $calificaciones["TAREAS_N2"]; ?>">
          </div>
          <div class="input-field col s2">
            <input type="number" name="nota_tareas_3" value="<?php echo $calificaciones["TAREAS_N3"]; ?>">
          </div>
          <div class="input-field col s2">
            <input type="number" name="nota_tareas_4" value="<?php echo $calificaciones["TAREAS_N4"]; ?>">
          </div>
          <div class="input-field col s2">
            <input type="number" name="nota_tareas_5" value="<?php echo $calificaciones["TAREAS_N5"]; ?>">
          </div>
          </div>
        </div>

        <div id="row" class="row card-panel">
          <div class="titulo">
            <p>CALIFICACIONES DE TRABAJOS INDIVIDUALES</p>
          </div>

        <table class="centered">
          <thead>
            <th class="col s2">NOTA 1</th>
            <th class="col s2">NOTA 2</th>
            <th class="col s2">NOTA 3</th>
            <th class="col s2">NOTA 4</th>
            <th class="col s2">NOTA 5</th>
          </thead>
        </table>
        <div  class="input">
            <div class="input-field col s2">
              <input type="number" name="nota_individuales_1" value="<?php echo $calificaciones["INDIVUDUAL_N1"]; ?>">
            </div>
            <div class="input-field col s2">
              <input type="number" name="nota_individuales_2" value="<?php echo $calificaciones["INDIVUDUAL_N2"]; ?>">
            </div>
            <div class="input-field col s2">
              <input type="number" name="nota_individuales_3" value="<?php echo $calificaciones["INDIVUDUAL_N3"]; ?>">
            </div>
            <div class="input-field col s2">
              <input type="number" name="nota_individuales_4" value="<?php echo $calificaciones["INDIVUDUAL_N4"]; ?>">
            </div>
            <div class="input-field col s2">
              <input type="number" name="nota_individuales_5" value="<?php echo $calificaciones["INDIVUDUAL_N5"]; ?>">
            </div>
            </div>
          </div>

          <div id="row" class="row card-panel">
            <div class="titulo">
              <p>CALIFICACIONES DE TRABAJOS GRUPALES</p>
            </div>

          <table class="centered">
            <thead>
              <th class="col s2">NOTA 1</th>
              <th class="col s2">NOTA 2</th>
              <th class="col s2">NOTA 3</th>
              <th class="col s2">NOTA 4</th>
              <th class="col s2">NOTA 5</th>
            </thead>
          </table>
          <div class="input">
              <div class="input-field col s2">
                <input type="number" name="nota_grupal_1" value="<?php echo $calificaciones["GRUPAL_N1"]; ?>">
              </div>
              <div class="input-field col s2">
                <input type="number" name="nota_grupal_2" value="<?php echo $calificaciones["GRUPAL_N2"]; ?>">
              </div>
              <div class="input-field col s2">
                <input type="number" name="nota_grupal_3" value="<?php echo $calificaciones["GRUPAL_N3"]; ?>">
              </div>
              <div class="input-field col s2">
                <input type="number" name="nota_grupal_4" value="<?php echo $calificaciones["GRUPAL_N4"]; ?>">
              </div>
              <div class="input-field col s2">
                <input type="number" name="nota_grupal_5" value="<?php echo $calificaciones["GRUPAL_N5"]; ?>">
              </div>
              </div>
            </div>

            <div id="row" class="row card-panel">
              <div class="titulo">
                <p>CALIFICACIONES DE LECCIONES</p>
              </div>

            <table class="centered">
              <thead>
                <th class="col s2">NOTA 1</th>
                <th class="col s2">NOTA 2</th>
                <th class="col s2">NOTA 3</th>
                <th class="col s2">NOTA 4</th>
              </thead>
            </table>
            <div class="input">
                <div class="input-field col s2">
                  <input type="number" name="nota_leccion_1" value="<?php echo $calificaciones["LECCION_N1"]; ?>">
                </div>
                <div class="input-field col s2">
                  <input type="number" name="nota_leccion_2" value="<?php echo $calificaciones["LECCION_N2"]; ?>">
                </div>
                <div class="input-field col s2">
                  <input type="number" name="nota_leccion_3" value="<?php echo $calificaciones["LECCION_N3"]; ?>">
                </div>
                <div class="input-field col s2">
                  <input type="number" name="nota_leccion_4" value="<?php echo $calificaciones["LECCION_N4"]; ?>">
                </div>
                </div>
              </div>
              <br><br>
              <center>
              <div id="row" class="row">
                <button class="btn waves-effect waves-light" type="submit" name="action">ENVIAR CALIFICACIONES</button>
                </div>
              </center>


    </form>
  </div>

     </main>

   </body>
   <style media="screen">
   .input{
     text-align: center;
     margin-left: 2%;
     margin-right: 2%;
     align-items: center;
   }

   table{
     align-items: center;
     width: 90%;
     margin-left: 4%;
     margin-right: 4%;
   }
   th{
     margin-left: 4%;
   }

     #row{
       padding-left: 2%;
       width: 40%;
       display: inline-block;
       margin-left: 4%;
       margin-right: 4%;
     }

     #row1{
       width: 88%;
       margin-left: 4%;
       margin-right: 4%;
     }

     .titulo{
      font-size: 1.5rem;
      margin-bottom: 4%;
     }
   </style>
 </html>
