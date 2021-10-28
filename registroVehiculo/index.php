<?php
include "../conexion.php";
$id_Persona=array();
$persona=mysqli_query($conn,"SELECT idPersona FROM persona ");
while($rowpersona=mysqli_fetch_array($persona)){
	$id_Persona[$rowpersona['idPersona']]=$rowpersona['idPersona'];
}	

$id_Tipo=array();
$tipo=mysqli_query($conn,"SELECT idTipo from tipoVehiculo ");
while($rowtipoVehiculo=mysqli_fetch_array($tipo)){
	$id_Tipo[$rowtipoVehiculo['IdTipo']]=$rowtipoVehiculo['IdTipo'];
}	



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registro de vehivculo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   
  
</head>




<div id="contenidos" style="margin: 1rem;padding: 1rem;">

	<input type="button" class="btn btn-success" value="Nuevo" onClick="abrir_modal();"><br /><br /> 
	<table id="tabla1" class="table table-striped table-bordered" style="width:100%">
	    <thead>
	        <tr>
	            <th>idVehiculo</th>
	            <th>Marca</th>
	            <th>Placa</th>
	            <th>Idpersona</th>
	            <th>IdTipo</th>
	            <th>Editar</th>
	            <th>Eliminar</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php
	    	$vehiculo=mysqli_query($conn,"SELECT * FROM vehiculo ");
	    	foreach ($vehiculo as $rowvehiculo) {			
	    	?>
		        <tr>
		            <td><?=$rowvehiculo['idVehiculo']?></td>
		            <th><?=$rowvehiculo['marca']?></th>
		            <th><?=$rowvehiculo['placa']?></th>
		            <th><?=$rowvehiculo['idPersona']?></th>
		            <th><?=$rowvehiculo['idTipo']?></th>
		            <td><input type="button" value="Editar" class="btn btn-warning" onClick="editar_vehiculo(<?=$rowvehiculo['idVehiculo']?>,'<?=$rowvehiculo['marca']?>','<?=$rowvehiculo['placa']?>','<?=$rowvehiculo['idPersona']?>','<?=$rowvehiculo['idTipo']?>');"/></td>
		            <td><input type="button" value="Eliminar" class="btn btn-danger" onClick="eliminar_vehiculo(this,<?=$rowvehiculo['idVehiculo']?>);"/></td>
		        </tr>
	      <?php
	    	}
	      ?>
	    </tbody>
	</table>


	<div class="modal fade" id="myModal" role="dialog">
	  <div class="modal-dialog">	    
	    <!-- Modal content-->
	    <div class="modal-content">
	        <div class="modal-header">
	          <h4 id='modal-titulo'class="modal-title">Registro de Vehiculo</h4>
	        </div>
	        <div class="modal-body">
	          	<div class="card-body">
	          		<div class="row">
						<div class="col">
							<div class="form-group">
		                  		<input type="text" class="form-control" id="idVehiculo" placeholder="id Vehiculo">
		                	</div>
		                	<div class="form-group">
		                		<input type="text" class="form-control" id="marca" placeholder="Marca">
		                	</div>
		                	<div class="form-group">
		                  		<input type="text" class="form-control" id="placa" placeholder="Placa">
		                	</div>                  	                			                  
						</div>
						<div class="col">
		                	<div class="form-group">
		                		<input type="text" class="form-control" id="idPersona" placeholder="id Persona">
		                	</div>
		                	<div class="form-group">
		                  		<input type="text" class="form-control" id="idTipo" placeholder="Id Tipo">
		                	</div>				    	              
						</div>
					</div>
            	</div>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	          <input type="button" id="camb_boton" class="btn btn-success" value="Guardar" onClick="crear_vehiculo();">	          
	        </div>
	      </div>	      
	    </div>
	</div>

</div>
<div id="resp"></div>

<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../plugins/toastr/toastr.min.js"></script>

