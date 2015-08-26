
<h1>Hospitales</h1>
<form action="<?php echo base_url('index.php/') . "/Hospitales/save_hospitales"; ?>" method="post" onsubmit="return campos()">
    <div class="row">

        <div class="col-md-3">
            <input type="hidden" value="<?php echo (isset($datos[0]->hospital_cod) ? $datos[0]->hospital_cod : '' ) ?>" class="form-control   " id="hospital_cod" name="hospital_cod">
            <br>
        </div>

    </div><div class="row">

        <div class="col-md-3">
            *                     Nombre                </div>
        <div class="col-md-3">
            <input type="text" value="<?php echo (isset($datos[0]->hospital_nombre) ? $datos[0]->hospital_nombre : '' ) ?>" class="form-control obligatorio  " id="hospital_nombre" name="hospital_nombre">
            <br>
        </div>

    </div><div class="row">

        <div class="col-md-3">
            *                     Dirección                </div>
        <div class="col-md-3">
            <input type="text" value="<?php echo (isset($datos[0]->hospital_direccion) ? $datos[0]->hospital_direccion : '' ) ?>" class="form-control obligatorio  " id="hospital_direccion" name="hospital_direccion">
            <br>
        </div>



        <div class="col-md-3">
            *                     Telefono                </div>
        <div class="col-md-3">
            <input type="text" value="<?php echo (isset($datos[0]->hospital_telefono_fijo) ? $datos[0]->hospital_telefono_fijo : '' ) ?>" class="form-control obligatorio  number" id="hospital_telefono_fijo" name="hospital_telefono_fijo">
            <br>
        </div>



        <div class="col-md-3">
            Celular                </div>
        <div class="col-md-3">
            <input type="text" value="<?php echo (isset($datos[0]->hospital_celular) ? $datos[0]->hospital_celular : '' ) ?>" class="form-control   number" id="hospital_celular" name="hospital_celular">
            <br>
        </div>



        <div class="col-md-3">
            Email                </div>
        <div class="col-md-3">
            <input type="email" value="<?php echo (isset($datos[0]->hospital_email) ? $datos[0]->hospital_email : '' ) ?>" class="form-control   " id="hospital_email" name="hospital_email">
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
        <a href="<?php echo base_url('index.php') . "/Hospitales/consult_hospitales" ?>" class="btn btn-success">Listado </a>
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
