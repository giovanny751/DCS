<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Alarmas Generadas    </h5>
</div>


<div class='well'>
    <form action="<?php echo base_url('index.php/') . "/Alarmas_generadas/save_alarmas_generadas"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
            <?php $id = (isset($datos[0]->id_alarmas_generadas) ? $datos[0]->id_alarmas_generadas : '' ) ?>
            <input type="hidden" value="<?php echo (isset($datos[0]->id_alarmas_generadas) ? $datos[0]->id_alarmas_generadas : '' ) ?>" class=" form-control   " id="id_alarmas_generadas" name="id_alarmas_generadas">


            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="id_niveles_alarma">
                            Cedula </label>
                    </div>
                    <div class="col-md-5">
                        <?php echo $datos[0]->cedula_paciente ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="descripcion">
                            Nombre</label>
                    </div>
                    <div class="col-md-5">
                        <?php echo $datos[0]->nombres ?>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="descripcion">
                            Apellido</label>
                    </div>
                    <div class="col-md-5">
                        <?php echo $datos[0]->apellidos ?>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="descripcion">
                            Fecha Nacimiento</label>
                    </div>
                    <div class="col-md-5">
                        <?php echo $datos[0]->fecha_nacimiento ?>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="descripcion">
                            Peso (Kg)</label>
                    </div>
                    <div class="col-md-5">
                        <?php echo $datos[0]->peso ?>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="descripcion">
                            Estatura</label>
                    </div>
                    <div class="col-md-5">
                        <?php echo $datos[0]->estatura ?>
                        <br>
                    </div>
                </div>


            </div>
            <div class="col-md-5">
                            <?php if (!empty($id) && $datos[0]->foto != '') { ?>
                                <img style="width: 300px;float: right;" src="<?php echo base_url('uploads') ?>/pacientes/<?php echo $datos[0]->id_paciente . "/" . $datos[0]->foto ?>">
                            <?php } ?>
                        
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <th style="width: 60%">Protocolo <?php echo $datos[0]->nombre_procolo; ?></th>
                    <th>Observaciones</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $datos[0]->descripcion_protocolo; ?>
                            </td>
                            <td>
                                <textarea name="descripcion" style="width: 100%;height: 100%"><?php echo $datos[0]->descripcion ?></textarea>
                                <input type="hidden" name="fecha_atencion" value="<?php echo date('Y-m-d H:i:s') ?>">
                                <input type="hidden" name="estado_id" value="Atendida">
                            </td>
                        </tr>
                    </tbody>
                </table>
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
                <a href="<?php echo base_url('index.php') . "/Alarmas_generadas/consult_alarmas_generadas" ?>" class="btn btn-dcs">Listado </a>
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
    $('.fecha').datepicker({dateFormat: 'yy-mm-dd'});


</script>
