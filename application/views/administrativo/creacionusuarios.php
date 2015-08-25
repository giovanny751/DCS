<div class="alert alert-info"><center><b>CREACIÒN USUARIOS</b></center></div>
<form id="f3" method="post">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="cedula"><span class="campoobligatorio">*</span>Cedula</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="cedula" name="cedula" class="form-control obligatorio">
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="roles">Roles</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <select id="roles" name="roles" class="form-control">
                <option value="">::Seleccionar::</option>
            </select>
        </div>    
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="nombres"><span class="campoobligatorio">*</span>Nombres</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="nombres" name="nombres" class="form-control obligatorio">
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="apellidos"><span class="campoobligatorio">*</span>Apellidos</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="apellidos" name="apellidos" class="form-control obligatorio">
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="usuario"><span class="campoobligatorio">*</span>Usuario</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="text" id="usuario" name="usuario" class="form-control obligatorio">
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="contrasena"><span class="campoobligatorio">*</span>Contraseña</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <input type="password" id="contrasena" name="contrasena" class="form-control obligatorio">
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="estado">Estado</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <select id="estado" name="estado" class="form-control">
                <option value="">::Seleccionar::</option>
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
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="genero"><span class="campoobligatorio">*</span>Genero</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <select id="genero" name="genero" class="form-control obligatorio">
                <option value="">::Seleccionar::</option> 
                <?php foreach ($sexo as $s) { ?>
                    <option value="<?php echo $s->Sex_id ?>"><?php echo $s->Sex_Sexo ?></option>
                <?php } ?>
            </select>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="empleado">Empleado</label>
        </div>    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <select id="empleado" name="empleado" class="form-control">
                <option value="">::Seleccionar::</option>
                <?php foreach ($empleado as $e) { ?>
                    <option value="<?php echo $e->Emp_Id ?>"><?php echo $e->Emp_Nombre . " " . $e->Emp_Apellidos ?></option>
                <?php } ?>
            </select>
        </div>    
    </div>
</form>
<div class="row" style="text-align:center">
    <button type="button" class="btn btn-success" id="guardar">Guardar</button>
</div>    
<script>
    $('#guardar').click(function () {
        if (obligatorio('obligatorio') == true) {
            $.post(
                    "<?php echo base_url('index.php/administrativo/guardarusuario') ?>",
                    $('#f3').serialize()
                    ).done(function (msg) {
                alerta("verde", "Datos guardados correctamente");
            })
                    .fail(function (msg) {
                        alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
                    });
        }
    });
</script>    