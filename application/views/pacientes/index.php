<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Prueba Stiven2    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/')."/Pacientes/save_pacientes"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
            

                    <div class="col-md-1.5">
                        <label for="cedula_paciente">
                            *                             cedula_paciente                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->cedula_paciente)?$datos[0]->cedula_paciente:'' ) ?>" class=" form-control obligatorio  " id="cedula_paciente" name="cedula_paciente">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="nombres">
                            *                             nombres                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->nombres)?$datos[0]->nombres:'' ) ?>" class=" form-control obligatorio  " id="nombres" name="nombres">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="apellidos">
                            *                             apellidos                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->apellidos)?$datos[0]->apellidos:'' ) ?>" class=" form-control obligatorio  " id="apellidos" name="apellidos">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="fecha_afiliacion">
                            *                             fecha_afiliacion                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->fecha_afiliacion)?$datos[0]->fecha_afiliacion:'' ) ?>" class=" form-control obligatorio  " id="fecha_afiliacion" name="fecha_afiliacion">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="foto">
                            *                             foto                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->foto)?$datos[0]->foto:'' ) ?>" class=" form-control obligatorio  " id="foto" name="foto">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="direccion">
                            *                             direccion                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->direccion)?$datos[0]->direccion:'' ) ?>" class=" form-control obligatorio  " id="direccion" name="direccion">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="barrio">
                            *                             barrio                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->barrio)?$datos[0]->barrio:'' ) ?>" class=" form-control obligatorio  " id="barrio" name="barrio">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="ciudad">
                            *                             ciudad                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->ciudad)?$datos[0]->ciudad:'' ) ?>" class=" form-control obligatorio  " id="ciudad" name="ciudad">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="fecha_nacimiento">
                            *                             fecha_nacimiento                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->fecha_nacimiento)?$datos[0]->fecha_nacimiento:'' ) ?>" class=" form-control obligatorio  " id="fecha_nacimiento" name="fecha_nacimiento">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="estatura">
                            *                             estatura                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->estatura)?$datos[0]->estatura:'' ) ?>" class=" form-control obligatorio  " id="estatura" name="estatura">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="peso">
                            *                             peso                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->peso)?$datos[0]->peso:'' ) ?>" class=" form-control obligatorio  " id="peso" name="peso">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="telefono_fijo">
                            *                             telefono_fijo                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->telefono_fijo)?$datos[0]->telefono_fijo:'' ) ?>" class=" form-control obligatorio  " id="telefono_fijo" name="telefono_fijo">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="celular">
                            *                             celular                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->celular)?$datos[0]->celular:'' ) ?>" class=" form-control obligatorio  " id="celular" name="celular">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="email">
                            *                             email                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->email)?$datos[0]->email:'' ) ?>" class=" form-control obligatorio  " id="email" name="email">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="fecha_inicio_contrato">
                            *                             fecha_inicio_contrato                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->fecha_inicio_contrato)?$datos[0]->fecha_inicio_contrato:'' ) ?>" class=" form-control obligatorio  " id="fecha_inicio_contrato" name="fecha_inicio_contrato">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="fecha_fin_contrato">
                            *                             fecha_fin_contrato                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->fecha_fin_contrato)?$datos[0]->fecha_fin_contrato:'' ) ?>" class=" form-control obligatorio  " id="fecha_fin_contrato" name="fecha_fin_contrato">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="tipo_cliente">
                            *                             tipo_cliente                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->tipo_cliente)?$datos[0]->tipo_cliente:'' ) ?>" class=" form-control obligatorio  " id="tipo_cliente" name="tipo_cliente">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="cliente">
                            *                             cliente                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->cliente)?$datos[0]->cliente:'' ) ?>" class=" form-control obligatorio  " id="cliente" name="cliente">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="medico">
                            *                             medico                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->medico)?$datos[0]->medico:'' ) ?>" class=" form-control obligatorio  " id="medico" name="medico">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="observaciones">
                            *                             observaciones                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->observaciones)?$datos[0]->observaciones:'' ) ?>" class=" form-control obligatorio  " id="observaciones" name="observaciones">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="activo">
                            *                             activo                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->activo)?$datos[0]->activo:'' ) ?>" class=" form-control obligatorio  " id="activo" name="activo">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="examen_cod">
                            *                             examen_cod                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->examen_cod)?$datos[0]->examen_cod:'' ) ?>" class=" form-control obligatorio  " id="examen_cod" name="examen_cod">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="hl7tag">
                            *                             hl7tag                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->hl7tag)?$datos[0]->hl7tag:'' ) ?>" class=" form-control obligatorio  " id="hl7tag" name="hl7tag">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="variable_codigo">
                            *                             variable_codigo                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->variable_codigo)?$datos[0]->variable_codigo:'' ) ?>" class=" form-control obligatorio  " id="variable_codigo" name="variable_codigo">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="valor_frecuencia">
                            *                             valor_frecuencia                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->valor_frecuencia)?$datos[0]->valor_frecuencia:'' ) ?>" class=" form-control obligatorio  " id="valor_frecuencia" name="valor_frecuencia">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="frecuencia">
                            *                             frecuencia                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->frecuencia)?$datos[0]->frecuencia:'' ) ?>" class=" form-control obligatorio  " id="frecuencia" name="frecuencia">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="valor_minimo">
                            *                             valor_minimo                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->valor_minimo)?$datos[0]->valor_minimo:'' ) ?>" class=" form-control obligatorio  " id="valor_minimo" name="valor_minimo">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="valor_maximo">
                            *                             valor_maximo                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->valor_maximo)?$datos[0]->valor_maximo:'' ) ?>" class=" form-control obligatorio  " id="valor_maximo" name="valor_maximo">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="observaciones_programas">
                            *                             observaciones_programas                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->observaciones_programas)?$datos[0]->observaciones_programas:'' ) ?>" class=" form-control obligatorio  " id="observaciones_programas" name="observaciones_programas">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="contacto_id">
                            *                             contacto_id                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->contacto_id)?$datos[0]->contacto_id:'' ) ?>" class=" form-control obligatorio  " id="contacto_id" name="contacto_id">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="tipo_equipo_cod">
                            *                             tipo_equipo_cod                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->tipo_equipo_cod)?$datos[0]->tipo_equipo_cod:'' ) ?>" class=" form-control obligatorio  " id="tipo_equipo_cod" name="tipo_equipo_cod">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="id_equipo">
                            *                             id_equipo                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->id_equipo)?$datos[0]->id_equipo:'' ) ?>" class=" form-control obligatorio  " id="id_equipo" name="id_equipo">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="estado">
                            *                             estado                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <select  class="form-control obligatorio  " id="estado" name="estado">
                                <option value=""></option>
                                <option value="Activo" <?php echo (isset($datos[0]->estado)?(($datos[0]->estado=='Activo')?'selected="selected"':''):'' ) ?>>Activo</option>
                                <option value="Inactivo" <?php echo (isset($datos[0]->estado)?(($datos[0]->estado=='Inactivo')?'selected="selected"':''):'' ) ?>>Inactivo</option>
                            </select>
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="prioridad">
                            *                             prioridad                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->prioridad)?$datos[0]->prioridad:'' ) ?>" class=" form-control obligatorio  " id="prioridad" name="prioridad">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="codigo_hospital">
                            *                             codigo_hospital                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->codigo_hospital)?$datos[0]->codigo_hospital:'' ) ?>" class=" form-control obligatorio  " id="codigo_hospital" name="codigo_hospital">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="tipo">
                            *                             tipo                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->tipo)?$datos[0]->tipo:'' ) ?>" class=" form-control obligatorio  " id="tipo" name="tipo">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-1.5">
                        <label for="aseguradora_id">
                            *                             aseguradora_id                        </label>
                    </div>
                    <div class="col-md-1.5">
                                                    <input type="text" value="<?php echo (isset($datos[0]->aseguradora_id)?$datos[0]->aseguradora_id:'' ) ?>" class=" form-control obligatorio  " id="aseguradora_id" name="aseguradora_id">

                            
                                                <br>
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
