<div class="row">
    <span class="tituloH">ADMINISTRACIÓN DE ROLES</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
<div class="row">
    <button type="button" data-toggle="modal" data-target="#myModal"  class="btn btn-info opciones">Nuevo Rol</button>
</div>
<div class="row">
    <div class="table-responsive ">
        <table class="table table-responsive table-striped table-bordered">
            <thead>
            <th>Nombre</th>
            <!--<th>Estado</th>-->
            <th>Opciones</th>
            <th>Editar</th>
            <th>Eliminar</th>
            </thead>
            <tbody id="cuerporol">
                <?php foreach ($roles as $datos) { ?>
                    <tr>
                        <td><?php echo $datos['rol_nombre']; ?></td>
                        <!--<td><?php echo $datos['rol_estado']; ?></td>-->
                        <td align="center"><button type="button" rol="<?php echo $datos['rol_id']; ?>"  data-toggle="modal" data-target="#myModal"  class="btn btn-info modificar">Opciones</button></td>
                        <td align="center"><button type="button" rol="<?php echo $datos['rol_id']; ?>"  nombre="<?php echo $datos['rol_nombre']; ?>"  data-toggle="modal" data-target="#myModal2"  class="btn btn-info modificar_nombre">Modificar</button></td>
                        <td align="center"><button type="button" rol="<?php echo $datos['rol_id']; ?>"  cantidad="<?php echo $datos['cantidad']; ?>" class="btn btn-dcseliminar eliminar">Eliminar</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>    
</div>
<!--Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="row modal-title">
                    <span class="tituloH">Nuevo</span>
                    <span class="cuadroH1"></span>
                    <span class="cuadroH2"></span>
                    <span class="cuadroH3"></span>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                <div class=" marginV20">
                    <form id="nuevorol" method="post">
                        <input type="hidden" id="rol" name="rol">
                        <div class="form-group agregarrol">

                        </div>
                        <div class="form-group datas"  style="overflow: scroll;height: 250px;">
                            <label>Permisos </label>
                            <?php
                            echo $content;
                            ?>
                        </div>
                    </form>    
                </div>
            </div>		
            <div class="modal-footer">
                <div class="row marginV10">
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 col-md-offset-8 col-lg-offset-8 col-sm-offset-8 col-sx-offset-8 margenlogo' align='center' >
                        <button type="button" class="btn btn-primary guardar">Guardar</button>
                    </div>
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 margenlogo' align='center' >
                        <button type="button" data-dismiss="modal" class="btn btn-default">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    


<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Rol</h4>
            </div>
            <div class="modal-body">
                <p>
                    Rol:<br>
                    <input type="text" class="form-control" name="rol_editar" id="rol_editar">
                    <input type="hidden" class="form-control" name="id_rol_editar" id="id_rol_editar">
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success guardar_edit_rol" data-dismiss="modal">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>



<script>
    $('.modificar_nombre').click(function () {
        var rol = $(this).attr('rol');
        var nombre = $(this).attr('nombre');
        $('#id_rol_editar').val(rol);
        $('#rol_editar').val(nombre);
    });
    $('.guardar_edit_rol').click(function () {
        var url = "<?php echo base_url('index.php/Presentacion/edit_rol') ?>";
        $.post(url, {rol: $('#id_rol_editar').val(), nombre: $('#rol_editar').val()})
                .done(function () {
                    alerta('verde', 'La informacion fue actualizada con exito')
                    location.reload();
                })
                .fail(function () {
                    alerta('rojo', 'Error al guardar');
                })
    })

    $('.seleccionados').click(function() {
    var atr = $(this).attr('atr')
    var marcado = $(this).is(":checked");
    if (marcado == true)
        var r = true;
    else
        var r = false;
    $("." + atr).each(function () {
        $(this).prop('checked', r);
    });
    })

//------------------------------------------------------------------------------
//                      ELIMINAR ROL    
//------------------------------------------------------------------------------ 
            $('body').delegate('.eliminar', 'click', function () {
        cantidad = $(this).attr('cantidad');
        if (cantidad > 0) {
            alerta('rojo', 'hay usuarios asociados a este rol. ')
            return false;
        }
        var r = confirm('¿Desea eliminar el rol?');
        if (r == false)
            return false;
        $(this).parents().parents('tr').remove();
//        return false;
        $.post("<?php echo base_url('index.php/presentacion/eliminarrol'); ?>", {id: $(this).attr('rol')})
                .done(function (msg) {
                    alerta('verde', 'Rol eliminado con exito');
//                    $(this).parents('')
//                    $(this).parents('tr').remove();

                }).fail(function (msg) {
            alerta('rojo', 'Error al eliminar');
            location.reload();
        });
    });
//------------------------------------------------------------------------------
//                      NUEVO ROL    
//------------------------------------------------------------------------------    
    $('body').delegate('.guardar', 'click', function () {

        $.post("<?php echo base_url('index.php/presentacion/guardarroles'); ?>",
                $('#nuevorol').serialize())
                .done(function (data) {
                    $('#myModal').modal('hide');
//            var filas = "";
//            $.each(data, function(key, val) {
//                filas += "<tr>";
//                filas += "<td>" + val.rol_nombre + "</td>";
//                filas += "<td>" + val.rol_estado + "</td>";
//                filas += "<td><button type='button' rol='" + val.rol_id + "' class='btn btn-dcseliminar'>Eliminar</button></td>";
//                filas += "<td><button type='button' rol='" + val.rol_id + "' class='btn btn-info opciones'>Opciones</button></td>";
//                filas += "</tr>";
//            });
//            $('#cuerporol *').remove();
//            $('#cuerporol').append(filas);
//            $('#nombre').val('');
                    alerta('verde', 'Guardado con exito');
                    location.reload();
                }).fail(function () {
            alerta('rojo', 'No se pudo Guardar el Registro');
        })

    });

    $('.opciones').click(function () {
        $(".nombres").remove()
        $('input[type="checkbox"]').prop('checked', false);
        $('.agregarrol').append('<label class="nombres">Nombre</label><input type="text" id="nombre" name="nombre" class="form-control nombres">');
        $('#nombre').val('');
        $('.seleccionados').prop('checked', false);
    });

    $('.modificar').click(function () {
        $('#rol').val($(this).attr('rol'));
        $('input[type="checkbox"]').prop('checked', false);
        $('.agregarrol *').remove();
        $.post("<?php echo base_url('index.php/presentacion/rolesasignados'); ?>", {id: $(this).attr('rol')}, function (data) {
            $.each(data, function (key, val) {
                $('.seleccionados[value=' + val.menu_id + ']').prop('checked', true);
            });
        });
    });
</script>