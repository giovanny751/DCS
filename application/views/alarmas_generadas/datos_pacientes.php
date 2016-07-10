
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->

<div class="row">
    <span class="tituloH">Datos Paciente</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
<form action="" method="post" id="form1">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    Cédula
                </div>    
                <div class="col-md-4">
                    <script>
                        $('document').ready(function () {
                            $('#cedula').autocomplete({
                                source: "<?php echo base_url("index.php//Pacientes/autocomplete_cedula_paciente") ?>",
                                minLength: 3
                            });
                        });
                    </script>
                    <input type="text" name="cedula" id="cedula" value="" autocomplete="false" class="form-control">
                </div>
                <div class="col-md-1">
                    <a href="javascript:" onclick="cl();">Buscar</a>
                </div>   
            </div>
            <div class="row">
                <div class="col-md-6">
                    Nombres
                </div>    
                <div class="col-md-6">
                    <span id="nombres"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Apellido
                </div>    
                <div class="col-md-6">
                    <span id="apellidos"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Fecha Nacimiento
                </div>    
                <div class="col-md-6">
                    <span id="f_nacimiento"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Peso (Kg)
                </div>    
                <div class="col-md-6">
                    <span id="peso"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Estatura (m)
                </div>    
                <div class="col-md-6">
                    <span id="estatura"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <center>
                <center>
                    <img class="img-thumbnail" style="width: 200px;" src="<?php echo base_url('uploads/anonimo.jpg'); ?>" id="foto">
                    <span class="cuadroImg1"></span>
                    <span class="cuadroImg2"></span>
                    <span class="cuadroImg3"></span>
                </center>
            </center>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2">
                Examen 
            </div>    
            <div class="col-md-2">
                <span id="datos_examen">
                    <?php echo lista("examen_cod", "examen_cod", "form-control obligatorio", "examenes", "examen_cod", "examen_nombre", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                </span>
            </div>
            <div class="col-md-2">
                Variable
            </div>    
            <div class="col-md-2">
                <span id="datos_examen">
                    <?php echo lista("variable_codigo", "variable_codigo", "form-control obligatorio", "variables", "variable_codigo", "hl7tag", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                </span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Fecha Inicial
        </div>    
        <div class="col-md-2">
            <input type="text" name="f_inicial" id="f_inicial" class="fecha form-control">
            <input type="hidden" name="id_alarmas" id="id_alarmas" class="">
        </div>
        <div class="col-md-2">
            Fecha Final
        </div>    
        <div class="col-md-2">
            <input type="text" name="f_fin" id="f_fin" class="fecha form-control">
        </div>
    </div>
</div>
</form>
<div class="row">
    <div class="col-md-1">
        <a href="<?php echo base_url('index.php/pacientes'); ?>"></a>
    </div>
    <div class="col-md-1">
        <a href="javascript:" class="btn btn-dcs limpiar">Limpiar</a>
        <p>
    </div>
    <div class="col-md-1">
        <button class="btn btn-dcs buscar">Buscar</button>
        <p>
    </div>
</div>
<div class="row">

    <div class="tabContainter">
        <!-- Nav tabs -->
        <ul class="tabLinks">              
            <li class="active"><a href="#tabDatos">Datos</a></li>
            <li><a href="#tabGrafica">Gráfica</a></li>
            <li><a href="#tabAlarmas">Alarmas</a></li>
            <li><a href="#tabRegistros">Registros Clínicos</a></li>
            <li><a href="#tabImagenes">Imágenes diagnósticas</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tabContenido">
            <!--Tab Datos -->
            <div id="tabDatos" class="tab active">
                <table id="tablee33" class="table tablee3 table-responsive" style="font-size: 12px !important">
                    <thead>
                    <th>Examen</th>
                    <th>Fecha-Registro</th>
                    <th>Variable</th>
                    <th>HL7TAG</th>
                    <th>Lectura</th>
                    <th>Valor Mínimo</th>
                    <th>Valor Máximo</th>
                    <th>Analisis</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div id="tabGrafica" class="tab">

                <div id="graficas"></div>

                <div id="chart_div"></div>
            </div>
            <div id="tabAlarmas" class="tab">
                <table class="table tablee table-responsive" style="font-size: 11px !important">
                    <thead>
                    <th></th>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha Creacion</th>
                    <th>Descripción alarma</th>
                    <th>Nivel</th>
                    <th>Examen</th>
                    <th>Análisis resultado</th>
                    <th>Valor leido</th>
                    <th>Protocolo</th>
                    <th>Estado</th>
                    <th>Fecha atención</th>
                    <th>Observaciones</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div id="tabRegistros" class="tab">
                <!--                <div class="row">
                                    <div class="col-md-3">
                                        <select name="estado" id="estado" class="form-control">
                                            <option value="1">Sin atender</option>
                                            <option value="2">Atendido</option>
                                            <option value="3">Anulado</option>
                                        </select>
                                    </div>
                                </div>-->
                <div class="row">
                    <div class="container">
                        <table class="table table-responsive table3">
                            <thead>
                            <th>Fecha Ingreso</th>
                            <th>Procedimiento</th>
                            <th>Estado</th>
                            <th>Motivos</th>
                            <th>Fecha de atención</th>
                            <th>Medico</th>
                            <th>Informe</th>
                            <th>Imprimir</th>
                            </thead>
                        </table>
                        <p></p>
                        <form action="<?php echo base_url('index.php/ingreso/registro') ?>" method="POST">
                            <input type="hidden" name="cedula" id="cedula_paci">
                            <input type="hidden" name="id_paciente" id="id_paciente">
                            <button class="btn btn-dcs">Nuevo Registro Clinico</button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="tabImagenes" class="tab">
                <div class="container">
                    <table class="table table-responsive table4">
                        <thead>
                        <th>Fecha </th>
                        <th>Descripción</th>
                        <th>Cantidad imágenes</th>
                        <th>Modulo</th>
                        <th>Link</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">

    

    var datosGrafica;

    $('body').delegate('#examen_cod', 'change', function () {
        var url = "<?php echo base_url('index.php/Alarmas_generadas/busqueda_variable') ?>";
        $.post(url, {examen: $(this).val()})
                .done(function (msg) {
                    $('#variable_codigo').html('')
                    var html = '';
                    html += "<option value=''></option>";
                    $.each(msg, function (key, val) {
                        html += "<option value='" + val.variable_codigo + "'>" + val.hl7tag + "</option>";
                    })
                    $('#variable_codigo').html(html)
                })
                .fail(function () {
                    alerta('rojo', 'Error al consultar')
                })

    });
    $("#tablee33").DataTable({  
        "lengthMenu": [[30,40,50], [30,40,50]],  
        order: [[1, "desc"]] 
    });
    google.load("visualization", "1", {packages: ["corechart"]});
    $('.buscar').click(function () {
//        $('.tabLinks a[href="#tabGrafica"]').tab('show')
        $('.tabLinks a[href="#tabGrafica"]').trigger('click')
        var cedula = $('#cedula').val();
        if (cedula == "") {
            alerta('rojo', 'Campo cedula obligatorio');
            return false;
        }
        var cedula = $('#examen_cod').val();

        $('.table').DataTable().rows().remove().draw();



    $('#tablee33').DataTable().destroy();
    $('#tablee33').DataTable({
        "lengthMenu": [[30,40,50], [30,40,50]],
        "bFilter": false,
        "bInfo": false,
        "processing": true,
        "serverSide": true,
        "bSort" : false,
        "ajax": {
            "url": "<?php echo base_url('index.php/Alarmas_generadas/busqueda_cedulaDatos') ?>",
            "type": "POST",
            "data": {
                cedula: $('#cedula').val(),
                examen_cod: $('#examen_cod').val(),
                variable_codigo: $('#variable_codigo').val(),
                f_inicial: $('#f_inicial').val(),
                f_fin: $('#f_fin').val()
            },
        },
        "columns": [
            {
                sortable: false,
                "render": function (data, type, full, meta) {
                    return '<input type="hidden" class="datos_grafica_" value=' + full.id_alarmas_generadas + '  />' + full.examen_nombre;
                }
            },
            {"data": "fecha_creacion"},
            {"data": "descripcion"},
            {"data": "hl7tag"},
            {"data": "lectura_numerica"},
            {"data": "n_repeticiones_minimas"},
            {"data": "n_repeticiones_maximas"},
            {"data": "analisis_resultado"}
        ],
        "drawCallback": function(nRow, aaData, iDataIndex) {
               info = nRow.json.data;
                var html=""
                $.each(info,function(key,val){
                    html+=val.id_alarmas_generadas+","
                })
                grafica_total(html);
            }
    });


    var url = "<?php echo base_url('index.php/Alarmas_generadas/busqueda_cedula') ?>";
    $.post(url, $('#form1').serialize())
            .done(function (msg) {
//                    var datos = JSON.parse(msg);
                $.each(msg[0], function (key, val) {
                    if (val.id_lectura_equipo != '') {
                        var colo = "";
                        if (val.color == '1-Verde') {
                            colo = '<img width="20px" src=" <?php echo base_url('img/verde.png') ?> ">'
                        }
                        if (val.color == '3-Rojo') {
                            colo = '<img width="20px" src=" <?php echo base_url('img/rojo.png') ?> ">'
                        }
                        if (val.color == '2-Amarillo') {
                            colo = '<img width="20px" src=" <?php echo base_url('img/amarillo.png') ?> ">'
                        }

                        $('.tablee').DataTable().row.add([
                            colo,
                            val.cedula_paciente,
                            val.nombres,
                            val.apellidos,
                            val.fecha_creacion,
                            val.t_descrip,
                            val.DES_ALAR,
                            val.examen_nombre,
                            val.analisis_resultado,
                            val.lectura_numerica,
                            val.nombre_procolo,
                            val.estado_id,
                            val.fecha_atencion,
                            val.descrip
                        ]).draw();
                    }
                });



                $.each(msg[1], function (key, val) {
                    $('.table3').DataTable().row.add([
                        val.fecha_ingreso,
                        val.description,
                        val.estado,
                        val.motivo,
                        val.fecha_atencion,
                        val.nombre,
                        '<center><a href="<?php echo base_url('index.php/ingreso/editarRegistro'); ?>?id_registro=' + val.id_cita + '"><i class="fa fa-search"></i></a></center>',
                        '<center><a href="<?php echo base_url('index.php/ingreso/imprimir_informe'); ?>?id_informe=' + val.id_informe + '"  target="_blank"><i class="fa fa-print"></i></a></center>',
                    ]).draw();
                });


                $.each(msg[2], function (key, val) {
                    $('.table4').DataTable().row.add([
                        val.study_datetime,
                        val.study_desc,
                        val.num_instances,
                        val.mods_in_study,
                        "<a target='_black' href='" + msg[3][0]['description'] + '?patientID=' + $('#cedula').val() + '&studyUID=' + val.study_iuid + '&study=' + val.study_iuid + '&serverName=Pacs' + "'>Ver imagen</a>",
                    ]).draw();
                });

//                grafica_total()
            })
            .fail(function () {
                alerta('roja', 'Error al consultar');
            })
    })
            function grafica_total(html) {
//                var html = "";
//                $('.datos_grafica_').each(function (key, val) {
//                    html += $(this).val() + ",";
//                })
$('.tabLinks a[href="#tabGrafica"]').trigger('click')
                $('#id_alarmas').val(html);
                var url = "<?php echo base_url('index.php/Alarmas_generadas/graficas') ?>";
                $.post(url, $('#form1').serialize())
                        .done(function (msg) {
//                                $('select[name=tablee33_length]').val(50).trigger('change');
                            if (msg == 1) {
                                return false;
                            }

                            var data = new google.visualization.DataTable();
                            data.addColumn('string', 'X');
                            $.each(msg[1], function (key, val) {
                                data.addColumn('number', val);
                            })
//                                data.addColumn('number', 'Dogs');
                            data.addRows(msg[0]);

                            var options = {
                                hAxis: {
                                    title: 'Time',
                                    logScale: true,
                                    titleTextStyle: {color: '#FFF'}
                                },
                                vAxis: {
                                    title: 'Popularity',
                                    logScale: false
                                },
                                colors: ['#a52714', '#097138', '#009fe3'],
                                pointSize: 5
                            };

                            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                            chart.draw(data, options);

                        })
                        .fail(function () {
                            alerta('roja', 'Error al consultar');
                        })
            }
    function cl() {
        $('#cedula').trigger('change');
    }
    $('.limpiar').click(function () {
        $('#nombres').html('');
        $('#apellidos').html('');
        $('#f_nacimiento').html('');
        $('#peso').html('');
        $('#estatura').html('');
        $('#foto').attr('src', "");
        $('#id_paciente').val('');
        $('#cedula').val('');
        $('#examen_cod').val('');
        $('#f_inicial').val('');
        $('#f_fin').val('');
    })

    $('#cedula').change(function () {
        $('#variable_codigo').html('');
        $('#cedula_paci').val($(this).val());
        var url = "<?php echo base_url('index.php/Alarmas_generadas/buscar_pacientes') ?>";
        $.post(url, {cedula: $(this).val()})
                .done(function (msg) {
                    var info = JSON.parse(msg);
                    var id_paciente = "";
                    $.each(info, function (key, val) {
                        $('#nombres').html(val.nombres);
                        $('#apellidos').html(val.apellidos);
                        $('#f_nacimiento').html(val.fecha_nacimiento);
                        $('#peso').html(val.peso);
                        $('#estatura').html(val.estatura);
                        $('#foto').attr('src', "<?php echo base_url('uploads/pacientes') ?>/" + val.id_paciente + "/" + val.foto);
                        id_paciente = val.id_paciente;
                        $('#id_paciente').val(id_paciente);

                    });
                    var url = "<?php echo base_url('index.php/Alarmas_generadas/buscar_pacientes_examen') ?>";
                    $.post(url, {id_paciente: id_paciente})
                            .done(function (msg) {
                                $('#datos_examen').html(msg)
                            })
                            .fail(function () {
                                alerta('rojo', 'Error en la consulta')
                            })
                })
                .fail(function () {
                    alerta('rojo', 'Error en la consulta')
                })
    })

</script>