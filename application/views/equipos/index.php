<div class="row">
    <span class="tituloH">Equipos</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span> 
</div>
<form action="<?php echo base_url('index.php/') . "/Equipos/save_equipos"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">

    <div class="tabContainter">
        <!-- Nav tabs -->
        <ul class="tabLinks">
            <li class="active"><a href="#tabDatos">Datos</a></li>
            <li><a href="#tabCalibracion">Calibración</a></li>
            <li><a href="#tabExamenes">Exámenes</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tabContenido">
            <!--Tab Datos -->
            <div id="tabDatos" class="tab active">
                <div class="row">
                    <span class="tituloH">Datos Equipos</span>
                    <span class="cuadroH1"></span>
                    <span class="cuadroH2"></span>
                    <span class="cuadroH3"></span>
                </div>
                <?php $id = (isset($datos[0]->id_equipo) ? $datos[0]->id_equipo : '' ) ?>
                <input type="hidden" value="<?php echo (isset($datos[0]->id_equipo) ? $datos[0]->id_equipo : '' ) ?>" class=" form-control   " id="id_equipo" name="id_equipo">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="descripcion">
                                    *                             Descripción                        </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" value="<?php echo (isset($datos[0]->descripcion) ? $datos[0]->descripcion : '' ) ?>" class=" form-control obligatorio  " id="descripcion" name="descripcion">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="estado">
                                    *                             Estado                        </label>
                            </div>
                            <div class="col-md-6" >
                                <?php echo lista("estado", "estado", "form-control obligatorio", "estado_equipos", "id_estado", "estado", (isset($datos[0]->estado) ? $datos[0]->estado : '1'), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="ubicacion">
                                    *                             Ubicación                        </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" readonly="readonly" value="<?php echo (isset($datos[0]->ubicacion) ? $datos[0]->ubicacion : 'Almacén' ) ?>" class=" form-control obligatorio  " id="ubicacion" name="ubicacion">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="serial">
                                    Serial N°                         </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" value="<?php echo (isset($datos[0]->serial) ? $datos[0]->serial : '' ) ?>" class=" form-control " id="serial" name="serial">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php if (!empty($id) && $datos[0]->imagen != '') { ?>
                            <center>
                                <img class="img-thumbnail" style="width: 230px;" src="<?php echo base_url('uploads') ?>/equipos/<?php echo $id . "/" . $datos[0]->imagen ?>">
                                <span class="cuadroImg1"></span>
                                <span class="cuadroImg2"></span>
                                <span class="cuadroImg3"></span>
                            </center>
                        <?php } ?>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3">
                        <label for="fabricante">
                            Fabricante                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->fabricante) ? $datos[0]->fabricante : '' ) ?>" class=" form-control   " id="fabricante" name="fabricante">
                    </div>

                    <div class="col-md-3">
                        <label for="fecha_fabricacion">
                            Fecha fabricación                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->fecha_fabricacion) ? $datos[0]->fecha_fabricacion : '' ) ?>" class=" form-control  fecha " id="fecha_fabricacion" name="fecha_fabricacion">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="tipo_equipo_cod">
                            *                             Tipo equipo                        </label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("tipo_equipo_cod", "tipo_equipo_cod", "form-control obligatorio", "tipo_equipo", "tipo_equipo_cod", "referencia", (isset($datos[0]->tipo_equipo_cod)) ? $datos[0]->tipo_equipo_cod : null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                    </div>
                    <div class="col-md-3">
                        <label for="responsable">
                            Responsable                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->responsable) ? $datos[0]->responsable : '' ) ?>" class=" form-control   " id="responsable" name="responsable">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="imagen">
                            Imagen                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="file" value="<?php echo (isset($datos[0]->imagen) ? $datos[0]->imagen : '' ) ?>" class="   " id="imagen" name="imagen">
                    </div>
                </div>
                <div class="row">    

                    <div class="col-md-3">
                        <label for="medico">IMEI </label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->IMEI) ? $datos[0]->IMEI : '' ) ?>" class=" form-control    " id="IMEI" name="IMEI">
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="observaciones">
                            Observaciones                        </label>
                    </div>
                    <div class="col-md-9">
                        <textarea class=" form-control   " id="observaciones" name="observaciones"><?php echo (isset($datos[0]->observaciones) ? $datos[0]->observaciones : '' ) ?></textarea>
                    </div>
                </div>
            </div>
            <!--Tab Calibracion -->
            <div id="tabCalibracion" class="tab">
                <div class="row">
                    <span class="tituloH">Calibración</span>
                    <span class="cuadroH1"></span>
                    <span class="cuadroH2"></span>
                    <span class="cuadroH3"></span>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="fecha_ultima_calibracion">
                            Fecha ultima calibración                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->fecha_ultima_calibracion) ? $datos[0]->fecha_ultima_calibracion : '' ) ?>" class=" form-control  fecha " id="fecha_ultima_calibracion" name="fecha_ultima_calibracion">
                    </div>



                    <div class="col-md-3">
                        <label for="empresa_certificadora">
                            Empresa certificadora                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->empresa_certificadora) ? $datos[0]->empresa_certificadora : '' ) ?>" class=" form-control   " id="empresa_certificadora" name="empresa_certificadora">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="adjuntar_certificado">
                            Adjuntar certificado  <br> Max(5Mb)</label>
                    </div>
                    <div class="col-md-3">
                        <input type="file" value="<?php echo (isset($datos[0]->adjuntar_certificado) ? $datos[0]->adjuntar_certificado : '' ) ?>" class="    " id="adjuntar_certificado" name="adjuntar_certificado">
                    </div>
                    <div class="col-md-6" style="float:right;text-align: center;">
                        <?php
                        if (!empty($id) && $datos[0]->adjuntar_certificado != '') {
                            $s = explode('.', $datos[0]->adjuntar_certificado);
//                                print_r($s);
                            if ($s[1] == 'gif' || $s[1] == 'jpg' || $s[1] == 'png' && 1 == 2) {
                                ?>
                                <center>
                                    <img class="img-thumbnail" style="width: 250px;" src="<?php echo base_url('uploads') ?>/equipos/<?php echo $id . "/" . $datos[0]->adjuntar_certificado ?>">
                                    <span class="cuadroImg1"></span>
                                    <span class="cuadroImg2"></span>
                                    <span class="cuadroImg3"></span>
                                </center>


                            <?php } else { ?>
                                <a href="<?php echo base_url('uploads') ?>/equipos/<?php echo $id . "/" . $datos[0]->adjuntar_certificado ?>" target="_black">Documento</a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!--Tab Examenes -->
            <div id="tabExamenes" class="tab">
                <div class="row">
                    <span class="tituloH">Exámenes</span>
                    <span class="cuadroH1"></span>
                    <span class="cuadroH2"></span>
                    <span class="cuadroH3"></span>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="examen_cod">
                            Examen                        </label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("examen_cod", "examen_cod", "form-control", "examenes", "examen_cod", "examen_nombre", (isset($datos[0]->tipo_equipo_cod)) ? $datos[0]->examen_cod : null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:" id="agregar">Agregar</a>
                    </div>
                </div>
                <div style="width: 80%;margin: 0 auto;">
                    <div class="row">
                        <br />
                        <table class="table">
                            <thead>
                            <th>Examen</th>
                            <th>Variable</th>
                            <th>Acción</th>
                            </thead>
                            <tbody id="agregar_examen">
                                <?php
                                if (isset($equipo_examen_variable))
                                    if (count($equipo_examen_variable) > 0) {
                                        foreach ($equipo_examen_variable as $value) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type='hidden' name='examen[]' value='<?php echo $value->examen_cod; ?>'><?php echo $value->examen_nombre; ?>
                                                </td>
                                                <td>
                                                    <?php echo lista("variable_codigo[]", "1", "form-control obligatorio variable_codigo", "variables", "variable_codigo", "hl7tag", $value->variable_codigo, array("ACTIVO" => "S", "examen_cod" => $value->examen_cod), /* readOnly? */ false); ?>
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
            <input class="btn btn-dcs limpiar" type="reset" value="Limpiar">
            <a href="<?php echo base_url('index.php') . "/Equipos/consult_equipos" ?>" class="btn btn-dcs">Listado </a>
        </span>
        <span id="boton_cargar" style="display: none">
            <h2>Cargando ...</h2>
        </span>
    </div>
    <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
</form>
<script>
    
    $('#serial').change(function () {
        var url = "<?php echo base_url('index.php/') . "/Equipos/buscar_serial"; ?>";
        $.post(url, {serial: $(this).val()})
                .done(function (msg) {
                    if (msg == 0) {
                       
                    } else {
                        $('#serial').val('');
                        alerta('rojo', 'Serial ya existe');
                    }
                })
                .fail(function () {
                    alerta('rojo', 'Error en la conexión')
                })
    })

    $('#estado').change(function () {
        switch ($(this).val()) {
            case '1':
                $('#ubicacion').val('ALMACEN')
                break;
            case '2':

                break;
            case '3':
                $('#ubicacion').val('ALMACEN')
                break;
            case '4':
                $('#ubicacion').val('EN TRANSITO')
                break;
            case '5':
                $('#ubicacion').val('MANTENIMIENTO')
                break;
        }
<?php if (isset($datos[0]->id_equipo)) { ?>

            var estado = $(this).val();
            var estado_guardado = <?php echo $datos[0]->estado; ?>;
            var ubicacion = "<?php echo $datos[0]->ubicacion; ?>";
            if (estado_guardado == 3 && estado == 4) {
                return true;
            }
            if (estado_guardado != estado) {
                var url = '<?php echo base_url('index.php/Equipos/verificar_equipo') ?>';
                var id_equipo = $('#id_equipo').val();
                $.ajax({
                    url: url,
                    cache: false,
                    data: {id_equipo: id_equipo},
                    async: true,
                    type: 'POST',
                    success: function (msg, status) {
                        if (msg != 0) {
                            $('#boton_guardar').show();
                            $('#boton_cargar').hide();
                            alerta('rojo', 'El equipo ya se encuentra asignado a un paciente');
                            $('#estado').val(estado_guardado);
                            $('#ubicacion').val(ubicacion);
                        } else {

                        }
                    }
                });
            } else {
                return true;
            }
<?php } ?>
    })
    $('body').delegate('.variable_codigo', 'change', function () {
        var y = new Array();
        $('.variable_codigo').each(function () {
            if ($.inArray($(this).val(), y) != -1) {
                $(this).val('')
                alerta('rojo', 'Existe una variable con este examen.')
            } else {
                y.push($(this).val())
            }
        })
//        console.log(y)
    })
    $('#agregar').click(function () {

        var examen = $('#examen_cod option:selected').text();
        var id_examen = $('#examen_cod').val();
        if (id_examen == '') {
            alerta('rojo', 'Seleccione un examen');
            return false;
        }
        var url = '<?php echo base_url('index.php/Equipos/traer_variables') ?>'
        $.post(url, {id_examen: id_examen})
                .done(function (msg) {
                    var html = "<tr>";
                    html += "<td>";
                    html += "<input type='hidden' name='examen[]' value='" + id_examen + "'>" + examen + " ";
                    html += "</td>";
                    html += "<td>";
                    html += msg;
                    html += "</td>";
                    html += "<td>";
                    html += '<a href="javascript:" class="eliminar">Eliminar</a>';
                    html += "</td>";
                    html += "</tr>";
                    $('#agregar_examen').append(html)
                }).fail(function () {

        })

    })
    $('body').delegate('.eliminar', 'click', function () {
        $(this).parent().parent().remove();
    })
    $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
    function campos() {
        if (obligatorio('obligatorio') == false) {
            return false
        } else {
            $('#boton_guardar').hide();
            $('#boton_cargar').show();

            var id_equipo = $('#id_equipo').val()
            if (id_equipo == '' && $('#estado').val() != 1) {
                alerta('rojo', 'El inicio de un equipo es Disponible');
                $('#boton_guardar').show();
                $('#boton_cargar').hide();
                return false;
            }
            if ($('#estado').val() == 2) {
                alerta('rojo', 'Estado no es valido')
                $('#boton_guardar').show();
                $('#boton_cargar').hide();
                return false;
            }
<?php if (isset($datos[0]->id_equipo)) { ?>

                var id_equipo = $('#id_equipo').val();
                var estado = $('#estado').val();
                if (estado != "<?php echo $datos[0]->estado; ?>") {
                    var estado_guardado = "<?php echo $datos[0]->estado; ?>"
                    if (estado_guardado == 1) {
                        if (estado == 5) {

                        } else {
                            alerta('rojo', 'Estado no valido');
                            $('#boton_guardar').show();
                            $('#boton_cargar').hide();
                            return false;
                        }
                    }
                    if (estado_guardado == 2) {
                        if (estado == 4) {

                        } else {
                            alerta('rojo', 'Estado no valido');
                            $('#boton_guardar').show();
                            $('#boton_cargar').hide();
                            return false;
                        }
                    }
                    if (estado_guardado == 3) {
                        if (estado == 1 || estado == 4) {

                        } else {
                            alerta('rojo', 'Estado no valido');
                            $('#boton_guardar').show();
                            $('#boton_cargar').hide();
                            return false;
                        }
                    }
                    if (estado_guardado == 4) {
                        if (estado == 1 || estado == 2 || estado == 5) {

                        } else {
                            alerta('rojo', 'Estado no valido');
                            $('#boton_guardar').show();
                            $('#boton_cargar').hide();
                            return false;
                        }
                    }
                    if (estado_guardado == 5) {
                        if (estado == 1) {

                        } else {
                            alerta('rojo', 'Estado no valido');
                            $('#boton_guardar').show();
                            $('#boton_cargar').hide();
                            return false;
                        }
                    }
                }
                return true;
<?php } else { ?>
                return true;
<?php } ?>
        }
    }
    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });




</script>
