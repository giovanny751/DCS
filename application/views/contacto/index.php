

<form action="<?php echo base_url('index.php/')."/Contacto/save_contacto"; ?>" method="post" onsubmit="return campos()">
    <div>
    <div class="row">

                <div class="col-md-3">
                                                        </div>
                <div class="col-md-3">
                    <input type="hidden" value="<?php echo (isset($datos[0]->contacto_id)?$datos[0]->contacto_id:'' ) ?>" class="form-control   " id="contacto_id" name="contacto_id">
                    <br>
                </div>

                </div><div class="row">

                <div class="col-md-3">
                    *                     Documento                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($datos[0]->contacto_documento)?$datos[0]->contacto_documento:'' ) ?>" class="form-control obligatorio  number" id="contacto_documento" name="contacto_documento">
                    <br>
                </div>

                

                <div class="col-md-3">
                    *                     Nombre                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($datos[0]->contacto_nombre)?$datos[0]->contacto_nombre:'' ) ?>" class="form-control obligatorio  " id="contacto_nombre" name="contacto_nombre">
                    <br>
                </div>

                

                <div class="col-md-3">
                    *                     Dirección                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($datos[0]->contacto_direccion)?$datos[0]->contacto_direccion:'' ) ?>" class="form-control obligatorio  " id="contacto_direccion" name="contacto_direccion">
                    <br>
                </div>

                

                <div class="col-md-3">
                    *                     Telefono fijo                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($datos[0]->contacto_telefono_fijo)?$datos[0]->contacto_telefono_fijo:'' ) ?>" class="form-control obligatorio  number" id="contacto_telefono_fijo" name="contacto_telefono_fijo">
                    <br>
                </div>

                

                <div class="col-md-3">
                                        Ccelular                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($datos[0]->contacto_celular)?$datos[0]->contacto_celular:'' ) ?>" class="form-control   " id="contacto_celular" name="contacto_celular">
                    <br>
                </div>

                

                <div class="col-md-3">
                                        Email                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($datos[0]->contacto_email)?$datos[0]->contacto_email:'' ) ?>" class="form-control   " id="contacto_email" name="contacto_email">
                    <br>
                </div>

                

                <div class="col-md-3">
                                        Parentesco                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($datos[0]->contacto_parentesco)?$datos[0]->contacto_parentesco:'' ) ?>" class="form-control   " id="contacto_parentesco" name="contacto_parentesco">
                    <br>
                </div>

                

                <div class="col-md-3">
                                        Tiene o no tiene llaves de la casa                </div>
                <div class="col-md-3">
                    <input type="checkbox" value="<?php echo (isset($datos[0]->contacto_llaves)?$datos[0]->contacto_llaves:'' ) ?>" class="form-control   " id="contacto_llaves" name="contacto_llaves">
                    <br>
                </div>

                

                <div class="col-md-3">
                                        Ciudador                </div>
                <div class="col-md-3">
                    <input type="checkbox" value="<?php echo (isset($datos[0]->contacto_cuidador)?$datos[0]->contacto_cuidador:'' ) ?>" class="form-control   " id="contacto_cuidador" name="contacto_cuidador">
                    <br>
                </div>

                                </div>
        <?php if(isset($post['campo'])){ ?>
        <input type="hidden" name="<?php echo $post['campo']?>" value="<?php echo $post[$post['campo']]?>">
        <input type="hidden" name="campo" value="<?php echo $post['campo']?>">
        <?php } ?>
<div class="row">
        <button class="btn btn-success">Guardar</button> 
        <input class="btn btn-success" type="reset" value="Limpiar">
        <a href="<?php echo base_url('index.php')."/Contacto/consult_contacto" ?>" class="btn btn-success">Listado </a>
</div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
</form>
<script>
    function campos() {
        if (obligatorio('obligatorio') == false) {
            return false
        } else {
            return true;
        }
    }
    $('body').delegate('.number', 'keypress', function(tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker();
</script>
