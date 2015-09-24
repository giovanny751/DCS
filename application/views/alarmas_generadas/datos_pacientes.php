<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Datos Paciente   </h5>
</div>
<div class='well'>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    Cédula
                </div>    
                <div class="col-md-4">
                    <script>
                        $('document').ready(function() {
                            $('#cedula').autocomplete({
                                source: "<?php echo base_url("index.php//Pacientes/autocomplete_cedula_paciente") ?>",
                                minLength: 3
                            });
                        });
                    </script>
                    <input type="text" name="cedula" id="cedula" autocomplete="false">
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
                <img style="width: 200px;float: center;" src="<?php echo base_url('uploads/anonimo.jpg'); ?>" id="foto">
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
                <input type="text" name="f_inicial" id="f_inicial" class="fecha">
            </div>
            <div class="col-md-2">
                Fecha Final
            </div>    
            <div class="col-md-2">
                <input type="text" name="f_fin" id="f_fin" class="fecha">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1">
            <a href="<?php echo base_url('index.php/pacientes'); ?>">
        </div>
        <div class="col-md-1">
            <input type="reset" class="btn btn-dcs" value="Limpiar">
            <p>
        </div>
        <div class="col-md-1">
            <button class="btn btn-dcs">Buscar</button>
            <p>
        </div>
    </div>
    <div class="row">
        <table class="table">
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
</div>

<script>
    $('#cedula').change(function() {
        var url = "<?php echo base_url('index.php/Alarmas_generadas/buscar_pacientes') ?>";
        $.post(url, {cedula: $(this).val()})
                .done(function(msg) {
                    var info = JSON.parse(msg);
                    var id_paciente = "";
                    $.each(info, function(key, val) {
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
                            .done(function(msg) {
                                $('#datos_examen').html(msg)
                            })
                            .fail(function() {
                                alerta('rojo', 'Error en la consulta')
                            })
                })
                .fail(function() {
                    alerta('rojo', 'Error en la consulta')
                })
    })
</script>