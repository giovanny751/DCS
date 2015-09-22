<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Lectura Equipo    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/')."/Lectura_equipo/save_lectura_equipo"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
                                    <?php $id=(isset($datos[0]->id_lectura_equipo)?$datos[0]->id_lectura_equipo:'' ) ?>
                                                <input type="hidden" value="<?php echo (isset($datos[0]->id_lectura_equipo)?$datos[0]->id_lectura_equipo:'' ) ?>" class=" form-control obligatorio  " id="id_lectura_equipo" name="id_lectura_equipo">
                    

                    <div class="col-md-3">
                        <label for="id_paciente">
                            *                             Paciente                        </label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("id_paciente", "id_paciente", "form-control obligatorio", "pacientes", "id_paciente", "nombres", (isset($datos[0]->id_paciente)?$datos[0]->id_paciente:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="id_equipo">
                            *                             Equipo                        </label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("id_equipo", "id_equipo", "form-control obligatorio", "equipos", "id_equipo", "descripcion", (isset($datos[0]->id_equipo)?$datos[0]->id_equipo:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="variable_codigo">
                            *                             variable_codigo                        </label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("variable_codigo", "variable_codigo", "form-control obligatorio", "variables", "variable_codigo", "hl7tag", (isset($datos[0]->variable_codigo)?$datos[0]->variable_codigo:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="lectura_numerica">
                            *                             lectura_numerica                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->lectura_numerica)?$datos[0]->lectura_numerica:'' ) ?>" class=" form-control obligatorio  number" id="lectura_numerica" name="lectura_numerica">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="lectura_texto">
                                                        lectura_texto                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->lectura_texto)?$datos[0]->lectura_texto:'' ) ?>" class=" form-control   " id="lectura_texto" name="lectura_texto">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="serial_equipo">
                            *                             serial_equipo                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->serial_equipo)?$datos[0]->serial_equipo:'' ) ?>" class=" form-control obligatorio  " id="serial_equipo" name="serial_equipo">

                            
                                                <br>
                    </div>

                            </div>
        <?php if(isset($post['campo'])){ ?>
        <input type="hidden" name="<?php echo $post['campo']?>" value="<?php echo $post[$post['campo']]?>">
        <input type="hidden" name="campo" value="<?php echo $post['campo']?>">
        <?php } ?>
        <div class="row">
            <span id="boton_guardar">
                <button class="btn btn-success" >Guardar</button> 
                <input class="btn btn-success" type="reset" value="Limpiar">
                <a href="<?php echo base_url('index.php')."/Lectura_equipo/consult_lectura_equipo" ?>" class="btn btn-success">Listado </a>
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
