<?php
include "../conexion.php";

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
if($_POST['bloque']=='generarPersona'){
	$busqueda = mysqli_query($conn, "SELECT * FROM persona WHERE idPersona='".$_POST['idPersona']."' ");
	While ($arraybusqueda=mysqli_fetch_array($busqueda)){ 
			echo "
			<h5>Id: ". $arraybusqueda['idPersona']."</h5> 
			<h5>Cedula: ". $arraybusqueda['cedula'] ."</h5>
			<h5>Nombre: ". $arraybusqueda['nombre'] ."</h5>
			<h5>Direccion: ". $arraybusqueda['direccion']."</h5> 
			<h5>Telefono: ". $arraybusqueda['telefono']."</h5><br>
			";
	}
}
?>