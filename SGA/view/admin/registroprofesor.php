<?php
session_start();
require_once '../../global/ClassGlobalConexion.php';
require_once '../../model/ClassModelConsultas.php';
if (isset($_SESSION['USER_GL'])) {
    $_SESSION['USER_GL'];
    $_SESSION['TYPE_USER'];
} else {
    //header('location: ../../index.html');
}
$object = new Consultas();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>REGISTRO DE DOCENTES</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="../../css/general_user.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <script type="text/javascript" src="../../js/inputs.js"></script>
</head>
<body>

	<header>
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
     <li id="li-center"><a id="option1" href="generaladmin.php"><i class="material-icons">home</i>Inicio</a></li>
     <li id="li-center"><a id="option5" href="../../Global/logout.php"><i class="material-icons">logout</i>Cerrar Sesion</a></li>
     <li><div class="divider"></div></li>
     <li><a class="subheader">Opciones</a></li>
     <li id="li-center"><a id="option2" class="waves-effect" href="./actualizacion_de_datos.php"><i class="material-icons">assignment</i>Actualizar Datos</a></li>
     <li id="li-center"><a id="option3" class="waves-effect" href="./calificaciones.php"><i class="material-icons">favorite</i>Calificaciones</a></li>
     <li id="li-center"><a id="option4" class="waves-effect" href="./pagos.php"><i class="material-icons">payment</i>Tus Pagos</a></li>
          <li id="li-center"><a id="option4" class="waves-effect" href="./registroprofesor.php"><i class="material-icons">payment</i>Registrar Profesor</a></li>
   </ul>
      </header>



	</header>

<style type="text/css">

	#section{
		margin-top : 3%;
	}

</style>

	<div id="section" class="section container">
      <div id="form-tittle" class="row card-panel">
      <p>REGISTRO DE DOCENTES</p>
  </div>

	<div class="row">
    <form class="col s12" method="POST" action="../../controller/ClassControllerDocentes.php" enctype="multipart/form-data">
      <div class="row card-panel">

				<div class="input-field col s12">
		<select name="curso">
			<option value="" disabled selected></option>
			<?php echo $cursos = $object->get_Cursos(); ?>
		</select>
		<label>ASIGNA EL CURSO</label>
	</div>
      	        <div class="input-field col s6">
          <input id="cedula" name="cedula" type="text" class="validate" onkeypress="return soloNumeros(event)" required>
          <label for="cedula">CEDULA </label>
        </div>
        <div class="input-field col s6">
          <input id="nombre" name="nombre" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" required>
          <label for="nombre">NOMBRES  </label>
        </div>
        <div class="input-field col s6">
          <input id="apellido" name="apellido" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" required>
          <label for="apellido">APELLIDOS </label>
        </div>
 <div class="input-field col s6">
          <input id="fecha_a" name="fecha_a" type="text" class="datepicker" required>
          <label for="fecha_a">FECHA DE NACIMIENTO</label>
        </div>

        <div class="input-field col s6">
          <input id="edad" name="edad" type="text" class="validate" onkeypress="return soloNumeros(event)" required>
          <label for="edad">EDAD </label>
        </div>

         <div class="input-field col s6">
          <input id="nacionalidad" name="nacionalidad" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" required>
          <label for="nacionaldad">NACIONALIDAD </label>
        </div>

        <div class="input-field col s6">
          <input id="dirrecion" name="direcion" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloMail(event)" required>
          <label for="direcion">DIRECCION </label>
        </div>

         <div class="input-field col s6">
          <input id="telefono" name="telefono" type="text" class="validate" onkeypress="return soloNumeros(event)" required>
          <label for="telefono">TELEFONO </label>
        </div>


        <div class="input-field col s6">
          <input id="correo" name="correo" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloMail(event)" required>
          <label for="correo">CORREO </label>
        </div>

        <div class="input-field col s6">
          <input id="ocupacion" name="ocupacion" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" required>
          <label for="ocupacion">OCUPACION </label>
        </div>

        <div class="input-field col s6">
          <input id="profesion" name="profesion" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" required>
          <label for="profesion">PROFESION </label>
        </div>

        <div class="input-field col s6">
          <input id="nivel_educativo" name="nivel_educativo" type="text" class="validate" onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" required>
          <label for="nivel_educativo">NIVEL DE EDUCACION </label>
        </div>

        <div class="input-field col s6">
          <input id="whatsapp" name="whatsapp" type="text" class="validate" onkeypress="return soloNumeros(event)" required>
          <label for="whatsapp">WHATSAPP </label>
        </div>
<div class="file-field col s6 input-field">
            <div class="btn">
              <span>Foto</span>
              <input type="file" name="docente_foto" required>
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>

     <center>
      <div class="input-field col s12">
        <button class="btn-large waves-effect waves-light" type="submit" name="action" id="btn">REGISTRAR
          <i class="material-icons left">send</i>
        </button>
      </div>
    </center>
      </div>
    </form>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="../../js/init.js"></script>

</body>
</html>
