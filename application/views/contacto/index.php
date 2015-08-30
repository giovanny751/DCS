
<h1>Contactos</h1>
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
                        *         Cédula ó NIT                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->documento)?$datos[0]->documento:'' ) ?>" class="form-control obligatorio  " id="documento" name="documento">
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        *         Nombre                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->nombre)?$datos[0]->nombre:'' ) ?>" class="form-control obligatorio  " id="nombre" name="nombre">
                                                <br>
                    </div>

                    </div><div class="row">

                    <div class="col-md-3">
                        *         Estado                    </div>
                    <div class="col-md-3">
                                                <select  class="form-control obligatorio  " id="Estado" name="Estado">
                            <option value=""></option>
                            <option value="Activo" <?php echo (isset($datos[0]->Estado)?(($datos[0]->Estado=='Activo')?'selected="selected"':''):'' ) ?>>Activo</option>
                            <option value="Inactivo" <?php echo (isset($datos[0]->Estado)?(($datos[0]->Estado=='Inactivo')?'selected="selected"':''):'' ) ?>>Inactivo</option>
                        </select>
                                                        <br>
                    </div>

                    

                    <div class="col-md-3">
                        *         Dirección                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->direccion)?$datos[0]->direccion:'' ) ?>" class="form-control obligatorio  " id="direccion" name="direccion">
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        *         Telefono fijo                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->telefono_fijo)?$datos[0]->telefono_fijo:'' ) ?>" class="form-control obligatorio  number" id="telefono_fijo" name="telefono_fijo">
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                                Celular                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->celular)?$datos[0]->celular:'' ) ?>" class="form-control   number" id="celular" name="celular">
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                                Email                    </div>
                    <div class="col-md-3">
                                                <input type="email" value="<?php echo (isset($datos[0]->email)?$datos[0]->email:'' ) ?>" class="form-control   " id="email" name="email">
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                                Parentesco                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->parentesco)?$datos[0]->parentesco:'' ) ?>" class="form-control   " id="parentesco" name="parentesco">
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                                Tiene o no tiene llaves de la casa                    </div>
                    <div class="col-md-3">
                                                <input type="checkbox" value="<?php echo (isset($datos[0]->llaves)?$datos[0]->llaves:'' ) ?>" class="form-control   " id="llaves" name="llaves">
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                                Cuidador                    </div>
                    <div class="col-md-3">
                                                <input type="checkbox" value="<?php echo (isset($datos[0]->cuidador)?$datos[0]->cuidador:'' ) ?>" class="form-control   " id="cuidador" name="cuidador">
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
                <a href="<?php echo base_url('index.php')."/Contacto/consult_contacto" ?>" class="btn btn-success">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
</form>
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
    $('.fecha').datepicker();
</script>
