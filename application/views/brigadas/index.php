


<div class="row">
    <form action="<?php echo base_url('index.php/') . "/Brigadas/save_brigadas"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="tabContainter">
            <!-- Nav tabs -->
            <ul class="tabLinks">              
                <li class="active"><a href="#tabBrigadas">Datos</a></li>
                <li><a href="#tabEquipos">Equipos</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tabContenido">
                <!--Tab Datos -->
                <div id="tabBrigadas" class="tab active">
                    <div class="row">
                        <?php $id = (isset($datos[0]->id_brigada) ? $datos[0]->id_brigada : '' ) ?>
                        <input type="hidden" value="<?php echo (isset($datos[0]->id_brigada) ? $datos[0]->id_brigada : '' ) ?>" class=" form-control   " id="id_brigada" name="id_brigada">


                        <div class="col-md-3">
                            <label for="nombre">
                                *                             Nombre                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->nombre) ? $datos[0]->nombre : '' ) ?>" class=" form-control obligatorio  " id="nombre" name="nombre">


                            <br>
                        </div>



                        <div class="col-md-3">
                            <label for="id_cliente">
                                *                             Cliente                        </label>
                        </div>
                        <div class="col-md-3">
                            <?php echo lista("id_cliente", "id_cliente", "form-control obligatorio", "clientes", "id_cliente", "nombre", (isset($datos[0]->id_cliente) ? $datos[0]->id_cliente : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
                        </div>
                        <div class="col-md-3">
                            <label for="Direccion">
                                Dirección                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->Direccion) ? $datos[0]->Direccion : '' ) ?>" class=" form-control   " id="Direccion" name="Direccion">
                            <br>
                        </div>
                        <div class="col-md-3">
                            <label for="ciudad">
                                Ciudad                        </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo (isset($datos[0]->ciudad) ? $datos[0]->ciudad : '' ) ?>" class=" form-control   " id="ciudad" name="ciudad">
                            <br>
                        </div>

                    </div>
                    <?php if (isset($post['campo'])) { ?>
                        <input type="hidden" name="<?php echo $post['campo'] ?>" value="<?php echo $post[$post['campo']] ?>">
                        <input type="hidden" name="campo" value="<?php echo $post['campo'] ?>">
                    <?php } ?>
                </div>
                <div id="tabEquipos" class="tab">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Equipos</label>
                        </div>
                        <div class="col-md-3">
                            <?php echo lista("", "new_equipo", "form-control ", "equipos", "id_equipo", "descripcion", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                        </div>
                        <div class="col-md-3">
                            <a href="javascript:" class="agregar_procedimiento">Agregar</a>
                        </div>

                    </div>
                    <div class="row">
                    <div class="container">
                        <table class="table">
                            <thead>
                            <th>Equipo</th>
                            <th>Acción</th>
                            </thead>
                            <tbody id="new_proce">
                               <?php foreach ($brigadas_equipo as $key => $value) { ?>
                                    <tr>
                                        <td>
                                            <input type='hidden' name='equipos[]' class='proce' value='<?php echo $value->id_equipo ?>'>
                                            <?php echo $value->descripcion; ?>
                                        </td>
                                        <td>
                                            <a href="javascript:" class="eliminar">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="containers">
            <div class="row">
                <span id="boton_guardar">
                    <button class="btn btn-dcs" >Guardar</button> 
                    <input class="btn btn-dcs" type="reset" value="Limpiar">
                    <a href="<?php echo base_url('index.php') . "/Brigadas/consult_brigadas" ?>" class="btn btn-dcs">Listado </a>
                </span>
                <span id="boton_cargar" style="display: none">
                    <h2>Cargando ...</h2>
                </span>
            </div>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
    </form>

</div>



<script>
    $('body').delegate('.eliminar', 'click', function () {
        $(this).parent().parent().remove();
    })
    $('.agregar_procedimiento').click(function () {
        var procedimientos = $('#new_equipo').val();
        if (procedimientos != "") {
            var html = "<tr><td><input type='hidden' name='equipos[]' class='proce' value='" + procedimientos + "'> " + $('#new_equipo option:selected').text() + "</td><td><a href='javascript:' class='eliminar'>Eliminar</a></td><tr>"
            $('#new_proce').append(html)
        }
    })
    function campos() {
        $('input[type="file"]').each(function (key, val) {
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
    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({dateFormat: 'yy-mm-dd'});


</script>
