<div class="row">
    <span class="tituloH">Tipos alarmas</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
<form action="<?php echo base_url('index.php/') . "/Tipo_alarma/save_tipo_alarma"; ?>" method="post" onsubmit="return campos()">
    <div class="tabContainter">
        <!-- Nav tabs -->
        <ul class="tabLinks">
            <li class="active"><a href="#tabGeneral">General</a></li>
            <li><a href="#tabNiveles">Niveles</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tabContenido">
            <!--Tab General -->
            <div id="tabGeneral" class="tab active">
                <div class="row">
                    <span class="tituloH">General</span>
                    <span class="cuadroH1"></span>
                    <span class="cuadroH2"></span>
                    <span class="cuadroH3"></span>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="id_tipo_alarma">
                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" value="<?php echo (isset($datos[0]->id_tipo_alarma) ? $datos[0]->id_tipo_alarma : '' ) ?>" class="form-control   " id="id_tipo_alarma" name="id_tipo_alarma">
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="descripcion">
                            *         Descripción                            </label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->descripcion) ? $datos[0]->descripcion : '' ) ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
                    </div>
                    <div class="col-md-3">
                        <label for="examen">
                            *         Examen                            </label>
                    </div>
                    <div class="col-md-3">
                        <!--<input type="text" value="<?php echo (isset($datos[0]->examen) ? $datos[0]->examen : '' ) ?>" class="form-control obligatorio  " id="examen" name="examen">-->
                        <?php echo lista("examen", "examen", "form-control obligatorio", "examenes", "examen_cod", "examen_nombre", (isset($datos[0]->examen) ? $datos[0]->examen : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="analisis_resultados">
                            Análisis resultados                            </label>
                    </div>
                    <div class="col-md-3">
                        <!--<input type="text" value="<?php echo (isset($datos[0]->analisis_resultados) ? $datos[0]->analisis_resultados : '' ) ?>" class="form-control   " id="analisis_resultados" name="analisis_resultados">-->
                        <select class="form-control   " id="analisis_resultados" name="analisis_resultados">
                            <option value=""></option>
                            <option value="Normal">Normal</option>
                            <option value="Baja">Baja</option>
                            <option value="Alta">Alta</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="analisis_resultados">
                            Variable                            </label>
                    </div>
                    <div class="col-md-3">
                        <span id="cod_variables">
                            <?php echo lista("variable_codigo", "variable_codigo", "form-control obligatorio variable_codigo", "variables", "variable_codigo", "hl7tag", (isset($datos[0]->variable_codigo) ? $datos[0]->variable_codigo : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                        </span>
                        <br>
                    </div>
                    <div class="col-md-3">
                        <label for="tiempo">
                            *         Tiempo                            </label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->tiempo) ? $datos[0]->tiempo : '' ) ?>" class="form-control obligatorio  number" id="tiempo" name="tiempo">
                    </div>
                    <div class="col-md-3">
                        <label for="frecuencia">
                            *         Frecuencia                            </label>
                    </div>
                    <div class="col-md-3">
                        <!--<input type="text" value="<?php echo (isset($datos[0]->frecuencia) ? $datos[0]->frecuencia : '' ) ?>" >-->
                        <select class="form-control obligatorio  " id="frecuencia" name="frecuencia">
                            <option value=""></option>
                            <option value="Hora" <?php echo (isset($datos[0]->frecuencia) ? ($datos[0]->frecuencia == 'Hora' ? 'selected' : '') : '' ) ?>>Hora</option>
                            <option value="Día" <?php echo (isset($datos[0]->frecuencia) ? ($datos[0]->frecuencia == 'Día' ? 'selected' : '') : '' ) ?>>Día</option>
                            <option value="Semana" <?php echo (isset($datos[0]->frecuencia) ? ($datos[0]->frecuencia == 'Semana' ? 'selected' : '') : '' ) ?>>Semana</option>
                            <option value="Mes" <?php echo (isset($datos[0]->frecuencia) ? ($datos[0]->frecuencia == 'Mes' ? 'selected' : '') : '' ) ?>>Mes</option>
                            <option value="Año" <?php echo (isset($datos[0]->frecuencia) ? ($datos[0]->frecuencia == 'Año' ? 'selected' : '') : '' ) ?>>Año</option>
                        </select>
                    </div>
                </div>
                <?php if (isset($post['campo'])) { ?>
                    <input type="hidden" name="<?php echo $post['campo'] ?>" value="<?php echo $post[$post['campo']] ?>">
                    <input type="hidden" name="campo" value="<?php echo $post['campo'] ?>">
                <?php } ?>
            </div>
            <!--Tab Niveles -->
            <div id="tabNiveles" class="tab">
                <div class="row">
                    <span class="tituloH">Niveles</span>
                    <span class="cuadroH1"></span>
                    <span class="cuadroH2"></span>
                    <span class="cuadroH3"></span>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="id_niveles_alarma">
                            *         Niveles                            </label>
                    </div>
                    <div class="col-md-3">
                        <!--<input type="text" value="<?php echo (isset($datos[0]->id_niveles_alarma) ? $datos[0]->id_niveles_alarma : '' ) ?>" class="form-control obligatorio  " id="id_niveles_alarma" name="id_niveles_alarma">-->
                        <script>
                            $('document').ready(function () {
                                $('#id_niveles_alarma').autocomplete({
                                    source: "<?php echo base_url("index.php//Pacientes/autocomplete_nivel2") ?>",
                                    minLength: 3
                                });
                            });
                        </script>
                        <input type="text" id="id_niveles_alarma" name="id_niveles_alarma" class="form-control ">
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:" id="agregar_equipo">Agregar</a>
                    </div>
                </div>
                <div class="row">    
                    <div style="width: 80%;margin: 0 auto;">
                        <div class="row">
                            <table class="table">
                                <thead>
                                <th>Descripción</th>
                                <th>Repeticiones minimas</th>
                                <th>Repeticiones maximas</th>
                                <th>Color</th>
                                <th>Acción</th>
                                </thead>
                                <tbody id="tabla_contacto">
                                    <?php
                                    if (isset($tipo_alarma_nivel))
                                        if (!empty($tipo_alarma_nivel)) {
                                            foreach ($tipo_alarma_nivel as $c) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="<?php echo $c->id_niveles_alarma ?>" class="equipo_id" name="equipo_id[]">
                                                        <?php echo $c->descripcion ?></td>
                                                    <td><?php echo $c->n_repeticiones_minimas ?></td>
                                                    <td><?php echo $c->n_repeticiones_maximas ?></td>
                                                    <td><?php echo $c->color ?></td>
                                                    <td><a class="eliminar" href="javascript:">Eliminar</a></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div style="width: 80%;margin: 0 auto">
            <div class="row">
                <div class="row">
                    <span id="boton_guardar">
                        <button class="btn btn-dcs" >Guardar</button> 
                        <input class="btn btn-dcs" type="reset" value="Limpiar">
                        <a href="<?php echo base_url('index.php') . "/Tipo_alarma/consult_tipo_alarma" ?>" class="btn btn-dcs">Listado </a>
                    </span>
                    <span id="boton_cargar" style="display: none">
                        <h2>Cargando ...</h2>
                    </span>
                </div>
                <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
            </div>
        </div>
    </div>
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
                <!--                <button type="button" class="btn btn-default" data-dismiss="modal">Actializar</button>-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<script>
    $('#agregar_equipo').click(function () {
        var info = $('#id_niveles_alarma').val();
        var info2 = info.split(' :: ');
        var r = 0;
        var f = "";
        $('.equipo_id').each(function () {
            f += $(this).val() + ",";
            if ($(this).val() == info2[1]) {
                alerta('rojo', 'Nivel ya existe');
                $('#contacto_id2').val('');
                r = 1;
            }
        });
        if (r == 1) {
            return false;
        }

        var url = '<?php echo base_url('index.php/Tipo_alarma/confirmar_duplicado') ?>'
        $.post(url, {anteriores: f, nuevo: info2[1]})
                .done(function (msg) {
                    if (msg == 00) {
                        if (info2.length == 5) {
                            var html = "<tr>";
                            html += "<td><input type='hidden' class='equipo_id' name='equipo_id[]' class='equipo_id' value='" + info2[1] + "'>" + info2[0] + "</td>";
                            html += "<td>" + info2[2] + "</td>";
                            html += "<td>" + info2[3] + "</td>";
                            html += "<td>" + info2[4] + "</td>";
                            html += "<td>" + '<a href="javascript:" class="eliminar">Eliminar</a>&nbsp;&nbsp;<a href="javascript:" class="vista_niveles_alarma" tabla="niveles_alarma" campo="id_niveles_alarma" url="Niveles_alarma/edit_niveles_alarma2" codigo="' + info2[1] + '" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Vista previa</a>' + "</td>";
                            html += "</tr>";
                            $('#tabla_contacto').append(html);
                            $('#id_niveles_alarma').val('');
                        } else {
                            alerta('rojo', 'Cadena no valida');
                            $('#id_niveles_alarma').val('');
                        }
                    }else{
                        alerta('roja','La repeticiones del nivel ya se encuentran en la tabla');
                        $('#id_niveles_alarma').val('');
                    }
                })
                .fail(function () {
                    alerta('rojo', 'Error al consultar')
                })


    })

    $('body').delegate('.vista_niveles_alarma', 'click', function () {
        $('#body_modal').html('Cargando...');
        var contacto_id = $(this).attr('codigo');
        var campo = $(this).attr('campo');
        var tabla = $(this).attr('tabla');
        var url2 = $(this).attr('url');
        var url = '<?php echo base_url('index.php/') ?>' + "/" + url2
        $.post(url, {id_niveles_alarma: contacto_id, campo: campo, tabla: tabla})
                .done(function (msg) {
                    $('#body_modal').html(msg);
                    $('#body_modal #boton_guardar').remove()
                    $('#body_modal input').attr('disabled', 'disabled');
                    $('#body_modal select').attr('disabled', 'disabled');
                }).fail(function () {

        })

    })

    $('body').delegate('.eliminar', 'click', function () {
        $(this).parent().parent().remove();
    })

    $('#analisis_resultados').val("<?php echo (isset($datos[0]->analisis_resultados) ? $datos[0]->analisis_resultados : '' ) ?>");
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
    $('#examen').change(function () {
        var id_examen = $('#examen').val();
        if (id_examen == '') {
            return false;
        }
        var url = '<?php echo base_url('index.php/Equipos/traer_variables2') ?>'
        $.post(url, {id_examen: id_examen})
                .done(function (msg) {
                    $('#cod_variables').html(msg);
                })
                .fail(function () {
                    alerta('rojo', 'Error en la consulta');
                    $('#variable_codigo').val('');
                })
    })
</script>
