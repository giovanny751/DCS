<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Pacientes    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/')."/Pacientes/save_pacientes"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
                                    <?php $id=(isset($datos[0]->id_paciente)?$datos[0]->id_paciente:'' ) ?>
                                                <input type="hidden" value="<?php echo (isset($datos[0]->id_paciente)?$datos[0]->id_paciente:'' ) ?>" class=" form-control   " id="id_paciente" name="id_paciente">
                    

                    <div class="col-md-3">
                        <label for="cedula_paciente">
                            *                             Cédula paciente                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->cedula_paciente)?$datos[0]->cedula_paciente:'' ) ?>" class=" form-control obligatorio  number" id="cedula_paciente" name="cedula_paciente">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="nombres">
                            *                             Nombres                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->nombres)?$datos[0]->nombres:'' ) ?>" class=" form-control obligatorio  " id="nombres" name="nombres">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="apellidos">
                            *                             Apellidos                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->apellidos)?$datos[0]->apellidos:'' ) ?>" class=" form-control obligatorio  " id="apellidos" name="apellidos">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="fecha_afiliacion">
                            *                             Fecha Afiliación                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->fecha_afiliacion)?$datos[0]->fecha_afiliacion:'' ) ?>" class=" form-control obligatorio fecha " id="fecha_afiliacion" name="fecha_afiliacion">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="foto">
                            *                             Foto                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="file" value="<?php echo (isset($datos[0]->foto)?$datos[0]->foto:'' ) ?>" class="  obligatorio  " id="foto" name="foto">

                                                            <?php if(!empty($id) && $datos[0]->foto!=''){ ?>
                                <img style="width: 100px" src="<?php echo base_url('uploads')?>/pacientes/<?php echo $id."/".$datos[0]->foto?>">
                                <?php } ?>
                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="direccion">
                            *                             Dirección                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->direccion)?$datos[0]->direccion:'' ) ?>" class=" form-control obligatorio  " id="direccion" name="direccion">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="barrio">
                            *                             Barrio                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->barrio)?$datos[0]->barrio:'' ) ?>" class=" form-control obligatorio  " id="barrio" name="barrio">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="ciudad">
                            *                             Ciudad                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->ciudad)?$datos[0]->ciudad:'' ) ?>" class=" form-control obligatorio  " id="ciudad" name="ciudad">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="fecha_nacimiento">
                            *                             Fecha Nacimiento                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->fecha_nacimiento)?$datos[0]->fecha_nacimiento:'' ) ?>" class=" form-control obligatorio fecha " id="fecha_nacimiento" name="fecha_nacimiento">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="estatura">
                            *                             Estatura                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->estatura)?$datos[0]->estatura:'' ) ?>" class=" form-control obligatorio  " id="estatura" name="estatura">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="peso">
                            *                             Peso                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->peso)?$datos[0]->peso:'' ) ?>" class=" form-control obligatorio  number" id="peso" name="peso">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="telefono_fijo">
                            *                             Teléfono fijo                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->telefono_fijo)?$datos[0]->telefono_fijo:'' ) ?>" class=" form-control obligatorio  number" id="telefono_fijo" name="telefono_fijo">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="celular">
                                                        Celular                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->celular)?$datos[0]->celular:'' ) ?>" class=" form-control   number" id="celular" name="celular">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="email">
                                                        Email                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="email" value="<?php echo (isset($datos[0]->email)?$datos[0]->email:'' ) ?>" class=" form-control   " id="email" name="email">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="fecha_inicio_contrato">
                            *                             Fecha inicio contrato                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->fecha_inicio_contrato)?$datos[0]->fecha_inicio_contrato:'' ) ?>" class=" form-control obligatorio fecha " id="fecha_inicio_contrato" name="fecha_inicio_contrato">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="fecha_fin_contrato">
                            *                             Fecha fin contrato                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->fecha_fin_contrato)?$datos[0]->fecha_fin_contrato:'' ) ?>" class=" form-control obligatorio fecha " id="fecha_fin_contrato" name="fecha_fin_contrato">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="tipo_cliente">
                            *                             Tipo Cliente                        </label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("tipo_cliente", "tipo_cliente", "form-control obligatorio", "tipo_cliente", "id_tipo_cliente", "descripcion", (isset($datos[0]->tipo_cliente)?$datos[0]->tipo_cliente:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="cliente">
                            *                             Cliente                        </label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("cliente", "cliente", "form-control obligatorio", "clientes", "id_cliente", "nombre", (isset($datos[0]->cliente)?$datos[0]->cliente:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="medico">
                            *                             Médico                        </label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("medico", "medico", "form-control obligatorio", "medicos", "medico_codigo", "nombre", (isset($datos[0]->medico)?$datos[0]->medico:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="observaciones">
                            *                             Observaciones                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->observaciones)?$datos[0]->observaciones:'' ) ?>" class=" form-control obligatorio  " id="observaciones" name="observaciones">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="examen_cod">
                            *                             Examen                        </label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("examen_cod", "examen_cod", "form-control obligatorio", "examenes", "examen_cod", "examen_nombre", (isset($datos[0]->examen_cod)?$datos[0]->examen_cod:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="hl7tag">
                            *                             HL7TAG                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->hl7tag)?$datos[0]->hl7tag:'' ) ?>" class=" form-control obligatorio  " id="hl7tag" name="hl7tag">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="variable_codigo">
                            *                             Variables                        </label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("variable_codigo", "variable_codigo", "form-control obligatorio", "variables", "variable_codigo", "hl7tag", (isset($datos[0]->variable_codigo)?$datos[0]->variable_codigo:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="valor_frecuencia">
                            *                             Valor frecuencia                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->valor_frecuencia)?$datos[0]->valor_frecuencia:'' ) ?>" class=" form-control obligatorio  number" id="valor_frecuencia" name="valor_frecuencia">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="frecuencia">
                            *                             Frecuencia                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->frecuencia)?$datos[0]->frecuencia:'' ) ?>" class=" form-control obligatorio  " id="frecuencia" name="frecuencia">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="valor_minimo">
                            *                             Valor mínimo                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->valor_minimo)?$datos[0]->valor_minimo:'' ) ?>" class=" form-control obligatorio  number" id="valor_minimo" name="valor_minimo">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="valor_maximo">
                            *                             Valor máximo                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->valor_maximo)?$datos[0]->valor_maximo:'' ) ?>" class=" form-control obligatorio  number" id="valor_maximo" name="valor_maximo">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="observaciones_programas">
                            *                             Observaciones                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->observaciones_programas)?$datos[0]->observaciones_programas:'' ) ?>" class=" form-control obligatorio  " id="observaciones_programas" name="observaciones_programas">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="contacto_id">
                            *                             Nombre contacto                        </label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("contacto_id", "contacto_id", "form-control obligatorio", "contacto", "contacto_id", "nombre", (isset($datos[0]->contacto_id)?$datos[0]->contacto_id:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="tipo_equipo_cod">
                            *                             Tipo de Equipo                        </label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("tipo_equipo_cod", "tipo_equipo_cod", "form-control obligatorio", "tipo_equipo", "tipo_equipo_cod", "referencia", (isset($datos[0]->tipo_equipo_cod)?$datos[0]->tipo_equipo_cod:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="descripcion">
                            *                             Descripción                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->descripcion)?$datos[0]->descripcion:'' ) ?>" class=" form-control obligatorio  " id="descripcion" name="descripcion">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="estado">
                            *                             Estado                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <select  class="form-control obligatorio  " id="estado" name="estado">
                                <option value=""></option>
                                <option value="Activo" <?php echo (isset($datos[0]->estado)?(($datos[0]->estado=='Activo')?'selected="selected"':''):'' ) ?>>Activo</option>
                                <option value="Inactivo" <?php echo (isset($datos[0]->estado)?(($datos[0]->estado=='Inactivo')?'selected="selected"':''):'' ) ?>>Inactivo</option>
                            </select>
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="prioridad">
                            *                             Prioridad                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->prioridad)?$datos[0]->prioridad:'' ) ?>" class=" form-control obligatorio  " id="prioridad" name="prioridad">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="codigo_hospital">
                            *                             Nombre hospital                        </label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("codigo_hospital", "codigo_hospital", "form-control obligatorio", "hospitales", "codigo_hospital", "nombre", (isset($datos[0]->codigo_hospital)?$datos[0]->codigo_hospital:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="tipo">
                            *                             Tipo                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->tipo)?$datos[0]->tipo:'' ) ?>" class=" form-control obligatorio  " id="tipo" name="tipo">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="aseguradora_id">
                            *                             Nombre aseguradora                        </label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("aseguradora_id", "aseguradora_id", "form-control obligatorio", "aseguradoras", "aseguradora_id", "nombre", (isset($datos[0]->aseguradora_id)?$datos[0]->aseguradora_id:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
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
                <a href="<?php echo base_url('index.php')."/Pacientes/consult_pacientes" ?>" class="btn btn-success">Listado </a>
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
