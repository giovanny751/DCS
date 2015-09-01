<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>Tipos alarmas
    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . "/Tipo_alarma/save_tipo_alarma"; ?>" method="post" onsubmit="return campos()">
        <div class="row">

            <div class="col-md-3">
                <label for="id_tipo_alarma">
                </label>
            </div>
            <div class="col-md-3">
                <input type="hidden" value="<?php echo (isset($datos[0]->id_tipo_alarma) ? $datos[0]->id_tipo_alarma : '' ) ?>" class="form-control   " id="id_tipo_alarma" name="id_tipo_alarma">
                <br>
            </div>

        </div><div class="row">

            <div class="col-md-3">
                <label for="descripcion">
                    *         Descripción                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->descripcion) ? $datos[0]->descripcion : '' ) ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
                <br>
            </div>

        </div><div class="row">

            <div class="col-md-3">
                <label for="examen">
                    *         Examen                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->examen) ? $datos[0]->examen : '' ) ?>" class="form-control obligatorio  " id="examen" name="examen">
                <br>
            </div>



            <div class="col-md-3">
                <label for="analisis_resultados">
                    Análisis resultados                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->analisis_resultados) ? $datos[0]->analisis_resultados : '' ) ?>" class="form-control   " id="analisis_resultados" name="analisis_resultados">
                <br>
            </div>



            <div class="col-md-3">
                <label for="id_niveles_alarma">
                    *         Niveles                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->id_niveles_alarma) ? $datos[0]->id_niveles_alarma : '' ) ?>" class="form-control obligatorio  " id="id_niveles_alarma" name="id_niveles_alarma">
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
                <a href="<?php echo base_url('index.php') . "/Tipo_alarma/consult_tipo_alarma" ?>" class="btn btn-success">Listado </a>
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

        if (obligatorio('obligatorio') == false) {
            return false
        } else {
            $('#boton_guardar').hide();
            $('#boton_cargar').show();
            return true;
        }
    }
    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({dateFormat: 'yy-mm-dd'});
</script>
