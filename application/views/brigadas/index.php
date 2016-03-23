


<div class="row">
    <div class="row">
        <span class="tituloH">Brigadas</span>
        <span class="cuadroH1"></span>
        <span class="cuadroH2"></span>
        <span class="cuadroH3"></span>
    </div>
    <form action="<?php echo base_url('index.php/') . "/Brigadas/save_brigadas"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data" id="form1">
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
                            <input type="text" value="<?php echo (isset($datos[0]->direccion) ? $datos[0]->direccion : '' ) ?>" class=" form-control   " id="Direccion" name="Direccion">
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
                        <div class="col-md-2">
                            <label for="tipo_equipo_cod">
                                Tipo                        </label>
                        </div>
                        <div class="col-md-3">
                            <?php echo lista("tipo_equipo_cod[]", "tipo_equipo_cod", "form-control  tipo_equipo_cod tipo_equipo_cod3", "tipo_equipo", "tipo_equipo_cod", "referencia", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="descripcion">
                                Descripción/Serial                        </label>
                        </div>
                        <div class="col-md-3">
                            <script>

                                $('document').ready(function () {
                                    $('.tipo_equipo_cod').change(function () {

                                        $('#descripcion').autocomplete({
                                            source: "<?php echo base_url("index.php/Pacientes/autocomplete_descripcion") ?>?tipo_equipo_cod=" + $('#tipo_equipo_cod').val() + "",
                                            minLength: 3
                                        });
                                    });


                                });
                            </script>
                            <input type="text" id="descripcion"  class="form-control ">
                        </div>
                        <div class="col-md-3">
                            <a href="javascript:" id="agregar_equipo">Agregar</a>
                        </div>
                    </div>
                    <!--                    <div class="row">
                                            <div class="col-md-3">
                                                <label>Equipos</label>
                                            </div>
                                            <div class="col-md-3">
                    <?php echo lista("", "new_equipo", "form-control ", "equipos", "id_equipo", "descripcion", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="javascript:" class="agregar_procedimiento">Agregar</a>
                                            </div>
                                        </div>-->
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
                <span style="float: right">
                    <a href="javascript:" class="btn btn-dcs lecturas" style="display: none"   data-toggle="modal" data-target="#myModal">Iniciar lectura</a>
                </span>
                <span id="boton_cargar" style="display: none">
                    <h2>Cargando ...</h2>
                </span>
            </div>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
    </form>

</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <div class="row">
                        <span class="tituloH">Brigadas</span>
                        <span class="cuadroH1"></span>
                        <span class="cuadroH2"></span>
                        <span class="cuadroH3"></span>
                    </div>
                </h4>
            </div>
            <div class="modal-body">
                <p>
                <div class="row">
                    <div class="col-md-3">
                        N° Brigada
                    </div>
                    <div class="col-md-3">
                        <label><span class="modal_brigada"></span></label>
                        <input type="text" style="display: none" class="form-control" id="modal_brigada">
                    </div>
                    <div class="col-md-3">
                        Nombre Brigada
                    </div>
                    <div class="col-md-3">
                        <label><span class="modal_nombre_brigada"></span></label>
                        <input type="text" style="display: none" class="form-control" id="modal_nombre_brigada">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        Tipo documento
                    </div>
                    <div class="col-md-3">
                        <select id="tipo_documento" name="tipo_documento" class="form-control">
                            <option value=""></option>
                            <option value="PA" <?php echo (isset($datos[0]->tipo_documento) ? ($datos[0]->tipo_documento=='PE'?'selected':'') : '' ) ?>>Pasaporte</option>
                            <option value="RC" <?php echo (isset($datos[0]->tipo_documento) ? ($datos[0]->tipo_documento=='RC'?'selected':'') : '' ) ?>>Registro Civil</option>
                            <option value="CE" <?php echo (isset($datos[0]->tipo_documento) ? ($datos[0]->tipo_documento=='CE'?'selected':'') : '' ) ?>>Cédula Extranjera</option>
                            <option value="CC" <?php echo (isset($datos[0]->tipo_documento) ? ($datos[0]->tipo_documento=='CC'?'selected':'') : '' ) ?>>Cédula de Ciudadanía</option>
                            <option value="NU" <?php echo (isset($datos[0]->tipo_documento) ? ($datos[0]->tipo_documento=='NU'?'selected':'') : '' ) ?>>Núm. único de ident.</option>
                            <option value="TI" <?php echo (isset($datos[0]->tipo_documento) ? ($datos[0]->tipo_documento=='TI'?'selected':'') : '' ) ?>>Tarjeta de Identidad</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        * Cédula
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control " id="modal_cedula">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        * Nombre
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="modal_nombre">
                    </div>
                    <div class="col-md-3">
                        * Fecha de nacimiento
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control fecha" id="modal_fecha">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        * Apellidos
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="modal_apellidos">
                    </div>
                    <div class="col-md-3">
                        * Estatura
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="modal_estatura">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        Sexo
                    </div>
                    <div class="col-md-3">
                        <select id="sexo" name="sexo" class="form-control">
                            <option value=""></option>
                            <option value="1" <?php echo (isset($datos[0]->sexo) ? ($datos[0]->sexo==1?'selected':'') : '' ) ?>>F</option>
                            <option value="2" <?php echo (isset($datos[0]->sexo) ? ($datos[0]->sexo==2?'selected':'') : '' ) ?>>M</option>
                        </select>
                    </div>
                
                    <div class="col-md-3">
                        RH 
                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->rh) ? $datos[0]->rh : '' ) ?>" class=" form-control     " id="rh" name="rh">
                    </div>
                    </div>
                <div class="row">
                    
                
                    <div class="col-md-3">
                        Estrato 
                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->estrato) ? $datos[0]->estrato : '' ) ?>" class=" form-control     " id="estrato" name="estrato">
                    </div>
                </div>
                <div class="row">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Serial</th>
                                <th>Examen</th>
                                <th>Variable</th>
                                <th>Lectura</th>
                            </tr>
                        </thead>
                        <tbody class="datos_table"></tbody>
                    </table>
                </div>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dcs guardar_paciente">Guardar</button>
                <button type="button" class="btn btn-dcs" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>

