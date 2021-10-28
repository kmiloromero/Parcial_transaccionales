<?php
include "../conexion.php";

if($_POST['bloque']=='crear_persona'){
	$insertar=mysqli_query($conn,"INSERT INTO persona (idPersona, cedula, nombre, direccion, telefono) VALUES ('".$_POST['idPersona']."','".$_POST['cedula']."','".$_POST['nombre']."','".$_POST['direccion']."','".$_POST['telefono']."')");
	echo $insertar;
}
if($_POST['bloque']=='act_persona'){
	$actualizar=mysqli_query($conn,"UPDATE persona SET idPersona='".$_POST['idPersona']."', cedula='".$_POST['cedula']."', nombre='".$_POST['nombre']."', direccion='".$_POST['direccion']."', telefono='".$_POST['telefono']."' WHERE idPersona='".$_POST['id_Persona']."' ");
	echo $actualizar;
}
if($_POST['bloque']=='eli_persona'){
	$eliminar=mysqli_query($conn,"DELETE  FROM  persona  WHERE idPersona='".$_POST['id_Persona']."' ");
	echo $eliminar;
}
?>