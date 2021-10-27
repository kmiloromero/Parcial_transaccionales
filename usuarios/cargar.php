<?php
include "../conexion.php";

if($_POST['bloque']=='crear_usu'){
	$insertar=mysqli_query($conn,"INSERT INTO usuarios (nombre,estado,contraseña,tipo,id_entidad) VALUES ('".$_POST['nombre']."','".$_POST['estado']."','".$_POST['contrasena']."','".$_POST['tipo']."','".$_POST['entidad']."')");
	echo $insertar;
}
if($_POST['bloque']=='act_usu'){
	$actualizar=mysqli_query($conn,"UPDATE usuarios SET nombre='".$_POST['nombre']."', estado='".$_POST['estado']."', contraseña='".$_POST['contrasena']."', tipo='".$_POST['tipo']."', id_entidad='".$_POST['entidad']."' WHERE id_usuario='".$_POST['id_usu']."' ");
	echo $actualizar;
}
if($_POST['bloque']=='eli_usu'){
	$eliminar=mysqli_query($conn,"DELETE  FROM  usuarios  WHERE id_usuario='".$_POST['id_usu']."' ");
	echo $eliminar;
}
?>