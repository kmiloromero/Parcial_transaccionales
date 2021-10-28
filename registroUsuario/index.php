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

	<input type="button" value="Nuevo" onClick="abrir_modal();"><br /><br />

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
					<td><?= $rowpersona['Nombre'] ?></td>
					<td><?= $rowpersona['direccion'] ?></td>
					<td><?= $rowpersona['telefono'] ?></td>
					<td><input type="button" value="Editar" class="btn btn-warning" onClick="editar_usu(<?= $rowpersona['idPersona'] ?>,'<?= $rowpersona['cedula'] ?>','<?= $rowpersona['Nombre'] ?>','<?= $rowpersona['direccion'] ?>','<?= $rowpersona['telefono'] ?>);" /></td>
					<td><input type="button" value="Eliminar" class="btn btn-danger" onClick="eliminar_usu(this,<?= $rowpersona['idPersona'] ?>);" /></td>
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
					<h4 class="modal-title">Crear Usuarios</h4>
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
									<input type="text" class="form-control" id="Nombre" placeholder="Nombre Persona">
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
	}

	function crear_Persona() {
		idUsuario = document.getElementById('idUsuario').value;
		cedula = document.getElementById('cedula').value;
		nombre = document.getElementById('nombre').value;
		direccion = document.getElementById('direccion').value;
		telefono = document.getElementById('telefono').value;

		if (nombre == '' || estado == '' || contrasena == '' || tipo == '' || entidad == '') {
			alert('falta diligenciar algun dato');
		} else {
			$("#resp").load('cargar.php', {
				bloque: 'crear_usu',
				nombre: nombre,
				estado: estado,
				contrasena: contrasena,
				tipo: tipo,
				entidad: entidad
			}, function(response, status, xhr) {
				if (response == 1) {
					location.reload();
				}
			});
		}

	}

	function editar_usu(id, nombre, estado, contrasena, tipo, entidad) {
		$('#myModal').modal('show');
		document.getElementById('nombre').value = nombre;
		document.getElementById('estado').value = estado;
		document.getElementById('contraseña').value = contrasena;
		document.getElementById('tipo').value = tipo;
		document.getElementById('entidad').value = entidad;
		document.getElementById('camb_boton').setAttribute("value", "Actualizar");
		document.getElementById('camb_boton').setAttribute("onClick", "actualizar_usu(" + id + ");");
	}

	function actualizar_usu(id) {
		nombre = document.getElementById('nombre').value;
		estado = document.getElementById('estado').value;
		contrasena = document.getElementById('contraseña').value;
		tipo = document.getElementById('tipo').value;
		entidad = document.getElementById('entidad').value;

		if (nombre == '' || estado == '' || contrasena == '' || tipo == '' || entidad == '') {
			alert('falta diligenciar algun dato');
		} else {
			$("#resp").load('cargar.php', {
				bloque: 'act_usu',
				id_usu: id,
				nombre: nombre,
				estado: estado,
				contrasena: contrasena,
				tipo: tipo,
				entidad: entidad
			}, function(response, status, xhr) {
				if (response == 1) {
					location.reload();
				}
			});
		}

	}

	function eliminar_usu(esto, id) {
		$(esto).closest('tr').remove();
		$("#resp").load('cargar.php', {
			bloque: 'eli_usu',
			id_usu: id
		}, function(response, status, xhr) {
			if (response == 1) {
				location.reload();
			}
		});
	}
</script>

</html>