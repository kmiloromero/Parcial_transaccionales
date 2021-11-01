<?php
include "../conexion.php";

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Prueba Registro</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="../dist/css/adminlte.min.css">
	<link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>


<div id="contenidos" style="margin: 1rem;padding: 1rem;">	
  <div class="form-group">
    <label for="exampleFormControlSelect1">Seleccione un parqueadero para verificas el numero de bahias que tiene disponibles</label>
  	<br />
    <select class="form-control" id="select_parqueadero">
      <option value="0" >--Seleccione Parqueadero--</option>
      <?php
			$parqueadero = mysqli_query($conn, "SELECT * FROM Parqueadero ");
			while ($rowparqueadero = mysqli_fetch_array($parqueadero)) {
			?>
				<option value="<?php echo $rowparqueadero['idParqueadero']; ?>"><?php echo $rowparqueadero['nombre'].'-'.$rowparqueadero['ubicacion']; ?></option>
			<?php
			}
			?>
    </select><br /><br />
    <input type="button" class="btn btn-success" value="Comprobar" onclick="validar();"><br /><br />
  </div>
</div>


<div id="resp"></div>

<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../plugins/toastr/toastr.min.js"></script>

<script>
	

	function validar() {
		parqueadero = document.getElementById('select_parqueadero').value;

		$("#resp").load('cargar.php', {
				bloque: 'validar',
				parqueadero: parqueadero
				}, function(response, status, xhr) {
				if (response == 1) {
					location.reload();
				}
			});		
	}
</script>

</html>