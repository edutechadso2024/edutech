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
    <title>Horas docente</title>
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
                            <h1 class="m-0">Agregar horas</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.fin titulo de la vista -->


            <section class="content">
                <div class='d-flex justify-content-center'>
                    <?php if (!empty($mensaje_ok)) : ?>
                        <div class="alert alert-success col-md-8 ">
                            <?php echo $mensaje_ok; ?>
                            <?php $mensaje = ''; ?>
                        </div>
                    <?php elseif (!empty($mensaje)) : ?>
                        <div class="alert alert-danger col-md-8 ">
                            <?php echo $mensaje; ?>
                            <?php $mensaje = ''; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="container mt-4">
                    <div class="row justify-content-center align-items-start">
                        <!-- Formulario -->
                        <div class="col-md-6 mb-4">
                            <form action="" method="POST">
                                <div>


                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="docente">Seleccione Docente:</label>
                                            <select class="form-control" name="docente">
                                                <?php foreach ($docentes as $docente) : ?>
                                                    <option value="<?php echo $docente['id']; ?>"><?php echo $docente['name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="horas">Ingrese numero de horas:</label>
                                            <input type="number" class="form-control" id="horas" name="horas" min="0" step="1" required>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-success btn-md w-50 mt-3" onclick="showConfirmationDialog(event)">Agregar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Tabla -->
                        

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showConfirmationDialog(event) {
            event.preventDefault(); // Prevent the form from submitting immediately
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Vas a Agregar otra hora.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, agregar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    event.target.form.submit();
                }
            });
        }
    </script>
    <!-- jQuery -->
    <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../view/admin/dist/js/adminlte.min.js"></script>
</body>

</html>