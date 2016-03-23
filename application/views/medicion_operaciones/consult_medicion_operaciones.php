<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> MEDICIÓN A BORDO Y EN CABECERA SUPERVISOR DE OPERACIÓN    </h5>
</div>
<div class='well'>
<form action="<?php echo base_url('index.php/').'/Medicion_operaciones/consult_medicion_operaciones'; ?>" method="post" >
    <div class="row">
                    <div class="col-md-3">
                    <label for="IdMedicionOperaciones">
                                            </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="hidden" value="<?php echo (isset($post['IdMedicionOperaciones'])?$post['IdMedicionOperaciones']:'' ) ?>" class="form-control   " id="IdMedicionOperaciones" name="IdMedicionOperaciones">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="Supervisor">
                    Nombre Supervisor                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['Supervisor'])?$post['Supervisor']:'' ) ?>" class="form-control obligatorio  " id="Supervisor" name="Supervisor">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="FechaInicio">
                    Fecha Inicio                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['FechaInicio'])?$post['FechaInicio']:'' ) ?>" class="form-control obligatorio fecha hasDatepicker " id="FechaInicio" name="FechaInicio">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="FechaFin">
                    Fecha Fin                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['FechaFin'])?$post['FechaFin']:'' ) ?>" class="form-control obligatorio fecha hasDatepicker " id="FechaFin" name="FechaFin">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="Ruta">
                    Ruta                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['Ruta'])?$post['Ruta']:'' ) ?>" class="form-control obligatorio  " id="Ruta" name="Ruta">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="IdBus">
                    IdBus                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="hidden" value="<?php echo (isset($post['IdBus'])?$post['IdBus']:'' ) ?>" class="form-control   " id="IdBus" name="IdBus">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="IdEmpresa">
                    Concesionario                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['IdEmpresa'])?$post['IdEmpresa']:'' ) ?>" class="form-control obligatorio  " id="IdEmpresa" name="IdEmpresa">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="CodigoBus">
                    Movil                        </label>
                </div>
                <div class="col-md-3">
                    
                                        <script>
                        $('document').ready(function() {
                            $('#CodigoBus').autocomplete({
                                source: "<?php echo base_url("index.php//Medicion_operaciones/autocomplete_CodigoBus") ?>",
                                minLength: 3
                            });
                        });
                    </script>
                                            <input type="text" value="<?php echo (isset($post['CodigoBus'])?$post['CodigoBus']:'' ) ?>" class="form-control obligatorio  " id="CodigoBus" name="CodigoBus">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="TipoMedicion">
                    Tipo Medicion                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['TipoMedicion'])?$post['TipoMedicion']:'' ) ?>" class="form-control obligatorio  " id="TipoMedicion" name="TipoMedicion">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="VerificarRuteros">
                    Verifica rRuteros                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['VerificarRuteros'])?$post['VerificarRuteros']:'' ) ?>" class="form-control obligatorio  " id="VerificarRuteros" name="VerificarRuteros">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="Aproximacion">
                    Aproximación                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['Aproximacion'])?$post['Aproximacion']:'' ) ?>" class="form-control obligatorio  " id="Aproximacion" name="Aproximacion">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="CinturonSeguridad">
                    Cinturon Seguridad                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['CinturonSeguridad'])?$post['CinturonSeguridad']:'' ) ?>" class="form-control obligatorio  " id="CinturonSeguridad" name="CinturonSeguridad">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="InformadoresVisuales">
                    Informadores Visuales                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['InformadoresVisuales'])?$post['InformadoresVisuales']:'' ) ?>" class="form-control obligatorio  " id="InformadoresVisuales" name="InformadoresVisuales">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="InformadoresAuditivos">
                    Informadores Auditivos                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['InformadoresAuditivos'])?$post['InformadoresAuditivos']:'' ) ?>" class="form-control obligatorio  " id="InformadoresAuditivos" name="InformadoresAuditivos">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="AvisoAuditivoPuertas">
                    Aviso Auditivo Puertas                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['AvisoAuditivoPuertas'])?$post['AvisoAuditivoPuertas']:'' ) ?>" class="form-control obligatorio  " id="AvisoAuditivoPuertas" name="AvisoAuditivoPuertas">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="Extintores">
                    Extintores                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['Extintores'])?$post['Extintores']:'' ) ?>" class="form-control obligatorio  " id="Extintores" name="Extintores">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="ManejoOperador">
                    Manejo Operador                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['ManejoOperador'])?$post['ManejoOperador']:'' ) ?>" class="form-control obligatorio  " id="ManejoOperador" name="ManejoOperador">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="SenalesEmergencia">
                    Senales Emergencia                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['SenalesEmergencia'])?$post['SenalesEmergencia']:'' ) ?>" class="form-control obligatorio  " id="SenalesEmergencia" name="SenalesEmergencia">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="ParadasProgramadas">
                    Paradas Programadas                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['ParadasProgramadas'])?$post['ParadasProgramadas']:'' ) ?>" class="form-control obligatorio  " id="ParadasProgramadas" name="ParadasProgramadas">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="UsoDotacion">
                    Uso Dotacion                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['UsoDotacion'])?$post['UsoDotacion']:'' ) ?>" class="form-control obligatorio  " id="UsoDotacion" name="UsoDotacion">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="UsoEPP">
                    Uso EPP                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['UsoEPP'])?$post['UsoEPP']:'' ) ?>" class="form-control obligatorio  " id="UsoEPP" name="UsoEPP">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="ARLOperador">
                    ARL Operador                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['ARLOperador'])?$post['ARLOperador']:'' ) ?>" class="form-control obligatorio  " id="ARLOperador" name="ARLOperador">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="CarneOperador">
                    Carne Operador                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['CarneOperador'])?$post['CarneOperador']:'' ) ?>" class="form-control obligatorio  " id="CarneOperador" name="CarneOperador">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="CarneCodigoOperador">
                    Carne Codigo Operador                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['CarneCodigoOperador'])?$post['CarneCodigoOperador']:'' ) ?>" class="form-control obligatorio  " id="CarneCodigoOperador" name="CarneCodigoOperador">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="LicenciaConduccion">
                    Licencia Conduccion                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['LicenciaConduccion'])?$post['LicenciaConduccion']:'' ) ?>" class="form-control obligatorio  " id="LicenciaConduccion" name="LicenciaConduccion">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="DocumentacionVehiculo">
                    Documentacion Vehiculo                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['DocumentacionVehiculo'])?$post['DocumentacionVehiculo']:'' ) ?>" class="form-control obligatorio  " id="DocumentacionVehiculo" name="DocumentacionVehiculo">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="FechaVencimientoBotiquin">
                    FechaVencimiento Botiquin                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['FechaVencimientoBotiquin'])?$post['FechaVencimientoBotiquin']:'' ) ?>" class="form-control obligatorio  " id="FechaVencimientoBotiquin" name="FechaVencimientoBotiquin">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="FechaVencimientoExtintor">
                    FechaVencimiento Extintor                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['FechaVencimientoExtintor'])?$post['FechaVencimientoExtintor']:'' ) ?>" class="form-control obligatorio  " id="FechaVencimientoExtintor" name="FechaVencimientoExtintor">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="PlataformaDiscapacitados">
                    Plataforma Discapacitados                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['PlataformaDiscapacitados'])?$post['PlataformaDiscapacitados']:'' ) ?>" class="form-control obligatorio  " id="PlataformaDiscapacitados" name="PlataformaDiscapacitados">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="Pito">
                    Pito                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['Pito'])?$post['Pito']:'' ) ?>" class="form-control obligatorio  " id="Pito" name="Pito">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="PitoReversa">
                    Pito Reversa                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['PitoReversa'])?$post['PitoReversa']:'' ) ?>" class="form-control obligatorio  " id="PitoReversa" name="PitoReversa">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="InspeccionGeneralVehiculo">
                    Inspeccion General Vehiculo                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['InspeccionGeneralVehiculo'])?$post['InspeccionGeneralVehiculo']:'' ) ?>" class="form-control obligatorio  " id="InspeccionGeneralVehiculo" name="InspeccionGeneralVehiculo">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="ValidarCodigoOperador">
                    Validar Codigo Operador                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="radio" value="<?php echo (isset($post['ValidarCodigoOperador'])?$post['ValidarCodigoOperador']:'' ) ?>" class="form-control obligatorio  " id="ValidarCodigoOperador" name="ValidarCodigoOperador">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="IdUsuarioRegistro">
                    IdUsuarioRegistro                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="hidden" value="<?php echo (isset($post['IdUsuarioRegistro'])?$post['IdUsuarioRegistro']:'' ) ?>" class="form-control obligatorio  " id="IdUsuarioRegistro" name="IdUsuarioRegistro">
                                            <br>
                </div>

                </div>
    <button class="btn btn-dcs">Consultar</button>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                                    <th></th>
                                    <th>Nombre Supervisor</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Ruta</th>
                                    <th>IdBus</th>
                                    <th>Concesionario</th>
                                    <th>Movil</th>
                                    <th>Tipo Medicion</th>
                                    <th>Verifica rRuteros</th>
                                    <th>Aproximación</th>
                                    <th>Cinturon Seguridad</th>
                                    <th>Informadores Visuales</th>
                                    <th>Informadores Auditivos</th>
                                    <th>Aviso Auditivo Puertas</th>
                                    <th>Extintores</th>
                                    <th>Manejo Operador</th>
                                    <th>Senales Emergencia</th>
                                    <th>Paradas Programadas</th>
                                    <th>Uso Dotacion</th>
                                    <th>Uso EPP</th>
                                    <th>ARL Operador</th>
                                    <th>Carne Operador</th>
                                    <th>Carne Codigo Operador</th>
                                    <th>Licencia Conduccion</th>
                                    <th>Documentacion Vehiculo</th>
                                    <th>FechaVencimiento Botiquin</th>
                                    <th>FechaVencimiento Extintor</th>
                                    <th>Plataforma Discapacitados</th>
                                    <th>Pito</th>
                                    <th>Pito Reversa</th>
                                    <th>Inspeccion General Vehiculo</th>
                                    <th>Validar Codigo Operador</th>
                                    <th>IdUsuarioRegistro</th>
                            <th>Acción</th>
            </thead>
            <tbody>
                <?php
                foreach ($datos as $key => $value) {
                echo "<tr>";
                    $i=0;

                    foreach ($value as $key2 => $value2) {
                    echo "<td>".$value->$key2."</td>";
                    if($i==0){
                    $campo=$key2;
                    $valor="'".$value->$key2."'";
                    }
                    $i++;
                    }
                    echo "<td>"
                        . '<a href="javascript:" class="btn btn-dcs" onclick="editar('.$valor.')"><i class="fa fa-pencil"></i></a>'
                        . '<a href="javascript:" class="btn btn-danger" onclick="delete_('.$valor.')"><i class="fa fa-trash-o"></i></a>'
                        . "</td>";
                    echo "</tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-12" style="float:right">
        <a href="<?php echo base_url()."/index.php/Medicion_operaciones/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<?php  if(isset($campo)){ ?>
<form action="<?php echo base_url('index.php/')."/Medicion_operaciones/edit_medicion_operaciones"; ?>" method="post" id="editar">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<form action="<?php echo base_url('index.php/')."/Medicion_operaciones/delete_medicion_operaciones"; ?>" method="post" id="delete">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>3">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<?php } ?>
<script>
    function editar(num) {
        $('#<?php echo $campo ?>2').val(num);
        $('#editar').submit();
    }
    function delete_(num) {
        var r=confirm('Confirma que desea eliminar el registro');
        if(r==false){
            return false;
        }
        $('#<?php echo $campo ?>3').val(num);
        $('#delete').submit();
    }

    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({
        rtl: Metronic.isRTL(),
        autoclose: true
    });
</script>
