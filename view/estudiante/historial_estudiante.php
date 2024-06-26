

<?php 
$urlStarter='../../view/admin/';  //son desde el controlador
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
  <title>EduTech | Add Curso</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../view/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../view/admin/dist/css/adminlte.min.css">
  <!-- CSS CURSOS ADMIN -->

    <link rel="icon" href="../../resource/img/icons/logo-kepler-removebg-preview.png" />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php include('../../view/layout/nav_top_estudiante.php'); ?>
  <!-- /.navbar -->

  <!-- Main Nav Asidebar Container -->
  <?php include('../../view/layout/nav_aside_estudiante.php'); ?>
  <!-- Fin del Main Nav Asidebar Container -->
  
  <!-- TODA LA PAGINA -->
  <div class="content-wrapper">
    <!-- Titulo de la vista -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Panel Principal </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Agregar producto</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.fin titulo de la vista -->

    <!-- Contenido principal vista -->
    <section class="content">
      <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Gabriel Enrique Hernandez</h3>

          <div class="card-tools"  style="margin-right:3%;">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            
            <button type="button" class="btn btn-success"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
              </svg> <a href="cursos_activos.html" style="color:white;">Cursos activos</a> </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          ID
                      </th>
                      <th style="width: 20%">
                          Nombre Curso
                      </th>
                      <th style="width: 20%">
                          Docente
                      </th>
                      <th>
                          Fecha Inicio
                      </th>
                      <th style="width: 15%" class="text-center">
                          Fecha Fin
                      </th>
                      <th style="width: 20%" class="text-center">
                        total de horas
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                         <b> Matematicas</b>
                      </td>
                      <td>
                          Juan Carlos Quintero
                      </td>
                      <td class="project_progress">
                          21/02/2024
                          
                      </td>
                      <td class="project-state">
                          22/05/2024
                      </td>
                      <td class="project-actions text-center " >
                          50
                          
                      </td>
                  </tr>
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <b>Literatura</b>
                      </td>
                      <td>
                          vivian cobo
                      </td>
                      <td class="project_progress">
                          05/08/2024
                      </td>
                      <td class="project-state">
                          14/07/2024
                      </td>
                      <td class="project-actions text-center">
                          
                          90
                      </td>
                  </tr>
                  <tr>
                    <td>
                        #
                    </td>
                    <td>
                       <b> Matematicas</b>
                    </td>
                    <td>
                        Juan Carlos Quintero
                    </td>
                    <td class="project_progress">
                        21/02/2024
                        
                    </td>
                    <td class="project-state">
                        22/05/2024
                    </td>
                    <td class="project-actions text-center " >
                        50
                        
                    </td>
                </tr>
                <tr>
                  <td>
                      #
                  </td>
                  <td>
                     <b> Matematicas</b>
                  </td>
                  <td>
                      Juan Carlos Quintero
                  </td>
                  <td class="project_progress">
                      21/02/2024
                      
                  </td>
                  <td class="project-state">
                      22/05/2024
                  </td>
                  <td class="project-actions text-center " >
                      50
                      
                  </td>
              </tr>
                 
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>

    </section>
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
  <?php include('../../view/admin/layouts/footer.php'); ?>
  <!--FIN   Main Footer -->

</div> <!--fin de toda la pagina wrapper -->
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../view/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../view/admin/dist/js/adminlte.min.js"></script>
</body>
</html>




