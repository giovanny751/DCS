<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> SERVICIOS MÉDICOS    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/')."/Parts/save_parts"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
                                    <?php $id=(isset($datos[0]->id)?$datos[0]->id:'' ) ?>
                                                <input type="hidden" value="<?php echo (isset($datos[0]->id)?$datos[0]->id:'' ) ?>" class=" form-control   " id="id" name="id">
                    

                    <div class="col-md-3">
                        <label for="descripcion">
                            *                             Procedimiento                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->descripcion)?$datos[0]->descripcion:'' ) ?>" class=" form-control obligatorio  " id="descripcion" name="descripcion">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="notes">
                                                        Observaciones                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->notes)?$datos[0]->notes:'' ) ?>" class=" form-control   " id="notes" name="notes">

                            
                                                <br>
                    </div>

                            </div>
        <?php if(isset($post['campo'])){ ?>
        <input type="hidden" name="<?php echo $post['campo']?>" value="<?php echo $post[$post['campo']]?>">
        <input type="hidden" name="campo" value="<?php echo $post['campo']?>">
        <?php } ?>
        <div class="row">
            <span id="boton_guardar">
                <button class="btn btn-dcs" >Guardar</button> 
                <input class="btn btn-dcs" type="reset" value="Limpiar">
                <a href="<?php echo base_url('index.php')."/Parts/consult_parts" ?>" class="btn btn-dcs">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
    </form>
</div>
<script>
    $('#descripcion').change(function() {
        var descripcion = $('#descripcion').val();
        $.post('<?php echo base_url('index.php/parts/confirm_descripcion') ?>', {descripcion: descripcion})
                .done(function(msg) {
                    if (msg == 0) {
                        alerta('verde', ' Procedimiento valido')
                    } else {
                        alerta('rojo', ' Procedimiento ya se encuentra registrada')
                        $('#descripcion').val('');
                    }
                })
                .fail(function(msg) {
                })
    })
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
    $('.fecha').datepicker({ dateFormat: 'yy-mm-dd' });


</script>
