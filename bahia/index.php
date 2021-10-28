<?
include "../conexion.php";
$nombre_ciudad=array();
$ciudades=mysqli_query($conn,"SELECT * FROM ciudades ");
while($rowciudades=mysqli_fetch_array($ciudades)){
	$nombre_ciudad[$rowciudades['id']]=$rowciudades['ciudad'];
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
	            <th>Ciudad</th>
	            <th>Editar</th>
	            <th>Eliminar</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?
	    	foreach ($ciudades as $rowsciudades) {			
	    	?>
		        <tr>
		            <td><?=$rowsciudades['id']?></td>
		            <td><?=$rowsciudades['ciudad']?></td>
		            <td><input type="button" value="Editar" class="btn btn-warning" onClick="editar_ciu(<?=$rowsciudades['id']?>,'<?=$nombre_ciudad[$rowsciudades['id']]?>');"/></td>
		            <td><input type="button" value="Eliminar" class="btn btn-danger" onClick="eliminar_ciu(this,<?=$rowsciudades['id']?>);"/></td>
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
			    	<div class="form-group">
			    		<input type="hidden" id="id_ciud" value="">
	                    <input type="text" class="form-control" id="n_ciudad" placeholder="Ciudad">
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

  function editar_ciu(id,ciudad){
  	$('#myModal').modal('show');
  	document.getElementById('id_ciud').value=id;
  	document.getElementById('n_ciudad').value=ciudad;
  	document.getElementById('camb_boton').setAttribute("value", "Actualizar");
  	document.getElementById('camb_boton').setAttribute("onClick", "actualizar_ciu("+id+");");
  }

  function actualizar_ciu(id){
  	n_ciudad=document.getElementById('n_ciudad').value;  	
  	
  	if(n_ciudad=='' ){
  		alert('falta diligenciar algun dato');
  	}else{	
  		$("#resp").load('cargar.php',{bloque:'act_ciu',id_ciu:id,n_ciudad:n_ciudad},function(response,status,xhr){
	        if(response==1){
	        	 location.reload();
	        }  
    	});
  	}
  	
  }	

   function eliminar_ciu(esto,id){
  	$(esto).closest('tr').remove();
  	$("#resp").load('cargar.php',{bloque:'eli_ciu',id_ciu:id},function(response,status,xhr){
        if(response==1){
        	 location.reload();
        }  
	});
  }

  function crear_ciudades(){
  	n_ciudad=document.getElementById('n_ciudad').value;  	
  	
  	if(n_ciudad=='' ){
  		alert('falta diligenciar algun dato');
  	}else{	
  		$("#resp").load('cargar.php',{bloque:'crear_ciu',n_ciudad:n_ciudad},function(response,status,xhr){
	        if(response==1){
	        	 location.reload();
	        }  
    	});
  	}
  	
  }
  
</script>
</html>