<div class="row">
    <span class="tituloH">Medicos</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
    <form action="<?php echo base_url('index.php/') . "/Medicos/save_medicos"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
            <?php $id = (isset($datos[0]->medico_codigo) ? $datos[0]->medico_codigo : '' ) ?>


            <div class="col-md-3">
                <label for="medico_codigo">
                </label>
            </div>
            <div class="col-md-3">
                <input type="hidden" value="<?php echo (isset($datos[0]->medico_codigo) ? $datos[0]->medico_codigo : '' ) ?>" class=" form-control   " id="medico_codigo" name="medico_codigo">
            </div>

        </div>
        <div class="row">

            <div class="col-md-3">
                <label for="nombre">
                    *                             Nombre                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->nombre) ? $datos[0]->nombre : '' ) ?>" class=" form-control obligatorio  " id="nombre" name="nombre">
            </div>
            <div class="col-md-3">
                <label for="Estado">
                    *                             Estado                        </label>
            </div>
            <div class="col-md-3">
                <select  class="form-control obligatorio  " id="Estado" name="Estado">
                    <option value=""></option>
                    <option value="Activo" <?php echo (isset($datos[0]->Estado) ? (($datos[0]->Estado == 'Activo') ? 'selected="selected"' : '') : '' ) ?>>Activo</option>
                    <option value="Inactivo" <?php echo (isset($datos[0]->Estado) ? (($datos[0]->Estado == 'Inactivo') ? 'selected="selected"' : '') : '' ) ?>>Inactivo</option>
                </select>
            </div>

        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="matricula_profesional">
                    *                             Matrícula profesional                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->matricula_profesional) ? $datos[0]->matricula_profesional : '' ) ?>" class=" form-control obligatorio  " id="matricula_profesional" name="matricula_profesional">
            </div>
            <div class="col-md-3">
                <label for="direccion">
                    *                             Dirección                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->direccion) ? $datos[0]->direccion : '' ) ?>" class=" form-control obligatorio  " id="direccion" name="direccion">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="telefono_fijo">
                    *                             Teléfono fijo                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->telefono_fijo) ? $datos[0]->telefono_fijo : '' ) ?>" class=" form-control obligatorio  number" id="telefono_fijo" name="telefono_fijo">
            </div>



            <div class="col-md-3">
                <label for="celular">
                    Celular                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->celular) ? $datos[0]->celular : '' ) ?>" class=" form-control   number" id="celular" name="celular">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="email">
                    Email                        </label>
            </div>
            <div class="col-md-3">
                <input type="email" value="<?php echo (isset($datos[0]->email) ? $datos[0]->email : '' ) ?>" class=" form-control   " id="email" name="email">
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
                <a href="<?php echo base_url('index.php') . "/Medicos/consult_medicos" ?>" class="btn btn-dcs">Listado </a>
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
        var medico_codigo = $('#medico_codigo').val();
        $('#boton_cargar').show();
        $('#boton_guardar').hide();
        $.post('<?php echo base_url('index.php/Medicos/referencia') ?>', {nombre: nombre, medico_codigo: medico_codigo})
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
    $('#matricula_profesional').change(function() {
        var matricula_profesional = $('#matricula_profesional').val();
        var medico_codigo = $('#medico_codigo').val();
        $('#boton_cargar').show();
        $('#boton_guardar').hide();
        $.post('<?php echo base_url('index.php/Medicos/referencia2') ?>', {matricula_profesional: matricula_profesional, medico_codigo: medico_codigo})
                .done(function(msg) {
                    if (msg == 0) {
                        alerta('verde', 'Matricula valido')
                    } else {
                        alerta('rojo', 'Matricula no valido')
                        $('#matricula_profesional').val('');
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
        $('input[type="file"]').each(function (key, val) {
            var img = $(this).val();
            var r = (img.indexOf('jpg') != -1) ? '' : ((img.indexOf('png') != -1) ? '' : ((img.indexOf('gif') != -1) ? '' : false))
            if (r === false) {
                alert('Tipo de archivo no valido');
                return false;
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
    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({dateFormat: 'yy-mm-dd'});


</script>
