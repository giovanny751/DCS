<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>Niveles alarmas
    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . "/Niveles_alarma/save_niveles_alarma"; ?>" method="post" onsubmit="return campos()">

        <div class="row">

            <input type="hidden" value="<?php echo (isset($datos[0]->id_niveles_alarma) ? $datos[0]->id_niveles_alarma : '' ) ?>" class="form-control   " id="id_niveles_alarma" name="id_niveles_alarma">



            <div class="col-md-3">
                <label for="descripcion">
                    *         Descripción                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->descripcion) ? $datos[0]->descripcion : '' ) ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
                <br>
            </div>


<!--            <div class="col-md-3">
                <label for="examen_cod">
                    Examen                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->examen_cod) ? $datos[0]->examen_cod : '' ) ?>" class="form-control   " id="examen_cod" name="examen_cod">
                <?php echo lista("examen_cod", "examen_cod", "form-control obligatorio", "examenes", "examen_cod", "examen_nombre", (isset($datos[0]->examen_cod) ? $datos[0]->examen_cod : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                <br>
            </div>


            <div class="col-md-3">
                <label for="id_tipo_alarma">
                    Tipo alarma                            </label>
            </div>
            <div class="col-md-3">
                <span id="traer_tipo_alarma">
                    <?php echo lista("id_tipo_alarma", "id_tipo_alarma", "form-control obligatorio", "tipo_alarma", "id_tipo_alarma", "descripcion", (isset($datos[0]->id_tipo_alarma) ? $datos[0]->id_tipo_alarma : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                </span>
                <br>
            </div>-->
            <div class="col-md-3">
                <label for="n_repeticiones_minimas">
                    *         N° repeticiones mínimas                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->n_repeticiones_minimas) ? $datos[0]->n_repeticiones_minimas : '' ) ?>" class="form-control obligatorio  number" id="n_repeticiones_minimas" name="n_repeticiones_minimas">
                <br>
            </div>

            <div class="col-md-3">
                <label for="n_repeticiones_maximas">
                    *         N° repeticiones máximas                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->n_repeticiones_maximas) ? $datos[0]->n_repeticiones_maximas : '' ) ?>" class="form-control obligatorio  number" id="n_repeticiones_maximas" name="n_repeticiones_maximas">
                <br>
            </div>



            <div class="col-md-3">
                <label for="tiempo">
                    *         Tiempo                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->tiempo) ? $datos[0]->tiempo : '' ) ?>" class="form-control obligatorio  number" id="tiempo" name="tiempo">
                <br>
            </div>



            <div class="col-md-3">
                <label for="frecuencia">
                    *         Frecuencia                            </label>
            </div>
            <div class="col-md-3">
                <!--<input type="text" value="<?php echo (isset($datos[0]->frecuencia) ? $datos[0]->frecuencia : '' ) ?>" >-->
                <select class="form-control obligatorio  " id="frecuencia" name="frecuencia">
                    <option value=""></option>
                    <option value="Hora">Hora</option>
                    <option value="Día">Día</option>
                    <option value="Semana">Semana</option>
                    <option value="Mes">Mes</option>
                    <option value="Año">Año</option>
                </select>
                <br>
            </div>



            <div class="col-md-3">
                <label for="color">
                    *         Color                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->color) ? $datos[0]->color : '' ) ?>" class="form-control obligatorio  " id="color" name="color">
                <br>
            </div>



            <div class="col-md-3">
                <label for="id_protocolo">
                    *         protocolo                            </label>
            </div>
            <div class="col-md-3">
                <!--<input type="text" value="<?php echo (isset($datos[0]->id_protocolo) ? $datos[0]->id_protocolo : '' ) ?>" class="form-control obligatorio  " id="id_protocolo" name="id_protocolo">-->
                <?php echo lista("id_protocolo", "id_protocolo", "form-control obligatorio", "protocolos", "id_protocolo", "nombre", (isset($datos[0]->id_protocolo) ? $datos[0]->id_protocolo : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
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
                <a href="<?php echo base_url('index.php') . "/Niveles_alarma/consult_niveles_alarma" ?>" class="btn btn-success">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
    </form>
</div>
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
