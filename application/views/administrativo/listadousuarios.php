<div class="alert alert-info"><center><b>LISTADO USUARIOS</b></center></div>
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
                    <?php foreach($estados as $e){?>
                    <option value="<?php echo $e->est_id ?>"><?php echo $e->est_nombre ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: center">
            <div class="form-group">
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
        </thead>
        <tbody id="bodyuser">
            <?php foreach($usuarios as $u){?>
            <tr>
                <td><?php echo $u->usu_cedula  ?></td>
                <td><?php echo $u->usu_usuario  ?></td>
                <td><?php echo $u->usu_nombre  ?></td>
                <td><?php echo $u->usu_apellido  ?></td>
                <td><?php echo $u->est_id  ?></td>
                <td><?php echo $u->usu_fechaActualizacion  ?></td>
                <td><?php echo $u->usu_fechaCreacion  ?></td>
                <td><?php echo $u->Ing_id  ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>    
<script>
$('.consultar').click(function(){
    $.post(
            "<?php echo base_url("index.php/administrativo/consultarusuario") ?>",
            $("#f4").serialize()
            ).done(function(msg){
                $('#bodyuser *').remove();
                var body = "";
                $.each(msg,function(key,val){
                    body += "<tr>";
                    body += "<td>"+val.usu_cedula+"</td>";
                    body += "<td>"+val.usu_usuario+"</td>";
                    body += "<td>"+val.usu_nombre+"</td>";
                    body += "<td>"+val.usu_apellido+"</td>";
                    body += "<td>"+val.est_id+"</td>";
                    body += "<td>"+val.usu_fechaActualizacion+"</td>";
                    body += "<td>"+val.usu_fechaCreacion+"</td>";
                    body += "<td>"+val.Ing_id+"</td>";
                    body += "</tr>";
                });
                $('#bodyuser').append(body);
            }).fail(function(msg){
                
            });
});
</script>