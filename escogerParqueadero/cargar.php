<?php
include "../conexion.php";

if($_POST['bloque']=='validar'){
	$validar=mysqli_query($conn,"SELECT * FROM bahia WHERE idParqueadero = '".$_POST['parqueadero']."' ");
	$i=0;
	while ($rowvalidar = mysqli_fetch_array($validar)) {
	$i++;	
	?>
	<div class="alert alert-success" role="alert">
	  la Bahia numero <?php echo $i; ?> del parqueadero <?php echo $rowvalidar['idParqueadero']; ?> posee un cupo de : <?php echo $rowvalidar['disponible']; ?>
	</div>
	<?php	
	}
}

?>