<?php
session_start();
require_once '../global/ClassGlobalConexion.php';
require_once '../model/ClassModelMatriculas.php';
require_once '../model/ClassModelConsultas.php';
$cedula = $_REQUEST['cedula'];
$paralelo = $_REQUEST['paralelo'];

$objMatricula = new NuevasMatriculas();
$matricula = $objMatricula->new_Matricula($cedula,$paralelo);
$curso = $objMatricula->cursoMatricula($cedula);


if ($matricula === 1) {
  echo "ALUMNO MATRICULADO CON EXITO";
  echo '<meta http-equiv="refresh" content="3; url=../view/admin/lista_alumnos_matricula.php?COD_CURSO='.$curso['COD_CURSO'].'">';
}elseif ($matricula === 2) {
  echo "CONSULTA NO DEFINIDA";
  echo '<meta http-equiv="refresh" content="3; url=../view/admin/lista_alumnos_matricula.php?COD_CURSO='.$curso['COD_CURSO'].'">';
}elseif($matricula === 0){
  echo "NO SE MATRICULO EL ALUMNO INTENTE NUEVAMENTE";
  echo '<meta http-equiv="refresh" content="3; url=../view/admin/lista_alumnos_matricula.php?COD_CURSO='.$curso['COD_CURSO'].'">';
}
 ?>
