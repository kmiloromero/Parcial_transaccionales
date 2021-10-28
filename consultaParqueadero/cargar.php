<?
include "../conexion.php";

if($_POST['bloque']=='crear_veh'){
	$insertar=mysqli_query($conn,"INSERT INTO vehiculos (placa,color,marca,tipo,id_conductor,id_propietario) VALUES ('".$_POST['pla_veh']."','".$_POST['col_veh']."','".$_POST['mar_veh']."','".$_POST['tip_veh']."','".$_POST['con_veh']."','".$_POST['pro_veh']."')");
	echo $insertar;
}
if($_POST['bloque']=='act_veh'){
	$actualizar=mysqli_query($conn,"UPDATE vehiculos SET placa='".$_POST['pla_veh']."', color='".$_POST['col_veh']."', marca='".$_POST['mar_veh']."', tipo='".$_POST['tip_veh']."', id_conductor='".$_POST['con_veh']."', id_propietario='".$_POST['pro_veh']."' WHERE id_vehiculo='".$_POST['id_veh']."'");
	echo $actualizar;
}
if($_POST['bloque']=='eli_veh'){
	$eliminar=mysqli_query($conn,"DELETE  FROM  vehiculos  WHERE id_vehiculo='".$_POST['id_veh']."' ");
	echo $eliminar;
}
?>