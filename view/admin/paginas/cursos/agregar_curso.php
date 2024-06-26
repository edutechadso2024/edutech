<?php
$urlStarter = '../../../view/admin/';  //son desde el controlador
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- SwadeetAlert2 -->
  <link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="../../../resource/css/mensajes_alertas/mensajes_alertas.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <!--VISTA BRAYAN INICIO ADMIN -->

  <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include('../../../view/admin/layouts/nav.php'); ?>
    <!-- /.navbar -->

    <!-- Main Nav Asidebar Container -->
    <?php include('../../../view/admin/layouts/nav_aside.php'); ?>
    <!-- Fin del Main Nav Asidebar Container -->



    <!-- TODA LA PAGINA -->
    <div class="content-wrapper">
      <!-- Titulo de la vista -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Agregar cursos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="./controller_gestionar_cursos">Cursos</a></li>
                <li class="breadcrumb-item active">Agregar curso</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.fin titulo de la vista -->


      <section class="content">
        <button id="btnSuccess" type="button" class="btn btn-success swalDefaultSuccess" style="display:none"></button>
        <button id="btnInfo" type="button" class="btn btn-success swalDefaultInfo" style="display:none "></button>
        <button id="btnError" type="button" class="btn btn-success swalDefaultError" style="display:none "></button>
        <button id="btnWarning" type="button" class="btn btn-success swalDefaultWarning" style="display:none "></button>

        <?php

        if (isset($errores_foto) || isset($errores_inputs)) {
          echo "<div class='container-fluid' style='max-width:1000px;'>"; // Contenedor principal

          // Muestra errores de la foto si existen
          if (isset($errores_foto) && is_array($errores_foto) && !empty($errores_foto)) {
            echo "<div class='alert alert-danger alert-dismissible'>";
            echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true' style='font-size:20px; opacity:0.5;'>x</button>";
            echo "<h5><i class='icon fas fa-ban'></i> Errores en la foto:</h5>";
            echo "<ul class='list-group list-group-flush pl-3'>";
            foreach ($errores_foto as $error) {
              echo "<li class=''>" . $error . "</li>";
            }
            echo "</ul>";
            echo "</div>";
          }

          // Muestra errores de los inputs si existen
          if (isset($errores_inputs) && is_array($errores_inputs) && !empty($errores_inputs)) {
            echo "<div class='alert alert-danger alert-dismissible'>";
            echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true' style='font-size:20px; opacity:0.5;'>x</button>";
            echo "<h5><i class='icon fas fa-ban'></i> Errores:</h5>";
            echo "<ul class='list-group list-group-flush pl-3'>";
            foreach ($errores_inputs as $error) {
              echo "<li class=''>" . $error . "</li>";
            }
            echo "</ul>";
            echo "</div>";
          }

          echo "</div>"; // Cierre del contenedor principal
        }
        ?>


        <!-- <div class="container-fluid" style="max-width: 1000px;"> -->
        <div class="container-fluid">
          <div class="row justify-content-center ">
            <div class="col-lg-6">
              <div class="formulario">
                <form action="" method='POST' enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="categoria">Categoria </label>
                        <select name="categoria" id="categoria" class="form-control">
                          <option value="0">Seleccione una categoría</option>
                          <?php

                          if (!empty($areas_bd)) {

                            foreach ($areas_bd as $area) {

                              echo "<option value='" . $area['id'] . "'>" . $area['name'] . "</option>";
                            }
                          } else {

                            echo "<option value='vacio'>No se encontraron áreas</option>";
                          }
                          ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nombre-curso">Nombre curso</label>
                        <input type="text" class="form-control" placeholder="Nombre del curso" id="nombre-curso" name="nombre-curso" required>
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <label>Agregar foto del curso</label> <br>
                      <div class="input-group mb-3">
                        <div class="custom-file">
                          <input type="file" class="" id="foto" name="foto" accept='image/*'>

                          archivo</label>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="descripcion">Descripción del curso</label>
                        <textarea required name="descripcion" id="descripcion" placeholder="Escriba aquí" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="descripcion">Temas</label>
                       <div class="alert alert-danger">
                       <ul class=" list-group list-group-flush pl-3">
                    
                    <li class="">Separar los temas por comas ","</li>
                    <li class="">Ejemplo: tema 1, tema 2, tema 3</li>
                  
                </ul>
                       </div>
                        <textarea required name="temas" id="temas" placeholder="Escriba aquí" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>

                  <!-- Botón -->
                  <div class="form-group text-center">
                    <input type="submit" value="confirmar" class="btn btn-success btn-md" />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <style>
        @media (max-width: 768px) {
          .col-lg-6 {
            width: 100% !important;
          }
        }
      </style>



      <!-- /. Maincontent -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Controlador del nav aSidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php include('../../../view/admin/layouts/footer.php'); ?>
    <!--FIN   Main Footer -->

  </div>
  <!--fin de toda la pagina wrapper -->
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- sweet alert -->
  <script src="../../../view/admin/plugins/sweetalert2/sweetalert2.min.js"></script>

  <script src="../../../view/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="../../../view/admin/plugins/toastr/toastr.min.js"></script>

  <?php
  $mensajeExito = $mensajeExito ?? ''; // Asegura que $mensaje_editar esté definido
  $mensajeColapso = $mensajeColapso ?? ''; // Asegura que $mensaje_editar esté definido
  $mensaje_warning = $mensaje_warning ?? ''; // Asegura que $mensaje_editar esté definido
  $mensaje_info = $mensaje_info ?? ''; // Asegura que $mensaje_editar esté definido
  ?>
  <script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        width: '80%',
        customClass: {
          container: 'mi-clase-personalizada'
        }


      });

      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          icon: 'success',
          title: '<?php echo $mensajeExito; ?>'

        })
      });
      $('.swalDefaultInfo').click(function() {
        Toast.fire({
          icon: 'info',
          title: '<?php echo $mensaje_info; ?>'
        })
      });
      $('.swalDefaultError').click(function() {
        Toast.fire({
          icon: 'error',
          title: '<?php echo $mensajeColapso; ?>'
        })
      });
      $('.swalDefaultWarning').click(function() {
        Toast.fire({
          icon: 'warning',
          title: '<?php echo $mensaje_warning; ?>'
        })
      });
      $('.swalDefaultQuestion').click(function() {
        Toast.fire({
          icon: 'question',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Verificar si la variable $mensaje_editar está definida
      <?php if (isset($mensajeExito) && !empty($mensajeExito)) : ?>
        $('#btnSuccess').click();
      <?php endif; ?>
      <?php if (isset($mensajeColapso) && !empty($mensajeColapso)) : ?>
        $('#btnError').click();
      <?php endif; ?>
      <?php if (isset($mensaje_warning) && !empty($mensaje_warning)) : ?>
        $('#btnWarning').click();
      <?php endif; ?>
      <?php if (isset($mensaje_info) && !empty($mensaje_info)) : ?>
        $('#btnInfo').click();
      <?php endif; ?>


    });
  </script>
  <!-- AdminLTE App -->
  <script src="../../../view/admin/dist/js/adminlte.min.js"></script>
</body>

</html>