<script>
  $(function () {
    $("#tabla1").DataTable();    
  });
  function abrir_modal(){
  	$('#myModal').modal('show');
  }

  function editar_vehiculo(id,nombre,estado,proceso,fecha,ano,periodo,observacion,tecnica,puntuacion,id_evaluacion,id_usuario,id_entidad){
  	$('#myModal').modal('show');
  	document.getElementById('nombre').value=nombre;
  	document.getElementById('estado').value=estado;  	
	  document.getElementById('proceso').value=proceso;
	  document.getElementById('fecha').value=fecha;
	  document.getElementById('ano').value=ano;
	  document.getElementById('periodo').value=periodo;
	  document.getElementById('observacion').value=observacion;
	  document.getElementById('tecnica').value=tecnica;
	  document.getElementById('puntuacion').value=puntuacion;
	  document.getElementById('id_evaluacion').value=id_evaluacion;
	  document.getElementById('id_usuario').value=id_usuario;
	  document.getElementById('id_entidad').value=id_entidad;
  	document.getElementById('camb_boton').setAttribute("value", "Actualizar");
  	document.getElementById('camb_boton').setAttribute("onClick", "actualizar_supervision("+id+");");
  }

  

  function actualizar_vehiculo(id_supervision){
  	nombre=document.getElementById('nombre').value;
  	estado=document.getElementById('estado').value;  	
	  proceso=document.getElementById('proceso').value;
	  fecha=document.getElementById('fecha').value;
	  ano=document.getElementById('ano').value;
	  periodo=document.getElementById('periodo').value;
	  observacion=document.getElementById('observacion').value;
	  tecnica=document.getElementById('tecnica').value;
	  puntuacion=document.getElementById('puntuacion').value;
	  id_evaluacion=document.getElementById('id_evaluacion').value;
	  id_usuario=document.getElementById('id_usuario').value;
	  id_entidad=document.getElementById('id_entidad').value;  	
  	
  	if(nombre=='' ||  estado=='' || proceso=='' || fecha=='' || ano=='' || periodo==''  || observacion=='' || tecnica=='' || puntuacion=='' || id_evaluacion=='' || id_usuario=='' || id_entidad==''){
  		alert('falta diligenciar algun dato');
  	}else{	
  		$("#resp").load('cargar.php',{bloque:'act_supervision',id_supervision:id_supervision,nombre:nombre,estado:estado,proceso:proceso,fecha:fecha,ano:ano,periodo:periodo,observacion:observacion,tecnica:tecnica,puntuacion:puntuacion,id_evaluacion:id_evaluacion,id_usuario:id_usuario,id_entidad:id_entidad},function(response,status,xhr){
	        if(response==1){
	        	 location.reload();
	        }  
    	});
  	}
  	
  }	

  function eliminar_vehiculo(esto,id){
  	$(esto).closest('tr').remove();
  	$("#resp").load('cargar.php',{bloque:'eli_supervision',id_supervision:id},function(response,status,xhr){
        if(response==1){
        	 location.reload();
        }  
		});
  }

  function crear_supervision(){
  	nombre=document.getElementById('nombre').value;
  	estado=document.getElementById('estado').value;  	
	  proceso=document.getElementById('proceso').value;
	  fecha=document.getElementById('fecha').value;
	  ano=document.getElementById('ano').value;
	  periodo=document.getElementById('periodo').value;
	  observacion=document.getElementById('observacion').value;
	  tecnica=document.getElementById('tecnica').value;
	  puntuacion=document.getElementById('puntuacion').value;
	  id_evaluacion=document.getElementById('id_evaluacion').value;
	  id_usuario=document.getElementById('id_usuario').value;
	  id_entidad=document.getElementById('id_entidad').value;  	
  	
  	if(nombre=='' ||  estado=='' || proceso=='' || fecha=='' || ano=='' || periodo==''  || observacion=='' || tecnica=='' || puntuacion=='' || id_evaluacion=='' || id_usuario=='' || id_entidad==''){
  		alert('falta diligenciar algun dato');
  	}else{	
  		$("#resp").load('cargar.php',{bloque:'crear_supervision',nombre:nombre,estado:estado,proceso:proceso,fecha:fecha,ano:ano,periodo:periodo,observacion:observacion,tecnica:tecnica,puntuacion:puntuacion,id_evaluacion:id_evaluacion,id_usuario:id_usuario,id_entidad:id_entidad},function(response,status,xhr){
	        if(response==1){
	        	 location.reload();
	        }  
    	});
  	}
  	
  }
  
</script>
</html>