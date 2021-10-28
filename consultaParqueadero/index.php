<?
include "../conexion.php";
$nombre_usu=array();
$usuarios=mysqli_query($conn,"SELECT * FROM usuarios ");
while($rowusuarios=mysqli_fetch_array($usuarios)){
	$nombre_usu[$rowusuarios['id']]=$rowusuarios['nombre_1'].' '.$rowusuarios['nombre_2'].' '.$rowusuarios['apellidos'];
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
	            <th>#</th>
	            <th>Placa</th>
	            <th>Color</th>
	            <th>Marca</th>
	            <th>Tipo</th>
	            <th>Conductor</th>
	            <th>Propietario</th>
	            <th>Editar</th>
	            <th>Eliminar</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?
	    	$vehiculos=mysqli_query($conn,"SELECT * FROM vehiculos ");
			while($rowvehiculos=mysqli_fetch_array($vehiculos)){		
	    	?>
		        <tr>
		            <td><?=$rowvehiculos['id_vehiculo']?></td>
		            <td><?=$rowvehiculos['placa']?></td>
		            <td><?=$rowvehiculos['color']?></td>
		            <td><?=$rowvehiculos['marca']?></td>
		            <td><?
		            if($rowvehiculos['tipo']==1){
		            	echo "Particular";
		            }else{
		            	echo "Publico";
		            }
		            ?></td>
		            <td>
		            	<?
	            		if($rowvehiculos['id_conductor']!=0){
	            			echo $nombre_usu[$rowvehiculos['id_conductor']];
	            		}else{
	            			echo "Sin Asignar";
	            		}
	            		?>		            			
            		</td>
		            <td>
		            	<?
	            		if($rowvehiculos['id_propietario']!=0){
	            			echo $nombre_usu[$rowvehiculos['id_propietario']];
	            		}else{
	            			echo "Sin Asignar";
	            		}
	            		?>		            			
            		</td>
            		<td><input type="button" value="Editar" class="btn btn-warning" onClick="editar_veh(<?=$rowvehiculos['id_vehiculo']?>,'<?=$rowvehiculos['placa']?>','<?=$rowvehiculos['color']?>','<?=$rowvehiculos['marca']?>','<?=$rowvehiculos['tipo']?>','<?=$rowvehiculos['id_conductor']?>','<?=$rowvehiculos['id_propietario']?>');"/></td>
		            <td><input type="button" value="Eliminar" class="btn btn-danger" onClick="eliminar_veh(this,<?=$rowvehiculos['id_vehiculo']?>);"/></td>
		        </tr>
	        <?
	    	}
	        ?>
	    </tbody>
	</table>


	 <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <h4 class="modal-title">Crear Ciudades</h4>
	        </div>
	        <div class="modal-body">
	          	<div class="card-body">
			    	<div class="row">
					    <div class="col">
					    	<div class="form-group">
			                    <input type="text" class="form-control" id="pla_veh" placeholder="Placa">
			                  </div>
			                  <div class="form-group">
			                    <input type="text" class="form-control" id="col_veh" placeholder="Color">
			                  </div>
			                  <div class="form-group">
			                    <input type="text" class="form-control" id="mar_veh" placeholder="Marca">
			                  </div>			                  
					    </div>
					    <div class="col">
					    	<div class="form-group">
			                    <select class="form-control" id="tip_veh"> 
			                    	<option value="">--Seleccione Tipo--</option>
			                    	<option value="1">Particular</option>
			                    	<option value="0">Publico</option>			                    	
			                    </select>
			                  </div>
					    	<div class="form-group">
			                    <select class="form-control" id="con_veh"> 
			                    	<option value="0">--Seleccione Conductor--</option>
			                    	<?
			                    	foreach ($usuarios as $rowsusuarios) {
			                    	?>
			                    		<option value="<?=$rowsusuarios['id']?>"><?=$rowsusuarios['nombre_1'].' '.$rowsusuarios['nombre_2'].' '.$rowsusuarios['apellidos']?></option>
			                    	<?	
			                    	}
			                    	?>
			                    </select>
			                  </div>
			                  <div class="form-group">
			                    <select class="form-control" id="pro_veh"> 
			                    	<option value="0">--Seleccione Propietario--</option>
			                    	<?
			                    	foreach ($usuarios as $rowsusuarios) {
			                    	?>
			                    		<option value="<?=$rowsusuarios['id']?>"><?=$rowsusuarios['nombre_1'].' '.$rowsusuarios['nombre_2'].' '.$rowsusuarios['apellidos']?></option>
			                    	<?	
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
	          <input type="button" id="camb_boton" class="btn btn-success" value="Guardar" onClick="crear_ciudades();">	          
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
  function crear_ciudades(){
  	pla_veh=document.getElementById('pla_veh').value;
  	col_veh=document.getElementById('col_veh').value;
  	mar_veh=document.getElementById('mar_veh').value;
  	tip_veh=document.getElementById('tip_veh').value;
  	con_veh=document.getElementById('con_veh').value;
  	pro_veh=document.getElementById('pro_veh').value;
  	
  	if(pla_veh=='' || col_veh=='' ||  mar_veh=='' || tip_veh=='' || con_veh=='' || pro_veh=='' ){
  		alert('falta diligenciar algun dato');
  	}else{	
  		$("#resp").load('cargar.php',{bloque:'crear_veh',pla_veh:pla_veh,col_veh:col_veh,mar_veh:mar_veh,tip_veh:tip_veh,con_veh:con_veh,pro_veh:pro_veh},function(response,status,xhr){
	        if(response==1){
	        	 location.reload();
	        }  
    	});
  	}
  	
  }

  function editar_veh(id,placa,color,marca,tipo,conductor,propietario){
  	$('#myModal').modal('show');
  	document.getElementById('pla_veh').value=placa;
  	document.getElementById('col_veh').value=color;
  	document.getElementById('mar_veh').value=marca;
  	$("#tip_veh").val(tipo);
  	$("#con_veh").val(conductor);
  	$("#pro_veh").val(propietario);
  	document.getElementById('camb_boton').setAttribute("value", "Actualizar");
  	document.getElementById('camb_boton').setAttribute("onClick", "actualizar_veh("+id+");");
  }

  function actualizar_veh(id){
  	pla_veh=document.getElementById('pla_veh').value;
  	col_veh=document.getElementById('col_veh').value;
  	mar_veh=document.getElementById('mar_veh').value;
  	tip_veh=document.getElementById('tip_veh').value;
  	con_veh=document.getElementById('con_veh').value;
  	pro_veh=document.getElementById('pro_veh').value;
  	
  	if(pla_veh=='' || col_veh=='' ||  mar_veh=='' || tip_veh=='' || con_veh=='' || pro_veh=='' ){
  		alert('falta diligenciar algun dato');
  	}else{	
  		$("#resp").load('cargar.php',{bloque:'act_veh',id_veh:id,pla_veh:pla_veh,col_veh:col_veh,mar_veh:mar_veh,tip_veh:tip_veh,con_veh:con_veh,pro_veh:pro_veh},function(response,status,xhr){
	        if(response==1){
	        	 location.reload();
	        }  
    	});
  	}
  	
  }	

   function eliminar_veh(esto,id){
  	$(esto).closest('tr').remove();
  	$("#resp").load('cargar.php',{bloque:'eli_veh',id_veh:id},function(response,status,xhr){
        if(response==1){
        	 location.reload();
        }  
	});
  }
  
</script>
</html>