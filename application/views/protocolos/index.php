<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>Protocolos
    </h5>
</div>
<div class='well'>
<form action="<?php echo base_url('index.php/')."/Protocolos/save_protocolos"; ?>" method="post" onsubmit="return campos()">

        <div class="row">

                    <div class="col-md-2">
                        <label for="id_protocolo">
                                                            </label>
                    </div>
                    <div class="col-md-2">
                                                <input type="hidden" value="<?php echo (isset($datos[0]->id_protocolo)?$datos[0]->id_protocolo:'' ) ?>" class="form-control   " id="id_protocolo" name="id_protocolo">
                                                <br>
                    </div>

                    </div><div class="row">

                    <div class="col-md-2">
                        <label for="nombre">
                        *         Nombre                            </label>
                    </div>
                    <div class="col-md-2">
                                                <input type="text" value="<?php echo (isset($datos[0]->nombre)?$datos[0]->nombre:'' ) ?>" class="form-control obligatorio  " id="nombre" name="nombre">
                                                <br>
                    </div>

                    

                    <div class="col-md-2">
                        <label for="version">
                        *         Versión                            </label>
                    </div>
                    <div class="col-md-2">
                                                <input type="text" value="<?php echo (isset($datos[0]->version)?$datos[0]->version:'' ) ?>" class="form-control obligatorio  " id="version" name="version">
                                                <br>
                    </div>

                    

                    <div class="col-md-2">
                        <label for="estado">
                        *         Estado                            </label>
                    </div>
                    <div class="col-md-2">
                                                <select  class="form-control obligatorio  " id="estado" name="estado">
                            <option value=""></option>
                            <option value="Activo" <?php echo (isset($datos[0]->estado)?(($datos[0]->estado=='Activo')?'selected="selected"':''):'' ) ?>>Activo</option>
                            <option value="Inactivo" <?php echo (isset($datos[0]->estado)?(($datos[0]->estado=='Inactivo')?'selected="selected"':''):'' ) ?>>Inactivo</option>
                        </select>
                                                        <br>
                    </div>

                    

                    <div class="col-md-2">
                        <label for="descripcion">
                        *         Descripción                            </label>
                    </div>
                    <div class="col-md-10">
                                                <textarea class="form-control obligatorio  " id="descripcion" name="descripcion"><?php echo (isset($datos[0]->descripcion)?$datos[0]->descripcion:'' ) ?></textarea>
                                                <br>
                    </div>

                    

                    <div class="col-md-2">
                        <label for="enviar_sms">
                                Enviar sms                            </label>
                    </div>
                    <div class="col-md-2">
                                                <!--<input type="checkbox" value="<?php echo (isset($datos[0]->enviar_sms)?$datos[0]->enviar_sms:'' ) ?>" class="form-control   " id="enviar_sms" name="enviar_sms">-->
                        <input type="checkbox"  <?php echo (isset($datos[0]->enviar_sms)?(empty($datos[0]->enviar_sms)?'checked="checked"':''):'' ) ?> class="form-control   " value="SI" id="enviar_sms" name="enviar_sms">
                                                <br>
                    </div>

                    

                    <div class="col-md-2">
                        <label for="enviar_email">
                                Enviar email                            </label>
                    </div>
                    <div class="col-md-2">
                                                <!--<input type="checkbox" value="<?php echo (isset($datos[0]->enviar_email)?$datos[0]->enviar_email:'' ) ?>" class="form-control   " id="enviar_email" name="enviar_email">-->
                                                <input type="checkbox" value="SI" <?php echo (isset($datos[0]->enviar_email)?(empty($datos[0]->enviar_email)?'checked="checked"':''):'' ) ?> class="form-control   " id="enviar_email" name="enviar_email">
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
                <a href="<?php echo base_url('index.php')."/Protocolos/consult_protocolos" ?>" class="btn btn-success">Listado </a>
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
    $('.fecha').datepicker({ dateFormat: 'yy-mm-dd' });
</script>
