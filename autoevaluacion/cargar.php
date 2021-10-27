<?php
include "../conexion.php";

	

if($_POST['bloque']=='crear_autoevaluacion'){
	$insertar=mysqli_query($conn,"INSERT INTO autoevaluaciones (nombre,proceso,periodo,año,etapa,estado,observacion,puntuacion,evaluador,id_usuario,id_entidad) VALUES ('".$_POST['nombre']."','".$_POST['proceso']."','".$_POST['periodo']."','".$_POST['ano']."','".$_POST['etapa']."','".$_POST['estado']."','".$_POST['observacion']."','".$_POST['puntuacion']."','".$_POST['evaluador']."','".$_POST['id_usuario']."','".$_POST['id_entidad']."') ");
	echo $insertar;
}
if($_POST['bloque']=='act_autoevaluacion'){
	$actualizar=mysqli_query($conn,"UPDATE autoevaluaciones SET nombre='".$_POST['nombre']."' , proceso='".$_POST['proceso']."', periodo='".$_POST['periodo']."' , año='".$_POST['ano']."' , etapa='".$_POST['etapa']."' , estado='".$_POST['estado']."' , observacion='".$_POST['observacion']."' , puntuacion='".$_POST['puntuacion']."' , evaluador='".$_POST['evaluador']."' , id_usuario='".$_POST['id_usuario']."' ,id_entidad='".$_POST['id_entidad']."'  WHERE id_evaluacion='".$_POST['id_autoevaluacion']."' ");
	echo $actualizar;
}
if($_POST['bloque']=='eli_autoevaluacion'){
	$eliminar=mysqli_query($conn,"DELETE  FROM  autoevaluaciones  WHERE id_evaluacion='".$_POST['id_autoevaluacion']."' ");
	echo $eliminar;
}
?>