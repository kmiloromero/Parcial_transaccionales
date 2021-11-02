<?php
include "../conexion.php";	



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
if($_POST['bloque']=='generarVehiculo'){
	$busqueda = mysqli_query($conn, "SELECT * FROM vehiculo WHERE idVehiculo='".$_POST['idVehiculo']."' ");
	While ($arraybusqueda=mysqli_fetch_array($busqueda)){ 
			echo "
			<h5>Id: ". $arraybusqueda['idVehiculo']."</h5> 
			<h5>Marca: ". $arraybusqueda['marca'] ."</h5>
			<h5>Placa: ". $arraybusqueda['placa'] ."</h5>
			<h5>Id propietario: ". $arraybusqueda['idPersona']."</h5> 
			<h5>Tipo de vehiculo: ". $arraybusqueda['idTipo']."</h5><br>
			";
	}
}
?>