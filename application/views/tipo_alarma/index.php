<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>Tipos alarmas
    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . "/Tipo_alarma/save_tipo_alarma"; ?>" method="post" onsubmit="return campos()">
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li role="presentation" class="active"><a href="#tabDatos" aria-controls="tabDatos" role="tab" data-toggle="tab">General</a></li>
                <li role="presentation"><a href="#tabSistema" aria-controls="tabSistema" role="tab" data-toggle="tab">Niveles</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!--Tab Datos -->
                <div role="tabpanel" class="tab-pane active" id="tabDatos">
                    <div class="row">

                        <div class="col-md-3">
                            <label for="id_tipo_alarma">
                            </label>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" value="<?php echo (isset($datos[0]->id_tipo_alarma) ? $datos[0]->id_tipo_alarma : '' ) ?>" class="form-control   " id="id_tipo_alarma" name="id_tipo_alarma">
                            <br>
                        </div>

                    </div><div class="row">

                        <div class="col-md-3">
                            <label for="descripcion">
                                *         Descripción                            </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->descripcion) ? $datos[0]->descripcion : '' ) ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
                            <br>
                        </div>

                    </div><div class="row">

                        <div class="col-md-3">
                            <label for="examen">
                                *         Examen                            </label>
                        </div>
                        <div class="col-md-3">
                            <!--<input type="text" value="<?php echo (isset($datos[0]->examen) ? $datos[0]->examen : '' ) ?>" class="form-control obligatorio  " id="examen" name="examen">-->
                            <?php echo lista("examen", "examen", "form-control obligatorio", "examenes", "examen_cod", "examen_nombre", (isset($datos[0]->examen) ? $datos[0]->examen : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                            <br>
                        </div>



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
                            <br>
                        </div>
                    </div>
                    <?php if (isset($post['campo'])) { ?>
                        <input type="hidden" name="<?php echo $post['campo'] ?>" value="<?php echo $post[$post['campo']] ?>">
                        <input type="hidden" name="campo" value="<?php echo $post['campo'] ?>">
                    <?php } ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="tabSistema">
                    <div class="row">
                        <div class="col-md-12"><br><p></div>
                        <div class="col-md-3">
                            <label for="id_niveles_alarma">
                                *         Niveles                            </label>
                        </div>
                        <div class="col-md-3">
                            <!--<input type="text" value="<?php echo (isset($datos[0]->id_niveles_alarma) ? $datos[0]->id_niveles_alarma : '' ) ?>" class="form-control obligatorio  " id="id_niveles_alarma" name="id_niveles_alarma">-->
                            <script>
                                $('document').ready(function () {
                                    $('#id_niveles_alarma').autocomplete({
                                        source: "<?php echo base_url("index.php//Pacientes/autocomplete_nivel") ?>",
                                        minLength: 3
                                    });
                                });
                            </script>
                            <input type="text" id="id_niveles_alarma" name="id_niveles_alarma" class="form-control ">
                            <br>
                        </div>
                        <div class="col-md-3">
                            <a href="javascript:" id="agregar_equipo">Agregar</a>
                            <br>
                        </div>
                        <div style="width: 80%;margin: 0 auto;">
                            <div class="row">
                                <table class="table">
                                    <thead>
                                    <th>Descripción</th>
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
                        <button class="btn btn-success" >Guardar</button> 
                        <input class="btn btn-success" type="reset" value="Limpiar">
                        <a href="<?php echo base_url('index.php') . "/Tipo_alarma/consult_tipo_alarma" ?>" class="btn btn-success">Listado </a>
                    </span>
                    <span id="boton_cargar" style="display: none">
                        <h2>Cargando ...</h2>
                    </span>
                </div>
                <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
            </div>
            </div>
    </form>
</div>
<script>
    $('#agregar_equipo').click(function () {
        var info = $('#id_niveles_alarma').val();
        var info2 = info.split(' :: ');
        var r = 0;
        $('.equipo_id').each(function () {
            if ($(this).val() == info2[1]) {
                alerta('rojo', 'Nivel ya existe');
                $('#contacto_id2').val('');
                r = 1;
            }
        });
        if (r == 1) {
            return false;
        }
        if (info2.length == 2) {
            var html = "<tr>";
            html += "<td><input type='hidden' class='equipo_id' name='equipo_id[]' class='equipo_id' value='" + info2[1] + "'>" + info2[0] + "</td>";
            html += "<td>" + '<a href="javascript:" class="eliminar">Eliminar</a>' + "</td>";
            html += "</tr>";
            $('#tabla_contacto').append(html);
            $('#id_niveles_alarma').val('');
        } else {
            alerta('rojo', 'Cadena no valida');
            $('#id_niveles_alarma').val('');
        }
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
    $('.fecha').datepicker({dateFormat: 'yy-mm-dd'});
</script>
