<!DOCTYPE html>
<html lang="en">
<?php
include("includes/header.php");
include("includes/navbar.php");
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="styles/Index.css">
  <title>Banco Sammy</title>
</head>

<body>
  <div class="contenedor-secciones">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </div>

  <body>
    <div class="contenedor-secciones">
      <div id="seccion-3" class="seccion">
        <!-- Sección 3: Recepción de response como mensajes -->
        <div class="card">
          <div class="card-header">
            <h2>Bienvenido al Sistema del Banco Sammy</h2>
          </div>
          <div class="card-body">
            <div class="alert alert-dark" role="alert" style="margin: 1rem;" id="resp">
              <div class="row">
                <div class="col-md-6 p-2">
                  <div class="card">

                    <div class="form-group-actions">
                      <h2 style="text-align: center">Cuenta Corriente</h2>
                    </div>

                    <div class="form-group-actions">
                      <a class="btn btn-warning" href="cuentacorriente.php"><button>Crear Cuenta Corriente</button></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 p-2">
                  <div class="card">

                    <div class="form-group-actions">
                      <h2 style="text-align: center">Cuenta de Ahorros</h2>
                    </div>

                    <div class="form-group-actions">
                      <a class="btn btn-warning" href="cuentaahorros.php"><button>Crear Cuenta de Ahorros</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  </body>
  <footer>
    <div class="container-fluid text-center fixed-bottom footerbancosammy" style="width: 100%; background-color: #2b3035; color:aliceblue">
      <div class="container-fluid row align-items-end" style="padding-right: 0px;margin-right: 0px;margin-left: 0px;padding-left: 0px;">
        <?php
        include("includes/Footer.php");
        ?>
      </div>
    </div>
  </footer>


  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
</body>

</html>