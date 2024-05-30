<?php

session_start();
if (!isset($_SESSION['dni_session'])) {
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio = '../../../';  //esta ruta se usa para cerrar sesion en el nav

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../../../model/admin/areas/buscar_area_model.php');
$consult = new buscar_area_model();
if ($consult->traer_areas()) {
    $areas = $consult->traer_areas();
}
// RECIBE LOS MENSAJES DE EXITO O ERROR Y TAMBIEN EL AREA BUSCADA
if (isset($_GET['area_id'])) {
    $id_area = $_GET['area_id'];
    // traer area seleccionada
    $areaSelect = $consult->traer_area($id_area);
    // traer docentes vinculados
    $vinculados = $consult->traer_vinculados($id_area);
}
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
}
if (isset($_GET['error'])) {
    $mensaje_error = $_GET['error'];
}

if (isset($_GET['error2'])) {
    $mensaje_error = $_GET['error2'];
    $id_area = $_GET['area_id'];
    // traer area seleccionada
    $areaSelect = $consult->traer_area($id_area);
    // traer docentes vinculados
    $vinculados = $consult->traer_vinculados($id_area);
}
// RECIBE LOS EL FORMULARIO PARA TRAER LOS DATOS DE UN AREA Y LOS DOCENTES VINCULADOS
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['categoria']) && $_POST['categoria'] != '') {
    $id_area_activar = '';
    $id_area_desactivar = '';
    $_GET['id_area_activar'] = null;
    $_GET['id_area_desactivar'] = null;
    $mensaje = '';
    $error = '';
    $id_area = $_POST['categoria'];
    // traer area seleccionada
    $areaSelect = $consult->traer_area($id_area);

    // traer docentes vinculados
    $vinculados = $consult->traer_vinculados($id_area);
}

// RECIBE EL FORMULARIO PARA ACTUALIZAR EL AREA
if ($_POST and isset($_POST['nombre']) and isset($_POST['idArea']) and $_POST['nombre'] != '' and $_POST['precio'] != '' and $_POST['idArea']) {
    // Debugging (borrar después de verificar que los datos son correctos
    $nombre = $_POST['nombre'];
    $nombre = trim($nombre);
    $nombre = ucfirst($nombre); // Convierte la primera letra en mayúscula
    $id = $_POST['idArea'];


    $areaModel = new buscar_area_model();
    $areaModel->editarArea($nombre, $id);
    if ($areaModel) {
        $mensaje = 'Area actualizada correctamente';
    } else {
        $mensaje_error = 'Error al actualizar el area';
    }
}

// RECIBIR POR GET ID DESACTIVAR Y ACTIVAR EL AREA
if (isset($_GET['id_area_desactivar'])) {
    $id_area_desactivar = $_GET['id_area_desactivar'];
    $areaModel = new buscar_area_model();
    $areaModel->desactivarArea($id_area_desactivar);
    if ($areaModel) {
        $mensaje = 'Area desactivada correctamente';
        header('location: controller_buscar_area.php?mensaje=' . $mensaje . '');
    } else {
        $mensaje_error = 'Error al desactivar el area';
    }
}
if (isset($_GET['id_area_activar'])) {
    $id_area_activar = $_GET['id_area_activar'];
    $areaModel = new buscar_area_model();
    $areaModel->activarArea($id_area_activar);
    if ($areaModel) {
        $mensaje = 'Area activada correctamente';
        header('location: controller_buscar_area.php?mensaje=' . $mensaje . '');
    } else {
        $mensaje_error = 'Error al activar el area';
    }
}
include('../../../view/admin/paginas/areas/buscar_area.php');
