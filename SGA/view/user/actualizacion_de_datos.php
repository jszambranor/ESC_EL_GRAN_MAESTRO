<?php
session_start();
//require_once '../../Global/ClassGlobalConexion.php';
require_once '../../model/ClassModelConsultas.php';
require_once '../../global/ClassGlobalSidenav.php';
if (isset($_SESSION['USER_GL'])) {
    $_SESSION['USER_GL'];
    $_SESSION['TYPE_USER'];
} else {
    //header('location: ../../index.html');
}
$objectS = new Sidenav();
//$sidenav = $objectS->get_Sidenav($_SESSION['USER_GL']);
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
     <title>Home</title>
   </head>

   <body>

     <header>
       <?php echo $sidenav; ?>
     </header>

     <main>

  <!--     <div class="contenido">
           <p class="titulo">ACTUALIZACION DE DATOS</p>
       </div>-->

<div class="section container">
  <div id="form-tittle" class="row card-panel">
    <p>ACTUALIZACION DE DATOS</p>
  </div>
       <div class="row card-panel">
    <form class="col s12" method="POST" action="../../controller/ClassControllerUpPersonas.php">
      <div class="row">
        <div id="form-tittle" class="row card-panel">
          <p>DATOS DEL ALUMNO</p>
        </div>
        <div class="input-field col s12">
          <input readonly id="cedula_a" name="cedula_a" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
          <label for="cedula_a">CEDULA DEL ALUMNO</label>
        </div>
        <div class="input-field col s6">
          <input id="nombres_a" name="nombres_a" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
          <label for="nombres_a">NOMBRES</label>
        </div>
        <div class="input-field col s6">
          <input id="apellidos_a" name="apellidos_a" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
          <label for="apellidos_a">APELLIDOS</label>
        </div>
        <div class="input-field col s6">
          <input id="nacionalidad_a" name="nacionalidad_a" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
          <label for="nacionalidad_a">NACIONALIDAD</label>
        </div>
        <div class="input-field col s6">
          <input id="edad_a" name="edad_a" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
          <label for="edad_a">EDAD</label>
        </div>
        <div class="input-field col s12">
          <input id="antecedentes_a" name="antecedentes_a" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloMail(event)">
          <label for="antecedentes_a">ANTECEDENTES DE SALUD</label>
        </div>
        <div class="input-field col s12">
          <input id="direccion_a" name="direccion_a" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloMail(event)">
          <label for="direccion_a">DIRECCION DOMICILIARIA</label>
        </div>
        <div class="input-field col s12">
          <input id="institucion_a" name="institucion_a" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloMail(event)">
          <label for="institucion_a">INSTITUCION DE DONDE VIENE</label>
        </div>
      </div>
      <div class="row">
        <div id="form-tittle" class="row card-panel">
          <p>DATOS DEL REPRESENTANTE</p>
        </div>
        <div class="input-field col s12">
          <input readonly id="cedula_r" name="cedula_r" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
          <label for="cedula_r">CEDULA DEL REPRESENTANTE</label>
        </div>
        <div class="input-field col s6">
          <input id="nombres_r" name="nombres_r" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
          <label for="nombres_r">NOMBRES</label>
        </div>
        <div class="input-field col s6">
          <input id="apellidos_r" name="apellidos_r" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
          <label for="apellidos_r">APELLIDOS</label>
        </div>
        <div class="input-field col s6">
          <input id="profesion_r" name="profesion_r" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
          <label for="profesion_r">PROFESION</label>
        </div>
        <div class="input-field col s6">
          <input id="telefono_r" name="telefono_r" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
          <label for="telefono_r">TELEFONO</label>
        </div>
        <div class="input-field col s12">
          <input id="correo_r" name="correo_r" type="email" class="validate"  onkeypress="return soloMail(event)">
          <label for="correo_r">CORREO ELECTRONICO</label>
        </div>
        <div class="input-field col s12">
          <input id="direccion_r" name="direccion_r" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloMail(event)">
          <label for="direccion_r">DIRECCION</label>
        </div>
        <div class="input-field col s12">
          <input id="whatsapp_r" name="whatsapp_r" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
          <label for="whatsapp_r">NUMERO DE WHATSAPP</label>
        </div>
      </div>
      <div class="row">
              <div id="form-tittle" class="row card-panel">
                <p>DATOS DEL PADRE</p>
              </div>
              <div class="input-field col s12">
                <input readonly id="cedula_p" name="cedula_p" type="text" class="validate">
                <label for="cedula_p">CEDULA DEL PADRE</label>
              </div>
              <div class="input-field col s6">
                <input id="nombres_p" name="nombres_p" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
                <label for="nombres_p">NOMBRES</label>
              </div>
              <div class="input-field col s6">
                <input id="apellidos_p" name="apellidos_p" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
                <label for="apellidos_p">APELLIDOS</label>
              </div>
              <div class="input-field col s6">
                <input id="profesion_p" name="profesion_p" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
                <label for="profesion_p">PROFESION</label>
              </div>
              <div class="input-field col s6">
                <input id="telefono_p" name="telefono_p" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
                <label for="telefono_p">TELEFONO</label>
              </div>
              <div class="input-field col s12">
                <input id="correo_p" name="correo_p" type="email" class="validate"  onkeypress="return soloMail(event)">
                <label for="correo_p">CORREO ELECTRONICO</label>
              </div>
              <div class="input-field col s12">
                <input id="direccion_p" name="direccion_p" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloMail(event)">
                <label for="direccion_p">DIRECCION</label>
              </div>
              <div class="input-field col s6">
                <input id="whatsapp_p" name="whatsapp_p" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
                <label for="whatsapp_p">NUMERO DE WHATSAPP</label>
              </div>
              <div class="input-field col s6">
                <input id="educacion_p" name="educacion_p" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloMail(event)">
                <label for="educacion_p">NIVEL DE EDUCACION</label>
              </div>
      </div>
      <div class="row">
              <div id="form-tittle" class="row card-panel">
                <p>DATOS DE LA MADRE</p>
              </div>
              <div class="input-field col s12">
                <input readonly id="cedula_m" name="cedula_m" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
                <label for="cedula_m">CEDULA DE LA MADRE</label>
              </div>
              <div class="input-field col s6">
                <input id="nombres_m" name="nombres_m" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
                <label for="nombres_m">NOMBRES</label>
              </div>
              <div class="input-field col s6">
                <input id="apellidos_m" name="apellidos_m" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
                <label for="apellidos_m">APELLIDOS</label>
              </div>
              <div class="input-field col s6">
                <input id="profesion_m" name="profesion_m" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)">
                <label for="profesion_m">PROFESION</label>
              </div>
              <div class="input-field col s6">
                <input id="telefono_m" name="telefono_m" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
                <label for="telefono_m">TELEFONO</label>
              </div>
              <div class="input-field col s12">
                <input id="correo_m" name="correo_m" type="email" class="validate"  onkeypress="return soloMail(event)">
                <label for="correo_m">CORREO ELECTRONICO</label>
              </div>
              <div class="input-field col s12">
                <input id="direccion_m" name="direccion_m" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloMail(event)">
                <label for="direccion_m">DIRECCION</label>
              </div>
              <div class="input-field col s6">
                <input id="whatsapp_m" name="whatsapp_m" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
                <label for="whatsapp_m">NUMERO DE WHATSAPP</label>
              </div>
              <div class="input-field col s6">
                <input id="educacion_m" name="educacion_m" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloMail(event)">
                <label for="educacion_m">NIVEL DE EDUCACION</label>
              </div>
      </div>
      <center>
      <div class="input-field col s12">
        <button class="btn-large waves-effect waves-light" type="submit" name="action" id="btn">ACTUALIZAR DATOS
          <i class="material-icons left">send</i>
        </button>
      </div>
    </center>

    </form>
  </div>
</div>

     </main>

     <style media="screen">
       #option2{
         background-color: #95113E;
       }
     </style>


     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <script src="../../js/init.js"></script>
   </body>
 </html>
