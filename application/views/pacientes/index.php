
<h1>Pacientes</h1>
<form action="<?php echo base_url('index.php/') . "/Pacientes/save_pacientes"; ?>" method="post" onsubmit="return campos()">
    <div>
        <div class="row">

            <div class="col-md-3">
                <label for="id_paciente">
                </label>
            </div>
            <div class="col-md-3">
                <input type="hidden" value="<?php echo (isset($datos[0]->id_paciente) ? $datos[0]->id_paciente : '' ) ?>" class="form-control   " id="id_paciente" name="id_paciente">
                <br>
            </div>

        </div><div class="row">

            <div class="col-md-3">
                <label for="cedula_paciente">
                    *         Cédula                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->cedula_paciente) ? $datos[0]->cedula_paciente : '' ) ?>" class="form-control obligatorio  " id="cedula_paciente" name="cedula_paciente">
                <br>
            </div>



            <div class="col-md-3">
                <label for="nombres">
                    *         Nombres                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->nombres) ? $datos[0]->nombres : '' ) ?>" class="form-control obligatorio  " id="nombres" name="nombres">
                <br>
            </div>

        </div><div class="row">

            <div class="col-md-3">
                <label for="apellidos">
                    *         Apellidos                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->apellidos) ? $datos[0]->apellidos : '' ) ?>" class="form-control obligatorio  " id="apellidos" name="apellidos">
                <br>
            </div>



            <div class="col-md-3">
                <label for="fecha_afiliacion">
                    *         Fecha afiliación                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->fecha_afiliacion) ? $datos[0]->fecha_afiliacion : '' ) ?>" class="form-control obligatorio  " id="fecha_afiliacion" name="fecha_afiliacion">
                <br>
            </div>



            <div class="col-md-3">
                <label for="foto">
                             Foto                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->foto) ? $datos[0]->foto : '' ) ?>" class="form-control   " id="foto" name="foto">
                <br>
            </div>



            <div class="col-md-3">
                <label for="direccion">
                    *         Dirección                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->direccion) ? $datos[0]->direccion : '' ) ?>" class="form-control obligatorio  " id="direccion" name="direccion">
                <br>
            </div>



            <div class="col-md-3">
                <label for="barrio">
                    *         Barrio                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->barrio) ? $datos[0]->barrio : '' ) ?>" class="form-control obligatorio  " id="barrio" name="barrio">
                <br>
            </div>



            <div class="col-md-3">
                <label for="ciudad">
                    *         Ciudad                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->ciudad) ? $datos[0]->ciudad : '' ) ?>" class="form-control obligatorio  " id="ciudad" name="ciudad">
                <br>
            </div>



            <div class="col-md-3">
                <label for="fecha_nacimiento">
                    *         Fecha_nacimiento                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->fecha_nacimiento) ? $datos[0]->fecha_nacimiento : '' ) ?>" class="form-control obligatorio  " id="fecha_nacimiento" name="fecha_nacimiento">
                <br>
            </div>



            <div class="col-md-3">
                <label for="estatura">
                    *         Estatura                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->estatura) ? $datos[0]->estatura : '' ) ?>" class="form-control obligatorio  " id="estatura" name="estatura">
                <br>
            </div>



            <div class="col-md-3">
                <label for="peso">
                    *         Peso                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->peso) ? $datos[0]->peso : '' ) ?>" class="form-control obligatorio  " id="peso" name="peso">
                <br>
            </div>



            <div class="col-md-3">
                <label for="telefono_fijo">
                    *         Telefono fijo                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->telefono_fijo) ? $datos[0]->telefono_fijo : '' ) ?>" class="form-control number obligatorio  " id="telefono_fijo" name="telefono_fijo">
                <br>
            </div>



            <div class="col-md-3">
                <label for="celular">
                    Celular                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->celular) ? $datos[0]->celular : '' ) ?>" class="form-control   number" id="celular" name="celular">
                <br>
            </div>



            <div class="col-md-3">
                <label for="email">
                    Email                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->email) ? $datos[0]->email : '' ) ?>" class="form-control   number" id="email" name="email">
                <br>
            </div>



            <div class="col-md-3">
                <label for="fecha_inicio_contrato">
                    *         Fecha inicio contrato                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->fecha_inicio_contrato) ? $datos[0]->fecha_inicio_contrato : '' ) ?>" class="form-control obligatorio  " id="fecha_inicio_contrato" name="fecha_inicio_contrato">
                <br>
            </div>



            <div class="col-md-3">
                <label for="fecha_fin_contrato">
                    *         Fecha fin contrato                            </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->fecha_fin_contrato) ? $datos[0]->fecha_fin_contrato : '' ) ?>" class="form-control obligatorio  " id="fecha_fin_contrato" name="fecha_fin_contrato">
                <br>
            </div>



            <div class="col-md-3">
                <label for="tipo_cliente">
                    Tipo cliente                            </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("tipo_cliente", "tipo_cliente", "form-control ", "tipo_cliente", "id_tipo_cliente", "descripcion", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                <br>
            </div>



            <div class="col-md-3">
                <label for="cliente">
                    Cliente                            </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("cliente", "cliente", "form-control ", "clientes", "id_cliente", "nombre", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                <br>
            </div>



            <div class="col-md-3">
                <label for="medico">
                    Medico                            </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("medico", "medico", "form-control ", "medicos", "medico_codigo", "nombre", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
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

        </div>
        <?php if (isset($post['campo'])) { ?>
            <input type="hidden" name="<?php echo $post['campo'] ?>" value="<?php echo $post[$post['campo']] ?>">
            <input type="hidden" name="campo" value="<?php echo $post['campo'] ?>">
        <?php } ?>
        <div class="row">
            <span id="boton_guardar">
                <button class="btn btn-success" >Guardar</button> 
                <input class="btn btn-success" type="reset" value="Limpiar">
                <a href="<?php echo base_url('index.php') . "/Pacientes/consult_pacientes" ?>" class="btn btn-success">Listado </a>
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
