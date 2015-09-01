<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Prueba Stiven2    </h5>
</div>
<div class='well'>
<form action="<?php echo base_url('index.php/').'/Pacientes/consult_pacientes'; ?>" method="post" >
    <div class="row">
                    <div class="col-md-1.5">
                    <label for="cedula_paciente">
                    cedula_paciente                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['cedula_paciente'])?$post['cedula_paciente']:'' ) ?>" class="form-control obligatorio  " id="cedula_paciente" name="cedula_paciente">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="nombres">
                    nombres                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['nombres'])?$post['nombres']:'' ) ?>" class="form-control obligatorio  " id="nombres" name="nombres">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="apellidos">
                    apellidos                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['apellidos'])?$post['apellidos']:'' ) ?>" class="form-control obligatorio  " id="apellidos" name="apellidos">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="fecha_afiliacion">
                    fecha_afiliacion                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['fecha_afiliacion'])?$post['fecha_afiliacion']:'' ) ?>" class="form-control obligatorio  " id="fecha_afiliacion" name="fecha_afiliacion">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="foto">
                    foto                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['foto'])?$post['foto']:'' ) ?>" class="form-control obligatorio  " id="foto" name="foto">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="direccion">
                    direccion                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['direccion'])?$post['direccion']:'' ) ?>" class="form-control obligatorio  " id="direccion" name="direccion">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="barrio">
                    barrio                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['barrio'])?$post['barrio']:'' ) ?>" class="form-control obligatorio  " id="barrio" name="barrio">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="ciudad">
                    ciudad                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['ciudad'])?$post['ciudad']:'' ) ?>" class="form-control obligatorio  " id="ciudad" name="ciudad">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="fecha_nacimiento">
                    fecha_nacimiento                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['fecha_nacimiento'])?$post['fecha_nacimiento']:'' ) ?>" class="form-control obligatorio  " id="fecha_nacimiento" name="fecha_nacimiento">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="estatura">
                    estatura                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['estatura'])?$post['estatura']:'' ) ?>" class="form-control obligatorio  " id="estatura" name="estatura">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="peso">
                    peso                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['peso'])?$post['peso']:'' ) ?>" class="form-control obligatorio  " id="peso" name="peso">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="telefono_fijo">
                    telefono_fijo                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['telefono_fijo'])?$post['telefono_fijo']:'' ) ?>" class="form-control obligatorio  " id="telefono_fijo" name="telefono_fijo">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="celular">
                    celular                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['celular'])?$post['celular']:'' ) ?>" class="form-control obligatorio  " id="celular" name="celular">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="email">
                    email                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['email'])?$post['email']:'' ) ?>" class="form-control obligatorio  " id="email" name="email">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="fecha_inicio_contrato">
                    fecha_inicio_contrato                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['fecha_inicio_contrato'])?$post['fecha_inicio_contrato']:'' ) ?>" class="form-control obligatorio  " id="fecha_inicio_contrato" name="fecha_inicio_contrato">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="fecha_fin_contrato">
                    fecha_fin_contrato                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['fecha_fin_contrato'])?$post['fecha_fin_contrato']:'' ) ?>" class="form-control obligatorio  " id="fecha_fin_contrato" name="fecha_fin_contrato">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="tipo_cliente">
                    tipo_cliente                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['tipo_cliente'])?$post['tipo_cliente']:'' ) ?>" class="form-control obligatorio  " id="tipo_cliente" name="tipo_cliente">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="cliente">
                    cliente                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['cliente'])?$post['cliente']:'' ) ?>" class="form-control obligatorio  " id="cliente" name="cliente">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="medico">
                    medico                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['medico'])?$post['medico']:'' ) ?>" class="form-control obligatorio  " id="medico" name="medico">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="observaciones">
                    observaciones                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['observaciones'])?$post['observaciones']:'' ) ?>" class="form-control obligatorio  " id="observaciones" name="observaciones">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="activo">
                    activo                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['activo'])?$post['activo']:'' ) ?>" class="form-control obligatorio  " id="activo" name="activo">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="examen_cod">
                    examen_cod                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['examen_cod'])?$post['examen_cod']:'' ) ?>" class="form-control obligatorio  " id="examen_cod" name="examen_cod">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="hl7tag">
                    hl7tag                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['hl7tag'])?$post['hl7tag']:'' ) ?>" class="form-control obligatorio  " id="hl7tag" name="hl7tag">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="variable_codigo">
                    variable_codigo                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['variable_codigo'])?$post['variable_codigo']:'' ) ?>" class="form-control obligatorio  " id="variable_codigo" name="variable_codigo">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="valor_frecuencia">
                    valor_frecuencia                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['valor_frecuencia'])?$post['valor_frecuencia']:'' ) ?>" class="form-control obligatorio  " id="valor_frecuencia" name="valor_frecuencia">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="frecuencia">
                    frecuencia                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['frecuencia'])?$post['frecuencia']:'' ) ?>" class="form-control obligatorio  " id="frecuencia" name="frecuencia">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="valor_minimo">
                    valor_minimo                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['valor_minimo'])?$post['valor_minimo']:'' ) ?>" class="form-control obligatorio  " id="valor_minimo" name="valor_minimo">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="valor_maximo">
                    valor_maximo                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['valor_maximo'])?$post['valor_maximo']:'' ) ?>" class="form-control obligatorio  " id="valor_maximo" name="valor_maximo">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="observaciones_programas">
                    observaciones_programas                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['observaciones_programas'])?$post['observaciones_programas']:'' ) ?>" class="form-control obligatorio  " id="observaciones_programas" name="observaciones_programas">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="contacto_id">
                    contacto_id                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['contacto_id'])?$post['contacto_id']:'' ) ?>" class="form-control obligatorio  " id="contacto_id" name="contacto_id">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="tipo_equipo_cod">
                    tipo_equipo_cod                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['tipo_equipo_cod'])?$post['tipo_equipo_cod']:'' ) ?>" class="form-control obligatorio  " id="tipo_equipo_cod" name="tipo_equipo_cod">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="id_equipo">
                    id_equipo                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['id_equipo'])?$post['id_equipo']:'' ) ?>" class="form-control obligatorio  " id="id_equipo" name="id_equipo">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="estado">
                    estado                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <select  class="form-control obligatorio  " id="estado" name="estado">
                            <option value=""></option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                                                    <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="prioridad">
                    prioridad                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['prioridad'])?$post['prioridad']:'' ) ?>" class="form-control obligatorio  " id="prioridad" name="prioridad">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="codigo_hospital">
                    codigo_hospital                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['codigo_hospital'])?$post['codigo_hospital']:'' ) ?>" class="form-control obligatorio  " id="codigo_hospital" name="codigo_hospital">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="tipo">
                    tipo                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['tipo'])?$post['tipo']:'' ) ?>" class="form-control obligatorio  " id="tipo" name="tipo">
                                            <br>
                </div>

                            <div class="col-md-1.5">
                    <label for="aseguradora_id">
                    aseguradora_id                        </label>
                </div>
                <div class="col-md-1.5">
                    
                                            <input type="text" value="<?php echo (isset($post['aseguradora_id'])?$post['aseguradora_id']:'' ) ?>" class="form-control obligatorio  " id="aseguradora_id" name="aseguradora_id">
                                            <br>
                </div>

                </div>
    <button class="btn btn-success">Consultar</button>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                                    <th>cedula_paciente</th>
                                    <th>nombres</th>
                                    <th>apellidos</th>
                                    <th>fecha_afiliacion</th>
                                    <th>foto</th>
                                    <th>direccion</th>
                                    <th>barrio</th>
                                    <th>ciudad</th>
                                    <th>fecha_nacimiento</th>
                                    <th>estatura</th>
                                    <th>peso</th>
                                    <th>telefono_fijo</th>
                                    <th>celular</th>
                                    <th>email</th>
                                    <th>fecha_inicio_contrato</th>
                                    <th>fecha_fin_contrato</th>
                                    <th>tipo_cliente</th>
                                    <th>cliente</th>
                                    <th>medico</th>
                                    <th>observaciones</th>
                                    <th>activo</th>
                                    <th>examen_cod</th>
                                    <th>hl7tag</th>
                                    <th>variable_codigo</th>
                                    <th>valor_frecuencia</th>
                                    <th>frecuencia</th>
                                    <th>valor_minimo</th>
                                    <th>valor_maximo</th>
                                    <th>observaciones_programas</th>
                                    <th>contacto_id</th>
                                    <th>tipo_equipo_cod</th>
                                    <th>id_equipo</th>
                                    <th>estado</th>
                                    <th>prioridad</th>
                                    <th>codigo_hospital</th>
                                    <th>tipo</th>
                                    <th>aseguradora_id</th>
                            <th>Acción</th>
            </thead>
            <tbody>
                <?php
                foreach ($datos as $key => $value) {
                echo "<tr>";
                    $i=0;

                    foreach ($value as $key2 => $value2) {
                    echo "<td>".$value->$key2."</td>";
                    if($i==0){
                    $campo=$key2;
                    $valor="'".$value->$key2."'";
                    }
                    $i++;
                    }
                    echo "<td>"
                        . '<a href="javascript:" class="btn btn-success" onclick="editar('.$valor.')"><i class="fa fa-pencil"></i></a>'
                        . '<a href="javascript:" class="btn btn-danger" onclick="delete_('.$valor.')"><i class="fa fa-trash-o"></i></a>'
                        . "</td>";
                    echo "</tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-12" style="float:right">
        <a href="<?php echo base_url()."/index.php/Pacientes/index" ?>" class="btn btn-success" >Nuevo</a>
    </div>
</div>
<?php  if(isset($campo)){ ?>
<form action="<?php echo base_url('index.php/')."/Pacientes/edit_pacientes"; ?>" method="post" id="editar">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<form action="<?php echo base_url('index.php/')."/Pacientes/delete_pacientes"; ?>" method="post" id="delete">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>3">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<?php } ?>
<script>
    function editar(num) {
        $('#<?php echo $campo ?>2').val(num);
        $('#editar').submit();
    }
    function delete_(num) {
        var r=confirm('Confirma que desea eliminar el registro');
        if(r==false){
            return false;
        }
        $('#<?php echo $campo ?>3').val(num);
        $('#delete').submit();
    }

    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({
        rtl: Metronic.isRTL(),
        autoclose: true
    });
</script>
