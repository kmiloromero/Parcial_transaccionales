<?php
include "../conexion.php";	



if($_POST['bloque']=='crear_supervision'){
	$insertar=mysqli_query($conn,"INSERT INTO supervisiones (nombre,estado,proceso,fecha,año,periodo,observacion,tecnica,puntuacion,id_evaluacion,id_usuario,id_entidad) VALUES ('".$_POST['nombre']."','".$_POST['estado']."','".$_POST['proceso']."','".$_POST['fecha']."','".$_POST['ano']."','".$_POST['periodo']."','".$_POST['observacion']."','".$_POST['tecnica']."','".$_POST['puntuacion']."','".$_POST['id_evaluacion']."','".$_POST['id_usuario']."','".$_POST['id_entidad']."') ");
	echo $insertar;
}


if($_POST['bloque']=='act_supervision'){
	$actualizar=mysqli_query($conn,"UPDATE supervisiones SET nombre='".$_POST['nombre']."' ,estado='".$_POST['estado']."' ,proceso='".$_POST['proceso']."' ,fecha='".$_POST['fecha']."' ,año='".$_POST['ano']."' ,periodo='".$_POST['periodo']."' ,observacion='".$_POST['observacion']."' ,tecnica='".$_POST['tecnica']."' ,puntuacion='".$_POST['puntuacion']."' ,id_evaluacion='".$_POST['id_evaluacion']."' ,id_usuario='".$_POST['id_usuario']."' ,id_entidad='".$_POST['id_entidad']."'  WHERE id_supervision='".$_POST['id_supervision']."' ");
	echo $actualizar;
}
if($_POST['bloque']=='eli_supervision'){
	$eliminar=mysqli_query($conn,"DELETE  FROM  supervisiones  WHERE id_supervision='".$_POST['id_supervision']."' ");
	echo $eliminar;
}
?>