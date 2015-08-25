<div class="alert alert-info"><center><b>DIMENSIÒN</b></center></div>
<div class="row">
    <div class="form-inline">
        <div class="form-group">
            <label for="codigo"><span class="campoobligatorio">*</span></label>Código</label>
            <input type="text" name="codigo" id="codigo" class="form-control obligatorio"/>
            <label for="descripcion"><span class="campoobligatorio">*</span>Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control obligatorio"/>
            <button type="button" class="btn btn-success guardar">Guardar</button>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <table class="table table-bordered table-hover">
        <thead>
        <th>Código</th>
        <th>Descripción</th>
        <th>Opciones</th>
        </thead>
        <tbody id="bodydimension">
            <?php foreach ($dimension as $d) { ?>
                <tr>
                    <td><?php echo $d->dim_codigo ?></td>
                    <td><?php echo $d->dim_descripcion ?></td>
                    <td>
                        <i class="fa fa-times fa-2x eliminar btn btn-danger" title="Eliminar" dim_id="<?php echo $d->dim_id ?>" ></i>
                        <i class="fa fa-pencil-square-o fa-2x modificar btn btn-info" title="Modificar" dim_id="<?php echo $d->dim_id ?>" data-toggle="modal" data-target="#myModal"></i>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Dimensiòn</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-offset-2 col-sm-8">
                        <center>
                            <label for="codigo2">Còdigo</label>
                            <input type="text" name="codigo" id="codigo2" class="form-control" />
                            <label for="descripcion2">Descripciòn</label>
                            <input type="text" name="descripcion2" id="descripcion2" class="form-control" />
                        </center>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('body').delegate(".eliminar", "click", function () {
        var eliminar = $(this);
        if (confirm("Esta seguro de eliminar la dimension") == true) {
            $.post("<?php echo base_url('index.php/administrativo/eliminardimension') ?>",
                    {id: $(this).attr('dim_id')}
            ).done(function (msg) {
                eliminar.parents('tr').remove();
                alerta("verde", "Eliminado Correctamente");
            }).fail(function (msg) {
                alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
            });
        }
    });
    $('.guardar').click(function () {
        if (obligatorio('obligatorio') == true) {
            $.post("<?php echo base_url("index.php/administrativo/guardardimension") ?>"
                    , {
                        codigo: $('#codigo').val(),
                        descripcion: $('#descripcion').val()
                    })
                    .done(function (msg) {
                        $('#bodydimension *').remove();
                        var bodydimension = "";
                        $.each(msg, function (key, val) {
                            bodydimension += "<tr>";
                            bodydimension += "<td>" + val.dim_codigo + "</td>";
                            bodydimension += "<td>" + val.dim_descripcion + "</td>";
                            bodydimension += '<td><i class="fa fa-times fa-2x eliminar btn btn-danger" title="Eliminar" dim_id="' + val.dim_id + '" ></i><i class="fa fa-pencil-square-o fa-2x modificar btn btn-info" title="Modificar"  dim_id="' + val.dim_id + '" data-toggle="modal" data-target="#myModal"></i></td>';
                            bodydimension += "</tr>";
                        });
                        $('#bodydimension').append(bodydimension);
                        alerta("verde", "Guardado Correctamente");
                    })
                    .fail(function (msg) {
                        alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
                    })
        }
    });
</script>