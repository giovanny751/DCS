<?php  
  //echo $inicio;  
  if(isset($id_registro)){
	  //  print_r($registro);exit;
	$titulo="EDITAR  REGISTRO CLINICO";
    $formNuevo=false;	
	foreach($registro as $value) { 
	  $id_procedimiento=$value->id_proc;	  
	  $id_medico=$value->id_medico; //exit;
	  $medico=$value->medico;	  
	  $id_informe=$value->id_informe;
	  $id_cita=$value->id_cita;
	  $estado=$value->estado;
	  $cedula=$value->cedula;
	  
	  //traer info del mèdico
	  $datos_medico=$this->Parts__model->medicosPorProcedimiento($id_procedimiento,$id_medico);	//para un solo medico. el de la cita
	  foreach($datos_medico as $value2) { 		
		  $cantidad=$value2->cant;
	  }	  
	  //plantillas
	  $tipo_documento="informe"; //se envia "informe", para q traiga lo guardado
	  $plantillas=$this->Parts__model->plantillasDelProcedimiento($id_procedimiento,$tipo_documento,$id_informe);	
	}
	$actions="/ingreso/editar_registro_clinico";
  } 
  else {  //print "nuevo"; exit;
	  $titulo="NUEVO REGISTRO CLINICO";
	  $formNuevo=true;
	  
	  $actions="/ingreso/guardar_registro_clinico";
	  
  }
?>

<div class="row">
    <span class="tituloH"> <?php echo $titulo; ?> </span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>

 <form action="<?php echo base_url('index.php/').$actions; ?>" method="post" onsubmit="return enviar_form()"  enctype="multipart/form-data">
     <?php 

if(isset($id_paciente)  and isset($cedula)){
	?>
	<input type="hidden"  name="id_paciente"  value="<?php echo $id_paciente; ?>"> 
	<input type="hidden"  name="cedula"  value="<?php echo $cedula; ?>"> 
	<?php
	
}
?>	
	  <?php if(!$formNuevo){  ?>
	    <div class="row">
            <div class="col-md-3">  <label for="procedimientos">Estado </label></div>
            <div class="col-md-3">	
				<?php 
				if($estado==3){
					echo "Atendido";
				}elseif($estado==4){
					echo "Anulado";
				}elseif($estado==1){?>
				  <select  class="form-control obligatorio  " id="estado" name="estado">				     
					 <option value="1" selected>Sin Atender</option>					 
					 <option value="4">Anulado</option>					                  
                  </select>	<?php	
				} 
				?>              
            </div> 			
        </div> 			
		<?php } ?>
		
		<div class="row">
			<div class="col-md-3">  <label for="procedimientos">* Procedimientos </label></div>
            <div class="col-md-3">			
                <select  class="form-control obligatorio  " id="procedimientos" name="procedimientos">
				     <option value="">Escoja un Procedimiento</option>
					 <?php 
				
					  foreach($parts as $value) { 
					    if( !$formNuevo){
							if($value->id == $id_procedimiento ) 
							   $selected="selected";
						    else $selected="";
						}else $selected="";
						
					  ?>
						    <option value="<?php echo $value->id ?>" <?php echo $selected ?>> <?php echo $value->description ?></option>
					<?php  } ?>
                   
                </select>
            </div>
			
			 <!-- <div class="col-md-3">
                <script>
                    $('document').ready(function() {
                        $('#procedimientos').autocomplete({
                            source: "<?php echo base_url("index.php//ingreso/autocomplete_procedimientos") ?>",
                            minLength: 3
                        });
                    });
                </script>
                <input type="text" value="" class="form-control obligatorio  " id="procedimientos" name="procedimientos">
            </div>-->
        </div>	
		
		<?php
		  if($formNuevo) $display="none";
		  else  $display="block";
		?>
		<br><br>
		<div class="row" style='display: <?php echo $display?>' id="tabla_medicos">
            <div class="col-md-12">
               <table class="table table-bordered" border=1>
				<thead>				   				
					<th>M&eacute;dico</th>
					<th>Procedimientos Pendientes</th>
					<th>Seleccione</th>					
				</thead>
				<tbody id="datos_medico">
				<tr>
				<td colspan='3'>	
				<?php	
				  if(!$formNuevo){	?> 
					  <tr> <td> <?php echo $medico;?></td>  <td> <?php echo $cantidad;?></td>
					   <td> <input type='checkbox' name='id_medico' value='<?php echo $id_medico;?>'  id='id_medico_0'></tr>
					  <?php						
				  }
				?>  
				</td>
				</tr>
				</tbody>
			   </table>
		    </div>
		</div>
		
		
