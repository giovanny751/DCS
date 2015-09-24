
    <form action="<?php echo base_url('index.php/') . "/Pacientes/save_pacientes"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">

        <div class="tabContainter">
            <!-- Nav tabs -->
            <ul class="tabLinks">              
                <li class="active"><a href="#tabDatos">Datos</a></li>
                <li><a href="#tabPrograma">Programa</a></li>
                <li><a href="#tabContactos">Contactos</a></li>
                <li><a href="#tabEquipos">Equipos</a></li>
                <li><a href="#tabSistema">Sistema De Salud</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tabContenido">
                <!--Tab Datos -->
                <div id="tabDatos" class="tab active">
                    <div class="row">
                        <span class="tituloH">Datos Paciente</span>
                        <span class="cuadroH1"></span>
                        <span class="cuadroH2"></span>
                        <span class="cuadroH3"></span>
                    </div>
                    <div class="row">
                        <?php $id = (isset($datos[0]->id_paciente) ? $datos[0]->id_paciente : '' ) ?>
                        <input type="hidden" value="<?php echo (isset($datos[0]->id_paciente) ? $datos[0]->id_paciente : '' ) ?>" class=" form-control   " id="id_paciente" name="id_paciente">

                        <div class="col-md-6">
                            <div class="col-md-6">
                                <label for="cedula_paciente">* Cédula paciente </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" value="<?php echo (isset($datos[0]->cedula_paciente) ? $datos[0]->cedula_paciente : '' ) ?>" class=" form-control obligatorio  number" id="cedula_paciente" name="cedula_paciente">
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label for="nombres">* Nombres </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" value="<?php echo (isset($datos[0]->nombres) ? $datos[0]->nombres : '' ) ?>" class=" form-control obligatorio  " id="nombres" name="nombres">
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label for="apellidos">* Apellidos </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" value="<?php echo (isset($datos[0]->apellidos) ? $datos[0]->apellidos : '' ) ?>" class=" form-control obligatorio  " id="apellidos" name="apellidos">
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_afiliacion">* Fecha Afiliación </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" value="<?php echo (isset($datos[0]->fecha_afiliacion) ? $datos[0]->fecha_afiliacion : '' ) ?>" class="form-control obligatorio  fecha  " id="fecha_afiliacion" name="fecha_afiliacion">
                                <br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php if (!empty($id) && $datos[0]->foto != '') { ?>
                            <center>
                                <img class="img-thumbnail" style="width: 275px;" src="<?php echo base_url('uploads') ?>/pacientes/<?php echo $id . "/" . $datos[0]->foto ?>">
                                <span class="cuadroImg1"></span>
                                <span class="cuadroImg2"></span>
                                <span class="cuadroImg3"></span>
                            </center>
                            <?php } ?>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-3">
                            <label for="foto">Foto </label>
                        </div>
                        <div class="col-md-3">
                            <input type="file" value="<?php echo (isset($datos[0]->foto) ? $datos[0]->foto : '' ) ?>" class="   " id="foto" name="foto">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="direccion">* Dirección </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->direccion) ? $datos[0]->direccion : '' ) ?>" class=" form-control obligatorio  " id="direccion" name="direccion">
                        </div>
                        <div class="col-md-3">
                            <label for="barrio">* Barrio </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->barrio) ? $datos[0]->barrio : '' ) ?>" class=" form-control obligatorio  " id="barrio" name="barrio">
                        </div>
                    </div>
                    <div class="row">   
                        <div class="col-md-3">
                            <label for="ciudad">* Ciudad </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->ciudad) ? $datos[0]->ciudad : '' ) ?>" class=" form-control obligatorio  " id="ciudad" name="ciudad">
                        </div>
                        <div class="col-md-3">
                            <label for="fecha_nacimiento">* Fecha Nacimiento </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->fecha_nacimiento) ? $datos[0]->fecha_nacimiento : '' ) ?>" class=" form-control obligatorio fecha   " id="fecha_nacimiento" name="fecha_nacimiento">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="estatura">* Estatura </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->estatura) ? $datos[0]->estatura : '' ) ?>" class=" form-control obligatorio  " id="estatura" name="estatura">
                        </div>
                        <div class="col-md-3">
                            <label for="peso">* Peso </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->peso) ? $datos[0]->peso : '' ) ?>" class=" form-control obligatorio  number" id="peso" name="peso">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="telefono_fijo">* Teléfono fijo </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->telefono_fijo) ? $datos[0]->telefono_fijo : '' ) ?>" class=" form-control obligatorio  number" id="telefono_fijo" name="telefono_fijo">
                        </div>
                        <div class="col-md-3">
                            <label for="celular"> Celular </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->celular) ? $datos[0]->celular : '' ) ?>" class=" form-control   number" id="celular" name="celular">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="email"> Email </label>
                        </div>
                        <div class="col-md-3">
                            <input type="email" value="<?php echo (isset($datos[0]->email) ? $datos[0]->email : '' ) ?>" class=" form-control   " id="email" name="email">
                        </div>
                        <div class="col-md-3">
                            <label for="fecha_inicio_contrato">* Fecha inicio contrato </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->fecha_inicio_contrato) ? $datos[0]->fecha_inicio_contrato : '' ) ?>" class=" form-control obligatorio fecha   " id="fecha_inicio_contrato" name="fecha_inicio_contrato">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="fecha_fin_contrato">* Fecha fin contrato</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->fecha_fin_contrato) ? $datos[0]->fecha_fin_contrato : '' ) ?>" class=" form-control obligatorio fecha   " id="fecha_fin_contrato" name="fecha_fin_contrato">
                        </div>
                        <div class="col-md-3">
                            <label for="tipo_cliente">* Tipo Cliente</label>
                        </div>
                        <div class="col-md-3">
                            <?php echo lista("tipo_cliente", "tipo_cliente", "form-control obligatorio", "tipo_cliente", "id_tipo_cliente", "descripcion", (isset($datos[0]->tipo_cliente) ? $datos[0]->tipo_cliente : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="medico">* Médico </label>
                        </div>
                        <div class="col-md-3">
                            <?php echo lista("medico", "medico", "form-control obligatorio", "medicos", "medico_codigo", "nombre", (isset($datos[0]->medico) ? $datos[0]->medico : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente">* Cliente </label>
                        </div>
                        <div class="col-md-3">
                            <span class="clientess">
                                <?php echo lista("cliente", "cliente", "form-control obligatorio", "clientes", "id_cliente", "nombre", (isset($datos[0]->cliente) ? $datos[0]->cliente : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="observaciones">  Observaciones </label>
                        </div>
                        <div class="col-md-3">
                            <textarea class=" form-control  " id="observaciones" name="observaciones"><?php echo (isset($datos[0]->observaciones) ? $datos[0]->observaciones : '' ) ?></textarea>
                            <br>
                        </div>
                    </div>
                </div>
                <!-- Tab programa -->
                <div id="tabPrograma" class="tab">
                    <div class="row">
                        <span class="tituloH">Programa</span>
                        <span class="cuadroH1"></span>
                        <span class="cuadroH2"></span>
                        <span class="cuadroH3"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="examen_cod">
                                Examen                        </label>
                        </div>
                        <div class="col-md-3">
                            <?php echo lista("examen_cod", "examen_cod", "form-control ", "examenes", "examen_cod", "examen_nombre", (isset($datos[0]->examen_cod) ? $datos[0]->examen_cod : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
                        </div>
                        <div class="col-md-3">
                            <a href="javascript:" id="agregar">Agregar</a>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="examen_cod">
                                Nombre paciente                        </label>
                        </div>
                        <div class="col-md-3">
                            <script>
                                $('document').ready(function() {
                                    $('#nom_paciente').autocomplete({
                                        source: "<?php echo base_url("index.php//Pacientes/autocomplete_nom_paciente") ?>",
                                        minLength: 3
                                    });
                                });
                            </script>
                            <input id="nom_paciente" class=" form-control " type="text" name="nom_paciente" value="">
                        </div>
                        <div class="col-md-3">
                            <a href="javascript:" id="copiar">Copiar</a>
                            <br>
                        </div>
                    </div>
                    <div style="width: 80%;margin: 0 auto;">
                        <div class="row">
                            <table class="table">
                                <thead>
                                <th>Examen</th>
                                <th>Variable</th>
                                <th>Frecuencia</th>
                                <th>Valor frecuencia</th>
                                <th>Valor minimo</th>
                                <th>Valor maximo</th>
                                <th>Acción</th>
                                </thead>
                                <tbody id="agregar_examen">
                                    <?php
                                    if (isset($paciente_examen_variable))
                                        if (count($paciente_examen_variable) > 0) {
                                            foreach ($paciente_examen_variable as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type='hidden' name='examen[]' value='<?php echo $value->examen_cod; ?>'><?php echo $value->examen_nombre; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo lista("variable_codigo[]", "1", "form-control obligatorio variable_codigo", "variables", "variable_codigo", "hl7tag", $value->variable_codigo, array("ACTIVO" => "S", "examen_cod" => $value->examen_cod), /* readOnly? */ false); ?>
                                                    </td>
                                                    <td>
                                                        <select class=" form-control obligatorio"  name="valor_frecuencia[]">
                                                            <option value="">Seleccione</option>
                                                            <option value="Hora"  <?php echo (($value->valor_frecuencia == 'Hora') ? 'selected="selected"' : '') ?>>Hora</option>
                                                            <option value="Día" <?php echo (($value->valor_frecuencia == 'Día') ? 'selected="selected"' : '') ?>>Día</option>
                                                            <option value="Semana" <?php echo (($value->valor_frecuencia == 'Semana') ? 'selected="selected"' : '') ?>>Semana</option>
                                                            <option value="Mes" <?php echo (($value->valor_frecuencia == 'Mes') ? 'selected="selected"' : '') ?>>Mes</option>
                                                            <option value="Año" <?php echo (($value->valor_frecuencia == 'Año') ? 'selected="selected"' : '') ?> >Año</option> 
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="frecuencia[]"  class=" form-control obligatorio  " value="<?php echo $value->frecuencia; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="valor_minimo[]"  class=" form-control obligatorio  number" value="<?php echo $value->valor_minimo; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="valor_maximo[]"  class=" form-control obligatorio  number" value="<?php echo $value->valor_maximo; ?>">
                                                    </td>
                                                    <td>
                                                        <a href="javascript:" class="eliminar">Eliminar</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label for="observaciones_programas">
                                Observaciones                        </label>
                        </div>
                        <div class="col-md-6">
                            <textarea class=" form-control   " id="observaciones_programas" name="observaciones_programas"><?php echo (isset($datos[0]->observaciones_programas) ? $datos[0]->observaciones_programas : '' ) ?></textarea>

                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="foto">Documento </label>
                        </div>
                        <div class="col-md-3">
                            <input type="file" value="<?php echo (isset($datos[0]->documento) ? $datos[0]->documento : '' ) ?>" class="   " id="documento" name="documento">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <?php if (!empty($id) && $datos[0]->documento != '') { ?>
                            <a target="_black" href="<?php echo base_url('uploads') ?>/pacientes/<?php echo $id . "/" . $datos[0]->documento ?>">Documento</a>
                            <?php } ?>    
                        </div>

                    </div>
                </div>
                <!-- Tab Contactos -->
                <div id="tabContactos" class="tab">
                    <div class="row">
                        <span class="tituloH">Contactos</span>
                        <span class="cuadroH1"></span>
                        <span class="cuadroH2"></span>
                        <span class="cuadroH3"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="contacto_id2">Nombre contacto</label>
                        </div>
                        <div class="col-md-3">
                            <script>
                                $('document').ready(function() {
                                    $('#contacto_id2').autocomplete({
                                        source: "<?php echo base_url("index.php//Pacientes/autocomplete_contacto_id") ?>",
                                        minLength: 3
                                    });
                                });
                            </script>
                            <input type="text" id="contacto_id2" name="contacto_id2" class="form-control ">
                            <br>
                        </div>
                        <div class="col-md-3">
                            <a href="javascript:" id="agregar_contacto">Agregar</a>
                            <br>
                        </div>
                    </div>

                    <div style="width: 80%;margin: 0 auto;">
                        <div class="row">
                            <table class="table">
                                <thead>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono fijo</th>
                                <th>Celular</th>
                                <th>email</th>
                                <th>Parentesco</th>
                                <th>Tiene llaves Cuidador</th>
                                <th>Acción</th>
                                </thead>
                                <tbody id="tabla_contacto">
                                    <?php
                                    if (isset($contactos))
                                        if (!empty($contactos)) {
                                            foreach ($contactos as $c) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="<?php echo $c->contacto_id ?>" class="contacto_id" name="contacto_id[]">
                                                        <?php echo $c->nombre ?></td>
                                                    <td><?php echo $c->direccion ?></td>
                                                    <td><?php echo $c->telefono_fijo ?></td>
                                                    <td><?php echo $c->celular ?></td>
                                                    <td><?php echo $c->email ?></td>
                                                    <td><?php echo $c->parentesco ?></td>
                                                    <td><?php echo $c->llaves ?></td>
                                                    <td>
                                                        <a class="eliminar" href="javascript:">Eliminar</a>
                                                    &nbsp;&nbsp;<a href="javascript:" class="vista_contacto" tabla="contacto" campo="contacto_id" url="Contacto/edit_contacto2" codigo="<?php echo $c->contacto_id ?>" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Vista previa</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <center><a href="<?php echo base_url('index.php/Contacto'); ?>" class="btn btn-dcs" id="">Nuevo Contacto</a></center>
                    </div>
                </div>
                <script>
                    $('body').delegate(".eliminarcontacto", "click", function() {

                        var propio = $(this);
                        if (confirm("Esta seguro de eliminar el contacto")) {
                            $.post("<?php echo base_url("index.php/pacientes/eliminarcontacto") ?>",
                                    {con_id: $(this).attr('con_id')}
                            ).done(function(msg) {
                                propio.parents('tr').remove();
                                alerta("verde", "Eliminado con Exito")
                            }).fail(function(msg) {

                            });
                        }
                    });
                </script>
                <!-- Tab Equipos -->
                <div id="tabEquipos" class="tab">
                    <div class="row">
                        <span class="tituloH">Equipos</span>
                        <span class="cuadroH1"></span>
                        <span class="cuadroH2"></span>
                        <span class="cuadroH3"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="descripcion">
                                Tipo                        </label>
                        </div>
                        <div class="col-md-3">
                            <?php echo lista("tipo_equipo_cod[]", "tipo_equipo_cod", "form-control  tipo_equipo_cod tipo_equipo_cod3", "tipo_equipo", "tipo_equipo_cod", "referencia", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>   
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="descripcion">
                                Descripción/Serial                        </label>
                        </div>
                        <div class="col-md-3">
                            <script>
                                
                                $('document').ready(function() {
                                    $('.tipo_equipo_cod').change(function(){
                                       
                                       $('#descripcion').autocomplete({
                                        source: "<?php echo base_url("index.php/Pacientes/autocomplete_descripcion") ?>?tipo_equipo_cod=" + $('#tipo_equipo_cod').val()+"",
                                        minLength: 3
                                    });
                                    });
                            
                                    
                                });
                            </script>
                            <input type="text" id="descripcion" name="descripcion" class="form-control ">
                            <br>
                        </div>
                        <div class="col-md-3">
                            <a href="javascript:" id="agregar_equipo">Agregar</a>
                            <br>
                        </div>
                    </div>


                    <div class="row">
                        <div style="width: 80%;margin: 0 auto;">
                            <div class="row">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <th>Tipo</th>
                                    <th>Descripción</th>
                                    <th>Serial N°</th>
                                    <th>Fecha última Calibración</th>
                                    <th>Acción</th>
                                    </thead>
                                    <tbody  id="tabla_equipo">
                                        <?php
                                        if (isset($paciente_equipo_tipoEquipo))
                                            if (count($paciente_equipo_tipoEquipo) > 0) {
                                                foreach ($paciente_equipo_tipoEquipo as $value) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <input type='hidden' name='equipo_id[]' class='equipo_id' value='<?php echo $value->id_equipo; ?>'>
                                                            <?php echo $value->referencia; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value->descripcion; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value->serial; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value->fecha_ultima_calibracion; ?>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:" class="eliminar">Eliminar</a> &nbsp; 
                                                            <a href="javascript:" class="vista_equipo" tabla="equipos" campo="id_equipo" url="Equipos/edit_Equipos2" codigo="<?php echo $value->id_equipo; ?>" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Vista previa</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <center><a href="<?php echo base_url('index.php/Equipos'); ?>" class="btn btn-dcs" id="">Nuevo Equipo</a></center>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab Sistema -->
                <div id="tabSistema" class="tab">
                    <div class="row">
                        <span class="tituloH">Sistema De Salud</span>
                        <span class="cuadroH1"></span>
                        <span class="cuadroH2"></span>
                        <span class="cuadroH3"></span>
                    </div>
                    <center>
                        <span class="tituloH">Hospitales</span>
                        <span class="cuadroH1"></span>
                        <span class="cuadroH2"></span>
                        <span class="cuadroH3"></span>
                    </center>
                    <div class="row" >
                        <div class="col-md-2">
                            <label for="hospitales">Hospital</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="hospitales" id="hospitales" />
                        </div>
                        <div class="col-md-2">
                            <a href="javascript:" id="agregar_contacto2">Agregar</a>
                        </div>
                        <script>
                            $('document').ready(function() {
                                $('#hospitales').autocomplete({
                                    source: "<?php echo base_url("index.php//Pacientes/autocomplete_hospitales") ?>",
                                    minLength: 3
                                });
                            });
                        </script>
                    </div>    
                    <br>
                    <div style="width: 80%;margin: 0 auto;">
                        <div class="row">
                            <table  class="table table-bordered table-hover" >
                                <thead>
                                <!--<th>Prioridad</th>-->
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono fijo</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th>Acción</th>
                                </thead>
                                <tbody id="tabla_contacto2">
                                    <?php
                                    if (isset($hospital))
                                        if (!empty($hospital)) {
                                            foreach ($hospital as $c) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" class="hospitales2" value="<?php echo $c->codigo_hospital ?>" name="hospitales2[]">
                                                        <?php echo $c->nombre ?></td>
                                                    <td><?php echo $c->direccion ?></td>
                                                    <td><?php echo $c->telefono_fijo ?></td>
                                                    <td><?php echo $c->celular ?></td>
                                                    <td><?php echo $c->email ?></td>
                                                    <td>
                                                        <a class="eliminar" href="javascript:">Eliminar</a> &nbsp;&nbsp;&nbsp;
                                                        <a href="javascript:" class="vista" tabla="hospitales" campo="codigo_hospital" url="Hospitales/edit_hospitales2" codigo="<?php echo $c->codigo_hospital ?>" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Vista previa</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <center><a href="<?php echo base_url('index.php/Hospitales'); ?>" class="btn btn-dcs" id="">Nuevo Hospital</a></center>
                        </div>
                    </div>
                    <script>
                        $('body').delegate(".eliminarhospital", "click", function() {

                            var propio = $(this);
                            if (confirm("Esta seguro de eliminar")) {
                                $.post("<?php echo base_url("index.php/pacientes/eliminar_hospitalpaciente") ?>",
                                        {id: $(this).attr('tid')}
                                ).done(function(msg) {
                                    propio.parents('tr').remove();
                                    alerta("verde", "Eliminado con Exito")
                                }).fail(function(msg) {

                                });
                            }
                        });
                    </script>
                    <br>
                    <center>
                        <span class="tituloH">Aseguradoras</span>
                        <span class="cuadroH1"></span>
                        <span class="cuadroH2"></span>
                        <span class="cuadroH3"></span>
                    </center>
                    <div class="row">
                        <div class="col-md-2" >
                            <label for="aseguradora">Aseguradoras</label>
                        </div>
                        <div class="col-md-2" >
                            <input type="text" class="form-control" name="aseguradora" id="aseguradora" />
                        </div>
                        <div class="col-md-2" >
                            <a href="javascript:" id="agregar_contacto3">Agregar</a>
                        </div>
                        <script>
                            $('document').ready(function() {
                                $('#aseguradora').autocomplete({
                                    source: "<?php echo base_url("index.php//Pacientes/autocomplete_aseguradora") ?>",
                                    minLength: 3
                                });
                            });
                        </script>
                    </div>
                    <br>
                    <div style="width: 80%;margin: 0 auto;">
                        <div class="row">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <th>Tipo</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono fijo</th>
                                <th>Celular</th>
                                <th>Acción</th>
                                </thead>
                                <tbody  id="tabla_contacto3">
                                    <?php
                                    if (isset($aseguradora))
                                        if (!empty($aseguradora)) {
                                            foreach ($aseguradora as $c) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="<?php echo $c->aseguradora_id ?>" class="aseguradora2" name="aseguradora2[]">
                                                        <?php echo $c->tipo ?></td>
                                                    <?php echo $c->nombre ?></td>
                                                    <td><?php echo $c->direccion ?></td>
                                                    <td><?php echo $c->telefono_fijo ?></td>
                                                    <td><?php echo $c->celular ?></td>
                                                    <td><a class="eliminar" href="javascript:">Eliminar</a></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <center><a href="<?php echo base_url('index.php/Aseguradoras'); ?>" class="btn btn-dcs" id="">Nueva Aseguradora</a></center>
                        </div>
                    </div>
                    <script>
                        $('body').delegate(".eliminaraseguradora", "click", function() {

                            var propio = $(this);
                            if (confirm("Esta seguro de eliminar")) {
                                $.post("<?php echo base_url("index.php/pacientes/eliminar_aseguradorapaciente") ?>",
                                        {id: $(this).attr('tid')}
                                ).done(function(msg) {
                                    propio.parents('tr').remove();
                                    alerta("verde", "Eliminado con Exito")
                                }).fail(function(msg) {

                                });
                            }
                        });
                    </script>

                </div>
            </div>
        </div>
        <?php if (isset($post['campo'])) { ?>
            <input type="hidden" name="<?php echo $post['campo'] ?>" value="<?php echo $post[$post['campo']] ?>">
            <input type="hidden" name="campo" value="<?php echo $post['campo'] ?>">
        <?php } ?>
        <div class="row">
            <span id="boton_guardar">
                <button class="btn btn-dcs" >Guardar</button> 
                <input class="btn btn-dcs" type="reset" value="Limpiar">
                <a href="<?php echo base_url('index.php') . "/Pacientes/consult_pacientes" ?>" class="btn btn-dcs">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
    </form>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <span id="body_modal"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<script>
    $('#tipo_cliente').change(function() {
        var url = "<?php echo base_url('index.php/Pacientes/cliente') ?>"
        $.post(url, {id_tipo_cliente: $(this).val()})
                .done(function(msg) {
                    $('.clientess').html(msg);
                })
                .fail(function() {
                    alerta('rojo', 'Error al consultar');
                    $('#tipo_cliente').val('');
                    $('.clientess').html('');
                })
    })
    $('#agregar_equipo').click(function() {
        var info = $('#descripcion').val();
        var info2 = info.split(' :: ');
        if (info2.length == 5) {
            var html = "<tr>";
            html += "<td><input type='hidden' name='equipo_id[]' class='equipo_id' value='" + info2[3] + "'>" + info2[4] + "</td>";
            html += "<td>" + info2[0] + "</td>";
            html += "<td>" + info2[1] + "</td>";
            html += "<td>" + info2[2] + "</td>";
            html += "<td>" + '<a href="javascript:" class="eliminar">Eliminar</a>&nbsp;&nbsp;<a href="javascript:" class="vista_equipo" tabla="equipos" campo="id_equipo" url="Equipos/edit_Equipos2" codigo="' + info2[3] + '" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Vista previa</a>' + "</td>";
            html += "</tr>";
            $('#tabla_equipo').append(html);
            $('#descripcion').val('');
        } else {
            alerta('rojo', 'Cadena no valida');
        }
    })
    $('#agregar_contacto').click(function() {

        var info = $('#contacto_id2').val();
        var info2 = info.split(' :: ');
        var r = 0;
        $('.contacto_id').each(function() {
            if ($(this).val() == info2[7]) {
                alerta('rojo', 'Contacto ya existe');
                $('#contacto_id2').val('');
                r = 1;
            }
        });
        if (r == 1) {
            return false;
        }
        if (info2.length == 8) {
            var html = "<tr>";
            html += "<td><input type='hidden' class='contacto_id' name='contacto_id[]' value='" + info2[7] + "'>" + info2[0] + "</td>";
            html += "<td>" + info2[1] + "</td>";
            html += "<td>" + info2[2] + "</td>";
            html += "<td>" + info2[3] + "</td>";
            html += "<td>" + info2[4] + "</td>";
            html += "<td>" + info2[5] + "</td>";
            html += "<td>" + info2[6] + "</td>";
            html += "<td>" + '<a href="javascript:" class="eliminar">Eliminar</a> &nbsp;&nbsp;<a href="javascript:" class="vista_contacto" tabla="contacto" campo="contacto_id" url="Contacto/edit_contacto2" codigo="' + info2[7] + '" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Vista previa</a>' + "</td>";
            html += "</tr>";
            $('#tabla_contacto').append(html);
            $('#contacto_id2').val('');
        } else {
            alerta('rojo', 'Cadena no valida');
        }
    })
    $('#agregar_contacto2').click(function() {
        var info = $('#hospitales').val();
        var info2 = info.split(' :: ');
        var r = 0;
        $('.hospitales2').each(function() {
            if ($(this).val() == info2[5]) {
                alerta('rojo', 'Hospitales ya existe');
                $('#contacto_id2').val('');
                r = 1;
            }
        });
        if (r == 1) {
            return false;
        }
        if (info2.length == 6) {
            var html = "<tr>";
            html += "<td><input type='hidden' class='hospitales2' name='hospitales2[]' value='" + info2[5] + "'>" + info2[0] + "</td>";
            html += "<td>" + info2[1] + "</td>";
            html += "<td>" + info2[2] + "</td>";
            html += "<td>" + info2[3] + "</td>";
            html += "<td>" + info2[4] + "</td>";
            html += "<td>" + '<a href="javascript:" class="eliminar">Eliminar</a> &nbsp;&nbsp;&nbsp;<a href="javascript:" class="vista" tabla="hospitales" campo="codigo_hospital" url="Hospitales/edit_hospitales2" codigo="' + info2[5] + '" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Vista previa</a>' + "</td>";
            html += "</tr>";
            $('#hospitales').val('');
            $('#tabla_contacto2').append(html);
        } else {
            alerta('rojo', 'Cadena no valida');
        }
    })
    $('#agregar_contacto3').click(function() {
        var info = $('#aseguradora').val();
        var info2 = info.split(' :: ');
        var r = 0;
        $('.aseguradora2').each(function() {
            if ($(this).val() == info2[5]) {
                alerta('rojo', 'Aseguradora ya existe');
                $('#contacto_id2').val('');
                r = 1;
            }
        });
        if (r == 1) {
            return false;
        }
        if (info2.length == 6) {
            var html = "<tr>";
            html += "<td><input type='hidden' class='aseguradora2' name='aseguradora2[]' value='" + info2[5] + "'>" + info2[0] + "</td>";
            html += "<td>" + info2[1] + "</td>";
            html += "<td>" + info2[2] + "</td>";
            html += "<td>" + info2[3] + "</td>";
            html += "<td>" + info2[4] + "</td>";
            html += "<td>" + '<a href="javascript:" class="eliminar">Eliminar</a>  &nbsp;<a href="javascript:" class="vista_aseguradora" url="Aseguradoras/edit_aseguradoras2" campo="aseguradora_id" codigo="' + info2[5] + '" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"> Vista previa</a>' + "</td>";
            html += "</tr>";
            $('#tabla_contacto3').append(html);
            $('#aseguradora').val('');
        } else {
            alerta('rojo', 'Cadena no valida');
        }
    })
    $('body').delegate('.variable_codigo', 'change', function() {
        var y = new Array();
        $('.variable_codigo').each(function() {
            if ($.inArray($(this).val(), y) != -1) {
                $(this).val('')
                alerta('rojo', 'Existe una variable con este examen.')
            } else {
                y.push($(this).val())
            }
        })
//        console.log(y)
    })
    $('body').delegate('.tipo_equipo_cod', 'change', function() {
        var y = new Array();
        $('.tipo_equipo_cod').each(function() {
            if ($.inArray($(this).val() + "-" + $(this).prev().val(), y) != -1) {
                $(this).val('El Tipo ya existe con el equipo')
                alerta('rojo', '')
            } else {
                y.push($(this).val() + "-" + $(this).prev().val())
            }
        })
//        console.log(y)
    })
    $('#agregar').click(function() {

        var examen = $('#examen_cod option:selected').text();
        var id_examen = $('#examen_cod').val();
        if (id_examen == '') {
            alerta('rojo', 'Seleccione un examen');
            return false;
        }
        var url = '<?php echo base_url('index.php/Equipos/traer_variables') ?>'
        $.post(url, {id_examen: id_examen})
                .done(function(msg) {
                    var html = "<tr>";
                    html += "<td>";
                    html += "<input type='hidden' name='examen[]' value='" + id_examen + "'>" + examen + " ";
                    html += "</td>";
                    html += "<td>";
                    html += msg;
                    html += "</td>";
                    html += "<td>";
                    html += '<select name="valor_frecuencia[]"  class=" form-control obligatorio">'
                    html += '<option value="Hora">Hora</option>'
                    html += '<option value="Día">Día</option>'
                    html += '<option value="Semana">Semana</option>'
                    html += '<option value="Mes">Mes</option>'
                    html += '<option value="Año">Año</option> '
                    html += '</select>';
                    html += "</td>";
                    html += "<td>";
                    html += '<input type="text" name="frecuencia[]"  class=" form-control obligatorio  " value="">';
                    html += "</td>";
                    html += "<td>";
                    html += '<input type="text" name="valor_minimo[]"  class=" form-control obligatorio  number" value="">';
                    html += "</td>";
                    html += "<td>";
                    html += '<input type="text" name="valor_maximo[]"  class=" form-control obligatorio  number" value="">';
                    html += "</td>";
                    html += "<td>";
                    html += '<a href="javascript:" class="eliminar">Eliminar</a>';
                    html += "</td>";
                    html += "</tr>";
                    $('#examen_cod').val('');
                    $('#agregar_examen').append(html)
                }).fail(function() {

        })
    })
    $('#copiar').click(function() {

//        var examen = $('#examen_cod option:selected').text();
        var nom_paciente = $('#nom_paciente').val();
        if (nom_paciente == '') {
            alerta('rojo', 'Seleccione un paciente');
            return false;
        }
        var info = $('#nom_paciente').val();
        var info2 = info.split(' :: ');
        if (info2.length == 3) {
            var url = '<?php echo base_url('index.php/Pacientes/copiar_paciente') ?>'
            $.post(url, {id_paciente: info2[2], campo: 'id_paciente'})
                    .done(function(msg) {
                        $('#agregar_examen').html(msg);
                        $('#nom_paciente').val('')
                    }).fail(function() {
            })
        } else {
            alerta('rojo', 'Cadena no valida');
        }


    })
    $('body').delegate('.eliminar', 'click', function() {
        $(this).parent().parent().remove();
    })

    $('body').delegate('.vista', 'click', function() {
        var codigo_hospital = $(this).attr('codigo');
        var campo = $(this).attr('campo');
        var tabla = $(this).attr('tabla');
        var url2 = $(this).attr('url');
        var url = '<?php echo base_url('index.php/') ?>' + "/" + url2
        $.post(url, {codigo_hospital: codigo_hospital, campo: campo, tabla: tabla})
                .done(function(msg) {
                    $('#body_modal').html(msg);
                    $('#body_modal #boton_guardar').remove()
                }).fail(function() {

        })

    })
    $('body').delegate('.vista_aseguradora', 'click', function() {
        var aseguradora_id = $(this).attr('codigo');
        var campo = $(this).attr('campo');
        var tabla = $(this).attr('tabla');
        var url2 = $(this).attr('url');
        var url = '<?php echo base_url('index.php/') ?>' + "/" + url2
        $.post(url, {aseguradora_id: aseguradora_id, campo: campo, tabla: tabla})
                .done(function(msg) {
                    $('#body_modal').html(msg);
                    $('#body_modal #boton_guardar').remove()
                }).fail(function() {

        })

    })
    $('body').delegate('.vista_equipo', 'click', function() {
        var id_equipo = $(this).attr('codigo');
        var campo = $(this).attr('campo');
        var tabla = $(this).attr('tabla');
        var url2 = $(this).attr('url');
        var url = '<?php echo base_url('index.php/') ?>' + "/" + url2
        $.post(url, {id_equipo: id_equipo, campo: campo, tabla: tabla})
                .done(function(msg) {
                    $('#body_modal').html(msg);
                    $('#body_modal #boton_guardar').remove()
                }).fail(function() {

        })

    })
    $('body').delegate('.vista_contacto', 'click', function() {
        var contacto_id = $(this).attr('codigo');
        var campo = $(this).attr('campo');
        var tabla = $(this).attr('tabla');
        var url2 = $(this).attr('url');
        var url = '<?php echo base_url('index.php/') ?>' + "/" + url2
        $.post(url, {contacto_id: contacto_id, campo: campo, tabla: tabla})
                .done(function(msg) {
                    $('#body_modal').html(msg);
                    $('#body_modal #boton_guardar').remove()
                }).fail(function() {

        })

    })
    $('#myTabs a').click(function(e) {
        e.preventDefault()
        $(this).tab('show')
    })

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


</script>
