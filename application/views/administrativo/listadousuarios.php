<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>LISTADO USUARIOS
    </h5>
</div>
<div class='well'>
    <form method="post" id="f4">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-group">
                    <label for="cedula">Cedula</label><input type="text" name="cedula" id="cedula" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-group">
                    <label for="nombre">Nombre</label><input type="text" name="nombre" id="nombre" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-group">
                    <label for="apellido">Apellido</label><input type="text" name="apellido" id="apellido" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control">
                        <option value="">::Seleccionar::</option>
                        <?php foreach ($estado as $e) { ?>
                            <option value="<?php echo $e->est_id ?>"><?php echo $e->est_nombre ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: center">
                <div class="form-group">
                    <label>&nbsp;</label><button type="button" class="btn btn-danger limpiar">Limpiar</button>
                    <label>&nbsp;</label><button type="button" class="btn btn-success consultar">Consultar</button>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <table class="table table-bordered table-hover">
            <thead>
            <th>Cédula</th>
            <th>Usuario</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Estado</th>
            <th>Fecha actualización</th>
            <th>Fecha creación</th>
            <th>Ultimo Ingreso</th>
            <th>Opciones</th>
            </thead>
            <tbody id="bodyuser">
                <?php foreach ($usuarios as $u) { ?>
                    <tr>
                        <td><?php echo $u->usu_cedula ?></td>
                        <td><?php echo $u->usu_usuario ?></td>
                        <td><?php echo $u->usu_nombre ?></td>
                        <td><?php echo $u->usu_apellido ?></td>
                        <td><?php echo ($u->est_id == 1)?"Activo":"Inactivo"; ?></td>
                        <td><?php echo $u->usu_fechaActualizacion ?></td>
                        <td><?php echo $u->usu_fechaCreacion ?></td>
                        <td><?php echo $u->ingreso ?></td>
                        <td>
                            <i class="fa fa-times fa-2x eliminar btn btn-danger" title="Eliminar" usu_id="<?php echo $u->id ?>"></i>
                            <i class="fa fa-pencil-square-o fa-2x modificar btn btn-info" title="Modificar" usu_id="<?php echo $u->id ?>"  data-toggle="modal" data-target="#myModal"></i>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>    
</div>    
<form id="f10" method="post" action="<?php echo base_url("index.php/administrativo/creacionusuarios") ?>">
    <input type="hidden" value="" name="usu_id" id="usu_id">
</form>
<script>
$('#cedula').autocomplete({
    source: "<?php echo base_url("index.php/administrativo/autocompletaruacedula") ?>",
    minLength: 3
  });
$('#nombre').autocomplete({
    source: "<?php echo base_url("index.php/administrativo/autocompletar") ?>",
    minLength: 3
  });
$('#apellido').autocomplete({
    source: "<?php echo base_url("index.php/administrativo/autocompletaruapellido") ?>",
    minLength: 3
  });
    $('body').delegate(".modificar", "click", function () {
        $("#usu_id").val($(this).attr("usu_id"));
        $("#f10").submit();
    });
    $('.limpiar').click(function () {
        $('select,input').val('');
    });
    $('.consultar').click(function () {
        $.post(
                "<?php echo base_url("index.php/administrativo/consultarusuario") ?>",
                $("#f4").serialize()
                ).done(function (msg) {
            $('#bodyuser *').remove();
            var body = "";
            $.each(msg, function (key, val) {
                body += "<tr>";
                body += "<td>" + val.usu_cedula + "</td>";
                body += "<td>" + val.usu_usuario + "</td>";
                body += "<td>" + val.usu_nombre + "</td>";
                body += "<td>" + val.usu_apellido + "</td>";
                body += "<td>" + val.est_id + "</td>";
                body += "<td>" + val.usu_fechaActualizacion + "</td>";
                body += "<td>" + val.usu_fechaCreacion + "</td>";
                body += "<td>" + val.Ing_id + "</td>";
                body += "<td></td>";
                body += "</tr>";
            });
            $('#bodyuser').append(body);
        }).fail(function (msg) {

        });
    });
</script>