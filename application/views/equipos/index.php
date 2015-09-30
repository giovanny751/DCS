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
                                <select  class="form-control obligatorio  " id="estado" name="estado" <?php echo (isset($datos[0]->estado) ? '' : 'disabled="disabled"') ?>>
                                    <option value="DISPONIBLE" <?php echo (isset($datos[0]->estado) ? (($datos[0]->estado == 'DISPONIBLE') ? 'selected="selected"' : '') : '' ) ?>>DISPONIBLE</option>
                                    <option value="EN OPERACIÓN" <?php echo (isset($datos[0]->estado) ? (($datos[0]->estado == 'EN OPERACIÓN') ? 'selected="selected"' : '') : '' ) ?>>EN OPERACIÓN</option>
                                    <option value="ASIGNADO" <?php echo (isset($datos[0]->estado) ? (($datos[0]->estado == 'ASIGNADO') ? 'selected="selected"' : '') : '' ) ?>>ASIGNADO</option>
                                    <option value="EN TRANSITO" <?php echo (isset($datos[0]->estado) ? (($datos[0]->estado == 'EN TRANSITO') ? 'selected="selected"' : '') : '' ) ?>>EN TRANSITO</option>
                                    <option value="MANTENIMIENTO" <?php echo (isset($datos[0]->estado) ? (($datos[0]->estado == 'MANTENIMIENTO') ? 'selected="selected"' : '') : '' ) ?>>MANTENIMIENTO</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="ubicacion">
                                    *                             Ubicación                        </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" value="<?php echo (isset($datos[0]->ubicacion) ? $datos[0]->ubicacion : '' ) ?>" class=" form-control obligatorio  " id="ubicacion" name="ubicacion">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="serial">
                                    *                             Serial N°                         </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" value="<?php echo (isset($datos[0]->serial) ? $datos[0]->serial : '' ) ?>" class=" form-control obligatorio  number" id="serial" name="serial">
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
                            Adjuntar certificado                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="file" value="<?php echo (isset($datos[0]->adjuntar_certificado) ? $datos[0]->adjuntar_certificado : '' ) ?>" class="    " id="adjuntar_certificado" name="adjuntar_certificado">
                    </div>
                    <div class="col-md-6" style="float:right;text-align: center;">
                        <?php
                        if (!empty($id) && $datos[0]->adjuntar_certificado != '') {
                            $s = explode('.', $datos[0]->adjuntar_certificado);
//                                print_r($s);
                            if ($s[1] == 'gif' || $s[1] == 'jpg' || $s[1] == 'png') {
                                ?>
                                <center>
                                    <img class="img-thumbnail" style="width: 250px;" src="<?php echo base_url('uploads') ?>/equipos/<?php echo $id . "/" . $datos[0]->adjuntar_certificado ?>">
                                    <span class="cuadroImg1"></span>
                                    <span class="cuadroImg2"></span>
                                    <span class="cuadroImg3"></span>
                                </center>


                            <?php } else { ?>
                                <a href="<?php echo base_url('uploads') ?>/equipos/<?php echo $id . "/" . $datos[0]->adjuntar_certificado ?>">Documento</a>
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
            <input class="btn btn-dcs" type="reset" value="Limpiar">
            <a href="<?php echo base_url('index.php') . "/Equipos/consult_equipos" ?>" class="btn btn-dcs">Listado </a>
        </span>
        <span id="boton_cargar" style="display: none">
            <h2>Cargando ...</h2>
        </span>
    </div>
    <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
</form>
<script>
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
                    html += '<a href="javascript:" class="eliminar">Eliminar</a>';
                    html += "</td>";
                    html += "</tr>";
                    $('#agregar_examen').append(html)
                }).fail(function() {

        })

    })
    $('body').delegate('.eliminar', 'click', function() {
        $(this).parent().parent().remove();
    })
    $('#myTabs a').click(function(e) {
        e.preventDefault()
        $(this).tab('show')
    })
    function campos() {
//        $('input[type="file"]').each(function (key, val) {
//            var img = $(this).val();
//            if (img != "") {
//                var r = (img.indexOf('jpg') != -1) ? '' : ((img.indexOf('png') != -1) ? '' : ((img.indexOf('gif') != -1) ? '' : false))
//                if (r === false) {
//                    alert('Tipo de archivo no valido');
//                    return false;
//                }
//            }
//        });
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
