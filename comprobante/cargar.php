<?php
include "../conexion.php";

if($_POST['bloque']=='consultar_pago'){
	$busqueda = mysqli_query($conn, "SELECT * FROM pago WHERE idPago='".$_POST['idPago']."' ");
	While ($arraybusqueda=mysqli_fetch_array($busqueda)){ 
			echo "
			<h5>Id: ". $arraybusqueda['idPago']."</h5> 
			<h5>Bahia: ". $arraybusqueda['idBahia '] ."</h5>
			<h5>Vehiculo: ". $arraybusqueda['idVehiculo '] ."</h5>
			<h5>Tiempo: ". $arraybusqueda['tiempo']."</h5> 
			<h5>Pago: ". $arraybusqueda['costo']."</h5>
			<h5>Pago: ". $arraybusqueda['fecha']."</h5><br>
			";
	}
}

if($_POST['bloque']=='crear_persona'){
	$insertar=mysqli_query($conn,"INSERT INTO persona (idPersona, cedula, nombre, direccion, telefono) VALUES ('".$_POST['idPersona']."','".$_POST['cedula']."','".$_POST['nombre']."','".$_POST['direccion']."','".$_POST['telefono']."')");
	echo $insertar;
}
if($_POST['bloque']=='act_persona'){
	$actualizar=mysqli_query($conn,"UPDATE persona SET idPersona='".$_POST['idPersona']."', cedula='".$_POST['cedula']."', nombre='".$_POST['nombre']."', direccion='".$_POST['direccion']."', telefono='".$_POST['telefono']."' WHERE idVehiculo='".$_POST['id_Vehiculo']."' ");
	echo $actualizar;
}
if($_POST['bloque']=='eli_persona'){
	$eliminar=mysqli_query($conn,"DELETE  FROM  persona  WHERE idPersona='".$_POST['id_Persona']."' ");
	echo $eliminar;
}
if($_POST['bloque']=='crear_vehiculo'){
	$insertar=mysqli_query($conn,"INSERT INTO vehiculo (idVehiculo,marca,placa,idPersona,idTipo) VALUES ('".$_POST['idVehiculo']."','".$_POST['marca']."','".$_POST['placa']."','".$_POST['idPersona']."','".$_POST['idTipo']."') ");
	echo $insertar;
}


if($_POST['bloque']=='act_vehiculo'){
	$actualizar=mysqli_query($conn,"UPDATE vehiculo SET placa ='".$_POST['placa']."' ,marca='".$_POST['marca']."' ,idPersona='".$_POST['idPersona']."' ,idTipo='".$_POST['idTipo']."' WHERE idPersona='".$_POST['idPersona']."' ");
	echo $actualizar;
}
if($_POST['bloque']=='eli_vehiculo'){
	$eliminar=mysqli_query($conn,"DELETE  FROM  vehiculo  WHERE idVehiculo='".$_POST['idVehiculo']."' ");
	echo $eliminar;
}
if($_POST['bloque']=='generarComprobante')
{
	$busqueda = mysqli_query($conn, "SELECT * FROM pago WHERE idPago='".$_POST['idPago']."' ");
	While ($arraybusqueda=mysqli_fetch_array($busqueda)){ 
			echo "
			<h5>Id Comprobante: ". $arraybusqueda['idPago']."</h5> 
			<h5>Id Bahia: ". $arraybusqueda['idBahia'] ."</h5>
			<h5>Id Vehiculo: ". $arraybusqueda['idVehiculo'] ."</h5>
			<h5>Id Tiempo: ". $arraybusqueda['tiempo']."</h5> 
			<h5>Costo: ". $arraybusqueda['costo']."</h5>
			<h5>Id Fecha: ". $arraybusqueda['fecha']."</h5><br>
			";
	}
}
?>