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

	<input type="button" class="btn btn-success" value="Nueva Persona" onClick="abrir_modal();"><br /><br />

	<table id="tabla1" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>idUsuario</th>
				<th>Cedula</th>
				<th>Nombre</th>
				<th>direccion</th>
				<th>Telefono</th>
				<th>Editar</th>
				<th>Eliminar</th>
				<th>Generar información</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$persona = mysqli_query($conn, "SELECT * FROM persona ");
			while ($rowpersona = mysqli_fetch_array($persona)) {
			?>
				<tr>
					<td><?= $rowpersona['idPersona'] ?></td>
					<td><?= $rowpersona['cedula'] ?></td>
					<td><?= $rowpersona['nombre'] ?></td>
					<td><?= $rowpersona['direccion'] ?></td>
					<td><?= $rowpersona['telefono'] ?></td>
					<td><input type="button" value="Editar" class="btn btn-warning" onClick="editar_Persona(<?= $rowpersona['idPersona'] ?>,'<?= $rowpersona['cedula'] ?>','<?= $rowpersona['nombre'] ?>','<?= $rowpersona['direccion'] ?>','<?= $rowpersona['telefono'] ?>');"/></td>
					<td><input type="button" value="Eliminar" class="btn btn-danger" onClick="eliminar_Persona(this,<?= $rowpersona['idPersona'] ?>);" /></td>
					<td><input type="button" class="btn btn-primary" value="Generar" onClick="abrir_modal2(<?= $rowpersona['idPersona'] ?>);"></td>
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
					<h4 id="modal-titulo" class="modal-title">Crear Usuarios</h4>
				</div>
				<div class="modal-body">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<div class="form-group">
									<input type="text" class="form-control" id="idPersona" placeholder="idPersona">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="cedula" placeholder="Cedula">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="nombre" placeholder="Nombre Persona">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<input type="text" class="form-control" id="direccion" placeholder="Direccion">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="telefono" placeholder="Telefono">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<input type="button" id="camb_boton" class="btn btn-success" value="Guardar" onClick="crear_Persona();">
				</div>
			</div>

		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   		<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLongTitle">Informacion de Usuario</h5>
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
		document.getElementById('modal-titulo').innerHTML="Crear Persona";
		document.getElementById('idPersona').value = '';
		document.getElementById('idPersona').disabled=false;
		document.getElementById('cedula').value = '';
		document.getElementById('nombre').value = '';
		document.getElementById('direccion').value = '';
		document.getElementById('telefono').value = '';
		document.getElementById('camb_boton').setAttribute("value", "Guardar");
		document.getElementById('camb_boton').setAttribute("onClick", "crear_Persona();");

	}

function abrir_modal2(idPersona) {
		$('#myModal2').modal('show');
		document.getElementById('modal-titulo').innerHTML="Informacion de Persona";
		$("#modalgenerar").load('cargar.php', {
				bloque: 'generarPersona',
				idPersona: idPersona
			}
			);	
	}

	function crear_Persona() {
		idPersona = document.getElementById('idPersona').value;
		cedula = document.getElementById('cedula').value;
		nombre = document.getElementById('nombre').value;
		direccion = document.getElementById('direccion').value;
		telefono = document.getElementById('telefono').value;

		if (idPersona == '' || cedula == '' || nombre == '' || direccion == '' || telefono == '') {
			alert('falta diligenciar algun dato');
		} else {
			$("#resp").load('cargar.php', {
				bloque: 'crear_persona',
				idPersona: idPersona,
				cedula : cedula,
				nombre : nombre,
				direccion: direccion,
				telefono : telefono
			}, function(response, status, xhr) {
				if (response == 1) {
					location.reload();
				}
			});
		}

	}

	function editar_Persona(idPersona, cedula, nombre, direccion, telefono) {
		$('#myModal').modal('show');
		document.getElementById('modal-titulo').innerHTML="Actualizar Persona";
		document.getElementById('idPersona').value = idPersona;
		document.getElementById('idPersona').disabled=true;
		document.getElementById('cedula').value = cedula;
		document.getElementById('nombre').value = nombre;
		document.getElementById('direccion').value = direccion;
		document.getElementById('telefono').value = telefono;
		document.getElementById('camb_boton').setAttribute("value", "Actualizar");
		document.getElementById('camb_boton').setAttribute("onClick", "act_persona(" + id + ");");
	}

	function actualizar_Persona(id_Persona) {
		cedula = document.getElementById('cedula').value;
		nombre = document.getElementById('nombre').value;
		direccion = document.getElementById('direccion').value;
		telefono = document.getElementById('telefono').value;

		if (cedula == '' || nombre == '' || direccion == '' || telefono == '') {
			alert('falta diligenciar algun dato');
		} else {
			$("#resp").load('cargar.php', {
				bloque: 'act_persona',
				id_Persona: idPersona,
				cedula: cedula,
				nombre: nombre,
				direccion: direccion,
				telefono: telefono
				}, function(response, status, xhr) {
				if (response == 1) {
					location.reload();
				}
			});
		}

	}

	function eliminar_Persona(esto, idPersona) {
		$(esto).closest('tr').remove();
		$("#resp").load('cargar.php', {
			bloque: 'eli_persona',
			id_Persona: idPersona
		}, function(response, status, xhr) {
			if (response == 1) {
				location.reload();
			}
		});
	}

		function mostrar_datos(id_Persona) {
		document.getElementById('idPersona').value = idPersona;
		document.getElementById('nombre').value = nombre;
		document.getElementById('telefono').value = telefono;
		document.getElementById('camb_boton').setAttribute("onClick", "act_persona(" + id + ");");
	}

	function consultar_Persona(esto, idPersona) {
		$(esto).closest('tr').remove();
		$("#resp").load('cargar.php', {
			bloque: 'eli_persona',
			id_Persona: idPersona
		}, function(response, status, xhr) {
			if (response == 1) {
				location.reload();
			}
		});
	}
</script>

</html>