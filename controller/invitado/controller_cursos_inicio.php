<?php 
session_start();
$ruta_inicio='../../';  //esta ruta se usa para cerrar sesion en el nav
include('../../model/estudiante/catalogo_estudiante_model.php');

$ver_curso = new ver_curso(); // Crear una instancia de la clase ver_curso
$datos_curso = $ver_curso->seleccionar_curso(); // Obtener los datos de los cursos

// Organizar los datos por áreas para facilitar su visualización en la vista
$datos_organizados = [];
foreach ($datos_curso as $curso1) {
    $area = $curso1['area_name'];
    $datos_organizados[$area][] = $curso1;
}

$data = array('datos_organizados' => $datos_organizados); // Pasar los datos organizados a la vista

include('../../view/invitado/cursos.php');
?>