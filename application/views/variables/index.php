
<h1>Variables</h1>
<form action="<?php echo base_url('index.php/') . "/Variables/save_variables"; ?>" method="post" onsubmit="return campos()">
    <div>
        <div class="row">

            <div class="col-md-3">
                <label for="variable_codigo">
                </label>
            </div>
            <div class="col-md-3">
                <input type="hidden" value="<?php echo (isset($datos[0]->variable_codigo) ? $datos[0]->variable_codigo : '' ) ?>" class="form-control   " id="variable_codigo" name="variable_codigo">
                <br>
            </div>

        </div><div class="row">

            <div class="col-md-3">
                <label for="hl7tag">
                    *         HL7TAG                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->hl7tag) ? $datos[0]->hl7tag : '' ) ?>" class="form-control obligatorio  " id="hl7tag" name="hl7tag">
                <br>
            </div>



            <div class="col-md-3">
                <label for="descripcion">
                    *         Descripción                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->descripcion) ? $datos[0]->descripcion : '' ) ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
                <br>
            </div>



            <div class="col-md-3">
                <label for="examen_cod">
                    *         Examen                            </label>
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
    $('body').delegate('.number', 'keypress', function(tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker();
</script>
