<div class="row">
    <span class="tituloH">Niveles Alarmas</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
<form id="form1_alarma" action="<?php echo base_url('index.php/') . "/Niveles_alarma/save_niveles_alarma"; ?>" method="post" onsubmit="return campos()">

    <div class="row">

        <input type="hidden" value="<?php echo (isset($datos[0]->id_niveles_alarma) ? $datos[0]->id_niveles_alarma : '' ) ?>" class="form-control   " id="id_niveles_alarma" name="id_niveles_alarma">



        <div class="col-md-3">
            <label for="descripcion">
                *         Descripción                            </label>
        </div>
        <div class="col-md-3">
            <input type="text" value="<?php echo (isset($datos[0]->descripcion) ? $datos[0]->descripcion : '' ) ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
        </div>
        <div class="col-md-3">
            <label for="n_repeticiones_minimas">
                *         N° repeticiones mínimas                            </label>
        </div>
        <div class="col-md-3">
            <input type="text" value="<?php echo (isset($datos[0]->n_repeticiones_minimas) ? $datos[0]->n_repeticiones_minimas : '' ) ?>" class="form-control obligatorio  number" id="n_repeticiones_minimas" name="n_repeticiones_minimas">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="color">
                *         Color                            </label>
        </div>
        <div class="col-md-3">
            <select class="form-control obligatorio  " id="color" name="color"  >
                <option value="1-Verde" <?php echo (isset($datos[0]->color) ? ($datos[0]->color == '1-Verde' ? 'selected' : '') : '' ) ?> >Verde</option>
                <option value="2-Amarillo" <?php echo (isset($datos[0]->color) ? ($datos[0]->color == '2-Amarillo' ? 'selected' : '') : '' ) ?> >Amarillo</option>
                <!--<option value="Naranja" <?php echo (isset($datos[0]->color) ? ($datos[0]->color == 'Naranja' ? 'selected' : '') : '' ) ?> >Naranja</option>-->
                <option value="3-Rojo" <?php echo (isset($datos[0]->color) ? ($datos[0]->color == '3-Rojo' ? 'selected' : '') : '' ) ?> >Rojo</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="n_repeticiones_maximas">
                *         N° repeticiones máximas                            </label>
        </div>
        <div class="col-md-3">
            <input type="text" value="<?php echo (isset($datos[0]->n_repeticiones_maximas) ? $datos[0]->n_repeticiones_maximas : '' ) ?>" class="form-control obligatorio  number" id="n_repeticiones_maximas" name="n_repeticiones_maximas">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="id_protocolo">
                *         protocolo                            </label>
        </div>
        <div class="col-md-3">
            <!--<input type="text" value="<?php echo (isset($datos[0]->id_protocolo) ? $datos[0]->id_protocolo : '' ) ?>" class="form-control obligatorio  " id="id_protocolo" name="id_protocolo">-->
            <?php echo lista("id_protocolo", "id_protocolo", "form-control obligatorio", "protocolos", "id_protocolo", "nombre", (isset($datos[0]->id_protocolo) ? $datos[0]->id_protocolo : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
        </div>

    </div>
    <?php if (isset($post['campo'])) { ?>
        <input type="hidden" name="<?php echo $post['campo'] ?>" value="<?php echo $post[$post['campo']] ?>">
        <input type="hidden" name="campo" value="<?php echo $post['campo'] ?>">
    <?php } ?>
    <div class="row">
        <span id="boton_guardar">
            <button class="btn btn-dcs" >Guardar</button> 
            <input class="btn btn-dcs" type="reset" value="Limpiar">
            <a href="<?php echo base_url('index.php') . "/Niveles_alarma/consult_niveles_alarma" ?>" class="btn btn-dcs">Listado </a>
        </span>
        <span id="boton_cargar" style="display: none">
            <h2>Cargando ...</h2>
        </span>
    </div>
    <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
</form>
<script>

    $('#examen_cod').change(function() {
        var url = "<?php echo base_url('index.php/Niveles_alarma/tipo_alarma') ?>"
        $.post(url, {examen_cod: $(this).val()})
                .done(function(msg) {
                    $('#traer_tipo_alarma').html(msg);
                })
                .fail(function() {
                    alerta('rojo', 'Error al consultar');
                    $('#id_tipo_alarma').val('');
                })
    })

    $('#frecuencia').val("<?php echo (isset($datos[0]->frecuencia) ? $datos[0]->frecuencia : '' ) ?>");
    $('#analisis_resultado').val("<?php echo (isset($datos[0]->analisis_resultado) ? $datos[0]->analisis_resultado : '' ) ?>");
    function campos() {
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
