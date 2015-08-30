
<h1>Equipo</h1>
<form action="<?php echo base_url('index.php/') . "/Equipos/save_equipos"; ?>" method="post" onsubmit="return campos()">
    <div>
        <div class="row">

            <div class="col-md-3">
                <label for="id_equipo">
                </label>
            </div>
            <div class="col-md-3">
                <input type="hidden" value="<?php echo (isset($datos[0]->id_equipo) ? $datos[0]->id_equipo : '' ) ?>" class="form-control   " id="id_equipo" name="id_equipo">
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
                <label for="estado">
                    *         Estado                            </label>
            </div>
            <div class="col-md-3">
                <select  class="form-control obligatorio  " id="estado" name="estado">
                    <option value=""></option>
                    <option value="DISPONIBLE" <?php echo (isset($datos[0]->estado) ? (($datos[0]->estado == 'DISPONIBLE') ? 'selected="selected"' : '') : '' ) ?>>DISPONIBLE</option>
                    <option value="EN OPERACIÓN" <?php echo (isset($datos[0]->estado) ? (($datos[0]->estado == 'EN OPERACIÓN') ? 'selected="selected"' : '') : '' ) ?>>EN OPERACIÓN</option>
                    <option value="ASIGNADO" <?php echo (isset($datos[0]->estado) ? (($datos[0]->estado == 'ASIGNADO') ? 'selected="selected"' : '') : '' ) ?>>ASIGNADO</option>
                    <option value="EN TRANSITO" <?php echo (isset($datos[0]->estado) ? (($datos[0]->estado == 'EN TRANSITO') ? 'selected="selected"' : '') : '' ) ?>>EN TRANSITO</option>
                    <option value="MANTENIMIENTO" <?php echo (isset($datos[0]->estado) ? (($datos[0]->estado == 'MANTENIMIENTO') ? 'selected="selected"' : '') : '' ) ?>>MANTENIMIENTO</option>
                </select>
                <br>
            </div>



            <div class="col-md-3">
                <label for="ubicacion">
                    *         Ubicación                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->ubicacion) ? $datos[0]->ubicacion : '' ) ?>" class="form-control obligatorio  " id="ubicacion" name="ubicacion">
                <br>
            </div>



            <div class="col-md-3">
                <label for="serial">
                    *         Serial N°                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->serial) ? $datos[0]->serial : '' ) ?>" class="form-control obligatorio  number" id="serial" name="serial">
                <br>
            </div>



            <div class="col-md-3">
                <label for="fabricante">
                    Fabricante                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->fabricante) ? $datos[0]->fabricante : '' ) ?>" class="form-control   " id="fabricante" name="fabricante">
                <br>
            </div>



            <div class="col-md-3">
                <label for="fecha_fabricacion">
                    Fecha fabricación                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->fecha_fabricacion) ? $datos[0]->fecha_fabricacion : '' ) ?>" class="form-control  fecha " id="fecha_fabricacion" name="fecha_fabricacion">
                <br>
            </div>



            <div class="col-md-3">
                <label for="tipo_equipo_cod">
                    *         Equipo                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->tipo_equipo_cod) ? $datos[0]->tipo_equipo_cod : '' ) ?>" class="form-control obligatorio  " id="tipo_equipo_cod" name="tipo_equipo_cod">
                <br>
            </div>



            <div class="col-md-3">
                <label for="imagen">
                    Imagen                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->imagen) ? $datos[0]->imagen : '' ) ?>" class="form-control   " id="imagen" name="imagen">
                <br>
            </div>



            <div class="col-md-3">
                <label for="responsable">
                    Responsable                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->responsable) ? $datos[0]->responsable : '' ) ?>" class="form-control   " id="responsable" name="responsable">
                <br>
            </div>



            <div class="col-md-3">
                <label for="observaciones">
                    Observaciones                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->observaciones) ? $datos[0]->observaciones : '' ) ?>" class="form-control   " id="observaciones" name="observaciones">
                <br>
            </div>



            <div class="col-md-3">
                <label for="fecha_ultima_calibracion">
                    Fecha última calibración                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->fecha_ultima_calibracion) ? $datos[0]->fecha_ultima_calibracion : '' ) ?>" class="form-control  fecha " id="fecha_ultima_calibracion" name="fecha_ultima_calibracion">
                <br>
            </div>



            <div class="col-md-3">
                <label for="empresa_certificadora">
                    Empresa certificadora                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->empresa_certificadora) ? $datos[0]->empresa_certificadora : '' ) ?>" class="form-control   " id="empresa_certificadora" name="empresa_certificadora">
                <br>
            </div>



            <div class="col-md-3">
                <label for="adjuntar_certificado">
                    Adjuntar certificado                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->adjuntar_certificado) ? $datos[0]->adjuntar_certificado : '' ) ?>" class="form-control   " id="adjuntar_certificado" name="adjuntar_certificado">
                <br>
            </div>



            <div class="col-md-3">
                <label for="examen_cod">
                    Examen                            </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("examen_cod", "examen_cod", "form-control obligatorio", "examenes", "examen_cod", "examen_nombre", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                <br>
            </div>



            <div class="col-md-3">
                <label for="variable_codigo">
                    Variable                            </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("variable_codigo", "variable_codigo", "form-control", "variables", "variable_codigo", "hl7tag", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
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
                <a href="<?php echo base_url('index.php') . "/Equipos/consult_equipos" ?>" class="btn btn-success">Listado </a>
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