<br>
<div id='plantillas'> 
 <?php	
		if(!$formNuevo){ //muestra datos de plantillas ya guardados, en modo ediciòn
		    ?> <table><?php  $contador=0;
			foreach($plantillas as $key){				  
				//var_dump("<br>",$key->concepto,"--",$key->tipo_campo);
				if($key->tipo_campo=="text"){  ?>
					<tr> <td> <?php  echo $key->nombre_campo_mostrar ?></td>
					<td> <input type="text" name="pl_<?php  echo $key->nombre_campo ?>" value="<?php  echo $key->concepto; ?>">  </input> 
					</td></tr>							
				<?php }				
				if($key->tipo_campo=="textarea" and $key->tipo_doc==1){  ?>
					<tr  bgcolor="#008AC9"> <td> <font color="white"><b>&nbsp;&nbsp; <?php  echo $key->nombre_campo_mostrar ?></b></td>	</tr>
					<tr> <td>  <textarea id="<?php  echo $key->nombre_campo?>"  name="pl_<?php  echo $key->nombre_campo ?>" cols="117"> <?php  echo $key->concepto; ?> </textarea>
					 </td></tr>							
				<?php }				
				if($key->tipo_campo=="select" and $key->tipo_doc==1){  ?>
					<tr> <td> <?php  echo $key->nombre_campo_mostrar; ?></td>	
					<td> <select id="<?php  echo $key->nombre_campo?>" name="pl_<?php  echo $key->nombre_campo ?>" value="<?php  echo $key->concepto; ?>"> <option> llenar options </option></select> 
					</td></tr>							
				<?php }	

				if($key->tipo_campo=="file"  and $key->concepto !=null){ $contador++;	 ?>
					<tr  bgcolor="#008AC9"> <td> <font color="white"><b>&nbsp;&nbsp; <?php  echo $key->nombre_campo_mostrar ?></b></td>	</tr>
					<tr><td> <img  src="/images/adjuntos/<?php  echo $key->observaciones; ?>" width="50px" height="50px"> <?php  echo $key->concepto; ?></img> 
					<input type="file"  id="archivo<?php echo $contador?>" name="pl_archivo<?php echo $contador?>">  <a href="#" id="a<?php echo $contador?>"> nuevo </a> 
					</td></tr>							
				<?php }				
			}
			?> 
			<input type="hidden"  name="contador_medicos" id="contador_medicos"  value="1"> 
			<input type="hidden"  name="id_informe"  value="<?php echo $id_informe; ?>"> 
			<input type="hidden"  name="id_cita"  value="<?php echo $id_cita; ?>"> 
			</table> 
			<?php
		} ?>
</div>


<br>
<?php  //lectura de archivos... Pueden traerse desde plantillas pq ya están definidos por cada procedimiento...  ?>
<table  class="table table-bordered" border=0>
<thead>	
<td colspan="4" style='display: none' class="fila0">Adjunte sus Archivos</td>
<thead>	
	<?php
	for($i=1; $i<=5; $i++){
		$nombreCampoArchivo="Archivo ".$i;
		$idArchivo="archivo".$i;
		$nameArchivo="pl_archivo".$i;
		$idNuevo="idboton".$i;
		$class="fila".$i;
		?>	
		<tr class="<?php  echo $class ?>" style='display: none'>
		   <td><?php  echo $nombreCampoArchivo ?></td><td><input type="file"  id="<?php  echo $idArchivo ?>" name="<?php  echo $nameArchivo ?>"></td><td><a href="#" id="<?php  echo $idNuevo ?>"><img  src="/images/add.png" width="40px" height="30px"></a></td>
		</tr>	
	<?php } ?>
