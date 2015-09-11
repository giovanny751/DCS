<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>ADMINISTRACIÓN DE ROLES
    </h5>
</div>
<div class='well'>
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
                <th>Eliminar</th>
                </thead>
                <tbody id="cuerporol">
                    <?php foreach ($roles as $datos) { ?>
                        <tr>
                            <td><?php echo $datos['rol_nombre']; ?></td>
                            <!--<td><?php echo $datos['rol_estado']; ?></td>-->
                            <td align="center"><button type="button" rol="<?php echo $datos['rol_id']; ?>"  data-toggle="modal" data-target="#myModal"  class="btn btn-info modificar">Opciones</button></td>
                            <td align="center"><button type="button" rol="<?php echo $datos['rol_id']; ?>" class="btn btn-danger eliminar">Eliminar</button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>    
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modificación</h4>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                <div class=" marginV20">
                    <div class="widgetTitle">
                        <h5><i class="glyphicon glyphicon-pencil"></i> Nuevo</h5>
                    </div>
                    <div class="well" >
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
<script>
    $(".seleccionados").click(function(){
        alert($(this).next().children().children().prop('tagName'))
    })
    
//------------------------------------------------------------------------------
//                      ELIMINAR ROL    
//------------------------------------------------------------------------------ 
    $('body').delegate('.eliminar', 'click', function() {
        var r=confirm('¿Desea eliminar el rol?');
        if(r==false)
            return false;
        $(this).parents().parents('tr').remove();
//        return false;
        $.post("<?php echo base_url('index.php/presentacion/eliminarrol'); ?>", {id: $(this).attr('rol')})
                .done(function(msg) {
                    alerta('verde','Rol eliminado con exito');
//                    $(this).parents('')
//                    $(this).parents('tr').remove();
        
                }).fail(function(msg) {
                    alerta('rojo','Error al eliminar');
                    location.reload();
        });
    });
//------------------------------------------------------------------------------
//                      NUEVO ROL    
//------------------------------------------------------------------------------    
    $('body').delegate('.guardar', 'click', function() {

        $.post("<?php echo base_url('index.php/presentacion/guardarroles'); ?>",
                $('#nuevorol').serialize())           
            .done(function(data) {
            $('#myModal').modal('hide');
//            var filas = "";
//            $.each(data, function(key, val) {
//                filas += "<tr>";
//                filas += "<td>" + val.rol_nombre + "</td>";
//                filas += "<td>" + val.rol_estado + "</td>";
//                filas += "<td><button type='button' rol='" + val.rol_id + "' class='btn btn-danger eliminar'>Eliminar</button></td>";
//                filas += "<td><button type='button' rol='" + val.rol_id + "' class='btn btn-info opciones'>Opciones</button></td>";
//                filas += "</tr>";
//            });
//            $('#cuerporol *').remove();
//            $('#cuerporol').append(filas);
//            $('#nombre').val('');
            alerta('verde', 'Guardado con exito');
            location.reload();
        }).fail(function() {
            alerta('rojo', 'No se pudo Guardar el Registro');
        })

    });

    $('.opciones').click(function() {
        $(".nombres").remove()
        $('input[type="checkbox"]').prop('checked', false);
        $('.agregarrol').append('<label class="nombres">Nombre</label><input type="text" id="nombre" name="nombre" class="form-control nombres">');
        $('#nombre').val('');
        $('.seleccionados').prop('checked', false);
    });

    $('.modificar').click(function() {
        $('#rol').val($(this).attr('rol'));
        $('input[type="checkbox"]').prop('checked', false);
        $('.agregarrol *').remove();
        $.post("<?php echo base_url('index.php/presentacion/rolesasignados'); ?>", {id: $(this).attr('rol')}, function(data) {
            $.each(data, function(key, val) {
                $('.seleccionados[value=' + val.menu_id + ']').prop('checked', true);
            });
        });
    });
</script>