<?php
include "../conexion.php";
$nombre_entidad=array();
$entidades=mysqli_query($conn,"SELECT * FROM entidades ");
while($rowentidades=mysqli_fetch_array($entidades)){
	$nombre_entidad[$rowentidades['id_entidad']]=$rowentidades['nombre'];
}	

$nombre_usuario=array();
$usuarios=mysqli_query($conn,"SELECT * FROM usuarios ");
while($rowusuarios=mysqli_fetch_array($usuarios)){
	$nombre_usuario[$rowusuarios['id_usuario']]=$rowusuarios['nombre'];
}	

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Prueba OET</title>
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

	<input type="button" value="Nuevo" onClick="abrir_modal();"><br /><br />
	
	<table id="tabla1" class="table table-striped table-bordered" style="width:100%">
	    <thead>
	        <tr>
	            <th>Nombre</th>
	            <th>Proceso</th>
	            <th>Periodo</th>
	            <th>Año</th>
	            <th>Etapa</th>
	            <th>Estado</th>
	            <th>Observacion</th>
	            <th>Puntuacion</th>
	            <th>Evaluador</th>
	            <th>Usuario</th>
	            <th>Entidad</th>
	            <th>Editar</th>
	            <th>Eliminar</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php
	    	$autoevaluacion=mysqli_query($conn,"SELECT * FROM autoevaluaciones ");
	    	foreach ($autoevaluacion as $rowsautoevaluacion) {			
	    	?>
		        <tr>
		            <td><?=$rowsautoevaluacion['nombre']?></td>
		            <th><?=$rowsautoevaluacion['proceso']?></th>
		            <th><?=$rowsautoevaluacion['periodo']?></th>
		            <th><?=$rowsautoevaluacion['año']?></th>
		            <th><?=$rowsautoevaluacion['etapa']?></th>
		            <th><?=$rowsautoevaluacion['estado']?></th>
		            <th><?=$rowsautoevaluacion['observacion']?></th>
		            <th><?=$rowsautoevaluacion['puntuacion']?></th>
		            <th><?=$rowsautoevaluacion['evaluador']?></th>
		            <th><?=$nombre_usuario[$rowsautoevaluacion['id_usuario']]?></th>
		            <th><?=$nombre_entidad[$rowsautoevaluacion['id_entidad']]?></th>
		            <td><input type="button" value="Editar" class="btn btn-warning" onClick="editar_autoevaluacion(<?=$rowsautoevaluacion['id_evaluacion']?>,'<?=$rowsautoevaluacion['nombre']?>','<?=$rowsautoevaluacion['proceso']?>','<?=$rowsautoevaluacion['periodo']?>','<?=$rowsautoevaluacion['año']?>','<?=$rowsautoevaluacion['etapa']?>','<?=$rowsautoevaluacion['estado']?>','<?=$rowsautoevaluacion['observacion']?>','<?=$rowsautoevaluacion['puntuacion']?>','<?=$rowsautoevaluacion['evaluador']?>','<?=$rowsautoevaluacion['id_usuario']?>','<?=$rowsautoevaluacion['id_entidad']?>');"/></td>
		            <td><input type="button" value="Eliminar" class="btn btn-danger" onClick="eliminar_autoevaluacion(this,<?=$rowsautoevaluacion['id_evaluacion']?>);"/></td>
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
	          <h4 class="modal-title">Editar Autoevaluacion</h4>
	        </div>
	        <div class="modal-body">
	          	<div class="card-body">
	          		<div class="row">
							    <div class="col">
							    	<div class="form-group">
		                  <input type="text" class="form-control" id="nombre" placeholder="Nombre">
		                </div>
		                <div class="form-group">
		                  <input type="text" class="form-control" id="proceso" placeholder="Proceso">
		                </div>
		                <div class="form-group">
		                  <input type="text" class="form-control" id="periodo" placeholder="Periodo">
		                </div>
		                <div class="form-group">
		                  <input type="text" class="form-control" id="ano" placeholder="Año">
		                </div>                
		                <div class="form-group">
		                  <input type="text" class="form-control" id="etapa" placeholder="Etapa">
		                </div>
		                <div class="form-group">
		                  <select class="form-control" id="estado"> 
		                  	<option value="Activo">Activo</option>
		                  	<option value="Inactivo">Inactivo</option>			                    	
		                  </select>
		                </div>			                  
							    </div>
							    <div class="col">
							    	<div class="form-group">
		                  <input type="text" class="form-control" id="observacion" placeholder="Observacion">
		                </div>
		                <div class="form-group">
		                  <input type="text" class="form-control" id="puntuacion" placeholder="Puntuacion">
		                </div>
		                <div class="form-group">
		                  <input type="text" class="form-control" id="evaluador" placeholder="Evaluador">
		                </div>					    	
		                <div class="form-group">
		                  <select class="form-control" id="id_usuario"> 
		                  	<option value="0">--Seleccione Usuario--</option>
		                  	<?php
		                  	foreach ($usuarios as $rowsusuarios) {
		                  	?>
		                  		<option value="<?=$rowsusuarios['id_usuario']?>"><?=$rowsusuarios['nombre']?></option>
		                  	<?php	
		                  	}
		                  	?>
		                  </select>
		                </div>
		                <div class="form-group">
		                  <select class="form-control" id="id_entidad"> 
		                  	<option value="0">--Seleccione Entidad--</option>
		                  	<?php
		                  	foreach ($entidades as $rowsentidades) {
		                  	?>
		                  		<option value="<?=$rowsentidades['id_entidad']?>"><?=$rowsentidades['nombre']?></option>
		                  	<?php	
		                  	}
		                  	?>
		                  </select>
		                </div>			                  
							    </div>
							</div>
            </div>
	        </div>

	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	          <input type="button" id="camb_boton" class="btn btn-success" value="Guardar" onClick="crear_autoevaluacion();">	          
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

  function editar_autoevaluacion(id,nombre,proceso,periodo,ano,etapa,estado,observacion,puntuacion,evaluador,id_usuario,id_entidad){
  	$('#myModal').modal('show');
  	document.getElementById('nombre').value=nombre;
	  document.getElementById('proceso').value=proceso;
	  document.getElementById('periodo').value=periodo;
	  document.getElementById('ano').value=ano;
	  document.getElementById('etapa').value=etapa;
	  document.getElementById('estado').value=estado;
	  document.getElementById('observacion').value=observacion;
	  document.getElementById('puntuacion').value=puntuacion;
	  document.getElementById('evaluador').value=evaluador;
	  document.getElementById('id_usuario').value=id_usuario;
	  document.getElementById('id_entidad').value=id_entidad;
  	document.getElementById('camb_boton').setAttribute("value", "Actualizar");
  	document.getElementById('camb_boton').setAttribute("onClick", "actualizar_autoevaluacion("+id+");");
  }

  

  function actualizar_autoevaluacion(id_autoevaluacion){
  	nombre=document.getElementById('nombre').value;
	  proceso=document.getElementById('proceso').value;
	  periodo=document.getElementById('periodo').value;
	  ano=document.getElementById('ano').value;
	  etapa=document.getElementById('etapa').value;
	  estado=document.getElementById('estado').value;
	  observacion=document.getElementById('observacion').value;
	  puntuacion=document.getElementById('puntuacion').value;
	  evaluador=document.getElementById('evaluador').value;
	  id_usuario=document.getElementById('id_usuario').value;
	  id_entidad=document.getElementById('id_entidad').value;  	
  	
  	if(nombre=='' ||  proceso=='' || periodo==''|| ano=='' || etapa=='' || estado=='' || observacion=='' || puntuacion=='' || evaluador=='' || id_usuario=='' || id_entidad==''){
  		alert('falta diligenciar algun dato');
  	}else{	
  		$("#resp").load('cargar.php',{bloque:'act_autoevaluacion',id_autoevaluacion:id_autoevaluacion,nombre:nombre,proceso:proceso,periodo:periodo,ano:ano,etapa:etapa,estado:estado,observacion:observacion,puntuacion:puntuacion,evaluador:evaluador,id_usuario:id_usuario,id_entidad:id_entidad},function(response,status,xhr){
	        if(response==1){
	        	 location.reload();
	        }  
    	});
  	}
  	
  }	

  function eliminar_autoevaluacion(esto,id){
  	$(esto).closest('tr').remove();
  	$("#resp").load('cargar.php',{bloque:'eli_autoevaluacion',id_autoevaluacion:id},function(response,status,xhr){
        if(response==1){
        	 location.reload();
        }  
		});
  }

  function crear_autoevaluacion(){
  	nombre=document.getElementById('nombre').value;
	  proceso=document.getElementById('proceso').value;
	  periodo=document.getElementById('periodo').value;
	  ano=document.getElementById('ano').value;
	  etapa=document.getElementById('etapa').value;
	  estado=document.getElementById('estado').value;
	  observacion=document.getElementById('observacion').value;
	  puntuacion=document.getElementById('puntuacion').value;
	  evaluador=document.getElementById('evaluador').value;
	  id_usuario=document.getElementById('id_usuario').value;
	  id_entidad=document.getElementById('id_entidad').value;  	
  	
  	if(nombre=='' ||  proceso=='' || periodo==''|| ano=='' || etapa=='' || estado=='' || observacion=='' || puntuacion=='' || evaluador=='' || id_usuario=='' || id_entidad==''){
  		alert('falta diligenciar algun dato');
  	}else{	
  		$("#resp").load('cargar.php',{bloque:'crear_autoevaluacion',nombre:nombre,proceso:proceso,periodo:periodo,ano:ano,etapa:etapa,estado:estado,observacion:observacion,puntuacion:puntuacion,evaluador:evaluador,id_usuario:id_usuario,id_entidad:id_entidad},function(response,status,xhr){
	        if(response==1){
	        	 location.reload();
	        }  
    	});
  	}
  	
  }
  
</script>
</html>