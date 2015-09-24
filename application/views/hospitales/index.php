<div class="row">
    <span class="tituloH">Ficha Hospital</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
    <form action="<?php echo base_url('index.php/') . "/Hospitales/save_hospitales"; ?>" method="post" onsubmit="return campos()">

        <div class="row">

            <div class="col-md-3">
            </div>
            <div class="col-md-3">
                <input type="hidden" value="<?php echo (isset($datos[0]->codigo_hospital) ? $datos[0]->codigo_hospital : '' ) ?>" class="form-control   " id="codigo_hospital" name="codigo_hospital">
                <br>
            </div>

        </div><div class="row">

            <div class="col-md-3">
                *         Nombre Hospital                  </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->nombre) ? $datos[0]->nombre : '' ) ?>" class="form-control obligatorio  " id="nombre" name="nombre">
                <br>
            </div>



            <div class="col-md-3">
                *         Estado                    </div>
            <div class="col-md-3">
                <select  class="form-control obligatorio  " id="estado" name="estado">
                    <option value=""></option>
                    <option value="Activo" <?php echo (isset($datos[0]->estado) ? (($datos[0]->estado == 'Activo') ? 'selected="selected"' : '') : '' ) ?>>Activo</option>
                    <option value="Inactivo" <?php echo (isset($datos[0]->estado) ? (($datos[0]->estado == 'Inactivo') ? 'selected="selected"' : '') : '' ) ?>>Inactivo</option>
                </select>
                <br>
            </div>



            <div class="col-md-3">
                *         Dirección                    </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->direccion) ? $datos[0]->direccion : '' ) ?>" class="form-control obligatorio  " id="direccion" name="direccion">
                <br>
            </div>



            <div class="col-md-3">
                *         Teléfono fijo                    </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->telefono_fijo) ? $datos[0]->telefono_fijo : '' ) ?>" class="form-control obligatorio  number" id="telefono_fijo" name="telefono_fijo">
                <br>
            </div>



            <div class="col-md-3">
                Celular                    </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->celular) ? $datos[0]->celular : '' ) ?>" class="form-control   number" id="celular" name="celular">
                <br>
            </div>



            <div class="col-md-3">
                Email                    </div>
            <div class="col-md-3">
                <input type="email" value="<?php echo (isset($datos[0]->email) ? $datos[0]->email : '' ) ?>" class="form-control   " id="email" name="email">
                <br>
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
                <a href="<?php echo base_url('index.php') . "/Hospitales/consult_hospitales" ?>" class="btn btn-dcs">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
    </form>
<script>
    $('#nombre').change(function() {
        var nombre = $('#nombre').val();
        var codigo_hospital = $('#codigo_hospital').val();
        $('#boton_cargar').show();
        $('#boton_guardar').hide();
        $.post('<?php echo base_url('index.php/Hospitales/referencia') ?>', {nombre: nombre, codigo_hospital: codigo_hospital})
                .done(function(msg) {
                    if (msg == 0) {
                        alerta('verde', 'Nombre valido')
                    } else {
                        alerta('rojo', 'Nombre no valido')
                        $('#nombre').val('');
                    }
                    $('#boton_cargar').hide();
                    $('#boton_guardar').show();
                })
                .fail(function(msg) {
                    $('#boton_cargar').hide();
                    $('#boton_guardar').show();
                })
    })
    
    function campos() {

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
