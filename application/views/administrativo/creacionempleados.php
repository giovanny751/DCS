
<div class="alert alert-info"><center><b>CREACIÒN EMPLEADO</b></center></div>
<form method="post" id="f1">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="codigo">Código</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="codigo" name="codigo" class="form-control">
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="tipocontrato"><span class="campoobligatorio">*</span>Tipo Contrato</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <select id="tipocontrato" name="tipocontrato" class="form-control obligatorio">
                <option value="">::Seleccionar::</option>
                <?php foreach ($tipocontrato as $tp) { ?>
                    <option value="<?php echo $tp->TipCon_Id ?>"><?php echo $tp->TipCon_Descripcion ?></option>
                <?php } ?>
            </select>
        </div>    
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="cedula"><span class="campoobligatorio">*</span>Cedula</label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <input type="text" id="cedula" name="cedula" class="form-control obligatorio" />
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="fechainiciocontrato"><span class="campoobligatorio">*</span>Fecha Inicio Contrato</label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <input type="text" name="fechainiciocontrato" id="fechainiciocontrato" class="form-control fecha obligatorio"/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="nombre"><span class="campoobligatorio">*</span>Nombres</label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <input type="text" id="nombre" name="nombre" class="form-control obligatorio" />
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="fechafincontrato"><span class="campoobligatorio">*</span>Fecha Fin Contrato</label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <input type="text" name="fechafincontrato" id="fechafincontrato" class="form-control fecha obligatorio" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="apellidos"><span class="campoobligatorio">*</span>Apellidos</label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <input type="text" id="apellidos" name="apellidos" class="form-control obligatorio" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="sexo"><span class="campoobligatorio">*</span>Genero</label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <select name="sexo" id="sexo" class="form-control obligatorio">
                <option value="">::Seleccionar::</option>
                <?php foreach ($sexo as $s) { ?>
                    <option value="<?php echo $s->Sex_id ?>"><?php echo $s->Sex_Sexo ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="planobligatoriodesalud"><span class="campoobligatorio">*</span>Plan Obligatorio de Salud</label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <select name="planobligatoriodesalud" id="planobligatoriodesalud" class="form-control obligatorio">
                <option value="">::Seleccionar::</option>
                <option value="1">Si</option>
                <option value="0">No</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="fechadenacimiento"><span class="campoobligatorio">*</span>Fecha Nacimiento</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="fechadenacimiento" name="fechadenacimiento" class="form-control fecha obligatorio">
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="fechaafiliacionarl"><span class="campoobligatorio">*</span>Fecha Afiliacion ARL</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <input type="text" name="fechaafiliacionarl" class="form-control fecha obligatorio"/>
        </div>    
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="estatura">Estatura</label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <input type="text" id="estatura" name="estatura" class="form-control" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="peso">Peso</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="peso" name="peso" class="form-control">
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="tipoaseguradora">Tipo Aseguradora</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <select id="tipoaseguradora" name="tipoaseguradora" class="form-control">
                <option value="">::Seleccionar::</option>
                <?php foreach ($tipoaseguradora as $ta) { ?>
                    <option value="<?php echo $ta->TipAse_Id ?>"><?php echo $ta->TipAse_Nombre ?></option>
                <?php } ?>
            </select>
        </div>    
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="telefono"><span class="campoobligatorio">*</span>Teléfono</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="telefono" name="telefono" class="form-control number obligatorio">
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="nombreaseguradora">Nombre Aseguradora</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <select id="nombreaseguradora" name="nombreaseguradora" class="form-control">
                <option value="">::Seleccionar::</option>
            </select>
        </div>    
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="direcion"><span class="campoobligatorio">*</span>Direción</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="direcion" name="direccion" class="form-control obligatorio">
        </div>  
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="contacto">Contacto</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="contacto" name="contacto" class="form-control">
        </div>  
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="telefonocontacto">Teléfono Contacto</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="telefonocontacto" name="telefonocontacto" class="form-control number">
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="dimension1">Dimensión1</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <select id="dimension1" name="dimension1" class="form-control">
                <option value="">::Seleccionar::</option>
                <?php foreach ($dimension as $d) { ?>
                    <option value="<?php echo $d->dim_id ?>"><?php echo $d->dim_descripcion ?></option>
                <?php } ?>
            </select>
        </div>    
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="email"><span class="campoobligatorio">*</span>Email</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="email" name="email" class="form-control obligatorio">
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="dimension2">Dimensión2</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <select id="dimension2" name="dimension2" class="form-control">
                <option value="">::Seleccionar::</option>
                <?php foreach ($dimension2 as $d2) { ?>
                    <option value="<?php echo $d2->dim_id ?>"><?php echo $d2->dim_descripcion ?></option>
                <?php } ?>
            </select>
        </div>    
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="estadocivil">Estado Civil</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <select id="estadocivil" name="estadocivil" class="form-control">
                <option value="">::Seleccionar::</option>
                <?php foreach ($estadocivil as $ec) { ?>
                    <option value="<?php echo $ec->EstCiv_id ?>"><?php echo $ec->EstCiv_Estado ?></option>
                <?php } ?>
            </select>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="cargo"><span class="campoobligatorio">*</span>Cargo</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <select id="cargo" name="cargo" class="form-control obligatorio">
                <option value="">::Seleccionar::</option>
                <?php foreach ($cargo as $c) { ?>
                    <option value="<?php echo $c->car_id ?>"><?php echo $c->car_nombre ?></option>
                <?php } ?>
            </select>
        </div>    
    </div>
</form>
<div class="row" style="text-align:center">
    <button type="button" id="guardar" class="btn btn-success">Guardar</button>
</div>
<script>
    $('#guardar').click(function () {

        if (obligatorio('obligatorio') == true)
        {
            $.post("<?php echo base_url('index.php/administrativo/guardarempleado') ?>",
                    $('#f1').serialize()
                    )
                    .done(function (msg) {
                        alerta("verde", "Guardado Correctamente");
                    }).fail(function (msg) {
                alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
            });
        }
    });
</script>    