<script>
    $('#nombre').change(function () {
        var nombre = $('#nombre').val();
        $.post('<?php echo base_url('index.php/administrativo/confirm_nombre') ?>', {nombre: nombre})
                .done(function (msg) {
                    if (msg == 0) {
                        alerta('verde', 'nombre valido')
                    } else {
                        alerta('rojo', 'nombre ya se encuentra registrada')
                        $('#nombre').val('');
                    }
                })
                .fail(function (msg) {
                })
    })
    
    $('.guardar_paciente').click(function () {

        var u = "";
        $('input[type="checkbox"]:checked').each(function(){
            u+=$(this).val()+",";
        })
        if (u=='') {
            alerta('rojo', 'Seleccione una lectura');
            return false;
        }
        var modal_cedula = $('#modal_cedula').val();
        var modal_nombre = $('#modal_nombre').val();
        var modal_fecha = $('#modal_fecha').val();
        var modal_apellidos = $('#modal_apellidos').val();
        var sexo = $('#sexo').val();
        var rh = $('#rh').val();
        var tipo_documento = $('#tipo_documento').val();
        var estrato = $('#estrato').val();
//        var modal_sexo = $('#modal_sexo').val();
        var modal_estatura = $('#modal_estatura').val();
        if (modal_cedula == '' ||
                modal_nombre == '' ||
                modal_fecha == '' ||
                modal_apellidos == '' ||
//                modal_sexo == '' ||
                modal_estatura == ''
                ) {
            alerta('rojo', 'todos los campos son obligatorios');
            return false;
        }

        var url = "<?php echo base_url('index.php/') . "/Brigadas/save_pacientes"; ?>";
        $.post(url, {
            modal_cedula: modal_cedula,
            modal_nombre: modal_nombre,
            modal_fecha: modal_fecha,
            modal_apellidos: modal_apellidos,
//            modal_sexo: modal_sexo,
            modal_estatura: modal_estatura,
            id_lectura: u,
            sexo:sexo,
            rh:rh,
            tipo_documento:tipo_documento,
            estrato:estrato
        })
                .done(function (msg) {
                    alerta('verde', 'los datos fueron ingresados con exito')
                    $('#modal_cedula').val('');
                    $('#modal_nombre').val('');
                    $('#modal_fecha').val('');
                    $('#modal_apellidos').val('');
//        $('#modal_sexo').val();
                   $('#modal_estatura').val('');
                    $('.lecturas').trigger('click')
                })
                .fail(function () {

                })

    })

    $('#agregar_equipo').click(function () {
        var descripcion = $('#descripcion').val();
        if (descripcion == "")
            return false;
        var r = descripcion.split(' :: ');
        var html = "<tr><td><input type='hidden' name='equipos[]' class='proce' value='" + r[3] + "'> " + r[0] + "</td><td><a href='javascript:' class='eliminar'>Eliminar</a></td><tr>"
        $('#new_proce').append(html)

    })

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
            var url = "<?php echo base_url('index.php/') . "/Brigadas/save_brigadas"; ?>";
            $.post(url, $('#form1').serialize())
                    .done(function (msg) {
                        $('#id_brigada').val(msg)
                        $('#boton_guardar').show();
                        $('#boton_cargar').hide();
                        $('.lecturas').show()
                        alerta('verde', 'Datos Duardados')
                    })
                    .fail(function () {
                        alerta('rojo', 'Datos No Guardados')
                    })
            return false;
        }
    }
    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
<?php if (isset($datos[0]->id_brigada)) { ?>
        $('.lecturas').show()
        $('.lecturas').click(function () {
            $('.datos_table *').remove()
            $.post("<?php echo base_url('index.php/') . "/Brigadas/buscar_alarmas"; ?>")
                    .done(function (msg) {
                        var html = "";
                        $.each(msg, function (key, val) {
                            html += '<tr>' +
                                    '<td><input type="checkbox" name="gu" value="' + val.id_lectura_equipo + '"></td>' +
                                    '<td>' + val.serial_equipo + '</td>' +
                                    '<td>' + val.examen_nombre + '</td>' +
                                    '<td>' + val.hl7tag + '</td>' +
                                    '<td>' + val.lectura_numerica + '</td>' +
                                    '</tr>'
                        })
                        $('.datos_table').append(html)
                        console.log($('.datos_table').html())
                    })
                    .fail(function () {

                    })
            $('#modal_brigada').val('<?php echo $datos[0]->id_brigada ?>');
            $('#modal_nombre_brigada').val('<?php echo $datos[0]->nombre ?>');
            $('.modal_brigada').html('<?php echo $datos[0]->id_brigada ?>');
            $('.modal_nombre_brigada').html('<?php echo $datos[0]->nombre ?>');

        });
<?php } ?>
</script>
