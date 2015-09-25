
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
                Fecha Inicial
            </div>    
            <div class="col-md-2">
                <input type="text" name="f_inicial" id="f_inicial" class="fecha form-control">
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
        <input type="reset" class="btn btn-dcs" value="Limpiar">
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
        </ul>
        <!-- Tab panes -->
        <div class="tabContenido">
            <!--Tab Datos -->
            <div id="tabDatos" class="tab active">
                <table class="table" id="tablee">
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
                Este tab es de Alarmas
            </div>
        </div>
    </div>

</div>

<script>
// Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages': ['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.


    function drawChart() {
        var jsonData = $.ajax({
            url: "<?php echo base_url('index.php/Alarmas_generadas/graficas') ?>",
            dataType: "json",
            async: false
        }).responseText;

        // Create our data table out of JSON data loaded from server.
//        var data = new google.visualization.DataTable(jsonData);

        // Instantiate and draw our chart, passing in some options.

    }



    $('.buscar').click(function () {
        var cedula = $('#cedula').val();
        if (cedula == "") {
            alerta('rojo', 'Campo cedula obligatorio');
            return false;
        }
        $('.table').DataTable().rows().remove().draw();
        var url = "<?php echo base_url('index.php/Alarmas_generadas/busqueda_cedula') ?>";
        $.post(url, $('#form1').serialize())
                .done(function (msg) {
                    var datos = JSON.parse(msg);
                    $.each(datos, function (key, val) {
                        $('.table').DataTable().row.add([
                            val.examen_nombre,
                            val.fecha_creacion,
                            val.descripcion,
                            val.hl7tag,
                            val.lectura_numerica,
                            val.n_repeticiones_minimas,
                            val.n_repeticiones_maximas,
                            val.analisis_resultado
                        ]).draw();
                    });
                    var url = "<?php echo base_url('index.php/Alarmas_generadas/graficas') ?>";
                    $.post(url,  $('#form1').serialize())
                            .done(function (msg) {
                                var data = new google.visualization.DataTable(msg);
                                var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                                chart.draw(data, {width: 800, height: 400});
                            })
                            .fail(function () {
                                alerta('roja', 'Error al consultar');
                            })
                })
                .fail(function () {
                    alerta('roja', 'Error al consultar');
                })
    })

    $('#cedula').change(function () {
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