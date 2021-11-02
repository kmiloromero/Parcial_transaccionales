<?php
include "../conexion.php";

if($_POST['bloque']=='generarComprobante'){
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