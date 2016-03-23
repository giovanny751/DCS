<?php  
  //echo $inicio;
  //print_r($parts);  
?>

<div class="row">
    <span class="tituloH">NUEVO REGISTRO CLINICO</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>

 <form action="<?php echo base_url('index.php/') . "/presentacion/guardar_registro_clinico"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
     <div class="row">          
            <div class="col-md-3">  <label for="procedimientos">* Procedimientos </label></div>
            <div class="col-md-3">
                <select  class="form-control obligatorio  " id="procedimientos" name="procedimientos">
				     <option value="">Escoja un Procedimiento</option>
					 <?php 
					  foreach($parts as $value) { ?>
						    <option value=" <?php echo $value->id ?>"> <?php echo $value->description ?></option>
					<?php  }?>
                   
                </select>
            </div>
        </div>	

		<div class="row">
            <span id="boton_guardar"> 
                <button  class="btn btn-dcs" >Buscar M&eacute;dico</button>
				<!-- <a href="<?php echo base_url('index.php') . "/presentacion/getMedicos" ?>" class="btn btn-dcs">Buscar M&eacute;dico</a> -->
               
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>


		
		
<script>
$('#procedimientos').change(function(){ alert ("cambia")
	var url='<?php echo base_url('index.php/presentacion/buscar_medicos') ?>';
	$.post(url,{informacion:document.getElementById('procedimientos').value})
	.done(function(msg){
		alert(msg);
	})
	.fail(function(){
		
	})
})
</script>

</form>
