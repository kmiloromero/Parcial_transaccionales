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
        <h1>Cuenta de Ahorros</h1>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </div>

    <body>
        <div class="contenedor-secciones">
            <div class="row">
                <div class="col-lg-5">
                    <div class="seccion">
                        <!-- Sección 1: Creación de objetos mediante forms -->
                        <div class="card">
                            <div class="card-header">
                                <h2>Creacion Cuenta de Ahorros</h2>
                            </div>
                            <div class="card-body">
                                <form id="creacionCuentaAhorros">

                                    <div class="form-group">
                                        <label for="numerocuenta">Numero de Cuenta:</label>
                                        <input type="text" id="numerocuenta" name="numerocuenta" class="form-control" placeholder="Numero de Cuenta" required pattern="[1-9][0-9]{0,9}">
                                    </div>

                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="saldo">Saldo:</label>
                                        <input type="text" id="saldo" name="saldo" class="form-control" placeholder="Saldo" required pattern="[0-9]+">
                                    </div>

                                    <div class="form-group">
                                        <label for="saldo">Porcentaje Interes:</label>
                                        <input type="text" id="porcentajeInteres" name="porcentajeInteres" class="form-control" placeholder="Porcentaje de Interes" required pattern="[0-9]+([,\.][0-9]+)?">
                                    </div>

                                    <div class="form-group d-grid gap-2">
                                        <input id="cuentaahorros" value="Crear" onClick="creacionCuentaAhorros();" type="submit" value="Enviar" class="btn btn-outline-primary btn-lg" />
                                    </div>
                                    <script>
                                        document.getElementById('creacionCuentaAhorros').addEventListener('click', function(event) {
                                            event.preventDefault();
                                        });
                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="seccion">
                        <!-- Sección 2: Acciones que puede realizar el usuario -->
                        <div class="card">
                            <div class="card-header">
                                <h2>Acciones Disponibles</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 p-2">
                                        <div class="card">
                                            <form id="depositar">
                                                <div class="form-group-actions">
                                                    <label for="nombre">Cantidad:</label>
                                                    <input type="text" id="cantidadDeposito" name="cantidad" class="form-control" placeholder="Cantidad Deposito" required pattern="[0-9]+">
                                                </div>

                                                <div class="form-group-actions">
                                                    <button class="btn btn-success btn-md" value="depositar" onClick="depositarcuentaAhorros();">Depositar</button>
                                                </div>
                                            </form>
                                            <script>
                                                document.getElementById('depositar').addEventListener('click', function(event) {
                                                    event.preventDefault();
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="card">
                                            <form id="retirar">
                                                <div class="form-group-actions">
                                                    <label for="nombre">Cantidad:</label>
                                                    <input type="text" id="cantidadRetiro" name="cantidad" class="form-control" placeholder="Cantidad Retiro" required pattern="[0-9]+">
                                                </div>

                                                <div class="form-group-actions">
                                                    <button class="btn btn-danger btn-md" value="retirar" onClick="retirarcuentaAhorros();">Retirar</button>
                                                </div>
                                            </form>
                                            <script>
                                                document.getElementById('retirar').addEventListener('click', function(event) {
                                                    event.preventDefault();
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3 mb-3">
                                    <div class="col">
                                        <div class="card">
                                            <form id="consulta">
                                                <div class="form-group d-grid gap-2">
                                                    <button class="btn btn-primary btn-md" value="consultar" onClick="consultarcuentaAhorros();">consultar Saldo</button>
                                                </div>
                                            </form>
                                            <script>
                                                document.getElementById('consulta').addEventListener('click', function(event) {
                                                    event.preventDefault();
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <form id="depositarIntereses">
                                        <div class="card">
                                            <div class="row p-2">
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary btn-md" value="depositarIntereses" onClick="depositarIntereses();">Depositar Intereses</button>
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <label for="fecha">Fecha:</label>
                                                        <input type="date" class="form-control" id="fecha" name="fecha">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <script>
                                        document.getElementById('depositarIntereses').addEventListener('click', function(event) {
                                            event.preventDefault();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

        <div class="contenedor-secciones">
            <div id="seccion-3" class="seccion">
                <!-- Sección 3: Recepción de response como mensajes -->
                <div class="card">
                    <div class="card-header">
                        <h2>Mensajes de Respuesta</h2>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info" role="alert" style="margin: 1rem;" id="resp">
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