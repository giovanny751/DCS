<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Tipos de Equipos    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/')."/Tipo_equipo/save_tipo_equipo"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
                                    <?php $id=(isset($datos[0]->tipo_equipo_cod)?$datos[0]->tipo_equipo_cod:'' ) ?>
                        

                    
                                                    <input type="hidden" value="<?php echo (isset($datos[0]->tipo_equipo_cod)?$datos[0]->tipo_equipo_cod:'' ) ?>" class=" form-control   " id="tipo_equipo_cod" name="tipo_equipo_cod">


                    

                    <div class="col-md-3">
                        <label for="referencia">
                            *                             Referencia                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->referencia)?$datos[0]->referencia:'' ) ?>" class=" form-control obligatorio  " id="referencia" name="referencia">

                            
                                                <br>
                    </div>

                            </div>
        <?php if(isset($post['campo'])){ ?>
        <input type="hidden" name="<?php echo $post['campo']?>" value="<?php echo $post[$post['campo']]?>">
        <input type="hidden" name="campo" value="<?php echo $post['campo']?>">
        <?php } ?>
        <div class="row">
            <span id="boton_guardar">
                <button class="btn btn-success" >Guardar</button> 
                <input class="btn btn-success" type="reset" value="Limpiar">
                <a href="<?php echo base_url('index.php')."/Tipo_equipo/consult_tipo_equipo" ?>" class="btn btn-success">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
    </form>
</div>
<script>
    function campos() {
        $('input[type="file"]').each(function(key, val) {
            var img = $(this).val();
            var r = (img.indexOf('jpg') != -1) ? '' : ((img.indexOf('png') != -1) ? '' : ((img.indexOf('gif') != -1) ? '' : false))
            if (r === false) {
                alert('Tipo de archivo no valido');
                return false;
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
    $('.fecha').datepicker({ dateFormat: 'yy-mm-dd' });


</script>
