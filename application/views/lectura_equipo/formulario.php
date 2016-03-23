<div class="row">
    <span class="tituloH">Lectura Equipo WS  <?php echo date("Y-m-d H:i:s");?></span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
<form action="<?php echo base_url('index.php/') . "/Lectura_equipo/soap_ws"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
    <div class="row">
    
        <div class="col-md-3">
            <label for="id_paciente">
                *                         Cedula    Paciente                        </label>
				<input type="text"  class=" form-control obligatorio " id="cedula" name="cedula">
        </div>
        
        <div class="col-md-3">
            <label for="variable_codigo">
                *                             variable_codigo                        </label>
				    <input type="text"  class=" form-control obligatorio " id="variable" name="variable">
        </div>
         
    </div>
    
    <div class="row">

	<div class="col-md-3">
            <label for="lectura_numerica">
                *                            lectura_numerica                        </label>
				    <input type="text"  class=" form-control obligatorio " id="lectura" name="lectura">
        </div>
        <div class="col-md-3">
            <label for="serial_equipo">
                *                             serial_equipo                        </label>
				<input type="text" value="" class=" form-control obligatorio  " id="serial" name="serial">
        </div>
        <div class="col-md-3"
    </div>
    <?php if (isset($post['campo'])) { ?>
        <input type="hidden" name="<?php echo $post['campo'] ?>" value="<?php echo $post[$post['campo']] ?>">
        <input type="hidden" name="campo" value="<?php echo $post['campo'] ?>">
    <?php } ?>
    <div class="row">
        <span id="boton_guardar">
            <button class="btn btn-dcs" >Enviar WS</button> 
            <input class="btn btn-dcs" type="reset" value="Limpiar">
            <a href="<?php echo base_url('index.php') . "/Lectura_equipo/consult_lectura_equipo" ?>" class="btn btn-dcs">Listado </a>
        </span>
        <span id="boton_cargar" style="display: none">
            <h2>Cargando ...</h2>
        </span>
    </div>
    <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
</form>
<script>
    function campos() {
        $('input[type="file"]').each(function(key, val) {
            var img = $(this).val();
            if (img != "") {
                var r = (img.indexOf('jpg') != -1) ? '' : ((img.indexOf('png') != -1) ? '' : ((img.indexOf('gif') != -1) ? '' : false))
                if (r === false) {
                    alert('Tipo de archivo no valido');
                    return false;
                }
            }
        });
        if (obligatorio('obligatorio') == false) {
            return false
        } else {
            $('#boton_guardar').hide();
            $('#boton_cargar').show();
            return true;
        }
    }
    $('body').delegate('.number', 'keypress', function(tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({dateFormat: 'yy-mm-dd'});


</script>
