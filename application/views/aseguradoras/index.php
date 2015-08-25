

<form action="<?php echo base_url('index.php/') . "/Aseguradoras/save_aseguradoras"; ?>" method="post" onsubmit="return campos()">
    <div>
    </div><div class="row">

        <div class="col-md-3">
            *                     Tipo                </div>
        <div class="col-md-3">
            <select class="form-control obligatorio  " id="asegu_tipo" name="asegu_tipo">
                <option value=""></option>
                <option value="EPS/IPS" <?php echo (isset($datos[0]->asegu_tipo) ? (($datos[0]->asegu_tipo=='EPS/IPS')?'selected="selected"':'') : '' ) ?>>EPS/IPS</option>
                <option value="Prepagada" <?php echo (isset($datos[0]->asegu_tipo) ? (($datos[0]->asegu_tipo=='EPS/IPS')?'selected="selected"':'') : '' ) ?>>Prepagada</option>
                <option value="Red de ambulancias" <?php echo (isset($datos[0]->asegu_tipo) ? (($datos[0]->asegu_tipo=='EPS/IPS')?'selected="selected"':'') : '' ) ?>>Red de ambulancias</option>
            </select>
            <br>
        </div>

    </div><div class="row">

        <div class="col-md-3">
            *                     Dirección                </div>
        <div class="col-md-3">
            <input type="text" value="<?php echo (isset($datos[0]->asegu_direccion) ? $datos[0]->asegu_direccion : '' ) ?>" class="form-control obligatorio  " id="asegu_direccion" name="asegu_direccion">
            <br>
        </div>



        <div class="col-md-3">
            *                     Telefono fijo                </div>
        <div class="col-md-3">
            <input type="text" value="<?php echo (isset($datos[0]->asegu_telefono_fijo) ? $datos[0]->asegu_telefono_fijo : '' ) ?>" class="form-control obligatorio  number" id="asegu_telefono_fijo" name="asegu_telefono_fijo">
            <br>
        </div>



        <div class="col-md-3">
            Celular                </div>
        <div class="col-md-3">
            <input type="text" value="<?php echo (isset($datos[0]->asegu_celular) ? $datos[0]->asegu_celular : '' ) ?>" class="form-control   number" id="asegu_celular" name="asegu_celular">
            <br>
        </div>



        <div class="col-md-3">
            Email                </div>
        <div class="col-md-3">
            <input type="email" value="<?php echo (isset($datos[0]->asegu_email) ? $datos[0]->asegu_email : '' ) ?>" class="form-control   " id="asegu_email" name="asegu_email">
            <br>
        </div>

    </div>
    <?php if (isset($post['campo'])) { ?>
        <input type="hidden" name="<?php echo $post['campo'] ?>" value="<?php echo $post[$post['campo']] ?>">
        <input type="hidden" name="campo" value="<?php echo $post['campo'] ?>">
    <?php } ?>
    <div class="row">
        <button class="btn btn-success">Guardar</button> 
        <input class="btn btn-success" type="reset" value="Limpiar">
        <a href="<?php echo base_url('index.php') . "/Aseguradoras/consult_aseguradoras" ?>" class="btn btn-success">Listado </a>
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
    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker();
</script>
