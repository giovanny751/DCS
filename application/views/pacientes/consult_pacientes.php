<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>Pacientes
    </h5>
</div>
<div class='well'>
<form action="<?php echo base_url('index.php/').'/Pacientes/consult_pacientes'; ?>" method="post" >
    
    <div class="row">                <div class="col-md-3">
                    <label for="id_paciente">
                                            </label>
                </div>
                <div class="col-md-3">
                                            <input type="hidden" value="<?php echo (isset($post['id_paciente'])?$post['id_paciente']:'' ) ?>" class="form-control   " id="id_paciente" name="id_paciente">
                                            <br>
                </div>

            </div><div class="row">                <div class="col-md-3">
                    <label for="cedula_paciente">
                    Cédula                        </label>
                </div>
                <div class="col-md-3">
                                            <input type="text" value="<?php echo (isset($post['cedula_paciente'])?$post['cedula_paciente']:'' ) ?>" class="form-control obligatorio  " id="cedula_paciente" name="cedula_paciente">
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

            </div><div class="row">                <div class="col-md-3">
                    <label for="apellidos">
                    Apellidos                        </label>
                </div>
                <div class="col-md-3">
                                            <input type="text" value="<?php echo (isset($post['apellidos'])?$post['apellidos']:'' ) ?>" class="form-control obligatorio  " id="apellidos" name="apellidos">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="fecha_afiliacion">
                    Fecha afiliación                        </label>
                </div>
                <div class="col-md-3">
                                            <input type="text" value="<?php echo (isset($post['fecha_afiliacion'])?$post['fecha_afiliacion']:'' ) ?>" class="form-control obligatorio  " id="fecha_afiliacion" name="fecha_afiliacion">
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
                    Fecha_nacimiento                        </label>
                </div>
                <div class="col-md-3">
                                            <input type="text" value="<?php echo (isset($post['fecha_nacimiento'])?$post['fecha_nacimiento']:'' ) ?>" class="form-control obligatorio  " id="fecha_nacimiento" name="fecha_nacimiento">
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
                                            <input type="text" value="<?php echo (isset($post['peso'])?$post['peso']:'' ) ?>" class="form-control obligatorio  " id="peso" name="peso">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="telefono_fijo">
                    Telefono fijo                        </label>
                </div>
                <div class="col-md-3">
                                            <input type="text" value="<?php echo (isset($post['telefono_fijo'])?$post['telefono_fijo']:'' ) ?>" class="form-control number obligatorio  " id="telefono_fijo" name="telefono_fijo">
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
                                            <input type="text" value="<?php echo (isset($post['email'])?$post['email']:'' ) ?>" class="form-control   number" id="email" name="email">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="fecha_inicio_contrato">
                    Fecha inicio contrato                        </label>
                </div>
                <div class="col-md-3">
                                            <input type="text" value="<?php echo (isset($post['fecha_inicio_contrato'])?$post['fecha_inicio_contrato']:'' ) ?>" class="form-control obligatorio  " id="fecha_inicio_contrato" name="fecha_inicio_contrato">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="fecha_fin_contrato">
                    Fecha fin contrato                        </label>
                </div>
                <div class="col-md-3">
                                            <input type="text" value="<?php echo (isset($post['fecha_fin_contrato'])?$post['fecha_fin_contrato']:'' ) ?>" class="form-control obligatorio  " id="fecha_fin_contrato" name="fecha_fin_contrato">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="tipo_cliente">
                    Tipo cliente                        </label>
                </div>
                <div class="col-md-3">
                                            <?php echo lista("tipo_cliente", "tipo_cliente", "form-control ", "tipo_cliente", "id_tipo_cliente", "descripcion", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="cliente">
                    Cliente                        </label>
                </div>
                <div class="col-md-3">
                                            <?php echo lista("cliente", "cliente", "form-control ", "clientes", "id_cliente", "nombre", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="medico">
                    Medico                        </label>
                </div>
                <div class="col-md-3">
                                            <?php echo lista("medico", "medico", "form-control ", "medicos", "medico_codigo", "nombre", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="observaciones">
                    Observaciones                        </label>
                </div>
                <div class="col-md-3">
                                            <input type="text" value="<?php echo (isset($post['observaciones'])?$post['observaciones']:'' ) ?>" class="form-control obligatorio  " id="observaciones" name="observaciones">
                                            <br>
                </div>

                </div>
    <button class="btn btn-success">Consultar</button>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                                    <th></th>
                                    <th>Cédula</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Fecha afiliación</th>
                                    <th>Foto</th>
                                    <th>Dirección</th>
                                    <th>Barrio</th>
                                    <th>Ciudad</th>
                                    <th>Fecha_nacimiento</th>
                                    <th>Estatura</th>
                                    <th>Peso</th>
                                    <th>Telefono fijo</th>
                                    <th>Celular</th>
                                    <th>Email</th>
                                    <th>Fecha inicio contrato</th>
                                    <th>Fecha fin contrato</th>
                                    <th>Tipo cliente</th>
                                    <th>Cliente</th>
                                    <th>Medico</th>
                                    <th>Observaciones</th>
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
