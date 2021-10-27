<?
include "../conexion.php";

if($_POST['bloque']=='crear_ciu'){
	$insertar=mysqli_query($conn,"INSERT INTO ciudades (ciudad) VALUES ('".$_POST['n_ciudad']."') ");
	echo $insertar;
}
if($_POST['bloque']=='act_ciu'){
	$actualizar=mysqli_query($conn,"UPDATE ciudades SET ciudad='".$_POST['n_ciudad']."' WHERE id='".$_POST['id_ciu']."' ");
	echo $actualizar;
}
if($_POST['bloque']=='eli_ciu'){
	$eliminar=mysqli_query($conn,"DELETE  FROM  ciudades  WHERE id='".$_POST['id_ciu']."' ");
	echo $eliminar;
}
?>