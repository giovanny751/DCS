<?php  
  //echo $inicio;
  //print_r($parts);
//*********LLEGA id de informe  
//var_dump($informe) ; //****borrar

 foreach($informe as $value) { 
		 $id_informe=$value->id;				  
		 $estado=$value->estado;				  
		 $procedimiento=$value->description;				  
		 $id_procedimiento=$value->id_proc;				  
		 $cedula=$value->cedula;				  
		 $paciente=$value->nombres." ".$value->apellidos;			  
		 $f_nac=$value->fecha_nacimiento;		
		 $estatura=$value->estatura;		
		 $peso=$value->peso;		
		 $direccion=$value->direccion;		
		 $telefono=$value->celular;		
		 $sexo="No està definido en la tabla";	
		 $fecha_informe=$value->fecha;	 
		 $id_medico=$value->id_medico;	 
		 
  }  
  if($estado==1) {
	  $titulo="NUEVO INFORME DE ".$procedimiento;
	  $informeIsNew=true;
	  $fecha_informe=date("Y-m-d h:i");
  }else{
	  $titulo="EDITAR INFORME DE ".$procedimiento;
	  $informeIsNew=false;
  }
  ?>


<div class="row">
    <span class="tituloH"><?php echo $titulo;?></span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>

 <form action="<?php echo base_url('index.php/') . "/ingreso/guardar_informe"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
     <div class="row">          
		<div class="col-md-2"> <label> Fecha: </label></div>
		<div class="col-md-2"> <?php echo $fecha_informe; ?></div>            
		
		<div class="col-md-2"> <label> C&eacute;dula:  </label> </div>
		<div class="col-md-2"> <?php echo $cedula; ?> </div>
	</div>
	<div class="row">
		<div class="col-md-2"> <label> Paciente: </label></div>
		<div class="col-md-2">  <?php echo $paciente; ?></div>
		
		<div class="col-md-2"> <label> Fecha Nacimiento: </label></div>
		<div class="col-md-2">  <?php echo $f_nac; ?> </div>
	</div>
	<div class="row">
			<div class="col-md-2"> <label> Edad: </label> </div>
            <div class="col-md-2"> </div>
			
			<div class="col-md-2"> <label> Estatura:</label></div>
            <div class="col-md-2"> <?php echo $estatura; ?> </div>
	</div>
	<div class="row">	
			<div class="col-md-2"> <label> G&eacute;nero: </label></div>
            <div class="col-md-2"> <?php echo $sexo; ?></div>
			
			<div class="col-md-2"> <label>Peso: </label></div>
            <div class="col-md-2"> <?php echo $peso; ?> </div>
	</div>
	<div class="row">		
			<div class="col-md-2"> <label> Direcci&oacute;n: </label></div>
            <div class="col-md-2"> <?php echo $direccion; ?></div>
			
			<div class="col-md-2"> <label> Tel&eacute;fono: </label></div>
			<div class="col-md-2"> <?php echo $telefono; ?> </div>
	</div>

	
	<br>			
<table > 
	 <tr bgcolor="#008AC9">	
		<td colspan="4" align="center"> <font color="white"><b>Datos del Informe</b></td>
	</tr>	
		<?php 
		
		foreach($plantillas as $key){	
			if($key->tipo_campo=="text"){  ?>
				<tr> <td> <?php  echo $key->nombre_campo_mostrar ?></td>
				<td> <input type="text" name="pl_<?php  echo $key->nombre_campo ?>" value="<?php  echo $key->concepto; ?>">  </input> 
				</td></tr>							
			<?php }
			
			if($key->tipo_campo=="textarea"){  ?>				
				<tr  bgcolor="#008AC9"> <td> <font color="white"><b> &nbsp;&nbsp;<?php  echo $key->nombre_campo_mostrar ?></b></td>	</tr>
				<td><?php if($key->tipo_doc==1) 
					       echo " <b>".$key->concepto; 
					      else{ ?> 
						  <textarea name="pl_<?php  echo $key->nombre_campo ?>" cols="100"> <?php  echo $key->concepto; ?>  </textarea>
					<?php  } ?> 
						  </td></tr>							
			<?php }
			
			if($key->tipo_campo=="select"){  ?>
				<tr  bgcolor="#008AC9"> <td> <font color="white"><b> &nbsp;&nbsp;<?php  echo $key->nombre_campo_mostrar ?></b></td>	</tr>
				<td> <select name="pl_<?php  echo $key->nombre_campo ?>" value="<?php  echo $key->concepto; ?>"> <option> llenar options </option></select> 
				</td></tr>							
			<?php }	

			if($key->tipo_campo=="file"  and $key->concepto !=null){  ?>
				<tr  bgcolor="#008AC9"> <td> <font color="white"><b>&nbsp;&nbsp; <?php  echo $key->nombre_campo_mostrar ?></b></td>	</tr>
				<tr><td> <img border="1"  src="/images/adjuntos/<?php  echo $key->observaciones; ?>" width="100px" height="100px"> <?php  echo $key->concepto; ?></img> 
				</td></tr>							
			<?php }			
		}
		?>
	
	   
	</table>

	<!--<div class="row">
            <span id="boton_guardar"> 
                <input   type="hidden" name="id_informe"  value="<?php echo $id_informe; ?>"></input>
                <input   type="hidden" name="id_procedimiento"  value="<?php echo $id_procedimiento; ?>"></input>
				
				<?php  if ($estado==1){?>
						<button  class="btn btn-dcs" >Guardar</button>
				<?php }?>
               
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>	-->
		
		
<table>
        <tr ><td >			
			   <?php 
			     if( $estado==1 ) {
				   ?>
				   <button  class="btn btn-dcs" >Guardar</button> 
				     <span id="boton_cargar" style="display: none">
						<h2>Cargando ...</h2>
					</span>				   
				   <?php
			     }  
			 ?> 
			</form>
        </td>	
		<td>&nbsp;</td>
        <td><br >		
		 <form action="<?php echo base_url('index.php/Medicos/edit_medicos'); ?>" method="post" >			
			<input type="hidden"  name="medico_codigo"  id="medico_codigo"  value="<?php echo $id_medico;?>">
			<input type="hidden"  name="campo"  id="campo"  value="medico_codigo">
			<button  class="btn btn-dcs" onclick="volver()"  id="volver" >Volver</button> 
		 </form>
		</td>	
	</tr>	
</table>	

	


		
		
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


