<div class="alert alert-info">
    <center><b>LISTADO EMPLEADOS</b></center>
</div>
<form method="post" id="f2">
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
                <label for="codigo">Código</label><input type="text" name="codigo" id="codigo" class="form-control">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="form-group">
                <label for="tipodocumento">Tipo documento</label>
                <select name="tipodocumento" id="tipodocumento" class="form-control">
                    <option value="">::Seleccionar::</option>
                    <?php foreach ($tipodocumento as $tp) { ?>
                        <option value="<?php echo $tp->tipDoc_tipo ?>"><?php echo $tp->tipDoc_Descripcion ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="form-group">
                <label for="estado">Estado</label><input type="text" name="estado" id="estado" class="form-control">
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
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
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Teléfono</th>
        <th>Estado</th>
        <th>Tipo contrato</th>
        <th>Fecha inicio</th>
        <th>Fecha fin</th>
        <th>Opciones</th>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div> 
<script>
    $('.consultar').click(function(){
        $.post("<?php echo base_url('index.php/administrativo/consultaempleados') ?>")
    });
</script>    