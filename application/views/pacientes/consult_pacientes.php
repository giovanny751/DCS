<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Pacientes    </h5>
</div>
<div class='well'>
<form action="<?php echo base_url('index.php/').'/Pacientes/consult_pacientes'; ?>" method="post" >
    <div class="row">
                    <div class="col-md-3">
                    <label for="id_paciente">
                                            </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="hidden" value="<?php echo (isset($post['id_paciente'])?$post['id_paciente']:'' ) ?>" class="form-control   " id="id_paciente" name="id_paciente">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="cedula_paciente">
                    Cédula paciente                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['cedula_paciente'])?$post['cedula_paciente']:'' ) ?>" class="form-control obligatorio  number" id="cedula_paciente" name="cedula_paciente">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="nombres">
                    Nombres                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['nombres'])?$post['nombres']:'' ) ?>" class="form-control obligatorio  " id="nombres" name="nombres">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="apellidos">
                    Apellidos                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['apellidos'])?$post['apellidos']:'' ) ?>" class="form-control obligatorio  " id="apellidos" name="apellidos">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="fecha_afiliacion">
                    Fecha Afiliación                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['fecha_afiliacion'])?$post['fecha_afiliacion']:'' ) ?>" class="form-control obligatorio fecha " id="fecha_afiliacion" name="fecha_afiliacion">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="foto">
                    Foto                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['foto'])?$post['foto']:'' ) ?>" class="form-control obligatorio  " id="foto" name="foto">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="direccion">
                    Dirección                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['direccion'])?$post['direccion']:'' ) ?>" class="form-control obligatorio  " id="direccion" name="direccion">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="barrio">
                    Barrio                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['barrio'])?$post['barrio']:'' ) ?>" class="form-control obligatorio  " id="barrio" name="barrio">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="ciudad">
                    Ciudad                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['ciudad'])?$post['ciudad']:'' ) ?>" class="form-control obligatorio  " id="ciudad" name="ciudad">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="fecha_nacimiento">
                    Fecha Nacimiento                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['fecha_nacimiento'])?$post['fecha_nacimiento']:'' ) ?>" class="form-control obligatorio fecha " id="fecha_nacimiento" name="fecha_nacimiento">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="estatura">
                    Estatura                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['estatura'])?$post['estatura']:'' ) ?>" class="form-control obligatorio  " id="estatura" name="estatura">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="peso">
                    Peso                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['peso'])?$post['peso']:'' ) ?>" class="form-control obligatorio  number" id="peso" name="peso">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="telefono_fijo">
                    Teléfono fijo                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['telefono_fijo'])?$post['telefono_fijo']:'' ) ?>" class="form-control obligatorio  number" id="telefono_fijo" name="telefono_fijo">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="celular">
                    Celular                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['celular'])?$post['celular']:'' ) ?>" class="form-control   number" id="celular" name="celular">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="email">
                    Email                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="email" value="<?php echo (isset($post['email'])?$post['email']:'' ) ?>" class="form-control   " id="email" name="email">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="fecha_inicio_contrato">
                    Fecha inicio contrato                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['fecha_inicio_contrato'])?$post['fecha_inicio_contrato']:'' ) ?>" class="form-control obligatorio fecha " id="fecha_inicio_contrato" name="fecha_inicio_contrato">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="fecha_fin_contrato">
                    Fecha fin contrato                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['fecha_fin_contrato'])?$post['fecha_fin_contrato']:'' ) ?>" class="form-control obligatorio fecha " id="fecha_fin_contrato" name="fecha_fin_contrato">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="tipo_cliente">
                    Tipo Cliente                        </label>
                </div>
                <div class="col-md-3">
                    
                    <?php echo lista("tipo_cliente", "tipo_cliente", "form-control obligatorio", "tipo_cliente", "id_tipo_cliente", "descripcion", (isset($datos[0]->tipo_cliente)?$datos[0]->tipo_cliente:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
                </div>

                            <div class="col-md-3">
                    <label for="cliente">
                    Cliente                        </label>
                </div>
                <div class="col-md-3">
                    
                    <?php echo lista("cliente", "cliente", "form-control obligatorio", "clientes", "id_cliente", "nombre", (isset($datos[0]->cliente)?$datos[0]->cliente:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
                </div>

                            <div class="col-md-3">
                    <label for="medico">
                    Médico                        </label>
                </div>
                <div class="col-md-3">
                    
                    <?php echo lista("medico", "medico", "form-control obligatorio", "medicos", "medico_codigo", "nombre", (isset($datos[0]->medico)?$datos[0]->medico:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
                </div>

                            <div class="col-md-3">
                    <label for="observaciones">
                    Observaciones                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['observaciones'])?$post['observaciones']:'' ) ?>" class="form-control obligatorio  " id="observaciones" name="observaciones">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="examen_cod">
                    Examen                        </label>
                </div>
                <div class="col-md-3">
                    
                    <?php echo lista("examen_cod", "examen_cod", "form-control obligatorio", "examenes", "examen_cod", "examen_nombre", (isset($datos[0]->examen_cod)?$datos[0]->examen_cod:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
                </div>

                            <div class="col-md-3">
                    <label for="hl7tag">
                    HL7TAG                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['hl7tag'])?$post['hl7tag']:'' ) ?>" class="form-control obligatorio  " id="hl7tag" name="hl7tag">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="variable_codigo">
                    Variables                        </label>
                </div>
                <div class="col-md-3">
                    
                    <?php echo lista("variable_codigo", "variable_codigo", "form-control obligatorio", "variables", "variable_codigo", "hl7tag", (isset($datos[0]->variable_codigo)?$datos[0]->variable_codigo:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
                </div>

                            <div class="col-md-3">
                    <label for="valor_frecuencia">
                    Valor frecuencia                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['valor_frecuencia'])?$post['valor_frecuencia']:'' ) ?>" class="form-control obligatorio  number" id="valor_frecuencia" name="valor_frecuencia">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="frecuencia">
                    Frecuencia                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['frecuencia'])?$post['frecuencia']:'' ) ?>" class="form-control obligatorio  " id="frecuencia" name="frecuencia">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="valor_minimo">
                    Valor mínimo                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['valor_minimo'])?$post['valor_minimo']:'' ) ?>" class="form-control obligatorio  number" id="valor_minimo" name="valor_minimo">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="valor_maximo">
                    Valor máximo                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['valor_maximo'])?$post['valor_maximo']:'' ) ?>" class="form-control obligatorio  number" id="valor_maximo" name="valor_maximo">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="observaciones_programas">
                    Observaciones                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['observaciones_programas'])?$post['observaciones_programas']:'' ) ?>" class="form-control obligatorio  " id="observaciones_programas" name="observaciones_programas">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="contacto_id">
                    Nombre contacto                        </label>
                </div>
                <div class="col-md-3">
                    
                    <?php echo lista("contacto_id", "contacto_id", "form-control obligatorio", "contacto", "contacto_id", "nombre", (isset($datos[0]->contacto_id)?$datos[0]->contacto_id:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
                </div>

                            <div class="col-md-3">
                    <label for="tipo_equipo_cod">
                    Tipo de Equipo                        </label>
                </div>
                <div class="col-md-3">
                    
                    <?php echo lista("tipo_equipo_cod", "tipo_equipo_cod", "form-control obligatorio", "tipo_equipo", "tipo_equipo_cod", "referencia", (isset($datos[0]->tipo_equipo_cod)?$datos[0]->tipo_equipo_cod:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
                </div>

                            <div class="col-md-3">
                    <label for="descripcion">
                    Descripción                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['descripcion'])?$post['descripcion']:'' ) ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="estado">
                    Estado                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <select  class="form-control obligatorio  " id="estado" name="estado">
                            <option value=""></option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                                                    <br>
                </div>

                            <div class="col-md-3">
                    <label for="prioridad">
                    Prioridad                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['prioridad'])?$post['prioridad']:'' ) ?>" class="form-control obligatorio  " id="prioridad" name="prioridad">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="codigo_hospital">
                    Nombre hospital                        </label>
                </div>
                <div class="col-md-3">
                    
                    <?php echo lista("codigo_hospital", "codigo_hospital", "form-control obligatorio", "hospitales", "codigo_hospital", "nombre", (isset($datos[0]->codigo_hospital)?$datos[0]->codigo_hospital:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
                </div>

                            <div class="col-md-3">
                    <label for="tipo">
                    Tipo                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['tipo'])?$post['tipo']:'' ) ?>" class="form-control obligatorio  " id="tipo" name="tipo">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="aseguradora_id">
                    Nombre aseguradora                        </label>
                </div>
                <div class="col-md-3">
                    
                    <?php echo lista("aseguradora_id", "aseguradora_id", "form-control obligatorio", "aseguradoras", "aseguradora_id", "nombre", (isset($datos[0]->aseguradora_id)?$datos[0]->aseguradora_id:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
                </div>

                </div>
    <button class="btn btn-success">Consultar</button>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                                    <th></th>
                                    <th>Cédula paciente</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Fecha Afiliación</th>
                                    <th>Foto</th>
                                    <th>Dirección</th>
                                    <th>Barrio</th>
                                    <th>Ciudad</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Estatura</th>
                                    <th>Peso</th>
                                    <th>Teléfono fijo</th>
                                    <th>Celular</th>
                                    <th>Email</th>
                                    <th>Fecha inicio contrato</th>
                                    <th>Fecha fin contrato</th>
                                    <th>Tipo Cliente</th>
                                    <th>Cliente</th>
                                    <th>Médico</th>
                                    <th>Observaciones</th>
                                    <th>Examen</th>
                                    <th>HL7TAG</th>
                                    <th>Variables</th>
                                    <th>Valor frecuencia</th>
                                    <th>Frecuencia</th>
                                    <th>Valor mínimo</th>
                                    <th>Valor máximo</th>
                                    <th>Observaciones</th>
                                    <th>Nombre contacto</th>
                                    <th>Tipo de Equipo</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Prioridad</th>
                                    <th>Nombre hospital</th>
                                    <th>Tipo</th>
                                    <th>Nombre aseguradora</th>
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
