<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> MEDICIÓN A BORDO Y EN CABECERA SUPERVISOR DE OPERACIÓN    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/')."/Medicion_operaciones/save_medicion_operaciones"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
                                    <?php $id=(isset($datos[0]->IdMedicionOperaciones)?$datos[0]->IdMedicionOperaciones:'' ) ?>
                                                <input type="hidden" value="<?php echo (isset($datos[0]->IdMedicionOperaciones)?$datos[0]->IdMedicionOperaciones:'' ) ?>" class=" form-control   " id="IdMedicionOperaciones" name="IdMedicionOperaciones">
                    

                    <div class="col-md-3">
                        <label for="Supervisor">
                            *                             Nombre Supervisor                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->Supervisor)?$datos[0]->Supervisor:'' ) ?>" class=" form-control obligatorio  " id="Supervisor" name="Supervisor">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="FechaInicio">
                            *                             Fecha Inicio                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->FechaInicio)?$datos[0]->FechaInicio:'' ) ?>" class=" form-control obligatorio fecha hasDatepicker " id="FechaInicio" name="FechaInicio">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="FechaFin">
                            *                             Fecha Fin                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->FechaFin)?$datos[0]->FechaFin:'' ) ?>" class=" form-control obligatorio fecha hasDatepicker " id="FechaFin" name="FechaFin">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="Ruta">
                            *                             Ruta                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->Ruta)?$datos[0]->Ruta:'' ) ?>" class=" form-control obligatorio  " id="Ruta" name="Ruta">

                            
                                                <br>
                    </div>

                                            <input type="hidden" value="<?php echo (isset($datos[0]->IdBus)?$datos[0]->IdBus:'' ) ?>" class=" form-control   " id="IdBus" name="IdBus">
                    

                    <div class="col-md-3">
                        <label for="IdEmpresa">
                            *                             Concesionario                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->IdEmpresa)?$datos[0]->IdEmpresa:'' ) ?>" class=" form-control obligatorio  " id="IdEmpresa" name="IdEmpresa">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="CodigoBus">
                            *                             Movil                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->CodigoBus)?$datos[0]->CodigoBus:'' ) ?>" class=" form-control obligatorio  " id="CodigoBus" name="CodigoBus">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="TipoMedicion">
                            *                             Tipo Medicion                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->TipoMedicion)?$datos[0]->TipoMedicion:'' ) ?>" class=" form-control obligatorio  " id="TipoMedicion" name="TipoMedicion">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="VerificarRuteros">
                            *                             Verifica rRuteros                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->VerificarRuteros)?$datos[0]->VerificarRuteros:'' ) ?>" class=" form-control obligatorio  " id="VerificarRuteros" name="VerificarRuteros">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="Aproximacion">
                            *                             Aproximación                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->Aproximacion)?$datos[0]->Aproximacion:'' ) ?>" class=" form-control obligatorio  " id="Aproximacion" name="Aproximacion">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="CinturonSeguridad">
                            *                             Cinturon Seguridad                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->CinturonSeguridad)?$datos[0]->CinturonSeguridad:'' ) ?>" class=" form-control obligatorio  " id="CinturonSeguridad" name="CinturonSeguridad">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="InformadoresVisuales">
                            *                             Informadores Visuales                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->InformadoresVisuales)?$datos[0]->InformadoresVisuales:'' ) ?>" class=" form-control obligatorio  " id="InformadoresVisuales" name="InformadoresVisuales">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="InformadoresAuditivos">
                            *                             Informadores Auditivos                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->InformadoresAuditivos)?$datos[0]->InformadoresAuditivos:'' ) ?>" class=" form-control obligatorio  " id="InformadoresAuditivos" name="InformadoresAuditivos">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="AvisoAuditivoPuertas">
                            *                             Aviso Auditivo Puertas                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->AvisoAuditivoPuertas)?$datos[0]->AvisoAuditivoPuertas:'' ) ?>" class=" form-control obligatorio  " id="AvisoAuditivoPuertas" name="AvisoAuditivoPuertas">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="Extintores">
                            *                             Extintores                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->Extintores)?$datos[0]->Extintores:'' ) ?>" class=" form-control obligatorio  " id="Extintores" name="Extintores">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="ManejoOperador">
                            *                             Manejo Operador                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->ManejoOperador)?$datos[0]->ManejoOperador:'' ) ?>" class=" form-control obligatorio  " id="ManejoOperador" name="ManejoOperador">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="SenalesEmergencia">
                            *                             Senales Emergencia                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->SenalesEmergencia)?$datos[0]->SenalesEmergencia:'' ) ?>" class=" form-control obligatorio  " id="SenalesEmergencia" name="SenalesEmergencia">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="ParadasProgramadas">
                            *                             Paradas Programadas                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->ParadasProgramadas)?$datos[0]->ParadasProgramadas:'' ) ?>" class=" form-control obligatorio  " id="ParadasProgramadas" name="ParadasProgramadas">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="UsoDotacion">
                            *                             Uso Dotacion                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->UsoDotacion)?$datos[0]->UsoDotacion:'' ) ?>" class=" form-control obligatorio  " id="UsoDotacion" name="UsoDotacion">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="UsoEPP">
                            *                             Uso EPP                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->UsoEPP)?$datos[0]->UsoEPP:'' ) ?>" class=" form-control obligatorio  " id="UsoEPP" name="UsoEPP">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="ARLOperador">
                            *                             ARL Operador                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->ARLOperador)?$datos[0]->ARLOperador:'' ) ?>" class=" form-control obligatorio  " id="ARLOperador" name="ARLOperador">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="CarneOperador">
                            *                             Carne Operador                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->CarneOperador)?$datos[0]->CarneOperador:'' ) ?>" class=" form-control obligatorio  " id="CarneOperador" name="CarneOperador">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="CarneCodigoOperador">
                            *                             Carne Codigo Operador                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->CarneCodigoOperador)?$datos[0]->CarneCodigoOperador:'' ) ?>" class=" form-control obligatorio  " id="CarneCodigoOperador" name="CarneCodigoOperador">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="LicenciaConduccion">
                            *                             Licencia Conduccion                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->LicenciaConduccion)?$datos[0]->LicenciaConduccion:'' ) ?>" class=" form-control obligatorio  " id="LicenciaConduccion" name="LicenciaConduccion">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="DocumentacionVehiculo">
                            *                             Documentacion Vehiculo                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->DocumentacionVehiculo)?$datos[0]->DocumentacionVehiculo:'' ) ?>" class=" form-control obligatorio  " id="DocumentacionVehiculo" name="DocumentacionVehiculo">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="FechaVencimientoBotiquin">
                            *                             FechaVencimiento Botiquin                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->FechaVencimientoBotiquin)?$datos[0]->FechaVencimientoBotiquin:'' ) ?>" class=" form-control obligatorio  " id="FechaVencimientoBotiquin" name="FechaVencimientoBotiquin">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="FechaVencimientoExtintor">
                            *                             FechaVencimiento Extintor                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->FechaVencimientoExtintor)?$datos[0]->FechaVencimientoExtintor:'' ) ?>" class=" form-control obligatorio  " id="FechaVencimientoExtintor" name="FechaVencimientoExtintor">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="PlataformaDiscapacitados">
                            *                             Plataforma Discapacitados                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->PlataformaDiscapacitados)?$datos[0]->PlataformaDiscapacitados:'' ) ?>" class=" form-control obligatorio  " id="PlataformaDiscapacitados" name="PlataformaDiscapacitados">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="Pito">
                            *                             Pito                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->Pito)?$datos[0]->Pito:'' ) ?>" class=" form-control obligatorio  " id="Pito" name="Pito">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="PitoReversa">
                            *                             Pito Reversa                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->PitoReversa)?$datos[0]->PitoReversa:'' ) ?>" class=" form-control obligatorio  " id="PitoReversa" name="PitoReversa">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="InspeccionGeneralVehiculo">
                            *                             Inspeccion General Vehiculo                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->InspeccionGeneralVehiculo)?$datos[0]->InspeccionGeneralVehiculo:'' ) ?>" class=" form-control obligatorio  " id="InspeccionGeneralVehiculo" name="InspeccionGeneralVehiculo">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="ValidarCodigoOperador">
                            *                             Validar Codigo Operador                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="radio" value="<?php echo (isset($datos[0]->ValidarCodigoOperador)?$datos[0]->ValidarCodigoOperador:'' ) ?>" class=" form-control obligatorio  " id="ValidarCodigoOperador" name="ValidarCodigoOperador">

                            
                                                <br>
                    </div>

                                            <input type="hidden" value="<?php echo (isset($datos[0]->IdUsuarioRegistro)?$datos[0]->IdUsuarioRegistro:'' ) ?>" class=" form-control obligatorio  " id="IdUsuarioRegistro" name="IdUsuarioRegistro">
                            </div>
        <?php if(isset($post['campo'])){ ?>
        <input type="hidden" name="<?php echo $post['campo']?>" value="<?php echo $post[$post['campo']]?>">
        <input type="hidden" name="campo" value="<?php echo $post['campo']?>">
        <?php } ?>
        <div class="row">
            <span id="boton_guardar">
                <button class="btn btn-dcs" >Guardar</button> 
                <input class="btn btn-dcs" type="reset" value="Limpiar">
                <a href="<?php echo base_url('index.php')."/Medicion_operaciones/consult_medicion_operaciones" ?>" class="btn btn-dcs">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
    </form>
</div>
<script>
    function campos() {
        $('input[type="file"]').each(function(key, val) {
            var img = $(this).val();
            if (img != "") {
                var r = (img.indexOf('jpg') != -1) ? '' : ((img.indexOf('png') != -1) ? '' : ((img.indexOf('gif') != -1) ? '' : false))
                if (r === false) {
                    alert('Tipo de archivo no valido');
                    return false;
                }
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
    $('body').delegate('.number', 'keypress', function(tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({ dateFormat: 'yy-mm-dd' });


</script>
