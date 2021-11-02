<?php
include "../conexion.php";
$id_Persona = array();
$persona = mysqli_query($conn, "SELECT idPersona FROM persona ");
while ($rowpersona = mysqli_fetch_array($persona)) {
	$id_Persona[$rowpersona['idPersona']] = $rowpersona['idPersona'];
}

$id_Tipo = array();
$tipo = mysqli_query($conn, "SELECT idTipo from tipoVehiculo ");
while ($rowtipoVehiculo = mysqli_fetch_array($tipo)) {
	$id_Tipo[$rowtipoVehiculo['idTipo']] = $rowtipoVehiculo['idTipo'];
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Comprobante de Pago</title>
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

	
	<table id="tabla1" class="table table-striped table-bordered" style="width:100%">
	    <thead>
	        <tr>
	            <th>Id Comprobante</th>
	            <th>Id bahia</th>
	            <th>Id vehiculo</th>
	            <th>Tiempo</th>
	            <th>Costo</th>
	            <th>Fecha</th>
	            <th>Pago</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php
	    	$pago=mysqli_query($conn,"SELECT * FROM pago ");
	    	foreach ($pago as $rowspago) {			
	    	?>
		        <tr>
		            <td><?=$rowspago['idPago']?></td>
		            <th><?=$rowspago['idBahia']?></th>
		            <th><?=$rowspago['idVehiculo']?></th>
		            <th><?=$rowspago['tiempo']?></th>
		            <th><?=$rowspago['costo']?></th>
		            <th><?=$rowspago['fecha']?></th>
		            <td><input type="button" class="btn btn-primary" value="Generar" onClick="abrir_modal2(<?= $rowspago['idPago'] ?>);"></td>
						</tr>
		    <?php
	    	}
	      ?>
	    </tbody>
	</table>

		<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   		<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLongTitle">Comprobante de Pago</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      			    </div>
      				<div id="modalgenerar" class="modal-body">
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      				</div>
    		</div>
  		</div>
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

function abrir_modal2(idPago) {
		$('#myModal2').modal('show');
		$("#modalgenerar").load('cargar.php', {
				bloque: 'generarComprobante',
				idPago: idPago
			}
			);	
	}
  
</script>
</html>