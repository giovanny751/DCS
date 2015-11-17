<div class="row">
    <span class="tituloH">SERVICIOS MÉDICOS</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>

<!--<div class='well'>-->
    <form action="<?php echo base_url('index.php/')."/Parts/save_parts"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
                                    <?php $id=(isset($datos[0]->id)?$datos[0]->id:'' ) ?>
                                                <input type="hidden" value="<?php echo (isset($datos[0]->id)?$datos[0]->id:'' ) ?>" class=" form-control   " id="id" name="id">
                    

                    <div class="col-md-3">
                        <label for="descripcion">
                            *                             Procedimiento                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->description)?$datos[0]->description:'' ) ?>" class=" form-control obligatorio  " id="description" name="description">

                            
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
<!--</div>-->
<script>
    $('#description').change(function() {
        var description = $('#description').val();
        $.post('<?php echo base_url('index.php/parts/confirm_descripcion') ?>', {descripcion: description})
                .done(function(msg) {
                    if (msg == 0) {
                        alerta('verde', ' Procedimiento valido')
                    } else {
                        alerta('rojo', ' Procedimiento ya se encuentra registrada')
                        $('#description').val('');
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