</table>	
		
		
	<!--	
		<div class="row">
            <span id="boton_guardar">
			   <?php 
			     if($formNuevo  or (!$formNuevo and $estado==1 )) {
				   ?>
				   <button  class="btn btn-dcs" >Guardar</button> 
				   
				   
				   <?php
			     }  // buscar_pacientes
			 ?>              
				
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        
		</form>
		
	 <form action="<?php echo base_url('index.php/Alarmas_generadas/buscar_pacientes'); ?>" method="post" >
   		<input type="hidden"  name="cedula"  value="<?php echo $cedula; ?>">  
		<button  class="btn btn-dcs" onclick="volver()"  id="volver" >Volver</button> 
	 </form>
		</div>	-->
		
	<table>
        <tr ><td >			
			   <?php 
			     if($formNuevo  or (!$formNuevo and $estado==1 )) {
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
		 <form action="<?php echo base_url('index.php/Alarmas_generadas/datos_pacientes'); ?>" method="post" >	
			<input type="hidden"  name="cedula"  id="cedula"  value="<?php echo $cedula;?>">		 
			<button  class="btn btn-dcs" onclick="volver()"  id="volver" >Volver</button> 
		 </form>
		</td>	
	</tr>	
</table>	
	   
<script>




$('#idboton1').click(function(){
	 $('.fila2').show()
})	

$('#idboton2').click(function(){
	 $('.fila3').show()
})	
	
$('#idboton3').click(function(){
	 $('.fila4').show()
})

$('#idboton4').click(function(){
	 $('.fila5').show()
})	
		
	/*	
$('#a1').click(function(){ 
  $('#a1').hide()
  $('#adjunto2').show()
})

$('#a2').click(function(){ 
  $('#a2').hide()
  $('#adjunto3').show() 
})

$('#a3').click(function(){ 
  $('#a3').hide()
  $('#adjunto4').show() 
})

$('#a4').click(function(){ 
  $('#a4').hide()
  $('#adjunto5').show() 
})
*/

$('#procedimientos').change( function(){ //alert ("cambia"+$(this).val())
	var url='<?php echo base_url('index.php/ingreso/buscar_medicos') ?>';	
	$.post(url,{informacion:$(this).val()})
	.done(function(msg){
		console.log(msg)
		$('#datos_medico').html('')
		$('#tabla_medicos').show()  //hide
		//$('#adjunto1').show()  
		$('.fila0').show()  
		$('.fila1').show()  
		var html="";  var i=0;
		$.each(msg.medicos,function(key,val){ //pinta el listado de medicos encontrados
			html+="<tr>"
			html+="<td>"+val.medico+"</td>"
			html+="<td>"+val.cant+"</td>"			
			html+="<td><input type='checkbox' id='id_medico_" +i+ "' name='id_medico' value='"+val.id+"' onclick='validarMarcados(this)'></td>"
			html+="</tr>"
			i++;
		});
	html+="<input type='hidden'  id='contador_medicos'  value='"+i+"'>"
		$('#datos_medico').html(html)

		//para cargar campos desde la plantilla ********debe ser de una consulta
		
		
		var plantillas="<table>"; var contador_archivos=0;
		$.each(msg.plantillas,function(key,val){ 
		// alert(contador_plantillas) 
		  	if(val.tipo_campo=="select")
			plantillas+='<tr><td> <b> '+val.nombre_campo_mostrar+'</b> </td> <td> &nbsp;</td> <td><select id="'+val.nombre_campo+'" name="pl_'+val.nombre_campo+'"><option value="2">Traer opciones</option></select></td>  </tr>'
		if(val.tipo_campo=="text")
			plantillas+='<tr><td> <b> '+val.nombre_campo_mostrar+'</b> </td> <td> &nbsp;</td> <td><input type="text"  id="'+val.nombre_campo+'" name="pl_'+val.nombre_campo+'"></input></td>  </tr>'
		if(val.tipo_campo=="textarea")
			plantillas+='<tr><td> <b> '+val.nombre_campo_mostrar+'</b> </td> <td> &nbsp;</td> <td><textarea id="'+val.nombre_campo+'" name="pl_'+val.nombre_campo+'" cols="117"></textarea></td>  </tr>'
		//aqui pueden pintarse los files,,, si varian por procedimientos
					
		})
		plantillas+="</table>"		
		$('#plantillas').html(plantillas)	
		  
		  
    })		  
	.fail(function(){
		
	})
})


/*Valida que solo se escoja un médico*/
function validarMarcados(obj){ 
  //desmarca todos
  
	for(var i=0; i<document.getElementById('contador_medicos').value; i++){
			document.getElementById('id_medico_'+i).checked=false		
	}
	//marca el escogido
	document.getElementById(obj.id).checked=true

}

function enviar_form(){ //
  var enviar=false;
  //	alert("entra**"+enviar); 	
	for(var i=0; i<document.getElementById('contador_medicos').value; i++){
			if(document.getElementById('id_medico_'+i).checked==true)	
					enviar=true
		
	}
	
	if(enviar==true){
		//alert("motivo "+document.getElementById('motivo').value)
		if(document.getElementById('motivo').value=="" || document.getElementById('motivo').value=='' || document.getElementById('motivo').value==null ){
				alert("Ingrese el motivo")
				return false;
		}else{
			//alert("se va**"+enviar); 
			document.form.actions.submit;
		}		
			
	}		
	else {
		alert("Seleccione un medico")
		return false;
	}
	
	//	alert("se va **"+enviar); 	
 //return false;//****
}


function volver(){
	
	alert ("volver...")
	document.form[0].action="google.com.co";
	document.form[0].actions.submit;
}
</script>


