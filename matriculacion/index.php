
<?php
session_start();
require_once '../SGA/global/ClassGlobalConexion.php';
require_once '../SGA/model/ClassModelConsultas.php';
require_once '../SGA/global/ClassGlobalSidenav.php';
if (isset($_SESSION['USER_GL'])) {
    $_SESSION['USER_GL'];
    $_SESSION['TYPE_USER'];
} else {
    //header('location: ../../index.html');
}
$objectS = new Sidenav();
$object = new Consultas();
//$sidenav = $objectS->get_Sidenav($_SESSION['USER_GL']);
 ?>

 <!DOCTYPE html>
 <html lang="es">
   <head>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     <link rel="stylesheet" href="../SGA/css/general_user.css">
     <link rel="stylesheet" href="../SGA/css/sidenav.css">
     <script type="text/javascript" src="../SGA/js/inputs.js"></script>
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
             <img src="./logo.png" alt="">
           </div>

           <div class="logo-letras">
             <p>ESCUELA PARTICULAR JOAQUIN GALLEGOS LARA</p>
           </div>
         </div>
       </div>
     </header>

     <main>

<div id="section" class="section container">
  <div id="form-tittle" class="row card-panel">
    <p>MATRICULACION</p>
  </div>
       <div class="row">
    <form class="col s12" method="POST" action="../SGA/controller/ClassControllerPersonas.php" enctype="multipart/form-data">
      <div id="form-section" class="row card-panel">
        <div id="form-tittle" class="row card-panel">
          <p>DATOS DEL ALUMNO</p>
        </div>
        <div class="input-field col s6">
          <input onpaste="return false" minlength="10"  maxlength="13"  id="cedula_a" name="cedula_a" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloCedula(event)" required>
          <label for="cedula_a">CEDULA DEL ALUMNO</label>
        </div>
          <div class="file-field col s6 input-field">
            <div class="btn">
              <span>FOTO</span>
              <input type="file" name="alumno_foto" required>
            </div>
            <div class="file-path-wrapper">
              <input name="alumno_foto" class="file-path validate" type="text">
            </div>
          </div>
        <div class="input-field col s6">
          <input onpaste="return false" minlength="5" maxlength="50" id="nombres_a" name="nombres_a" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" required>
          <label for="nombres_a">NOMBRES</label>
        </div>
        <div class="input-field col s6">
          <input onpaste="return false" minlength="5" maxlength="50" id="apellidos_a" name="apellidos_a" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" required>
          <label for="apellidos_a">APELLIDOS</label>
        </div>
        <div class="input-field col s12">
          <input onpaste="return false" minlength="5" maxlength="10" id="fecha_a" name="fecha_a" type="text" class="datepicker" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" required>
          <label for="fecha_a">FECHA DE NACIMIENTO</label>
        </div>

        <div class="input-field col s12">
          <input onpaste="return false" minlength="5" maxlength="200" id="antecedentes_a" name="antecedentes_a" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloMail(event)" required>
          <label for="antecedentes_a">ANTECEDENTES DE SALUD</label>
        </div>
        <div class="input-field col s6">
    <select name="vacuna_a">
      <option value="" disabled selected></option>
      <option value="1">SI</option>
      <option value="0">NO</option>
    </select>
    <label>PERMISO DE VACUNACION</label>
  </div>
  <div class="input-field col s6">
    <input onpaste="return false" minlength="5" maxlength="50" id="nacionalidad_a" name="nacionalidad_a" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" required>
    <label for="nacionalidad_a">NACIONALIDAD</label>
  </div>
        <div class="input-field col s12">
          <input onpaste="return false" minlength="5" maxlength="200" id="direccion_a" name="direccion_a" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloMail(event)" required>
          <label for="direccion_a">DIRECCION DOMICILIARIA</label>
        </div>
          <div class="input-field col s6">
          <select name="otra_institucion_a" id="otra_institucion_a" onchange="carg(this);">
            <option value="2" disabled selected></option>
            <option value="1">SI</option>
            <option value="0">NO</option>
          </select>
          <label>¿VIENE DE OTRA INSTITUCIÓN?</label>
        </div>
        <div class="input-field col s6">
          <input onpaste="return false" maxlength="100"   id="institucion_a" name="institucion_a" type="text"  onkeyup="Mayus(this);" onkeypress="return soloMail(event)" >
          <label for="institucion_a">INSTITUCION DE DONDE VIENE</label>
        </div>

        <div class="input-field col s12">
    <select name="curso">
      <option value="" disabled selected></option>
      <?php echo $cursos = $object->get_Cursos(); ?>
    </select>
    <label>SELECCIONA TU CURSO</label>
  </div>
      </div>


      <div id="form-section" class="row card-panel">
        <div id="form-tittle" class="row card-panel">
          <p>DATOS DEL REPRESENTANTE</p>
        </div>
        <div class="input-field col s6">
          <input onpaste="return false" maxlength="13" minlength="10"  id="cedula_r" name="cedula_r" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloCedula(event)" required>
          <label for="cedula_r">CEDULA DEL REPRESENTANTE</label>
        </div>
        <div class="file-field col s6 input-field">
          <div class="btn">
            <span>FOTO</span>
            <input type="file" name="representante_foto" required>
          </div>
          <div class="file-path-wrapper">
            <input name="representante_foto" class="file-path validate" type="text">
          </div>
        </div>
        <div class="input-field col s6">
          <input onpaste="return false" minlength="5" maxlength="50" id="nombres_r" name="nombres_r" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" required>
          <label for="nombres_r">NOMBRES</label>
        </div>
        <div class="input-field col s6">
          <input onpaste="return false" minlength="5" maxlength="50" id="apellidos_r" name="apellidos_r" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" required>
          <label for="apellidos_r">APELLIDOS</label>
        </div>
        <div class="input-field col s6">
          <input onpaste="return false" minlength="5" maxlength="50" id="nacionalidad_r" name="nacionalidad_r" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" required>
          <label for="apellidos_a">NACIONALIDAD</label>
        </div>
        <div class="input-field col s6">
          <input onpaste="return false" minlength="5" maxlength="50" id="nivel_edu" name="nivel_edu" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" required>
          <label for="profesion_r">NIVEL DE EDUCACIÓN</label>
        </div>
        <div class="input-field col s12">
          <input onpaste="return false" minlength="5" maxlength="50" id="profesion_r" name="profesion_r" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" required>
          <label for="profesion_r">OCUPACIÓN</label>
        </div>
        <div class="input-field col s12">
          <input onpaste="return false" minlength="5" maxlength="10" minlength="7" id="telefono_r" name="telefono_r" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)" required>
          <label for="telefono_r">TELEFONO/CELULAR</label>
        </div>
        <div class="input-field col s12">
          <input onpaste="return false" minlength="5"  maxlength="200" id="correo_r" name="correo_r" type="email" class="validate"  onkeypress="return soloMail(event)" required>
          <label for="correo_r">CORREO ELECTRONICO</label>
        </div>
        <div class="input-field col s12">
          <input onpaste="return false" minlength="5" maxlength="200"  id="direccion_r" name="direccion_r" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloMail(event)" required>
          <label for="direccion_r">DIRECCION DOMICILIARIA</label>
        </div>
        <div class="input-field col s12">
          <input onpaste="return false" minlength="5" maxlength="10" id="whatsapp_r" name="whatsapp_r" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)" required>
          <label for="whatsapp_r">NUMERO DE WHATSAPP</label>
        </div>
      </div>

  </div>
  <center>
  <div class="input-field col s12">
    <button class="btn-large waves-effect waves-light" type="submit" name="action" id="btn">ENVIAR
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

       .row,.section,.container{
         width: 100%;
       }
       @media screen and (min-width: 1000px) {
         #form-section{
           width: 100%;
           display: inline-block;
           width: 49%;
           margin-left: 1%;
       }

       }
       @media screen and (min-width: 321px) and (max-width : 997px) {
         #form-section{
           width: 100%;
           margin-left: 1%;
       }
     }
     </style>


     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <script src="../SGA/js/init.js"></script>
     <script type="text/javascript">
     document.addEventListener('DOMContentLoaded', function() {
       var elems = document.querySelectorAll('select');
       var instances = M.FormSelect.init(elems);
     });

      var input = document.getElementById('institucion_a');

      function carg(elemento) {
        d = elemento.value;

        if(d == "0" || d == "2"){
          input.disabled = true;
          input.value = "NINGUNA";
          input.disabled = false;
          input.focus();
          input.disabled = true;
        }else{
          input.disabled = false;
          input.value = "";
          input.focus();
        }
      }
     </script>

   </body>
 </html>
