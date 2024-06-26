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
  <!-- necesario para el tamaño de mensajes alerta  -->

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
              <h1 class="m-0">Vincular docente</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="#">Areas</a></li>
                <li class="breadcrumb-item active">Vincular docente</li>
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

        <div class='container-fluid' style="max-width:1000px;">

          <div class="container mt-4">
            <div class="row  align-items-start">
              <!-- Formulario -->
              <div class="col-md-6 mb-4">
                <form action="" method="POST">
                  <div>


                    <div class="card-body">
                      <div class="form-group">
                        <label for="categoria">Seleccione área:</label>
                        <select class="form-control" name="area">
                          <option value='false' selected>Selecciona un área</option>
                          <?php foreach ($areas as $area) : ?>
                            <option value="<?php echo $area['id']; ?>"><?php echo $area['name']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="nombre-curso">Seleccione docente:</label>
                        <select class="form-control" name="docente">
                          <option value='false' selected>Selecciona un docente</option>
                          <?php foreach ($docentes as $docente) : ?>
                            <option value="<?php echo $docente['id']; ?>"><?php echo $docente['name'] . " " . $docente['lastname']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-success btn-md w-50 mt-3" onclick="showConfirmationDialog(event)">Vincular</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <!-- Tabla -->
              <div class="container mt-4">
                <div class="row ">
                  <div class="col-lg-8">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Docente</th>
                          <th>Area</th>
                          <th>Desvincular</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!empty($_SESSION['docentes_vinculados'])) : ?>

                          <?php foreach ($_SESSION['docentes_vinculados'] as $people_area) : ?>
                            <tr>

                              <td><?php echo htmlspecialchars($people_area['name']) . " " . htmlspecialchars($people_area['lastname']); ?></td>
                              <td><?php echo htmlspecialchars($people_area['area_name']); ?></td>
                              <td>
                                <a data-toggle="tooltip" title="Desvincular docente" class="btn btn-danger btn-sm ml-4" href='controller_vincular_docente.php?idDesvincular=<?php echo htmlspecialchars($people_area['id']); ?>&area_id=<?php echo htmlspecialchars($people_area['areas_id']); ?>'>
                                  <i class="fas fa-trash"></i>
                                </a>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                      </tbody>
                    </table>
                  <?php else : ?>
                    <p>No hay docentes vinculados.</p>
                  <?php endif; ?>

                  </table>
                  </div>
                </div>
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


  <!-- jQuery -->
  <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- sweet alert -->
  <script src="../../../view/admin/plugins/sweetalert2/sweetalert2.min.js"></script>

  <script>
    function showConfirmationDialog(event) {
      event.preventDefault(); // Prevent the form from submitting immediately
      Swal.fire({
        title: '¿Estás seguro?',
        text: "Vas a vincular un docente.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, vincular',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          // If confirmed, submit the form
          event.target.form.submit();
        }
      });
    }
  </script>

  <?php
  $mensaje_ok = $mensaje_ok ?? ''; // Asegura que $mensaje_editar esté definido
  $mensaje_error = $mensaje_error ?? ''; // Asegura que $mensaje_editar esté definido
  $mensaje_warning = $mensaje_warning ?? ''; // Asegura que $mensaje_editar esté definido
  $mensaje_info = $mensaje_info ?? ''; // Asegura que $mensaje_editar esté definido
  ?>
  <script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 8000,
        width: '80%',
        customClass: {
          container: 'mi-clase-personalizada'
        }


      });

      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          icon: 'success',
          title: '<?php echo $mensaje_ok; ?>'

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
          title: '<?php echo $mensaje_error; ?>'
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
      <?php if (isset($mensaje_ok) && !empty($mensaje_ok)) : ?>
        $('#btnSuccess').click();
      <?php endif; ?>
      <?php if (isset($mensaje_error) && !empty($mensaje_error)) : ?>
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