<?php
session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav

include('../../../model/admin/usuarios/editar_usuario_model.php');
if (isset($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];
    $tipo_usuario = $_GET['tipo_usuario'];
    $consult = new editar_usuario_model(); 
    $usuario = $consult->traer_usuario($id_usuario);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $id = $_POST['id'];
    $nombre = $_POST['name'];
    $apellido = $_POST['lastname'];
    $ciudad = $_POST['city'];
    $direccion = $_POST['address'];
    $fecha_nacimiento = $_POST['birthdate'];
    $sexo = $_POST['sex'];
    $correo = $_POST['email'];
    $tipo_documento = $_POST['dni_type'];
    $rol=$_POST['rol'];

    $consult = new editar_usuario_controller();
    $validar = $consult->validar_campos($id, $nombre, $apellido, $ciudad, $direccion, $fecha_nacimiento, $sexo, $correo, $tipo_documento,$rol);
    if ($validar) {
        $mensaje = 'El usuario ha sido modificado con exito';
        header("Location: controller_usuarios_totales.php?mensaje=" . urlencode($mensaje) . "&tipo_usuario=" . $tipo_usuario);

    } else {
    $mensaje = $consult->mensaje;
    }
}

class editar_usuario_controller
{
    public $mensaje;
    public function __construct()
    {
    }

    public function validar_campos($id, $nombre, $apellido, $ciudad, $direccion, $fecha_nacimiento, $sexo, $correo, $tipo_documento,$rol)
    {
        // Validar que no estén vacíos
        if (empty($nombre) || empty($apellido) || empty($ciudad) || empty($direccion) || empty($correo) || empty($rol)) {
           
            $this->mensaje = 'por favor complete los campos vacíos';
            exit;
        } else {
          
            // Eliminar espacios en blanco al principio y al final
            $nombre = trim($nombre);
            $apellido = trim($apellido);
            $ciudad = trim($ciudad);
            $direccion = trim($direccion);
            $correo = trim($correo);

            // Reemplazar múltiples espacios por uno solo
            $nombre = preg_replace('/\s+/', ' ', $nombre);
            $apellido = preg_replace('/\s+/', ' ', $apellido);
            $ciudad = preg_replace('/\s+/', ' ', $ciudad);

            // Convertir a minúsculas y asegurar que solo la primera letra de cada palabra esté en mayúsculas
            $nombre = ucwords(strtolower($nombre));
            $apellido = ucwords(strtolower($apellido));
            $ciudad = ucwords(strtolower($ciudad));

            // Eliminar números de las variables específicas
            $nombre = preg_replace('/[0-9]/', '', $nombre);
            $apellido = preg_replace('/[0-9]/', '', $apellido);
            $ciudad = preg_replace('/[0-9]/', '', $ciudad);

            $fechaNacimiento = DateTime::createFromFormat('Y-m-d', $fecha_nacimiento);

            $fechaActual = new DateTime();

            $fechaLimite = $fechaActual->modify('-3 years');

            $fechaLimiteInferior = DateTime::createFromFormat('Y-m-d', '1960-01-01');

            if ($fechaNacimiento >= $fechaLimiteInferior && $fechaNacimiento <= $fechaLimite) {
               
                $fechaParaMySQL = $fechaNacimiento->format('Y-m-d');
                $consult = new editar_usuario_model();
                $editar = $consult->editar_informacion($id, $nombre, $apellido, $ciudad, $direccion, $fechaParaMySQL, $sexo, $correo, $tipo_documento,$rol);
                if ($editar) {
                   
                    $mensaje = 'El usuario a sido editado con exito';
                    return true;
                } else {
                    return false;
                }
            } else {
               $this->mensaje='La fecha de nacimiento no es válida';
                return false;
            }

        }
    }
}
include('../../../view/admin/paginas/usuarios/editar_usuario.php');
