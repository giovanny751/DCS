
<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Variables
    </h5>
</div>
<div class='well'>
<form action="<?php echo base_url('index.php/') . "/Variables/save_variables"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
    
        <div class="row">
            <?php $id = (isset($datos[0]->variable_codigo) ? $datos[0]->variable_codigo : '' ) ?>
            <div class="col-md-3">
                <label for="variable_codigo">
                </label>
            </div>
            <div class="col-md-3">
                <input type="hidden" value="<?php echo (isset($datos[0]->variable_codigo) ? $datos[0]->variable_codigo : '' ) ?>" class=" form-control   " id="variable_codigo" name="variable_codigo">


                <br>
            </div>

        </div><div class="row">

            <div class="col-md-3">
                <label for="hl7tag">
                    *                             HL7TAG                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->hl7tag) ? $datos[0]->hl7tag : '' ) ?>" class=" form-control obligatorio  " id="hl7tag" name="hl7tag">


                <br>
            </div>



            <div class="col-md-3">
                <label for="descripcion">
                    *                             Descripción                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->descripcion) ? $datos[0]->descripcion : '' ) ?>" class=" form-control obligatorio  " id="descripcion" name="descripcion">


                <br>
            </div>



            <div class="col-md-3">
                <label for="examen_cod">
                    *                             Examen                        </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("examen_cod", "examen_cod", "form-control obligatorio", "examenes", "examen_cod", "examen_nombre", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                <br>
            </div>

        </div>
        <?php if (isset($post['campo'])) { ?>
            <input type="hidden" name="<?php echo $post['campo'] ?>" value="<?php echo $post[$post['campo']] ?>">
            <input type="hidden" name="campo" value="<?php echo $post['campo'] ?>">
        <?php } ?>
        <div class="row">
            <span id="boton_guardar">
                <button class="btn btn-success" >Guardar</button> 
                <input class="btn btn-success" type="reset" value="Limpiar">
                <a href="<?php echo base_url('index.php') . "/Variables/consult_variables" ?>" class="btn btn-success">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
</form>
</div>
<script>
    $('#hl7tag').change(function() {
        var hl7tag = $('#hl7tag').val();
        var variable_codigo = $('#variable_codigo').val();
        $('#boton_cargar').show();
        $('#boton_guardar').hide();
        $.post('<?php echo base_url('index.php/Variables/referencia') ?>', {hl7tag: hl7tag, variable_codigo: variable_codigo})
                .done(function(msg) {
                    if (msg == 0) {
                        alerta('verde', 'Nombre valido')
                    } else {
                        alerta('rojo', 'Nombre no valido')
                        $('#hl7tag').val('');
                    }
                    $('#boton_cargar').hide();
                    $('#boton_guardar').show();
                })
                .fail(function(msg) {
                    $('#boton_cargar').hide();
                    $('#boton_guardar').show();
                })
    })
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
