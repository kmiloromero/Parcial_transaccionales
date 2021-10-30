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
?>