<div class="row">
    <span class="tituloH">Medicos</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>


<div class="row">

    <div class="tabContainter">
        <!-- Nav tabs -->
        <ul class="tabLinks">              
            <li class="active"><a href="#tabDatos">Datos</a></li>
            <li><a href="#tabGrafica">Procedimientos</a></li>
            <li><a href="#tabAlarmas">Por leer</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tabContenido">
            <!--Tab Datos -->

            <div id="tabDatos" class="tab active">
                <form action="<?php echo base_url('index.php/') . "/Medicos/save_medicos"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
                    <div class="row">
                        <?php $id = (isset($datos[0]->medico_codigo) ? $datos[0]->medico_codigo : '' ) ?>


                        <div class="col-md-3">
                            <label for="medico_codigo">
                            </label>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" value="<?php echo (isset($datos[0]->medico_codigo) ? $datos[0]->medico_codigo : '' ) ?>" class=" form-control   " id="medico_codigo" name="medico_codigo">
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-3">
                            <label for="nombre">
                                *                             Cedula                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->cedula) ? $datos[0]->cedula : '' ) ?>" class=" form-control obligatorio  " id="cedula" name="cedula">
                        </div>
                        <div class="col-md-3">
                            <label for="nombre">
                                *                             Nombre                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->nombre) ? $datos[0]->nombre : '' ) ?>" class=" form-control obligatorio  " id="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Estado">
                                *                             Estado                        </label>
                        </div>
                        <div class="col-md-3">
                            <select  class="form-control obligatorio  " id="Estado" name="Estado">
                                <option value=""></option>
                                <option value="Activo" <?php echo (isset($datos[0]->Estado) ? (($datos[0]->Estado == 'Activo') ? 'selected="selected"' : '') : '' ) ?>>Activo</option>
                                <option value="Inactivo" <?php echo (isset($datos[0]->Estado) ? (($datos[0]->Estado == 'Inactivo') ? 'selected="selected"' : '') : '' ) ?>>Inactivo</option>
                            </select>
                        </div>


                        <div class="col-md-3">
                            <label for="matricula_profesional">
                                *                             Matrícula profesional                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->matricula_profesional) ? $datos[0]->matricula_profesional : '' ) ?>" class=" form-control obligatorio  " id="matricula_profesional" name="matricula_profesional">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="direccion">
                                *                             Dirección                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->direccion) ? $datos[0]->direccion : '' ) ?>" class=" form-control obligatorio  " id="direccion" name="direccion">
                        </div>

                        <div class="col-md-3">
                            <label for="telefono_fijo">
                                *                             Teléfono fijo                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->telefono_fijo) ? $datos[0]->telefono_fijo : '' ) ?>" class=" form-control obligatorio  number" id="telefono_fijo" name="telefono_fijo">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="celular">
                                Celular                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->celular) ? $datos[0]->celular : '' ) ?>" class=" form-control   number" id="celular" name="celular">
                        </div>

                        <div class="col-md-3">
                            <label for="email">
                                Email                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="email" value="<?php echo (isset($datos[0]->email) ? $datos[0]->email : '' ) ?>" class=" form-control   " id="email" name="email">
                        </div>
                    </div>
                    <?php if (isset($post['campo'])) { ?>
                        <input type="hidden" name="<?php echo $post['campo'] ?>" value="<?php echo $post[$post['campo']] ?>">
                        <input type="hidden" name="campo" value="<?php echo $post['campo'] ?>">
                    <?php } ?>

                    <div class="row">
                        <div class="mis_procedimientos"></div>
                        <span id="boton_guardar">
                            <?php if ($tipo_usuario != 2) { ?>
                                <button class="btn btn-dcs enviar">Guardar</button> 
                                <input class="btn btn-dcs" type="reset" value="Limpiar">
                            <?php } ?>
                            <a href="<?php echo base_url('index.php') . "/Medicos/consult_medicos" ?>" class="btn btn-dcs">Listado </a>
                        </span>
                        <span id="boton_cargar" style="display: none">
                            <h2>Cargando ...</h2>
                        </span>
                    </div>
                    <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
                </form>
            </div>
            <div id="tabGrafica" class="tab">
                <div class="row">
                    <div class="col-md-6">
                        <span class="tituloH">Procedimientos</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>PROCEDIMIENTOS</label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("", "procedimientos", "form-control ", "parts", "id", "description", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:" class="agregar_procedimiento">Agregar</a>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                        <th>procedimientos</th>
                        <th>Acción</th>
                        </thead>
                        <tbody id="new_proce">
                            <?php foreach ($as_medicos_parts as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <input type='hidden' name='procedimientos_deta[]' class='proce' value='<?php echo $value->id ?>'>
                                        <?php echo $value->description; ?>
                                    </td>
                                    <td>
                                        <a href="javascript:" class="eliminar">Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="tabAlarmas" class="tab">
                <form id="form_consulta" onsubmit="return false">
                    <input type="hidden" value="<?php echo (isset($datos[0]->medico_codigo) ? $datos[0]->medico_codigo : '' ) ?>" class=" form-control "  name="medico_codigo">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Estado</label>
                        </div> 
                        <div class="col-md-3">
                            <select name="estado" id="estado" class="form-control">
                                <option value="1">Sin atender</option>
                                <option value="3">Atendido</option>
                                <option value="4">Anulado</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label>Paciente</label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="paciente" id="paciente" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Procedimientos</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="procedimientos_form" id="procedimientos_form" class="form-control">
                        </div>
                        <div class="col-md-1">
                            <label>Fecha inicial</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="fecha_ini" id="fecha_ini" class="form-control fecha">
                        </div>
                        <div class="col-md-1">
                            <label>Fecha final</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="fecha_fin" id="fecha_fin" class="form-control fecha">
                        </div>
                    </div>
                    <div class="row">
                        <input class="btn btn-dcs" type="reset" value="Limpiar">
                        <button class="btn btn-dcs consultar">Consultar</button>
                    </div>
                </form>
                <div class="row">
                    <div class="container">
                        <table class="table table-responsive">
                            <thead>
                            <th>Fecha Ingreso</th>
                            <th>Paciente</th>
                            <th>Procedimiento</th>
                            <th>Estado</th>
                            <th>Motivos</th>
                            <th>Fecha de atención</th>
                            <!--<th>Cliente</th>-->
                            <th>Informe</th>
                            <th>Imprimir</th>
                            </thead>
                            <tbody id="mi_inform"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $('.consultar').click(function () {
        var url = "<?php echo base_url("index.php/Medicos/form_consulta") ?>";
        $.post(url, $('#form_consulta').serialize())
                .done(function (msg) {
                    $('#mi_inform').html('');
                    var html = '';
                    $.each(msg, function (key, val) {
                        html += "<tr>";
                        html += "<td>" + val.fecha_ingreso + "</td>"
                        html += "<td>" + val.nombres + " " + val.apellidos + "</td>"
                        html += "<td>" + val.description + "</td>"
                        html += "<td>" + val.estado + "</td>"
                        html += "<td>" + val.motivo + "</td>"
                        html += "<td>" + val.fecha_atencion + "</td>"
                        html += "<td>"
                        html += '<center><a href="<?php echo base_url('index.php/ingreso/informe'); ?>?id_registro=' + val.id_informe + '"><i class="fa fa-search"></i></a></center>'
                        html += "</td>"
                        html += "<td>"
                        html += '<center><a href="<?php echo base_url('index.php/ingreso/imprimir_informe'); ?>?id_informe=' + val.id_informe + '" target="_blank"><i class="fa fa-print"></i></a></center>'
                        html += "</td>"
                        html += "</tr>";
                    })
                    $('#mi_inform').html(html);
                })
                .fail(function () {
                    alerta('rojo', 'Error al consultar')
                })
    })
    $('document').ready(function () {
        $('#paciente').autocomplete({
            source: "<?php echo base_url("index.php//Medicos/autocomplete_paciente") ?>",
            minLength: 3
        });
    });
    $('document').ready(function () {
        $('#procedimientos_form').autocomplete({
            source: "<?php echo base_url("index.php//Medicos/autocomplete_matricula_procedimientos") ?>",
            minLength: 3
        });
    });
</script>




<script>
    $('.enviar').click(function () {
        $('.mis_procedimientos').html('');
        $('.proce').each(function () {
            $('.mis_procedimientos').append("<input type='hidden' name='procedimientos_deta[]' class='proce' value='" + $(this).val() + "'>");
        })

    })
    $('.agregar_procedimiento').click(function () {
        var procedimientos = $('#procedimientos').val();
        if (procedimientos != "") {
            var html = "<tr><td><input type='hidden' name='procedimientos_deta[]' class='proce' value='" + procedimientos + "'> " + $('#procedimientos option:selected').text() + "</td><td><a href='javascript:' class='eliminar'>Eliminar</a></td><tr>"
            $('#new_proce').append(html)
        }
    })
    $('body').delegate('.eliminar', 'click', function () {
        $(this).parent().parent().remove();
    })
    $('#nombre').change(function () {
        var nombre = $('#nombre').val();
        var medico_codigo = $('#medico_codigo').val();
        $('#boton_cargar').show();
        $('#boton_guardar').hide();
        $.post('<?php echo base_url('index.php/Medicos/referencia') ?>', {nombre: nombre, medico_codigo: medico_codigo})
                .done(function (msg) {
                    if (msg == 0) {
                        alerta('verde', 'Nombre valido')
                    } else {
                        alerta('rojo', 'Nombre no valido')
                        $('#nombre').val('');
                    }
                    $('#boton_cargar').hide();
                    $('#boton_guardar').show();
                })
                .fail(function (msg) {
                    $('#boton_cargar').hide();
                    $('#boton_guardar').show();
                })
    })
    $('#matricula_profesional').change(function () {
        var matricula_profesional = $('#matricula_profesional').val();
        var medico_codigo = $('#medico_codigo').val();
        $('#boton_cargar').show();
        $('#boton_guardar').hide();
        $.post('<?php echo base_url('index.php/Medicos/referencia2') ?>', {matricula_profesional: matricula_profesional, medico_codigo: medico_codigo})
                .done(function (msg) {
                    if (msg == 0) {
                        alerta('verde', 'Matricula valido')
                    } else {
                        alerta('rojo', 'Matricula no valido')
                        $('#matricula_profesional').val('');
                    }
                    $('#boton_cargar').hide();
                    $('#boton_guardar').show();
                })
                .fail(function (msg) {
                    $('#boton_cargar').hide();
                    $('#boton_guardar').show();
                })
    })
    function campos() {
        $('input[type="file"]').each(function (key, val) {
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
    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });


</script>
