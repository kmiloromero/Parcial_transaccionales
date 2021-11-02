<?php
include "../conexion.php";
$nombrePersona = array();
$persona = mysqli_query($conn, "SELECT * FROM persona ");

$claseTipo = array();
$tipo = mysqli_query($conn, "SELECT * from tipoVehiculo ");
while ($rowtipoVehiculo = mysqli_fetch_array($tipo)) {
	$claseTipo[$rowtipoVehiculo['idTipo']] = $rowtipoVehiculo['clase'];
}



?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registro de vehivculo</title>
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

	<input type="button" class="btn btn-success" value="Nuevo Registro de Vehiculo" onClick="abrir_modal();"><br /><br />
	<table id="tabla1" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>idVehiculo</th>
				<th>Marca</th>
				<th>Placa</th>
				<th>Idpersona</th>
				<th>idTipo</th>
				<th>Editar</th>
				<th>Eliminar</th>
				<th>Generar información</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$vehiculo = mysqli_query($conn, "SELECT * FROM vehiculo ");
			foreach ($vehiculo as $rowvehiculo) {
			?>
				<tr>
					<td><?= $rowvehiculo['idVehiculo'] ?></td>
					<th><?= $rowvehiculo['marca'] ?></th>
					<th><?= $rowvehiculo['placa'] ?></th>
					<th><?= $rowvehiculo['idPersona'] ?></th>
					<th><?= $rowvehiculo['idTipo'] ?></th>
					<td><input type="button" value="Editar" class="btn btn-warning" onClick="editar_vehiculo(<?= $rowvehiculo['idVehiculo'] ?>,'<?= $rowvehiculo['marca'] ?>','<?= $rowvehiculo['placa'] ?>','<?= $rowvehiculo['idPersona'] ?>','<?= $rowvehiculo['idTipo'] ?>');" /></td>
					<td><input type="button" value="Eliminar" class="btn btn-danger" onClick="eliminar_vehiculo(this,<?= $rowvehiculo['idVehiculo'] ?>);" /></td>
					<td><input type="button" class="btn btn-primary" value="Generar" onClick="abrir_modal2(<?= $rowvehiculo['idVehiculo'] ?>);"></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>


	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 id='modal-titulo' class="modal-title">Registro de Vehiculo</h4>
				</div>
				<div class="modal-body">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<div class="form-group">
									<input type="text" class="form-control" id="idVehiculo" placeholder="id Vehiculo">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="marca" placeholder="Marca">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="placa" placeholder="Placa">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<select class="form-control" id="idPersona">
										<option value="0">--Seleccione Id Usuario--</option>
										<?php
										foreach ($persona as $rowpersona) {
										?>
											<option value="<?= $rowpersona['idPersona'] ?>"><?= $rowpersona['idPersona'].'-'.$rowpersona['nombre']?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" id="idTipo">
										<option value="0">--Seleccione Id Tipo--</option>
										<?php
										foreach ($tipo as $rowvehiculo) {
										?>
											<option value="<?= $rowvehiculo['idTipo'] ?>"> <?= $rowvehiculo['idTipo'].'-'.$claseTipo[$rowvehiculo['idTipo']]?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<input type="button" id="camb_boton" class="btn btn-success" value="Guardar" onClick="crear_vehiculo();">
				</div>
			</div>
		</div>
	</div>

		<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   		<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLongTitle">Informacion de Vehiculo</h5>
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
	$(function() {
		$("#tabla1").DataTable();
	});

	function abrir_modal() {
		$('#myModal').modal('show');
		document.getElementById('modal-titulo').innerHTML="Registrar Vehiculo";
		document.getElementById('idVehiculo').value='';
		document.getElementById('idVehiculo').disabled=false;
		document.getElementById('marca').value='';
		document.getElementById('placa').value='';
		document.getElementById('idPersona').value='0';
		document.getElementById('idTipo').value='0';
		document.getElementById('camb_boton').setAttribute("value", "Guardar").onClick("crear_vehiculo();");
	}

		function abrir_modal2(idVehiculo) {
		$('#myModal2').modal('show');
		document.getElementById('modal-titulo').innerHTML="Informacion de Vehiculo";
		$("#modalgenerar").load('cargar.php', {
				bloque: 'generarVehiculo',
				idVehiculo: idVehiculo
			}
			);	
	}

	function crear_vehiculo() {
		idVehiculo = document.getElementById('idVehiculo').value;
		marca = document.getElementById('marca').value;
		placa = document.getElementById('placa').value;
		idPersona = document.getElementById('idPersona').value;
		idTipo = document.getElementById('idTipo').value;

		if (idVehiculo == '' || marca == '' || placa == '' || idPersona == '' || idTipo == '') {
			alert('falta diligenciar algun dato');
		} else {
			$("#resp").load('cargar.php', {
				bloque: 'crear_vehiculo',
				idVehiculo: idVehiculo,
				marca: marca,
				placa: placa,
				idPersona: idPersona,
				idTipo: idTipo
			}, function(response, status, xhr) {
				if (response == 1) {
					location.reload();
				}
			});
		}

	}

	function editar_vehiculo(idVehiculo, marca, placa, idPersona, idTipo) {
		$('#myModal').modal('show');
		document.getElementById('modal-titulo').innerHTML="Actualizar Registro de Vehiculo";
		document.getElementById('idVehiculo').value = idVehiculo;
		document.getElementById('idVehiculo').disabled=true;
		document.getElementById('marca').value = marca;
		document.getElementById('placa').value = placa;
		document.getElementById('idPersona').value = idPersona;
		document.getElementById('idTipo').value = idTipo;
		document.getElementById('camb_boton').setAttribute("value", "Actualizar");
		document.getElementById('camb_boton').setAttribute("onClick", "actualizar_vehiculo(" + idVehiculo + ");");
	}



	function actualizar_vehiculo(idVehiculo, marca, placa, idPersona, idTipo) {
		idVehiculo = document.getElementById('idVehiculo').value;
		marca = document.getElementById('marca').value;
		placa = document.getElementById('placa').value;
		idPersona = document.getElementById('idPersona').value;
		idTipo = document.getElementById('idTipo').value;


		if (idVehiculo == '' || marca == '' || placa == '' || idPersona == '' || idTipo == '') {
			alert('falta diligenciar algun dato');
		} else {
			$("#resp").load('cargar.php', {
				bloque: 'act_vehiculo',
				idVehiculo: idVehiculo,
				marca: marca,
				placa: placa,
				idPersona: idPersona,
				idTipo: idTipo
			}, function(response, status, xhr) {
				if (response == 1) {
					location.reload();
				}
			});
		}

	}

	function eliminar_vehiculo(esto, id) {
		$(esto).closest('tr').remove();
		$("#resp").load('cargar.php', {
			bloque: 'eli_vehiculo',
			idVehiculo: id
		}, function(response, status, xhr) {
			if (response == 1) {
				location.reload();
			}
		});
	}

	
</script>

</html>