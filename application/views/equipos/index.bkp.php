<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Equipos    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . "/Equipos/save_equipos"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">

        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li role="presentation" class="active"><a href="#tabDatos" aria-controls="tabDatos" role="tab" data-toggle="tab">Datos</a></li>
                <li role="presentation"><a href="#tabCalibracion" aria-controls="tabCalibracion" role="tab" data-toggle="tab">Calibración</a></li>
                <li role="presentation"><a href="#tabExamenes" aria-controls="tabExamenes" role="tab" data-toggle="tab">Exámenes</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <!--Tab Datos -->
                <div role="tabpanel" class="tab-pane active" id="tabDatos">
                    <br />
                    <?php $id = (isset($datos[0]->id_equipo) ? $datos[0]->id_equipo : '' ) ?>
                    <input type="hidden" value="<?php echo (isset($datos[0]->id_equipo) ? $datos[0]->id_equipo : '' ) ?>" class=" form-control   " id="id_equipo" name="id_equipo">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <label for="descripcion">
                                    *                             Descripción                        </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" value="<?php echo (isset($datos[0]->descripcion) ? $datos[0]->descripcion : '' ) ?>" class=" form-control obligatorio  " id="descripcion" name="descripcion">


                                <br>
                            </div>

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
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label for="ubicacion">
                                    *                             Ubicación                        </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" value="<?php echo (isset($datos[0]->ubicacion) ? $datos[0]->ubicacion : '' ) ?>" class=" form-control obligatorio  " id="ubicacion" name="ubicacion">
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label for="serial">
                                    *                             Serial N°                         </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" value="<?php echo (isset($datos[0]->serial) ? $datos[0]->serial : '' ) ?>" class=" form-control obligatorio  number" id="serial" name="serial">


                                <br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php if (!empty($id) && $datos[0]->imagen != '') { ?>
                                <img style="width: 230px;float: right;" src="<?php echo base_url('uploads') ?>/equipos/<?php echo $id . "/" . $datos[0]->imagen ?>">
                            <?php } ?>

                            <br>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <label for="fabricante">
                                Fabricante                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->fabricante) ? $datos[0]->fabricante : '' ) ?>" class=" form-control   " id="fabricante" name="fabricante">
                            <br>
                        </div>

                        <div class="col-md-3">
                            <label for="fecha_fabricacion">
                                Fecha fabricación                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->fecha_fabricacion) ? $datos[0]->fecha_fabricacion : '' ) ?>" class=" form-control  fecha " id="fecha_fabricacion" name="fecha_fabricacion">


                            <br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="tipo_equipo_cod">
                                *                             Tipo equipo                        </label>
                        </div>
                        <div class="col-md-3">
                            <?php echo lista("tipo_equipo_cod", "tipo_equipo_cod", "form-control obligatorio", "tipo_equipo", "tipo_equipo_cod", "referencia", (isset($datos[0]->tipo_equipo_cod)) ? $datos[0]->tipo_equipo_cod : null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                            <br>
                        </div>
                        <div class="col-md-3">
                            <label for="responsable">
                                Responsable                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->responsable) ? $datos[0]->responsable : '' ) ?>" class=" form-control   " id="responsable" name="responsable">


                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="imagen">
                                Imagen                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="file" value="<?php echo (isset($datos[0]->imagen) ? $datos[0]->imagen : '' ) ?>" class="   " id="imagen" name="imagen">
                            <br>
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
                <div role="tabpanel" class="tab-pane" id="tabCalibracion">
                    <br />
                    <div class="row">
                        <div class="col-md-3">
                            <label for="fecha_ultima_calibracion">
                                Fecha ultima calibración                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->fecha_ultima_calibracion) ? $datos[0]->fecha_ultima_calibracion : '' ) ?>" class=" form-control  fecha " id="fecha_ultima_calibracion" name="fecha_ultima_calibracion">


                            <br>
                        </div>



                        <div class="col-md-3">
                            <label for="empresa_certificadora">
                                Empresa certificadora                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->empresa_certificadora) ? $datos[0]->empresa_certificadora : '' ) ?>" class=" form-control   " id="empresa_certificadora" name="empresa_certificadora">


                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="adjuntar_certificado">
                                Adjuntar certificado                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="file" value="<?php echo (isset($datos[0]->adjuntar_certificado) ? $datos[0]->adjuntar_certificado : '' ) ?>" class="    " id="adjuntar_certificado" name="adjuntar_certificado">
                            <br>
                        </div>
                        <div class="col-md-6" style="float:right;text-align: center;">
                            <?php
                            if (!empty($id) && $datos[0]->adjuntar_certificado != '') {
                                $s = explode('.', $datos[0]->adjuntar_certificado);
//                                print_r($s);
                                if ($s[1] == 'gif' || $s[1] == 'jpg' || $s[1] == 'png') {
                                    ?>
                                    <img style="width: 250px;float: right;" src="<?php echo base_url('uploads') ?>/equipos/<?php echo $id . "/" . $datos[0]->adjuntar_certificado ?>">
                                <?php } else { ?>
                                    <a href="<?php echo base_url('uploads') ?>/equipos/<?php echo $id . "/" . $datos[0]->adjuntar_certificado ?>">Documento</a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!--Tab Examenes -->
                <div role="tabpanel" class="tab-pane" id="tabExamenes">
                    <br />
                    <div class="row">
                        <div class="col-md-3">
                            <label for="examen_cod">
                                Examen                        </label>
                        </div>
                        <div class="col-md-3">
                            <?php echo lista("examen_cod", "examen_cod", "form-control", "examenes", "examen_cod", "examen_nombre", (isset($datos[0]->tipo_equipo_cod)) ? $datos[0]->examen_cod : null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                            <br>
                        </div>
                        <div class="col-md-3">
                            <a href="javascript:" id="agregar">Agregar</a>
                            <br>
                        </div>
                    </div>
                    <div style="width: 80%;margin: 0 auto;">
                        <div class="row">
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
                                                        <?php echo lista("variable_codigo[]", "1", "form-control obligatorio variable_codigo", "variables", "variable_codigo", "hl7tag", $value->variable_codigo, array("ACTIVO" => "S","examen_cod"=>$value->examen_cod), /* readOnly? */ false); ?>
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
</div>
<script>
    $('body').delegate('.variable_codigo','change',function(){
        var y=new Array();
        $('.variable_codigo').each(function(){
            if($.inArray($(this).val(),y)!= -1){
                $(this).val('')
                alerta('rojo','Existe una variable con este examen.')
            }else{
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
                }).fail(function(){
                    
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
    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });


</script>
