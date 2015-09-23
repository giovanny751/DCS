<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>EMPRESA
    </h5>
</div>
<div class='well'>
    <div class="row">
        <form method="post" id="f5">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="row">
                    <label for="nit">
                        <span class="campoobligatorio">*</span>Nit
                    </label>
                    <input type="text" id="nit" name="nit"  class="form-control obligatorio" value="<?php echo $informacion[0]->emp_nit ?>"/>
                    
                </div>
                <div class="row">
                    <label for="razonsocial">
                        <span class="campoobligatorio">*</span>Razón social</label>
                    <input type="text" id="razonsocial" name="razonsocial" class="form-control obligatorio" value="<?php echo $informacion[0]->emp_razonSocial ?>"/>
                </div>
                <div class="row">
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $informacion[0]->emp_direccion ?>" />
                </div>
                <div class="row">
                    <label for="ciudad">Ciudad</label>
                    <select id="ciudad" name="ciudad" class="form-control" >
                        <option value="">::Seleccionar::</option>
                    </select>
                </div>
                <div class="row">
                    <label for="tamano">
                        <span class="campoobligatorio">*</span>Tamaño</label>
                    <select id="tamano" name="tamano" class="form-control obligatorio" >
                        <option value="">::Seleccionar::</option>
                        <?php foreach ($tamano as $t) { ?>
                            <option <?php echo ($t->TamEmp_tamano == $informacion[0]->tam_id ) ? "selected" : ""; ?>  value="<?php echo $t->TamEmp_tamano ?>"><?php echo $t->TamEmp_descripcion ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row">
                    <label for="empleados">
                        <span class="campoobligatorio">*</span>Numero de empleados</label>
                    <select id="empleados" name="empleados" class="form-control obligatorio" >
                        <option value="">::Seleccionar::</option>
                        <?php foreach ($numero as $n) { ?>
                            <option <?php echo ($n->numEmp_id == $informacion[0]->numEmp_id ) ? "selected" : ""; ?> value="<?php echo $n->numEmp_id ?>"><?php echo $n->numEmp_descripcion ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row">
                    <label for="actividadeconomica">
                        <span class="campoobligatorio">*</span>Actividad Economica</label>
                    <input type="text" id="actividadeconomica" name="actividadeconomica" class="form-control obligatorio"  value="<?php echo $informacion[0]->actEco_id ?>"/>
                </div>
            </div>
            <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-5 col-md-5 col-sm-5 col-xs-5">  
                <div class="row">
                    <label for="dimension1">Dimensión 1</label>
                    <select id="dimension1" name="dimension1" class="form-control" >
                        <option value="">::Seleccionar::</option>
                        <?php foreach ($dimensionuno as $d) { ?>
                            <option <?php echo ($d->dim_id == $informacion[0]->Dim_id ) ? "selected" : ""; ?> value="<?php echo $d->dim_id ?>"><?php echo $d->dim_descripcion ?></option>
                        <?php } ?>
                    </select>    
                </div>
                <div class="row">
                    <label for="dimension2">Dimensión 2</label>
                    <select id="dimension2" name="dimension2" class="form-control" >
                        <option value="">::Seleccionar::</option>
                        <?php foreach ($dimensiondos as $d2) { ?>
                            <option <?php echo ($d2->dim_id == $informacion[0]->Dimdos_id ) ? "selected" : ""; ?> value="<?php echo $d2->dim_id ?>"><?php echo $d2->dim_descripcion ?></option>
                        <?php } ?>
                    </select>  
                </div>
                <div class="row">
                    <label for="representante">Representante</label>
                    <input type="text" checked="" id="representante" name="representante" class="form-control"  value="<?php echo $informacion[0]->emp_representante ?>"/>
                </div>
            </div>
        </form>
    </div>
    <div class="row" style="text-align: center">
        <a href="<?php echo base_url("index.php/administrativo/cargos") ?>"><button type="" class="btn btn-info">Cargo</button></a>
        <a href="<?php echo base_url("index.php/administrativo/dimension") ?>"><button type="" class="btn btn-info">Dimensión 1</button></a>
        <a href="<?php echo base_url("index.php/administrativo/dimension") ?>"><button type="" class="btn btn-info">Dimensión 2</button></a>
        <button type="button" id="guardar" class="btn btn-dcs">Guardar</button>
    </div>
</div>
<script>
    $('#guardar').click(function () {
        if (obligatorio('obligatorio') == true) {
            $.post(
                    "<?php echo base_url('index.php/administrativo/guardarempresa') ?>",
                    $('#f5').serialize()
                    )
                    .done(function (msg) {
                        alerta("verde", "Guardado Correctamente");
                    })
                    .fail(function (msg) {
                        alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
                    });
        }
    });

</script>