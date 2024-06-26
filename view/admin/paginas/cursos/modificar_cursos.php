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
              <h1 class="m-0">Modificar Curso</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="./controller_gestionar_cursos">Cursos</a></li>
                <li class="breadcrumb-item active">Modificar curso</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.fin titulo de la vista -->


      <section class="content">
        <!-- <div class="container-fluid"  style="max-width:1000px;"> -->
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="formulario">
                <form action="#">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="nombre-curso">Nombre curso</label>
                        <input type="text" name="nombre_curso" class="form-control">
                      </div>
                    </div>

                  </div>

                  <div class="form-group">
                    <label for="docente">Asignar docente</label>
                    <select name="docente" id="docente" class="form-control">
                      <option value="daniel">Daniel Amaya</option>
                      <option value="martin">Brayan Martin</option>
                      <option value="stich">Brayan Stich</option>
                      <option value="stiven">Brayan Stiven</option>
                      <option value="pedro">Pedro A Barrera</option>
                    </select>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" id="precio" value="15000" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="descripcion">Descripción del curso</label>
                        <textarea name="descripcion" id="descripcion" placeholder="Escriba aquí" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                  <!-- Botón -->
                  <div class="form-group text-center">
                    <a href="controller_descripcion_curso.php?id_curso=<?php echo $id_curso; ?>" class="btn btn-primary btn-md">Volver</a>
                    <input type="submit" value="Confirmar" class="btn btn-success btn-md" />
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

  </div> <!--fin de toda la pagina wrapper -->
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../view/admin/dist/js/adminlte.min.js"></script>
</body>

</html>